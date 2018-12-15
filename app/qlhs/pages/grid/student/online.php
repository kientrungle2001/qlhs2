<div style="margin-top: 10px;">
	<?php require BASE_DIR . '/' . pzk_app()->getUri('constants.php')?>
	<div class="clear"></div>	
	<div style="float:left; width: 600px;">
	<?php 
		$filters = array('online' => 1);
	?>
	{include grid/student/component/datagrid}
	</div>
	<div style="float:left; margin-left: 10px; margin-top: 0px; width: auto;">
		<!-- Nghiệp vụ xếp lớp học sinh -->
		<easyui.layout.panel collapsible="true" title="Xếp lớp" width="100%">
			<span>Xếp lớp: </span>
			<edu.courseSelector id="cmbClass" name="classId" />
			<span>Ngày vào học: </span>
			<input name="startStudyDate4" type="date" id="startStudyDate4" value="<?php echo date('Y-m-d', time())?>" />
			<layout.toolbarItem action="$dg.addToTable({url: '{url /dtable/add}?table=class_student', 'gridField': 'studentId', 'tableField': 'classId', 'tableFieldSource': '#cmbClass', 'tableField2': 'startClassDate', 'tableFieldSource2': '#startStudyDate4'}); setTimeout(function(){$dg.reload();}, 1000);" icon="add" />
			<br />
			<span>Chuyển từ lớp: </span>
			<form.combobox label="Chọn lớp" id="cmbClass3" name="classId"
				sql="{class_sql}"
					layout="category-select-list"></form.combobox>
			<span> sang lớp: </span>
			<edu.courseSelector id="cmbClass2" name="classId" /><span>Ngày: </span>
					<input name="startStudyDate2" type="date" id="startStudyDate" value="<?php echo date('Y-m-d', time())?>" />
			<layout.toolbarItem action="$dg.addToTable({url: '{url /dtable/add}?table=class_student', 'gridField': 'studentId', 'tableField': 'classId', 'tableFieldSource': '#cmbClass2', 'tableField2': 'startClassDate', 'tableFieldSource2': '#startStudyDate'}); $dg.addToTable({url: '{url /dtable/update}?table=class_student', 'gridField': 'studentId', 'tableField': 'classId', 'tableFieldSource': '#cmbClass3', 'tableField2': 'endClassDate', 'tableFieldSource2': '#startStudyDate'}); setTimeout(function(){$dg.reload();}, 1000);" icon="add" />
			<br />
			<span>Dừng học lớp: </span>
			<form.combobox label="Chọn lớp" id="cmbClass4" name="classId"
				sql="{class_sql}"
					layout="category-select-list"></form.combobox><span>Ngày: </span>
					<input name="startStudyDate3" type="date" id="startStudyDate3" value="<?php echo date('Y-m-d', time())?>" />
			<layout.toolbarItem action="$dg.addToTable({url: '{url /dtable/update}?table=class_student', 'gridField': 'studentId', 'tableField': 'classId', 'tableFieldSource': '#cmbClass4', 'tableField2': 'endClassDate', 'tableFieldSource2': '#startStudyDate3'}); setTimeout(function(){$dg.reload();}, 1000);" icon="add" />
		</easyui.layout.panel>
		<!-- Hết nghiệp vụ xếp lớp học sinh -->
		<div id="student-detail"></div>
	</div>
	<div style="clear:both;"></div>
	<script type="text/javascript">
		/**
		* Hàm tìm kiếm học sinh hiển thị ra danh sách học sinh
		 */
		function searchStudent() {
			pzk.elements.dg.search({
				'fields': {
					'name' : '#searchName', 'classIds' : '#searchClassIds', 
					'phone': '#searchPhone', 'periodId' : '#searchPeriod', 
					'notlikeperiodId': '#searchnotlikePeriod',
					'subjectIds': '#searchSubject',
					'color': '#searchColor',
					'fontStyle': '#searchFontStyle',
					'assignId': '#searchAssignId',
					'online': '#searchOnline',
					'type': '#searchType',
					'classed': '#searchClassed',
					'status': '#searchStatus',
					'rating': '#searchRating' 
				}
			});
		}

		function exportStudent(type) {
			pzk.elements.dg.export({
				'fields': {
					'name' : '#searchName', 'classIds' : '#searchClassIds', 
					'phone': '#searchPhone', 'periodId' : '#searchPeriod', 
					'notlikeperiodId': '#searchnotlikePeriod',
					'subjectIds': '#searchSubject',
					'color': '#searchColor',
					'fontStyle': '#searchFontStyle',
					'assignId': '#searchAssignId',
					'online': '#searchOnline',
					'type': '#searchType',
					'classed': '#searchClassed',
					'status': '#searchStatus',
					'rating': '#searchRating' 
				}
			}, type);
		}

		/**
		* Hiển thị các lớp đang học khi chọn vào 1 học sinh
		 */
		function selectClass(student) {
			var currentClassNames = student.currentClassNames;
			jQuery('#cmbClass3 option').each(function(index, elem){
				if(currentClassNames.indexOf(jQuery(elem).text().trim()) != -1) {
					jQuery(elem).show();
				} else {
					jQuery(elem).hide();
				}
			});
			jQuery('#cmbClass4 option').each(function(index, elem){
				if(currentClassNames.indexOf(jQuery(elem).text().trim()) != -1) {
					jQuery(elem).show();
				} else {
					jQuery(elem).hide();
				}
			});
			
		}
		/* TODO: Xử lý khi chọn môn học thì lọc ra các lớp */ 
		setTimeout(
			function() {
				jQuery('#searchSubject').change(function(e){
					var subjectId = e.target.value;
					console.log(subjectId);
				});
				$('#selected_class').click(function(){
					$('#selected_class').text('');
					$('#searchClassIds').val('');
					selected_class = null;
					searchStudent();
					return false;
				});
			},
			1000
		)
		
	</script>
	<style>
		.hidden-level {
			display: none;
		}
		.hidden-subjectId {
			display: none;
		}
	</style>
	<script type="text/javascript">
	<![CDATA[
	function searchClasses() {
		pzk.elements.dg_classes.search({
			'fields': {
				'teacherId' : '#searchTeacher', 
				'subjectId': '#searchSubject2', 
				'level': '#searchLevel',
				'status': '#searchStatus'
			}
		});
	}
	selected_class = null;
	function selectClassSelector(row) {
		selected_class = row;
		$('#selected_class').text(row.name + ' - (Bỏ chọn)');
		$('#searchClassIds').val(row.id);
		$('#selected_class').attr('title', row.name);
		searchStudent();
	}

	function studentRowStyler(index, row) {
		var style = '';
		if(row.color !== '') {
			style += 'color:' + row.color + ';';
		}
		
		if(row.fontStyle !== '') {
			if(row.fontStyle === 'bold')
				style += 'font-weight: bold;';
			else if(row.fontStyle === 'italic') {
				style += 'font-style: italic;';
			} else if(row.fontStyle === 'underline') {
				style += 'text-decoration: underline;';
			}
		}
		if(style === '') {
			var studentDate = new Date(row.startStudyDate);
			var currentDate = new Date();
			return (currentDate.getTime() - studentDate.getTime() > 365 * 24 * 3600 * 1000) ?  'color: grey;': '';
		} else {
			console.log(style);
			return style;
		}
	}
	]]>
</script>
</div>
