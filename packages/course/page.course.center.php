<div>
<?php require BASE_DIR . '/' . pzk_app()->getUri('constants.php')?>
<div style="float:left; width: 220px;">
	{include grid/course/center/subject}
	{include grid/course/center/level}
	{include grid/course/center/teacher}
</div>
<div style="float:left; width: 500px;">
	{include grid/course/center/datagrid}
</div>
<div style="float:left; margin-left: 20px; margin-top: 20px; width: auto;">
 <div class="easyui-tabs" style="width: 550px;">
		<div title="Xếp lịch">
			{include grid/course/center/form_schedule}
		</div>
		<div>
			<div style="float:left; width: 220px;">
				{include grid/course/center/schedule}
			</div>
			<div style="float:left; width: 320px;">
				{include grid/course/center/tuition_fee}
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div title="Học sinh">
		<div class="easyui-tabs">
			<div title="Danh sách">
				{include grid/course/center/student_datagrid}
			</div>
			<div title="Điểm danh">
				{include grid/course/center/student_muster}
			</div>
		</div>
	</div>

	<div title="Giáo viên">
		<div class="easyui-tabs" tabPosition="top">
			<div title="Danh sách">
				{include grid/course/center/teacher_datagrid}
			</div>
			<div title="Điểm danh">
				{include grid/course/center/teacher_muster}
			</div>
		</div>
	</div>
	<div title="Học phí">
		{include grid/course/center/student_order}
	</div>
	<div title="Bài thi">
		{include grid/course/center/test_class}
	</div>
	<div title="Kết quả thi">
		<dg.dataGrid id="dg_test_student_mark" title="Kết quả thi" table="test_student_mark" width="550px" height="250px">
		
			<dg.dataGridItem field="id" width="80">Id</dg.dataGridItem>
			<dg.dataGridItem field="studentName" width="120">Học sinh</dg.dataGridItem>
			<dg.dataGridItem field="testName" width="120">Bài kiểm tra</dg.dataGridItem>
			<dg.dataGridItem field="mark" width="120">Điểm</dg.dataGridItem>
			<dg.dataGridItem field="status" width="120">Trạng thái</dg.dataGridItem>
			<layout.toolbar id="dg_test_student_mark_toolbar">
			<hform id="dg_test_student_mark_search" onsubmit="searchTestStudentMark(); return false;">
				<form.combobox label="Bài thi" id="searchTestStudentMarkTestId" name="testId"
					sql="{test_sql}" layout="category-select-list" onChange="searchTestStudentMark();"></form.combobox>
			</hform>
		</layout.toolbar>
		</dg.dataGrid>
	</div>
	<div title="Thống kê">
		Tổng số học sinh: <br />
		Tổng số điểm danh học sinh <br />
		Tổng số có mặt: <br />
		Tổng số vắng mặt: <br />
		Tổng số đã nộp học phí: <br />
		Tổng số chưa nộp học phí: <br />
		Giáo viên<br />
		Tổng số điểm danh: <br />
		Tổng số có mặt: <br />
		Tổng số vắng mặt: <br />
		Học phí <br />
		Tổng học phí đã nộp: <br />
		Tổng học phí chưa nộp: <br />
		Kỳ thanh toán: <br />
		Tổng số học sinh: <br />
		Tổng số buổi điểm danh: <br />
		Tổng số buổi có mặt: <br />
		Tổng số buổi vắng mặt: <br />
		Tổng học phí: <br />
		Tổng số học sinh đã nộp học phí: <br />
		Tổng số học sinh chưa nộp học phí: <br />
		Tổng học phí đã nộp: <br />
		Tổng học phí chưa nộp: <br />
		Tổng số buổi điểm danh giáo viên: <br />
		Tổng số buổi vắng mặt: <br />
		Tổng số buổi có mặt: <br />
		Tổng số lương cần trả: <br />
		Tổng số lương đã trả: <br />
		Tổng số lương chưa trả: <br />
	</div>
	<div title="Thời khóa biểu">
		<div id="calendar" style="padding: 10px;">
			<input type="text" name="month" id="monthSelector" value="<?php echo date('Y-m');?>" />
			<button type="submit" name="submit" id="monthSubmit" onClick="showCalendar(); return false;">Xem</button>
		</div>
		<div id="calendarResult" style="padding: 10px;"></div>
	</div>
</div>
</div>
<div class="clear" />
<script type="text/javascript">
	function searchClasses() {
		pzk.elements.dg.search({
			'fields': {
				'teacherId' : '#searchTeacher', 
				'subjectId': '#searchSubject', 
				'level': '#searchLevel',
				'status': '#searchStatus'
			}
		});
	}
	function searchTeacher() {
		pzk.elements.dgteacher.search({
			'fields': {
				'subjectId': '#searchTeacherSubject', 
				'level': '#searchTeacherLevel'
			}
		});
	}
	function searchStudentOrder() {
		pzk.elements.dg_student_order.filters({
			classId: pzk.elements.dg.getSelected('id'),
			periodId: $('#searchStudentOrderPeriod').val()
		});
	}
	function searchTestStudentMark() {
		pzk.elements.dg_test_student_mark.filters({
			classId: pzk.elements.dg.getSelected('id'),
			testId: $('#searchTestStudentMarkTestId').val()
		});
	}
	function showCalendar() {
		var month = $('#monthSelector').val();
		var classId = pzk.elements.dg.getSelected('id');
		if(!month) {
			alert('Nhập tháng');
			return false;
		}
		if(!classId) {
			alert('Chọn lớp để xem');
			return false;
		}
		$.ajax({
			url: BASE_URL + '/index.php/schedule/class',
			type: 'post',
			data: {
				month: month,
				classId: classId
			},
			success: function(resp) {
				$('#calendarResult').html(resp);
			}
		});
	}
</script>
</div>
