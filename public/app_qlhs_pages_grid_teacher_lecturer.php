<?php require BASE_DIR . '/' . pzk_app()->getUri('constants.php')?>
<div>
	<div style="float: left; width: 350px;">
		<?php $defaultFilters = array('type' => 0); ?>
		<dg.dataGrid id="dg" title="Quản lý giáo viên" table="teacher"
		<?php if(isset($defaultFilters)):?>
			defaultFilters='<?php echo json_encode($defaultFilters); ?>'
		<?php endif;?>
		width="350px" height="450px">
	<dg.dataGridItem field="id" width="80">Id</dg.dataGridItem>
	<dg.dataGridItem field="name" width="120">Tên giáo viên</dg.dataGridItem>
	<dg.dataGridItem field="code" width="120">Mã</dg.dataGridItem>
	<dg.dataGridItem field="phone" width="100">Số điện thoại</dg.dataGridItem>
	<dg.dataGridItem field="subjectName" width="120">Môn học</dg.dataGridItem>
	<layout.toolbar id="dg_toolbar">
		<layout.toolbarItem action="$dg.add()" icon="add" />
		<layout.toolbarItem action="$dg.edit()" icon="edit" />
		<layout.toolbarItem action="$dg.del()" icon="remove" />
		<layout.toolbarItem action="$dg.detail(function(row){
			$dg_classes.filters({teacherId: row.id});
			$dg_student.filters({teacherIds: row.id});
			$dg_test_class.filters({teacherId: row.id});
			$dg_test_student_mark.filters({teacherId: row.id});
			$dg_student_order.filters({teacherId: row.id});
			$dg_schedule.filters({teacherId: row.id});
			showCalendar();
		})" icon="sum" />
	</layout.toolbar>
	<wdw.dialog gridId="dg" width="700px" height="auto" title="Giáo viên">
		<frm.form gridId="dg">
			<frm.formItem type="hidden" name="id" required="false" label="" />
			<frm.formItem name="name" required="true" validatebox="true" label="Tên giáo viên" />
			<frm.formItem name="code" required="true" validatebox="true" label="Mã" />
			<frm.formItem name="phone" required="false" label="Số điện thoại" />
			<frm.formItem type="user-defined" name="subjectId" required="false" label="Môn học">
				<form.combobox name="subjectId"
						sql="<?php echo @$subject_center_sql;?>"
							layout="category-select-list"></form.combobox>
			</frm.formItem>
			<frm.formItem name="password" required="false" label="Password" />
			<frm.formItem name="school" required="false" label="Trường" />
			<frm.formItem name="address" required="false" label="Địa chỉ" />
			<frm.formItem name="salary" required="false" label="Lương" />
		</frm.form>
	</wdw.dialog>
</dg.dataGrid>
	</div>
	<div style="float: left; width: 850px;">
		<div class="easyui-tabs">
			<div title="Lớp học">
				<dg.dataGrid id="dg_classes" title="Quản lý lớp học" scriptable="true" table="classes" 
        width="850px" height="450px" rownumbers="false" pageSize="50">
    <dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
    <dg.dataGridItem field="name" width="120">Tên lớp</dg.dataGridItem>
    <dg.dataGridItem field="subjectName" width="120">Môn học</dg.dataGridItem>
    <dg.dataGridItem field="roomName" width="100">Phòng</dg.dataGridItem>
    <dg.dataGridItem field="startDate" width="160">Ngày bắt đầu</dg.dataGridItem>
    <dg.dataGridItem field="endDate" width="160">Ngày kết thúc</dg.dataGridItem>
    <dg.dataGridItem field="amount" width="100">Học phí</dg.dataGridItem>
    <dg.dataGridItem field="status" width="40">TT</dg.dataGridItem>
</dg.dataGrid>

			</div>
			<div title="Học sinh">
				<dg.dataGrid id="dg_student" title="Quản lý học sinh" scriptable="true" 
        layout="easyui/datagrid/datagrid" nowrap="false"
        table="student" width="850px" height="450px">
    <dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
    <dg.dataGridItem field="name" width="140">Tên học sinh</dg.dataGridItem>
    <dg.dataGridItem field="phone" width="80">Số điện thoại</dg.dataGridItem>
    <dg.dataGridItem field="currentClassNames" width="100">Lớp</dg.dataGridItem>
    <dg.dataGridItem field="periodNames" width="100">Kỳ thanh toán</dg.dataGridItem>
    <dg.dataGridItem field="startStudyDate" width="100">Ngày vào học</dg.dataGridItem>
    <dg.dataGridItem field="note" width="140">Ghi chú</dg.dataGridItem>
</dg.dataGrid>
			</div>
			<div title="Bài thi">
				<dg.dataGrid id="dg_test_class" title="Quản lý bài thi" scriptable="true" 
        layout="easyui/datagrid/datagrid" 
        nowrap="false"
        table="test_class" width="850px" height="450px">
    <dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
    <dg.dataGridItem field="testName" width="140">Tên Bài thi</dg.dataGridItem>
    <dg.dataGridItem field="className" width="140">Lớp</dg.dataGridItem>
</dg.dataGrid>
			</div>
			<div title="Kết quả thi">
			<dg.dataGrid id="dg_test_student_mark" title="Điểm thi" table="test_student_mark" width="800px" height="450px">
	<dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
	<dg.dataGridItem field="testName" width="220">Bài thi</dg.dataGridItem>
	<dg.dataGridItem field="subjectName" width="120">Môn học</dg.dataGridItem>
	<dg.dataGridItem field="className" width="120">Lớp</dg.dataGridItem>
	<dg.dataGridItem field="studentName" width="120">Học sinh</dg.dataGridItem>
	<dg.dataGridItem field="mark" width="120">Điểm thi</dg.dataGridItem>
	<dg.dataGridItem field="status" width="120">Trạng thái</dg.dataGridItem>
</dg.dataGrid>

			</div>
			<div title="Học phí">
			<dg.dataGrid id="dg_student_order" title="Danh sách học phí" scriptable="true" layout="easyui/datagrid/datagrid" 
        nowrap="true" pageSize="50"
        table="student_order" width="850px" height="500px">
    <dg.dataGridItem field="id" width="80">Id</dg.dataGridItem>
    <dg.dataGridItem field="studentName" width="120">Học sinh</dg.dataGridItem>
    <dg.dataGridItem field="className" width="120">Lớp</dg.dataGridItem>
    <dg.dataGridItem field="periodName" width="120">Kỳ thanh toán</dg.dataGridItem>
    <dg.dataGridItem field="amount" width="120">Số tiền</dg.dataGridItem>
    <dg.dataGridItem field="created" width="120">Ngày thanh toán</dg.dataGridItem>
</dg.dataGrid>
			</div>
			<div title="Lịch giảng dạy">
			<dg.dataGrid id="dg_schedule" title="Quản lý giảng dạy" scriptable="true" table="schedule" 
		width="800px" height="500px" rownumbers="false" pageSize="50">
	<dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
	<dg.dataGridItem field="className" width="120">Lớp</dg.dataGridItem>
	<dg.dataGridItem field="studyDate" width="120">Ngày học</dg.dataGridItem>
	<dg.dataGridItem field="studyTime" width="120">Giờ học</dg.dataGridItem>
	<dg.dataGridItem field="status" width="40">TT</dg.dataGridItem>
</dg.dataGrid>

			</div>
			<div title="Trả lương">
				Lương
			</div>
			<div title="Thời khóa biểu">
				<div id="calendar" style="padding: 10px;">
					<input type="text" name="week" id="weekSelector" value="<?php echo date('Y-W');?>" />
					<button type="submit" name="submit" id="weekSubmit" onClick="showCalendar(); return false;">Xem</button>
				</div>
				<div id="calendarResult" style="padding: 10px;"></div>
			</div>
		</div>
	</div>
	<script>
	function showCalendar() {
		var week = $('#weekSelector').val();
		var teacherId = pzk.elements.dg.getSelected('id');
		if(!week) {
			alert('Nhập tuần');
			return false;
		}
		if(!teacherId) {
			alert('Chọn giáo viên để xem');
			return false;
		}
		$.ajax({
			url: BASE_URL + '/index.php/schedule/teacher',
			type: 'post',
			data: {
				currentWeek: week,
				teacherId: teacherId,
				isAjax: true
			},
			success: function(resp) {
				$('#calendarResult').html(resp);
			}
		});
	}
	</script>
</div>