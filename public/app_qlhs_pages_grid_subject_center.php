<div>
	<div style="float: left; width: 350px">
		<dg.dataGrid id="dg" title="Quản lý môn học" table="subject" width="350px" height="450px" defaultFilters='{"online": 0}'>
    <dg.dataGridItem field="id" width="80">Id</dg.dataGridItem>
    <dg.dataGridItem field="name" width="120">Môn học</dg.dataGridItem>
    
    <layout.toolbar id="dg_toolbar">
        <layout.toolbarItem action="$dg.add()" icon="add" />
        <layout.toolbarItem action="$dg.edit()" icon="edit" />
        <layout.toolbarItem action="$dg.del()" icon="remove" />
        <layout.toolbarItem action="$dg.detail(function(row){
            $dg_classes.filters({
                subjectId: row.id
            });
            $dg_student.filters({
                subjectIds: row.id
            });
            $dg_student_order.filters({
                subjectId: row.id
            });
            $dg_teacher.filters({
                subjectId: row.id
            });
            $dg_test_class.filters({
                subjectId: row.id
            });
            $dg_test_student_mark.filters({
                subjectId: row.id
            });
            showCalendar();
        })" icon="sum" />
    </layout.toolbar>
    <wdw.dialog gridId="dg" width="700px" height="auto" title="Môn học">
        <frm.form gridId="dg">
            <frm.formItem type="hidden" name="id" required="false" label="" />
            <frm.formItem name="name" required="true" validatebox="true" label="Môn học" />
        </frm.form>
    </wdw.dialog>
</dg.dataGrid>
	</div>
	<div style="float: left; width: auto; margin-left:15px;">
		<div class="easyui-tabs" style="width: 850px;">
			<div title="Các lớp">
				<dg.dataGrid id="dg_classes" title="Quản lý lớp học" scriptable="true" table="classes" width="850px" height="500px" rownumbers="false" pageSize="50" defaultFilters='{"online": 0}'>
    <dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
    <dg.dataGridItem field="name" width="120">Tên lớp</dg.dataGridItem>
    <dg.dataGridItem field="subjectName" width="120">Môn học</dg.dataGridItem>
    <dg.dataGridItem field="teacherName" width="120">Giáo viên</dg.dataGridItem>
    <dg.dataGridItem field="startDate" width="160">Ngày bắt đầu</dg.dataGridItem>
    <dg.dataGridItem field="endDate" width="160">Ngày kết thúc</dg.dataGridItem>
    <dg.dataGridItem field="amount" width="100">Học phí</dg.dataGridItem>
    <dg.dataGridItem field="status" width="40">TT</dg.dataGridItem>
</dg.dataGrid>
			</div>
			<div title="Học sinh">
				<dg.dataGrid id="dg_student" title="Quản lý học sinh" scriptable="true" layout="easyui/datagrid/datagrid" nowrap="false"
table="student" width="850px" height="500px"
rowStyler="studentRowStyler" defaultFilters='{"online": 0}'>
    <dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
    <dg.dataGridItem field="name" width="140">Tên học sinh</dg.dataGridItem>
    <dg.dataGridItem field="phone" width="80">Số điện thoại</dg.dataGridItem>
    <dg.dataGridItem field="currentClassNames" width="100">Lớp</dg.dataGridItem>
    <dg.dataGridItem field="periodNames" width="100">Kỳ thanh toán</dg.dataGridItem>
    <dg.dataGridItem field="startStudyDate" width="100">Ngày vào học</dg.dataGridItem>
    <dg.dataGridItem field="note" width="140">Ghi chú</dg.dataGridItem>
    <dg.dataGridItem field="assignName" width="140">Phụ trách</dg.dataGridItem>
</dg.dataGrid>
			</div>
			<div title="Giáo viên">
				<dg.dataGrid id="dg_teacher" title="Danh sách giáo viên" table="teacher" width="850px" height="500px">
    <dg.dataGridItem field="id" width="80">Id</dg.dataGridItem>
    <dg.dataGridItem field="subjectName" width="100">Môn</dg.dataGridItem>
    <dg.dataGridItem field="name" width="120">Tên giáo viên</dg.dataGridItem>
    <dg.dataGridItem field="phone" width="100">Số điện thoại</dg.dataGridItem>
    <dg.dataGridItem field="school" width="200">Trường</dg.dataGridItem>
    <dg.dataGridItem field="address" width="200">Địa chỉ</dg.dataGridItem>
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
			<div title="Bài thi">
			<dg.dataGrid id="dg_test_class" title="Quản lý bài thi" scriptable="true" 
        layout="easyui/datagrid/datagrid" 
        nowrap="false"
        table="test_class" width="850px" height="450px">
    <dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
    <dg.dataGridItem field="testName" width="140">Tên Bài thi</dg.dataGridItem>
				<dg.dataGridItem field="subjectName" width="140">Môn</dg.dataGridItem>
    <dg.dataGridItem field="className" width="140">Lớp</dg.dataGridItem>
</dg.dataGrid>
			</div>
			<div title="Kết quả thi">
			<dg.dataGrid id="dg_test_student_mark" title="Điểm thi" table="test_student_mark" width="800px" height="450px">
	<dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
	<dg.dataGridItem field="testName" width="220">Bài thi</dg.dataGridItem>
	<dg.dataGridItem field="className" width="120">Lớp</dg.dataGridItem>
	<dg.dataGridItem field="studentName" width="120">Học sinh</dg.dataGridItem>
	<dg.dataGridItem field="mark" width="120">Điểm thi</dg.dataGridItem>
	<dg.dataGridItem field="status" width="120">Trạng thái</dg.dataGridItem>
</dg.dataGrid>

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
			return style;
		}
	}

	function showCalendar() {
		var week = $('#weekSelector').val();
		var subjectId = pzk.elements.dg.getSelected('id');
		if(!week) {
			alert('Nhập tuần');
			return false;
		}
		if(!subjectId) {
			alert('Chọn môn để xem');
			return false;
		}
		$.ajax({
			url: BASE_URL + '/index.php/schedule/subject',
			type: 'post',
			data: {
				week: week,
				subjectId: subjectId
			},
			success: function(resp) {
				$('#calendarResult').html(resp);
			}
		});
	}
	</script>
</div>