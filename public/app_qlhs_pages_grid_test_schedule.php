<?php require BASE_DIR . '/' . pzk_app()->getUri('constants.php')?>
<div>
	<dg.dataGrid id="dg" title="Lịch hẹn thi đầu vào" scriptable="true" 
			table="test_schedule" width="1200px" height="450px" nowrap="true"
			rowStyler="adviceRowStyler">
		<dg.dataGridItem field="id" width="80">Id</dg.dataGridItem>
		<dg.dataGridItem field="title" width="320">Tiêu đề</dg.dataGridItem>
		<dg.dataGridItem field="subjectName" width="220">Môn</dg.dataGridItem>
		<dg.dataGridItem field="className" width="220">Lớp</dg.dataGridItem>
		<dg.dataGridItem field="studentName" width="220">Học sinh</dg.dataGridItem>
		<dg.dataGridItem field="phone" width="220">Điện thoại</dg.dataGridItem>
		<dg.dataGridItem field="adviceName" width="220">Tư vấn viên</dg.dataGridItem>
		<dg.dataGridItem field="testDate" width="220">Ngày Thi</dg.dataGridItem>
		<dg.dataGridItem field="testTime" width="120">Thời gian</dg.dataGridItem>
		<dg.dataGridItem field="status" width="220" formatter="adviceStatusFormatter">Trạng thái</dg.dataGridItem>
		<layout.toolbar id="dg_toolbar">
			<hform id="dg_search">
				<edu.courseSelector name="classId" id="searchClass" defaultFilters='{"online": 1, "status": 1}' onChange="pzk.elements.dg.search({'fields': {'classId' : '#searchClass', 'studentId': '#searchStudent' }})" />
				<edu.studentSelector name="studentId" id="searchStudent" defaultFilters='{"online": 1}' onChange="pzk.elements.dg.search({'fields': {'classId' : '#searchClass', 'studentId': '#searchStudent' }})" />
				<layout.toolbarItem action="$dg.search({'fields': {'classId' : '#searchClass', 'studentId': '#searchStudent' }})" icon="search" />
				<layout.toolbarItem action="$dg.add(); $studentSelector.resetValue();$courseSelector.resetValue();" icon="add" />
				<layout.toolbarItem action="$dg.edit(); $studentSelector.loadValue();$courseSelector.loadValue();" icon="edit" />
				<layout.toolbarItem action="$dg.del()" icon="remove" />
			</hform>
		</layout.toolbar>
		<wdw.dialog gridId="dg" width="700px" height="auto" title="Phần mềm">
			<frm.form gridId="dg">
				<frm.formItem type="hidden" name="id" required="false" label="" />
				<frm.formItem type="user-defined" name="type" required="false" label="Loại hình">
					<select name="type">
						<option value="0">Cuộc gọi</option>
						<option value="1">Tin nhắn</option>
						<option value="2">Facebook</option>
						<option value="3">Email</option>
						<option value="4">Gặp gỡ</option>
					</select>
				</frm.formItem>
				<frm.formItem name="title" required="true" validatebox="true" label="Tiêu đề" />
				<frm.formItem name="note" required="false" validatebox="false" label="Ghi chú" />
				<frm.formItem 
					type="user-defined"
					name="studentId" required="false" validatebox="false" label="Học sinh">
				<edu.studentSelector name="studentId" id="studentSelector" defaultFilters='{"online": 0, "classed": -1}' />
			</frm.formItem>
				<frm.formItem type="date" name="testDate" required="false" label="Ngày Thi" />
				<frm.formItem type="time" name="testTime" required="false" label="Thời gian" />
				<frm.formItem type="user-defined" name="subjectId" required="false" label="Môn học">
					<form.combobox name="subjectId"
							sql="<?php echo @$subject_center_sql;?>"
								layout="category-select-list"></form.combobox>
				</frm.formItem>
				<frm.formItem type="user-defined" name="classId" required="false" label="Khóa học">
					<edu.courseSelector id="courseSelector" name="classId" defaultFilters='{"online": 0, "status": 1}' />
				</frm.formItem>
				<frm.formItem type="user-defined" name="adviceId" required="false" label="Giáo viên">
					<form.combobox name="adviceId"
							sql="<?php echo @$teacher_sql;?>"
								layout="category-select-list"></form.combobox>
				</frm.formItem>
				<frm.formItem type="user-defined" name="status" required="false" label="Trạng thái">
					<select name="status">
						<option value="0">Chưa thi</option>
						<option value="1">Đã thi</option>
						<option value="2">Đã có kết quả</option>
					</select>
				</frm.formItem>
			</frm.form>
		</wdw.dialog>
	</dg.dataGrid>
	<script>
	function adviceStatusFormatter(value,row,index) {
		switch(value) {
			case '0': return 'Chưa thi';
			case '1': return 'Đã thi';
			case '2': return 'Đã có kết quả';
		}
	}
	function adviceTypeFormatter(value,row,index) {
		switch(value) {
			case '0': return 'Cuộc gọi';
			case '1': return 'Tin nhắn';
			case '2': return 'Facebook';
			case '3': return 'Email';
			case '4': return 'Gặp gỡ';
		}
	}
	function adviceRowStyler(index, row) {
		if(row.status == '0') {
			return 'color: red; font-weight: bold;';
		}
		if(row.status == '1') {
			return 'color: orange; font-weight: bold;';
		}
		if(row.status == '2') {
			return 'color: green; font-weight: bold;';
		}
		return '';
	}
	</script>
</div>