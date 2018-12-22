<?php require BASE_DIR . '/' . pzk_app()->getUri('constants.php')?>
<div>
	<div style="float: left; width: 400px;">
		<!-- Danh sách bài thi -->
<dg.dataGrid id="dg" title="Quản lý Bài thi" table="test" width="400px" nowrap="false" height="450px">
	<dg.dataGridItem field="id" width="80">Id</dg.dataGridItem>
	<dg.dataGridItem field="name" width="220" nowap="false">Bài thi</dg.dataGridItem>
	<dg.dataGridItem field="code" width="120" nowap="false">Mã</dg.dataGridItem>
	<dg.dataGridItem field="subjectName" width="100">Môn</dg.dataGridItem>
	<dg.dataGridItem field="level" width="40">Lớp</dg.dataGridItem>
	<dg.dataGridItem field="status" width="40">TT</dg.dataGridItem>

	<!-- Toolbar -->
	<layout.toolbar id="dg_toolbar">
		<layout.toolbarItem action="$dg.add()" icon="add" />
		<layout.toolbarItem action="$dg.edit()" icon="edit" />
		<layout.toolbarItem action="$dg.del()" icon="remove" />
		<layout.toolbarItem action="$dg.detail(function(row){
			searchClassesByTest(row);
			searchStudentMark(row);
		});" icon="sum" />
	</layout.toolbar>
	<!-- Dialog thêm bài thi -->
	<wdw.dialog gridId="dg" width="700px" height="auto" title="Bài thi">
		<frm.form gridId="dg">
			<frm.formItem type="hidden" name="id" required="false" label="" />
			<frm.formItem name="name" required="true" validatebox="true" label="Tên bài thi" />
			<frm.formItem name="code" required="true" validatebox="true" label="Mã" />
			<frm.formItem name="level" required="true" validatebox="true" label="Lớp" />
			<frm.formItem 
				type="user-defined"
				name="subjectId" required="true" validatebox="true" label="Chọn Môn">
					<form.combobox label="Chọn Môn" name="subjectId"
						sql="<?php echo @$subject_sql;?>"
							layout="category-select-list"></form.combobox>
			</frm.formItem>
			<frm.formItem 
				type="user-defined"
				name="status" required="true" validatebox="true" label="Trạng thái">
					<select id="cmbTestStatus" name="status">
						<option value="0">Trạng thái</option>
						<option value="1">Đã kích hoạt</option>
						<option value="0">Chưa kích hoạt</option>
					</select>
			</frm.formItem>
		</frm.form>
	</wdw.dialog>
</dg.dataGrid>

	</div>
<div style="float: left; width: 800px;">
	<div class="easyui-tabs">
		<div title="Các lớp">
			<dg.dataGrid id="dg_test_class" title="Các lớp" table="test_class" width="800px" height="450px">
	<dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
	<dg.dataGridItem field="className" width="120">Lớp</dg.dataGridItem>
	<dg.dataGridItem field="status" width="120">Trạng thái</dg.dataGridItem>
	<layout.toolbar id="dg_test_class_toolbar">
		<layout.toolbarItem action="$dg_test_class.add(); $courseSelector.resetValue();" icon="add" />
		<layout.toolbarItem action="$dg_test_class.edit(); $courseSelector.loadValue();" icon="edit" />
		<layout.toolbarItem action="$dg_test_class.del()" icon="remove" />
		<layout.toolbarItem action="$dg_test_class.detail(function(row){
			searchStudentMark(row);
		})" icon="sum" />
	</layout.toolbar>
	<wdw.dialog gridId="dg_test_class" width="700px" height="auto" title="Bài thi">
		<frm.form gridId="dg_test_class">
			<frm.formItem type="hidden" name="id" required="false" label="" />
			<frm.formItem 
				type="user-defined"
				name="testId" required="true" validatebox="true" label="Chọn bài thi">
					<form.combobox label="Chọn bài thi" name="testId" id="cmbTest2"
						sql="<?php echo @$test_sql;?>"
							layout="category-select-list"></form.combobox>
			</frm.formItem>
			<frm.formItem 
					type="user-defined"
					name="classId" required="true" validatebox="true" label="Khóa học">
				<edu.courseSelector name="classId" id="courseSelector" />
			</frm.formItem>	
			<frm.formItem type="date" name="startDate" label="Ngày bắt đầu" value="<?php echo @$current_date;?>" />
			<frm.formItem type="date" name="endDate" label="Ngày kết thúc" />
			
			<frm.formItem 
				type="user-defined"
				name="status" required="true" validatebox="true" label="Trạng thái">
					<select id="cmbStatus" name="status">
						<option value="0">Trạng thái</option>
						<option value="1">Đã kích hoạt</option>
						<option value="0">Chưa kích hoạt</option>
					</select>
			</frm.formItem>
		</frm.form>
	</wdw.dialog>
</dg.dataGrid>

		</div>
		<div title="Điểm thi">
			<dg.dataGrid id="dg_test_student_mark" title="Điểm thi" table="test_student_mark" width="800px" height="450px">
	<dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
	<dg.dataGridItem field="testName" width="220">Bài thi</dg.dataGridItem>
	<dg.dataGridItem field="className" width="120">Lớp</dg.dataGridItem>
	<dg.dataGridItem field="studentName" width="120">Học sinh</dg.dataGridItem>
	<dg.dataGridItem field="mark" width="120">Điểm thi</dg.dataGridItem>
	<dg.dataGridItem field="status" width="120">Trạng thái</dg.dataGridItem>
	<layout.toolbar id="dg_test_student_mark_toolbar">
		<layout.toolbarItem action="$dg_test_student_mark.add(); $studentSelector.resetValue();$courseSelector2.resetValue();" icon="add" />
		<layout.toolbarItem action="$dg_test_student_mark.edit(); $studentSelector.loadValue(); $courseSelector2.loadValue();" icon="edit" />
		<layout.toolbarItem action="$dg_test_student_mark.del()" icon="remove" />
	</layout.toolbar>
	<wdw.dialog gridId="dg_test_student_mark" width="700px" height="auto" title="Bài thi">
		<frm.form gridId="dg_test_student_mark">
			<frm.formItem type="hidden" name="id" required="false" label="" />
			<frm.formItem 
					type="user-defined"
					name="studentId" required="false" validatebox="false" label="Học sinh">
				<edu.studentSelector name="studentId" id="studentSelector" />
			</frm.formItem>
			<frm.formItem 
					type="user-defined"
					name="classId" required="true" validatebox="true" label="Khóa học">
				<edu.courseSelector name="classId" id="courseSelector2" />
			</frm.formItem>
			<frm.formItem type="text" name="mark" required="false" label="Điểm" />
			<frm.formItem 
				type="user-defined"
				name="status" required="true" validatebox="true" label="Trạng thái">
					<select id="cmbStatus" name="status">
						<option value="0">Trạng thái</option>
						<option value="1">Đã kích hoạt</option>
						<option value="0">Chưa kích hoạt</option>
					</select>
			</frm.formItem>
			
		</frm.form>
	</wdw.dialog>
</dg.dataGrid>

		</div>
	</div>
	</div>
	<div style="clear: both;">&nbsp;</div>
	<script>
	function searchClassesByTest(row) {
		$('#cmbTest').val(row.id);
		pzk.elements.dg_test_class.search({
			builder: function() {
				return {
					testId: row.id
				};
			}
		});
	}
	function searchStudentMark(row) {
		pzk.elements.dg_test_student_mark.search({
			builder: function() {
				return {
					testId: row.id
				};
			}
		});
	}
	</script>
</div>
