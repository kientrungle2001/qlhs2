<?php

class PzkTableController extends PzkController {

	public $tables = array();
	public $inserts = array();
	public $constraints = array();
	public $filters = array();
	public $deletes = array();
	public $statusDeletes = array();

	public function jsonAction() {
		$table = @$_REQUEST['table'];
		$oldTable = $table;
		$fields = @$this->tables[$table] ? @$this->tables[$table] : '*';
		$filters = @$this->filters[$table];
		$cbFilters = @$this->filters[$table . '_filter'];
		$groupBy = false;
		$defaultOrderBy = false;
		$arrFields = array();
		$defaultConds = '1';
		if (is_array($fields)) {
			$arrFields = $fields;
			$table = @$fields['table']?$fields['table']: $oldTable;
			$groupBy = isset($fields['groupBy']) ? $fields['groupBy'] : false;
			$defaultOrderBy = isset($fields['orderBy']) ? $fields['orderBy'] : false;
			$defaultConds = isset($fields['conds']) ? $fields['conds'] : '1';
			$fields = @$fields['fields']?@$fields['fields']: '*';
		}
		$conds = array();
		$havingConds = array();
		$cbWhereConds = false;
		$cbHavingConds = false;
		if (isset($_REQUEST['filters'])) {
			if (!$filters) {
				$conds = array_merge($conds, $_REQUEST['filters']);
			} else {
				foreach ($filters as $key => $options) {
					if(!isset($_REQUEST['filters'][$key]) || isset($_REQUEST['filters'][$key]) && $_REQUEST['filters'][$key] == '') continue;
					foreach ($options as $comp => $field) {
						if(is_array($field)) {
							if(isset($field['having']) && $field['having'] == true) {
								$havingConds[] = array($field['name'] => array('cp' => $comp, 'value' => @$_REQUEST['filters'][$key]));
							}
						} else {
							if (!!@$_REQUEST['filters'][$key]) {
								$conds[] = array($field => array('cp' => $comp, 'value' => @$_REQUEST['filters'][$key]));
							}
						}
					}
				}
			}
			
			if ($cbFilters) {
				if(isset($cbFilters['where'])) {
					foreach ($cbFilters['where'] as $key => $options) {
						if(!isset($_REQUEST['filters'][$key]) || isset($_REQUEST['filters'][$key]) && $_REQUEST['filters'][$key] == '') continue;
						if(!$cbWhereConds) {
							$cbWhereConds = array('and', 
								array('equal', array('string', '1'), array('string', '1')), 
								array('equal', array('string', '1'), array('string', '1')));
						}
						$options = json_encode($options);
						$options = str_replace('?', $_REQUEST['filters'][$key], $options);
						$options = json_decode($options, true);
						$cbWhereConds[] = $options;
					}
				}
				if(isset($cbFilters['having'])) {
					foreach ($cbFilters['having'] as $key => $options) {
						if(!isset($_REQUEST['filters'][$key]) || isset($_REQUEST['filters'][$key]) && $_REQUEST['filters'][$key] == '') continue;
						if(!$cbHavingConds) {
							$cbHavingConds = array('and', 
								array('equal', array('string', '1'), array('string', '1')), 
								array('equal', array('string', '1'), array('string', '1')));
						}
						$options = json_encode($options);
						$options = str_replace('?', $_REQUEST['filters'][$key], $options);
						$options = json_decode($options, true);
						$cbHavingConds[] = $options;
					}
				}
			}
		}
		$rows = @$_REQUEST['rows'] ? @$_REQUEST['rows'] : 50;
		$page = @$_REQUEST['page'] ? @$_REQUEST['page'] : 1;
		$total = _db()->select('count(*) as val')->from($table);
		if(empty($conds)) {
			$conds = 1;
		}
		$total->where($defaultConds)
						->where($conds);
		
		if($groupBy) {
			$total = $total->groupBy($groupBy);
		}
		if(count($havingConds)) {
			$total->having($havingConds);
		}
		
		if($cbWhereConds || $cbHavingConds) {
			$total->useCB();
			if($cbWhereConds) {
				$total->where($cbWhereConds);
			}
			if($cbHavingConds) {
				$total->having($cbHavingConds);
			}
		}
		$totalQuery = $total->getQuery();
		if($groupBy) {
			$tt = _db()->select('count(*) as val')->from('('.$totalQuery . ') as s');
			$total = $tt->result();
		} else {
			$total = $total->result();
		}
		$orderBy = array();
		$sort = explode(',', @$_REQUEST['sort']);
		$order = explode(',', @$_REQUEST['order']);
		foreach ($sort as $index => $val) {
			$orderBy[] = $sort[$index] . ' ' . $order[$index];
		}
		$orderBy = implode(',', $orderBy);
		if (!trim($orderBy)) {
			$orderBy = $defaultOrderBy ? $defaultOrderBy: 'id desc';
		}
		$items = _db()
						->select($fields)
						->from($table)
						->where($defaultConds)
						->where($conds)
						->orderBy($orderBy)
						->limit($rows, ($page - 1));
		if($groupBy) {
			$items = $items->groupBy($groupBy);
		}
		if(count($havingConds)) {
			$items->having($havingConds);
		}
		if($cbWhereConds || $cbHavingConds) {
			$items->useCB();
			if($cbWhereConds) {
				$items->where($cbWhereConds);
			}
			if($cbHavingConds) {
				$items->having($cbHavingConds);
			}
		}
		$query = $items->getQuery();
		$items = $items->result();
		$data = array(
			'total' => $total[0]['val'],
			'rows' => $items,
			'groupBy' => $groupBy,
			'fields' => $arrFields,
			'query' => $query,
			'totalQuery' => $totalQuery
		);
		if($type = @$_REQUEST['export']) {
			if($type == 'json') {
				$ext = 'json';
			} elseif($type == 'excel') {
				$ext = 'xlsx';
			} elseif($type == 'csv') {
				$ext = 'csv';
			} elseif($type == 'html') {
				$ext = 'html';
			} else {
				$ext = 'json';
			}
			$rand = rand(0, 1000000000000);
			$file = '/cache/export-' .date('YmdHis'). '-' .$rand.'.' . $ext;
			
			if($ext == 'json') {
				file_put_contents(BASE_DIR . $file, '');
				foreach($items as $row) {
					file_put_contents(BASE_DIR . $file, json_encode($row, JSON_UNESCAPED_UNICODE) . "\r\n", FILE_APPEND);
				}
			} elseif($ext == 'csv') {
				file_put_contents(BASE_DIR . $file, '');
				if(count($items)) {
					$firstRow = $items[0];
					$fields = array_keys($firstRow);
					file_put_contents(BASE_DIR . $file, csvstr($fields) . "\r\n", FILE_APPEND);
				}
				foreach($items as $row) {
					$line = csvstr(array_values($row));
					file_put_contents(BASE_DIR . $file, $line . "\r\n", FILE_APPEND);
				}
			} elseif($ext == 'html') {
				file_put_contents(BASE_DIR . $file, '<!DOCTYPE html><html>
<head>
	<title>Quản trị</title>
	<meta name="google-site-verification" content="DJBoN802jfeoHdZJX1oM0vqdSuVjiqQ_0t4dHq0zEf4" />
	<meta content="width=device-width, height=device-height initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0"  name="viewport"  />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="canonical" href="http://phattrienngonngu.com/" />
</head>
<body>

				<table border="1" style="border-collapse: collapse">'."\r\n");
				if(count($items)) {
					$firstRow = $items[0];
					$fields = array_keys($firstRow);
					file_put_contents(BASE_DIR . $file, trstr($fields) . "\r\n", FILE_APPEND);
				}
				foreach($items as $row) {
					$line = trstr(array_values($row));
					file_put_contents(BASE_DIR . $file, $line . "\r\n", FILE_APPEND);
				}
				file_put_contents(BASE_DIR . $file, "</table></body></html>", FILE_APPEND);
			}

			if (file_exists(BASE_DIR . $file)) {
    echo json_encode(['file' => BASE_URL . $file, 'query' => $query]);
			}
			//unlink($file);
		} else {
			echo json_encode($data);
		}
		
	}
	
	public function getAction() {
		$id = @$_REQUEST['id'];
		$fields = @$_REQUEST['fields'];
		if(!$fields) {
			$fields = '*';
		}
		$row = _db()->select($fields)->from(@$_REQUEST['table'])->where(array('equal', 'id', $id))->result_one();
		echo json_encode($row);
	}
	
	public function treejsonAction() {
		//$_REQUEST['showSQL'] = 1;
		$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
		$table = @$_REQUEST['table'];
		$fields = @$this->tables[$table] ? @$this->tables[$table] : '*';
		$filters = @$this->filters[$table];
		if (is_array($fields)) {
			$table = $fields['table'];
			$fields = $fields['fields'];
		}
		$conds = array();
		$conds[] = "parentId=$id";
		$rows = @$_REQUEST['rows'] ? @$_REQUEST['rows'] : 1000;
		$page = @$_REQUEST['page'] ? @$_REQUEST['page'] : 1;
		$total = _db()->select('count(*) as val')->from($table)->where($conds)->result();
		$orderBy = array();
		$sort = explode(',', @$_REQUEST['sort']);
		$order = explode(',', @$_REQUEST['order']);
		foreach ($sort as $index => $val) {
			$orderBy[] = $sort[$index] . ' ' . $order[$index];
		}
		$orderBy = implode(',', $orderBy);
		if (!trim($orderBy)) {
			$orderBy = 'id desc';
		}
		$items = _db()
						->select($fields)
						->from($table)
						->where($conds)
						->orderBy($orderBy)
						->limit($rows, ($page - 1))->result();
		foreach($items as &$item) {
			if($this->_hasChild($table, $item['id'])) {
				$item['state'] = 'closed';
			} else {
				$item['state'] = 'open';
			}
		}
		$data = array(
			'total' => $total[0]['val'],
			'rows' => $items
		);
		echo json_encode($items);
	}
	
	public function _hasChild($table, $id) {
		$rs = mysql_query("select count(*) from `$table` where parentId=$id");
		$row = mysql_fetch_array($rs);
		return $row[0] > 0 ? true : false;
	}

	public function editAction() {
		$table = @$_REQUEST['table'];
		$fields = @$this->inserts[$table] ? @$this->inserts[$table] : array();
		$data = array();
		foreach ($fields as $field) {
			if (isset($_REQUEST[$field])) {
				$data[$field] = $_REQUEST[$field];
			}
		}
		_db()->update($table)
				->set($data)->where('id=' . $_REQUEST['id'])->result();
		if($table == 'class_student' || $table=='student_order') {
			$student = _db()->getEntity('edu.student')->load($data['studentId']);
			if($student->getId()) {
				$student->gridIndex();
			}
		} else if($table == 'student') {
			$student = _db()->getEntity('edu.student')->load($_REQUEST['id']);
			if($student->getId()) {
				$student->gridIndex();
			}
		}
		echo json_encode(array(
			'errorMsg' => false
		));
	}

	public function addAction() {
		$table = @$_REQUEST['table'];
		$fields = @$this->inserts[$table] ? @$this->inserts[$table] : array();
		$data = array();
		foreach ($fields as $field) {
			if (isset($_REQUEST[$field])) {
				$data[$field] = urldecode($_REQUEST[$field]);
			}
		}
		if ($result = $this->checkConstraints($table, $data)) {
			echo json_encode(array(
				'errorMsg' => $result['message']
			));
			return false;
		}
		$id = _db()->insert($table)
				->fields(implode(',', $fields))
				->values(array($data))->result();
		if($table == 'class_student'  || $table=='student_order') {
			$student = _db()->getEntity('edu.student')->load($data['studentId']);
			if($student->getId()) {
				$student->gridIndex();
			}
		} else if($table == 'student') {
			$student = _db()->getEntity('edu.student')->load($id);
			if($student->getId()) {
				$student->gridIndex();
			}
		}
		echo json_encode(array(
			'errorMsg' => false
		));
	}

	public function delAction() {
		$table = @$_REQUEST['table'];
		if(@$this->statusDeletes[$table]) {
			if (isset($_REQUEST['id'])) {
				_db()->update($table)->set(array('status' => 'deleted'))->where('id=' . $_REQUEST['id'])->result();
				$deletions = @$this->deletes[$table];
				if($deletions) {
					foreach($deletions as $delTable => $refField) {
						_db()->update($delTable)->set(array('status' => 'deleted'))->where( $refField . '=' . $_REQUEST['id'])->result();
					}
				}
				if($table == 'class_student' || $table=='student_order') {
					$data = _db()->useCB()->select('*')->from($table)->whereId($_REQUEST['id'])->result_one();
					$student = _db()->getEntity('edu.student')->load($data['studentId']);
					if($student->getId()) {
						$student->gridIndex();
					}
				}
			} else if (isset($_REQUEST['ids'])) {
				_db()->update($table)->set(array('status' => 'deleted'))->where('id in (' . implode(', ', $_REQUEST['ids']) . ')')->result();
				$deletions = @$this->deletes[$table];
				if($deletions) {
					foreach($deletions as $delTable => $refField) {
						_db()->update($delTable)->set(array('status' => 'deleted'))->where($refField . ' in (' . implode(', ', $_REQUEST['ids']) . ')')->result();
					}
				}
				if($table == 'class_student' || $table=='student_order') {
					foreach($_REQUEST['ids'] as $id) {
						$data = _db()->useCB()->select('*')->from($table)->whereId($id)->result_one();
						$student = _db()->getEntity('edu.student')->load($data['studentId']);
						if($student->getId()) {
							$student->gridIndex();
						}	
					}
				}
				if($table == 'general_order') {
					foreach($_REQUEST['ids'] as $id) {
						$student_order = _db()->select('*')->from('student_order')->whereOrderId($id)->result_one();
						if($student_order) {
							$student = _db()->getEntity('edu.student')->load($student_order['studentId']);
							if($student->getId()) {
								$student->gridIndex();
							}
						}
					}
				}
			}	
			echo json_encode(array(
				'errorMsg' => false,
				'success' => true
			));
			return ;
		}
		
		if (isset($_REQUEST['id'])) {
			$data = _db()->useCB()->select('*')->from($table)->whereId($_REQUEST['id'])->result_one();
			_db()->delete()->from($table)->where('id=' . $_REQUEST['id'])->result();
			$deletions = @$this->deletes[$table];
			if($deletions) {
				foreach($deletions as $delTable => $refField) {
					_db()->delete()->from($delTable)->where( $refField . '=' . $_REQUEST['id'])->result();
				}
			}
			if($table == 'class_student' || $table=='student_order') {
				$student = _db()->getEntity('edu.student')->load($data['studentId']);
				if($student->getId()) {
					$student->gridIndex();
				}
			}
		} else if (isset($_REQUEST['ids'])) {
			_db()->delete()->from($table)->where('id in (' . implode(', ', $_REQUEST['ids']) . ')')->result();
			$deletions = @$this->deletes[$table];
			if($deletions) {
				foreach($deletions as $delTable => $refField) {
					_db()->delete()->from($delTable)->where($refField . ' in (' . implode(', ', $_REQUEST['ids']) . ')')->result();
				}
			}
			
			if($table == 'class_student' || $table=='student_order') {
				foreach($_REQUEST['ids'] as $id) {
					$data = _db()->useCB()->select('*')->from($table)->whereId($id)->result_one();
					$student = _db()->getEntity('edu.student')->load($data['studentId']);
					if($student->getId()) {
						$student->gridIndex();
					}	
				}
			}
			if($table == 'general_order') {
				foreach($_REQUEST['ids'] as $id) {
					$student_order = _db()->select('*')->from('student_order')->whereOrderId($id)->result_one();
					if($student_order) {
						$student = _db()->getEntity('edu.student')->load($student_order['studentId']);
						if($student->getId()) {
							$student->gridIndex();
						}
					}
				}
			}
		}

		echo json_encode(array(
			'errorMsg' => false,
			'success' => true
		));
	}

	public function checkConstraints($table, $data) {
		$constraints = @$this->constraints[$table];
		if ($constraints) {
			foreach ($constraints as $constraint) {
				if (@$constraint['type'] == 'key') {
					$item = _db()->useCB()->select('*')->from($table);
					$key = $constraint['key'];
					foreach ($key as $field) {
						$item->where(array($field, $data[$field]));
					}
					
					$item = $item->result_one();
					if ($item) {
						$constraint['row'] = $item;
						return $constraint;
					}
				}
			}
		}
		return false;
	}

	public function replaceAction() {
		$table = @$_REQUEST['table'];
		$fields = @$this->inserts[$table] ? @$this->inserts[$table] : array();
		$data = array();
		foreach ($fields as $field) {
			if (isset($_REQUEST[$field])) {
				$data[$field] = $_REQUEST[$field];
			}
		}
		if ($result = $this->checkConstraints($table, $data)) {
			_db()->update($table)
					->set($data)->where('id=' . $result['row']['id'])->result();
		} else {
			_db()->insert($table)
					->fields(implode(',', $fields))
					->values(array($data))->result();
		}
		echo json_encode(array(
			'errorMsg' => false,
			'success' => true
		));
	}
	
	public function updateAction() {
		$table = @$_REQUEST['table'];
		$fields = @$this->inserts[$table] ? @$this->inserts[$table] : array();
		$data = array();
		foreach ($fields as $field) {
			if (isset($_REQUEST[$field])) {
				$data[$field] = $_REQUEST[$field];
			}
		}
		if(@$_REQUEST['id'] && @$_REQUEST['noConstraint']) {
			_db()->update($table)
						->set($data)->where('id=' . $_REQUEST['id'])->result();
			if($table == 'class_student' || $table=='student_order') {
				$data = _db()->useCB()->select('*')->from($table)->whereId($_REQUEST['id'])->result_one();
				$student = _db()->getEntity('edu.student')->load($data['studentId']);
				if($student->getId()) {
					$student->gridIndex();
				}
			}
		} else {
			if ($result = $this->checkConstraints($table, $data)) {
				_db()->update($table)
						->set($data)->where('id=' . $result['row']['id'])->result();
				if($table == 'class_student' || $table=='student_order') {
					$data = _db()->useCB()->select('*')->from($table)->whereId($result['row']['id'])->result_one();
					$student = _db()->getEntity('edu.student')->load($data['studentId']);
					if($student->getId()) {
						$student->gridIndex();
					}
				}
			}
		}
		echo json_encode(array(
			'errorMsg' => false,
			'success' => true
		));
	}

	public function allAction() {
		$table = $_REQUEST['table'];
		$fromId = isset($_REQUEST['from_id']) ? $_REQUEST['from_id']: '0';
		$rows = _db()->useCB()->select('*')->from($table)->where(['gte', 'id', $fromId])->result();
		$this->jprint('');
		foreach($rows as $row) {
			$this->jprint(json_encode($row, JSON_UNESCAPED_UNICODE) . "\r\n", true);
		}
		echo BASE_URL . '/cache/' . $table . '.txt';
	}

	public function jprint($str, $append = false) {
		$table = $_REQUEST['table'];
		if($append) {
			file_put_contents(BASE_DIR . '/cache/' . $table . '.txt', $str, FILE_APPEND);
		} else {
			file_put_contents(BASE_DIR . '/cache/' . $table . '.txt', $str);
		}
	}

}
