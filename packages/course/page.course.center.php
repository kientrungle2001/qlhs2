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
				<dg.dataGrid id="dg3" title="Quản lý học phí" table="tuition_fee" 
					width="310px" height="350px" singleSelect="false" noClickRow="true"  rownumbers="false" pageSize="50">
					<dg.dataGridItem field="id" width="80">Id</dg.dataGridItem>
					<dg.dataGridItem field="className" width="120">Tên lớp</dg.dataGridItem>
					<dg.dataGridItem field="periodName" width="180">Kỳ thanh toán</dg.dataGridItem>
					<dg.dataGridItem field="amount" width="120">Số tiền</dg.dataGridItem>
					<!--dg.dataGridItem field="studyTime" width="160">Giờ học</dg.dataGridItem>
					<dg.dataGridItem field="status" width="100">Trạng thái</dg.dataGridItem-->
					
					<layout.toolbar id="dg3_toolbar">
						<hform id="dg3_search">
							<form.combobox 
									id="searchClass3" name="classId"
									sql="select id as value, 
											name as label from `classes` where status=1 order by name ASC"
									layout="category-select-list"></form.combobox>
								<layout.toolbarItem action="$dg3.search({'fields': {'classId' : '#searchClass3' }})" icon="search" />
								<layout.toolbarItem action="$dg3.add({classId: $dg.getSelected('id')})" icon="add" />
								<layout.toolbarItem action="$dg3.edit()" icon="edit" />
								<layout.toolbarItem action="$dg3.del()" icon="remove" />
						</hform>
					</layout.toolbar>
					<wdw.dialog gridId="dg3" width="700px" height="auto" title="Học phí">
						<frm.form gridId="dg3">
							<frm.formItem type="hidden" name="id" required="false" label="" />
							<frm.formItem type="user-defined" name="subjectId" required="false" label="Lớp">
								<form.combobox name="classId"
										sql="select id as value, 
												name as label from `classes` where 1 order by name ASC"
											layout="category-select-list"></form.combobox>
							</frm.formItem>
							<frm.formItem type="user-defined" name="periodId" required="false" label="Kỳ thanh toán">
								<form.combobox name="periodId"
										sql="select id as value, 
												name as label from `payment_period` where 1 order by name ASC"
											layout="category-select-list"></form.combobox>
							</frm.formItem>
							<frm.formItem name="amount" required="false" label="Học phí">
							</frm.formItem>
							<frm.formItem name="status" required="true" validatebox="true" label="Trạng thái" />
						</frm.form>
					</wdw.dialog>
				</dg.dataGrid>
				
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div title="Học sinh">
		<div class="easyui-tabs">
			<div title="Danh sách">
				<dg.dataGrid id="dg_student" title="Danh sách học sinh" scriptable="true" layout="easyui/datagrid/datagrid" 
						nowrap="true" pageSize="50"
						table="student" width="550px" height="450px"
						defaultFilters='{"online": 0}'>
					<dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
					<dg.dataGridItem field="name" width="140">Tên học sinh</dg.dataGridItem>
					<dg.dataGridItem field="phone" width="80">Số điện thoại</dg.dataGridItem>
					<dg.dataGridItem field="startStudyDate" width="100">Ngày vào học</dg.dataGridItem>
					<dg.dataGridItem field="assignName" width="140">Phụ trách</dg.dataGridItem>
				</dg.dataGrid>
			</div>
			<div title="Điểm danh">
				<dg.dataGrid id="dg_student_schedule" title="Danh sách điểm danh học sinh" scriptable="true" layout="easyui/datagrid/datagrid" 
					nowrap="true" pageSize="50"
					table="student_schedule" width="550px" height="450px">
					<dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
					<dg.dataGridItem field="className" width="140">Lớp</dg.dataGridItem>
					<dg.dataGridItem field="studentName" width="140">Học sinh</dg.dataGridItem>
					<dg.dataGridItem field="phone" width="80">Số điện thoại</dg.dataGridItem>
					<dg.dataGridItem field="studyDate" width="140">Ngày điểm danh</dg.dataGridItem>
					<dg.dataGridItem field="status" width="100">Trạng thái</dg.dataGridItem>
				</dg.dataGrid>
			</div>
		</div>
	</div>

	<div title="Giáo viên">
		<div class="easyui-tabs" tabPosition="top">
			<div title="Danh sách">
				<dg.dataGrid id="dg_class_teacher" title="Danh sách giáo viên" scriptable="true" layout="easyui/datagrid/datagrid" 
						nowrap="true" pageSize="50"
						table="class_teacher" width="550px" height="450px">
					<dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
					<dg.dataGridItem field="className" width="140">Lớp</dg.dataGridItem>
					<dg.dataGridItem field="teacherName" width="140">Giáo viên</dg.dataGridItem>
					<dg.dataGridItem field="phone" width="80">Số điện thoại</dg.dataGridItem>
					<dg.dataGridItem field="note" width="140">Ghi chú</dg.dataGridItem>
					<layout.toolbar id="dg_class_teacher_toolbar">
						<layout.toolbarItem action="$dg_class_teacher.add({classId: $dg.getSelected('id')})" icon="add" />
						<layout.toolbarItem action="$dg_class_teacher.edit()" icon="edit" />
						<layout.toolbarItem action="$dg_class_teacher.del()" icon="remove" />
					</layout.toolbar>
					<wdw.dialog gridId="dg_class_teacher" width="700px" height="auto" title="Giáo viên">
						<frm.form gridId="dg_class_teacher">
							<frm.formItem type="hidden" name="id" required="false" label="" />
							<frm.formItem type="user-defined" name="classId" required="false" label="Lớp">
								<form.combobox name="classId"
										sql="{class_sql}"
											layout="category-select-list"></form.combobox>
							</frm.formItem>
							<frm.formItem type="user-defined" name="teacherId" required="false" label="Giáo viên">
								<form.combobox name="teacherId"
										sql="{teacher_sql}"
											layout="category-select-list"></form.combobox>
							</frm.formItem>
							<frm.formItem type="user-defined" name="role" required="false" label="Vai trò">
								<select name="role">
									<option value="0">Giáo viên</option>
									<option value="1">Trợ giảng</option>
								</select>
							</frm.formItem>
							<frm.formItem name="note" required="false" label="Ghi chú" />
							<frm.formItem name="status" required="true" validatebox="true" label="Trạng thái" />
						</frm.form>
					</wdw.dialog>
				</dg.dataGrid>
			</div>
			<div title="Điểm danh">
				<dg.dataGrid id="dg_teacher_schedule" title="Danh sách điểm danh giáo viên" scriptable="true" layout="easyui/datagrid/datagrid" 
					nowrap="true" pageSize="50"
					table="teacher_schedule" width="550px" height="450px">
					<dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
					<dg.dataGridItem field="className" width="140">Lớp</dg.dataGridItem>
					<dg.dataGridItem field="teacherName" width="140">Giáo viên</dg.dataGridItem>
					<dg.dataGridItem field="phone" width="80">Số điện thoại</dg.dataGridItem>
					<dg.dataGridItem field="studyDate" width="140">Ngày điểm danh</dg.dataGridItem>
					<dg.dataGridItem field="status" width="100">Trạng thái</dg.dataGridItem>
				</dg.dataGrid>
			</div>
		</div>
	</div>
	<div title="Học phí">
	<dg.dataGrid id="dg_student_order" title="Danh sách học phí" scriptable="true" layout="easyui/datagrid/datagrid" 
			nowrap="true" pageSize="50"
			table="student_order" width="550px" height="450px">
		<dg.dataGridItem field="id" width="80">Id</dg.dataGridItem>
		<dg.dataGridItem field="studentName" width="120">Học sinh</dg.dataGridItem>
		<dg.dataGridItem field="periodName" width="120">Kỳ thanh toán</dg.dataGridItem>
		<dg.dataGridItem field="amount" width="120">Số tiền</dg.dataGridItem>
		<dg.dataGridItem field="created" width="120">Ngày thanh toán</dg.dataGridItem>
		
		<layout.toolbar id="dg_student_order_toolbar">
			<hform id="dg_student_order_search" onsubmit="searchStudentOrder(); return false;">
				<form.combobox label="Chọn kỳ thanh toán" id="searchStudentOrderPeriod" name="periodId"
					sql="{payment_period_sql}" layout="category-select-list" onChange="searchStudentOrder();"></form.combobox>
			</hform>
		</layout.toolbar>
	</dg.dataGrid>
	</div>
	<div title="Bài thi">
	<dg.dataGrid id="dg_test_class" title="Danh sách bài thi" scriptable="true" layout="easyui/datagrid/datagrid" 
			nowrap="true" pageSize="50"
			table="test_class" width="550px" height="450px">
		<dg.dataGridItem field="id" width="80">Id</dg.dataGridItem>
		<dg.dataGridItem field="testName" width="120">Bài thi</dg.dataGridItem>
		<layout.toolbar id="dg_test_class_toolbar">
			<layout.toolbarItem action="$dg_test_class.add({classId: $dg.getSelected('id')})" icon="add" />
			<layout.toolbarItem action="$dg_test_class.edit()" icon="edit" />
			<layout.toolbarItem action="$dg_test_class.del()" icon="remove" />
		</layout.toolbar>
		<wdw.dialog gridId="dg_test_class" width="700px" height="auto" title="Bài thi">
			<frm.form gridId="dg_test_class">
				<frm.formItem type="hidden" name="id" required="false" label="" />
				<frm.formItem type="user-defined" name="classId" required="false" label="Lớp">
					<form.combobox name="classId"
							sql="{class_sql}"
								layout="category-select-list"></form.combobox>
				</frm.formItem>
				<frm.formItem type="user-defined" name="testId" required="false" label="Bài thi">
					<form.combobox name="testId"
							sql="{test_sql}"
								layout="category-select-list"></form.combobox>
				</frm.formItem>
				<frm.formItem name="startDate" type="date" required="false" validatebox="false" label="Ngày bắt đầu" />
				<frm.formItem name="endDate" type="date" required="false" validatebox="false" label="Ngày kết thúc" />
				<frm.formItem name="status" required="true" validatebox="true" label="Trạng thái" />
			</frm.form>
		</wdw.dialog>
	</dg.dataGrid>
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
