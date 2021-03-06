<?php
require_once dirname(__FILE__) . '/Base.php';
class PzkTeacherController extends PzkBaseController {
	public $grid = 'teacher';
	
	public function lecturerAction() {
		$this->viewGrid('teacher/lecturer');
	}
	public function tutorAction() {
		$this->viewGrid('teacher/tutor');
	}
	
	public function loginAction() {
		$page = $this->parse('login');
		pzk_element('loginForm')->action = BASE_REQUEST . '/teacher/loginPost';
		$page->display();
	}
	
	public function loginPostAction() {
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$permission = pzk_element('permission');
		
		if($permission->teacherLogin($username, $password)) {
			header('Location: '. BASE_REQUEST . '/teacher/info');
		} else {
			header('Location: '. BASE_REQUEST . '/teacher/login');
		}
	}
	public function infoAction() {
		$this->viewOperation('teacher_info');
	}
	public function changePasswordAction() {
		$this->viewOperation('teacher_password');
	}
	public function changePasswordPostAction() {
		$teacherId = pzk_session('teacherId');
		$request = pzk_request();
		if($teacherId) {
			$teacher = _db()->getEntity('edu.teacher')->load($teacherId);
			if($teacher->getPassword() == $request->get('oldPassword')) {
				if($request->get('password') == $request->get('confirmPassword')) {
					$teacher->setPassword($request->get('password'));
					$teacher->save();
					header('Location: '. BASE_REQUEST . '/teacher/info');die();
				}
			}
			header('Location: '. BASE_REQUEST . '/teacher/changePassword');
		} else {
			header('Location: '. BASE_REQUEST . '/teacher/login');
		}
	}

	public function billingAction() {
		$this->viewGrid('teacher_billing');
	}

	public function create_billingAction() {
		$this->viewOperation('teacher_create_bill');
	}

	public function create_bill_postAction() {
		$bookNum = $_REQUEST['bookNum'] = pzk_element('config')->get('bill_bookNum', 1);
		$noNum = $_REQUEST['noNum'] = pzk_element('config')->get('bill_noNum', 1);
		$order = array(
			'orderType' => 'billing',
			'type' => 'normal',
			'partyType' => $_REQUEST['partyType'],
			'teacherId' => $_REQUEST['teacherId'],
			'amount' => $_REQUEST['total_amount'],
			'created' => date('Y-m-d', strtotime($_REQUEST['created'])),
			'createdTime' => time(),
			'bookNum' => $_REQUEST['bookNum'],
			'noNum' => $_REQUEST['noNum'],
			'debit' => $_REQUEST['debit'],
			'name' => $_REQUEST['order_name'],
			'address' => $_REQUEST['address'],
			'phone' => $_REQUEST['phone'],
			'reason' => $_REQUEST['reason'],
			'additional' => $_REQUEST['additional'],
			'invoiceNum' => $_REQUEST['invoiceNum']
		);
		$orderId = _db()->insert('billing_order')
				->fields(implode(',', array_keys($order)))
				->values(array($order))->result();
		$names = $_REQUEST['name'];
		$amounts = $_REQUEST['amount'];
		$total_before_discounts = $_REQUEST['total_before_discount'];
		$discounts = $_REQUEST['discount'];
		$prices = $_REQUEST['price'];
		$quantitys = $_REQUEST['quantity'];
		foreach($names as $index => $name) {
		$order_item = array(
			'orderId' => $orderId,
			'amount' => $amounts[$index],
			'discount' => $discounts[$index],
			'quantity' => $quantitys[$index],
			'price' => $prices[$index],
			'total_before_discount' => $total_before_discounts[$index],
			'created' => date('Y-m-d', strtotime($_REQUEST['created'])),
			'createdTime' => time(),
			'bookNum' => $_REQUEST['bookNum'],
			'noNum' => $_REQUEST['noNum'],
			'debit' => $_REQUEST['debit'],
			'name' => $names[$index],
			'address' => $_REQUEST['address'],
			'reason' => $_REQUEST['reason'],
			'additional' => $_REQUEST['additional'],
			'invoiceNum' => $_REQUEST['invoiceNum']
		);
		_db()->insert('billing_detail_order')->fields(implode(',',array_keys($order_item)))
			->values(array($order_item))->result();
		}
		if($noNum >= 50) {
			pzk_element('config')->set('bill_noNum', 1);
			pzk_element('config')->set('bill_bookNum', $bookNum + 1);
		} else {
			pzk_element('config')->set('bill_noNum', $noNum + 1);
			pzk_element('config')->set('bill_bookNum', $bookNum);
		}
		header('Location: '.BASE_URL.'/index.php/teacher/billing');
	}
	public function create_billing_multipleAction() {
		$this->viewOperation('teacher_create_bill_multiple');
	}
	
	public function create_billing_multiple_postAction() {
		$bookNum = $_REQUEST['bookNum'] = pzk_element('config')->get('bill_bookNum', 1);
		$noNum = $_REQUEST['noNum'] = pzk_element('config')->get('bill_noNum', 1);
		$order = array(
			'orderType' => 'billing',
			'type' => '',
			'partyType' => $_REQUEST['partyType'],
			'teacherId' => $_REQUEST['teacherId'],
			'amount' => $_REQUEST['total_amount'],
			'created' => date('Y-m-d', strtotime($_REQUEST['created'])),
			'createdTime' => time(),
			'bookNum' => $_REQUEST['bookNum'],
			'noNum' => $_REQUEST['noNum'],
			'debit' => $_REQUEST['debit'],
			'name' => $_REQUEST['order_name'],
			'address' => $_REQUEST['address'],
			'phone' => $_REQUEST['phone'],
			'reason' => $_REQUEST['reason'],
			'additional' => $_REQUEST['additional'],
			'invoiceNum' => $_REQUEST['invoiceNum']
		);
		$orderId = _db()->insert('billing_order')
				->fields(implode(',', array_keys($order)))
				->values(array($order))->result();
		$names = $_REQUEST['name'];
		$amounts = $_REQUEST['amount'];
		$total_before_discounts = $_REQUEST['total_before_discount'];
		$discounts = $_REQUEST['discount'];
		$prices = $_REQUEST['price'];
		$quantitys = $_REQUEST['quantity'];
		foreach($names as $index => $name) {
		$order_item = array(
			'orderId' => $orderId,
			'amount' => $amounts[$index],
			'discount' => $discounts[$index],
			'quantity' => $quantitys[$index],
			'price' => $prices[$index],
			'total_before_discount' => $total_before_discounts[$index],
			'created' => date('Y-m-d', strtotime($_REQUEST['created'])),
			'createdTime' => time(),
			'bookNum' => $_REQUEST['bookNum'],
			'noNum' => $_REQUEST['noNum'],
			'debit' => $_REQUEST['debit'],
			'name' => $names[$index],
			'address' => $_REQUEST['address'],
			'reason' => $_REQUEST['reason'],
			'additional' => $_REQUEST['additional'],
			'invoiceNum' => $_REQUEST['invoiceNum']
		);
		_db()->insert('billing_detail_order')->fields(implode(',',array_keys($order_item)))
			->values(array($order_item))->result();
		}
		if($noNum >= 50) {
			pzk_element('config')->set('bill_noNum', 1);
			pzk_element('config')->set('bill_bookNum', $bookNum + 1);
		} else {
			pzk_element('config')->set('bill_noNum', $noNum + 1);
			pzk_element('config')->set('bill_bookNum', $bookNum);
		}
		header('Location: '.BASE_URL.'/index.php/teacher/billing');
	}
}