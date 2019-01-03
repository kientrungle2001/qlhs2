<div>
<?php require BASE_DIR . '/' . pzk_app()->getUri('constants.php')?>
<div style="float:left; width: 220px;">
	<dg.dataGrid id="dgsubject" title="" table="subject" width="200px" height="115px" pagination="false" rownumbers="false" defaultFilters='{"online": 0}'>
	<dg.dataGridItem field="id" width="20">Id</dg.dataGridItem>
	<dg.dataGridItem field="name" width="140">Môn học</dg.dataGridItem>
	
	<layout.toolbar id="dgsubject_toolbar" style="display: none;">
		<layout.toolbarItem icon="sum" action="$dgsubject.detail(function(row) { jQuery('#searchSubject').val(row.id); searchClasses(); jQuery('#searchTeacherSubject').val(row.id); searchTeacher(); });" />
		<layout.toolbarItem icon="reload" action="$dgsubject.detail(function(row) { jQuery('#searchSubject').val(''); searchClasses(); jQuery('#searchTeacherSubject').val(''); searchTeacher(); });" />	
	</layout.toolbar>	
</dg.dataGrid>
	<dg.dataGrid id="dglevel" title="" table="level" width="200px" height="145px" pagination="false" rownumbers="false">
	<dg.dataGridItem field="id" width="20">Id</dg.dataGridItem>
	<dg.dataGridItem field="name" width="140">Trình độ</dg.dataGridItem>
	
	<layout.toolbar id="dglevel_toolbar" style="display: none;">
		<layout.toolbarItem action="$dglevel.detail(function(row) { jQuery('#searchLevel').val(row.id); searchClasses(); jQuery('#searchTeacherLevel').val(row.id); searchTeacher(); });" icon="sum" />
		<layout.toolbarItem action="$dglevel.detail(function(row) { jQuery('#searchLevel').val(''); searchClasses(); jQuery('#searchTeacherLevel').val(''); searchTeacher(); });" icon="reload" />
	</layout.toolbar>
</dg.dataGrid>
	<dg.dataGrid id="dgteacher" title="" table="teacher_class" width="200px" height="250px" pagination="false" rownumbers="false" pageSize="50">
	<dg.dataGridItem field="id" width="20">Id</dg.dataGridItem>
	<dg.dataGridItem field="name" width="140">Tên giáo viên</dg.dataGridItem>
	<layout.toolbar id="dgteacher_toolbar">
		<hform id="dgteacher_search">
			<form.combobox 
				id="searchTeacherSubject" name="subjectId"
				sql="select id as value, 
						name as label from `subject` order by name ASC"
				layout="category-select-list"></form.combobox>
				<form.combobox 
						id="searchTeacherLevel" name="level"
						sql="select distinct(level) as value, level as label from classes order by label asc"
						layout="category-select-list"></form.combobox>
				<layout.toolbarItem action="searchTeacher()" icon="search" />
		</hform>
		<layout.toolbarItem action="$dgteacher.detail(function(row) { jQuery('#searchTeacher').val(row.id); searchClasses();  });" icon="sum" />
		<layout.toolbarItem action="$dgteacher.detail(function(row) { jQuery('#searchTeacher').val(''); searchClasses();  });" icon="reload" />
	</layout.toolbar>
</dg.dataGrid>
</div>
<div style="float:left; width: 500px;">
	<dg.dataGrid id="dg" title="Quản lý lớp học" scriptable="true" table="classes" width="500px" height="500px" rownumbers="false" pageSize="50" defaultFilters='{"online": 0}'>
	<dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
	<dg.dataGridItem field="name" width="120">Tên lớp</dg.dataGridItem>
	<dg.dataGridItem field="code" width="80">Mã</dg.dataGridItem>
	<dg.dataGridItem field="subjectName" width="120">Môn học</dg.dataGridItem>
	<!--dg.dataGridItem field="level" width="120">Trình độ</dg.dataGridItem-->
	<dg.dataGridItem field="teacherName" width="120">Giáo viên</dg.dataGridItem>
	<!--dg.dataGridItem field="teacher2Name" width="120">Giáo viên 2</dg.dataGridItem-->
	<dg.dataGridItem field="roomName" width="100">Phòng</dg.dataGridItem>
	<dg.dataGridItem field="startDate" width="160">Ngày bắt đầu</dg.dataGridItem>
	<dg.dataGridItem field="endDate" width="160">Ngày kết thúc</dg.dataGridItem>
	<dg.dataGridItem field="amount" width="100">Học phí</dg.dataGridItem>
	<dg.dataGridItem field="status" width="40">TT</dg.dataGridItem>
	
	<layout.toolbar id="dg_toolbar">
		<hform id="dg_search">
			<form.combobox 
					id="searchTeacher" name="teacherId"
					label="Chọn giáo viên"
					sql="select id as value, 
							name as label from `teacher` order by name ASC"
					layout="category-select-list"></form.combobox>
			<form.combobox 
					id="searchSubject" name="subjectId"
					label="Chọn môn học"
					sql="select id as value, 
							name as label from `subject` order by name ASC"
					layout="category-select-list"></form.combobox>
			<form.combobox 
					id="searchLevel" name="level"
					label="Chọn khối"
					sql="select distinct(level) as value, level as label from classes order by label asc"
					layout="category-select-list"></form.combobox>
			<form.combobox 
					id="searchStatus" name="status"
					label="Chọn trạng thái"
					sql="select distinct(status) as value, status as label from classes order by label asc"
					layout="category-select-list"></form.combobox>
			<layout.toolbarItem action="searchClasses()" icon="search" />
			<layout.toolbarItem action="$dg.add()" icon="add" />
			<layout.toolbarItem action="$dg.edit()" icon="edit" />
			<layout.toolbarItem action="$dg.del()" icon="remove" />
			<layout.toolbarItem action="$dg.detail(function(row) { 
				jQuery('#searchClass2').val(row.id); 
				$dg2.search({'fields': {'classId' : '#searchClass2' }});
				jQuery('#searchClass3').val(row.id); 
				$dg3.search({'fields': {'classId' : '#searchClass3' }});
				$dg_student.filters({
					classIds: row.id
				});
				$dg_student_order.filters({
					classId: row.id,
					periodId: jQuery('#searchStudentOrderPeriod').val()
				});
				$dg_test_class.filters({
					classId: row.id
				});
				$dg_test_student_mark.filters({
					classId: row.id,
					testId: jQuery('#searchTestStudentMarkTestId').val() 
				});
				$dg_class_teacher.filters({
					classId: row.id
				});
				$dg_student_schedule.filters({
					classId: row.id
				});
				$dg_teacher_schedule.filters({
					classId: row.id
				});
			}); showCalendar();" icon="sum" />
		</hform>
	</layout.toolbar>
	<wdw.dialog gridId="dg" width="700px" height="auto" title="Lớp học">
		<frm.form gridId="dg">
			<frm.formItem type="hidden" name="id" required="false" label="" />
			<frm.formItem name="name" required="true" validatebox="true" label="Tên lớp" />
			<frm.formItem name="code" required="true" validatebox="true" label="Mã" />
			<frm.formItem type="user-defined" name="subjectId" required="false" label="Môn học">
				<form.combobox name="subjectId"
						sql="select id as value, 
								name as label from `subject` where 1 order by name ASC"
							layout="category-select-list"></form.combobox>
			</frm.formItem>
			<frm.formItem name="level" required="true" validatebox="true" label="Trình độ" />
			<frm.formItem type="user-defined" name="teacherId" required="false" label="Giáo viên">
				<form.combobox name="teacherId"
						sql="select id as value, 
								name as label from `teacher` where 1 order by name ASC"
							layout="category-select-list"></form.combobox>
			</frm.formItem>
			<frm.formItem type="user-defined" name="teacher2Id" required="false" label="Giáo viên 2">
				<form.combobox name="teacher2Id"
						sql="select id as value, 
								name as label from `teacher` where 1 order by name ASC"
							layout="category-select-list"></form.combobox>
			</frm.formItem>
			<frm.formItem type="user-defined" name="roomId" required="false" label="Phòng">
				<form.combobox name="roomId"
						sql="select id as value, 
								name as label from `room` where 1 order by name ASC"
							layout="category-select-list"></form.combobox>
			</frm.formItem>
			<frm.formItem type="user-defined" name="online" required="false" label="Trực tuyến">
				<select name="online">
					<option value="0">Trung tâm</option>
					<option value="1">Trực tuyến</option>
				</select>
			</frm.formItem>
			<frm.formItem name="startDate" type="date" required="false" label="Ngày bắt đầu">
			</frm.formItem>
			<frm.formItem name="endDate" type="date" required="false" label="Ngày kết thúc">
			</frm.formItem>
			<frm.formItem name="amount" required="false" label="Học phí">
			</frm.formItem>
			<frm.formItem type="user-defined" name="feeType" required="false" label="Loại phí">
				<select name="feeType">
					<option value="0">Theo buổi</option>
					<option value="1">Cả khóa</option>
				</select>
			</frm.formItem>
			<frm.formItem name="status" required="true" validatebox="true" label="Trạng thái" />
		</frm.form>
	</wdw.dialog>
</dg.dataGrid>
</div>
<div style="float:left; margin-left: 20px; margin-top: 20px; width: auto;">
 <div class="easyui-tabs" style="width: 550px;">
		<div title="Xếp lịch">
			<!-- Xếp lịch học -->
<div layout="form/schedule">
<layout.toolbarItem action="$dg.actOnSelected({
	'url': '<?php echo BASE_REQUEST . '/dtable/addschedule'; ?>', 
	'gridField': 'classId', 
	'fields': {
		'startDate': 'input[name=startDate]',
		'endDate' : 'input[name=endDate]',
		'weekday' : '#weekday',
		'studyTime' : '#studyTime'
	}
}); $dg2.reload();" icon="ok" />
		</div>
		<div>
			<div style="float:left; width: 220px;">
				<dg.dataGrid id="dg2" title="Quản lý lịch học" table="schedule" 
		width="210px" height="350px" singleSelect="false" noClickRow="true"
		rownumbers="false" pageSize="50">
	<dg.dataGridItem field="id" width="80">Id</dg.dataGridItem>
	<dg.dataGridItem field="className" width="120">Tên lớp</dg.dataGridItem>
	<dg.dataGridItem field="studyDate" width="160">Ngày học</dg.dataGridItem>
	<!--dg.dataGridItem field="studyTime" width="160">Giờ học</dg.dataGridItem>
	<dg.dataGridItem field="status" width="100">Trạng thái</dg.dataGridItem-->
	
	<layout.toolbar id="dg2_toolbar">
		<hform id="dg2_search">
			<form.combobox 
					id="searchClass2" name="classId"
					sql="select id as value, 
							name as label from `classes` where status=1 order by name ASC"
					layout="category-select-list"></form.combobox>
				<layout.toolbarItem action="$dg2.search({'fields': {'classId' : '#searchClass2' }})" icon="search" />
				<layout.toolbarItem action="$dg2.del()" icon="remove" />
		</hform>
	</layout.toolbar>
</dg.dataGrid>
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
				<dg.dataGrid id="dg_student" title="Danh sách học sinh" scriptable="true" 
		layout="easyui/datagrid/datagrid" 
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
				<dg.dataGrid id="dg_student_schedule" title="Danh sách điểm danh học sinh" scriptable="true" 
		layout="easyui/datagrid/datagrid" 
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
				<dg.dataGrid id="dg_class_teacher" title="Danh sách giáo viên" scriptable="true" 
		layout="easyui/datagrid/datagrid" 
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
						sql="<?php echo @$class_sql;?>"
							layout="category-select-list"></form.combobox>
			</frm.formItem>
			<frm.formItem type="user-defined" name="teacherId" required="false" label="Giáo viên">
				<form.combobox name="teacherId"
						sql="<?php echo @$teacher_sql;?>"
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
				<dg.dataGrid id="dg_teacher_schedule" title="Danh sách điểm danh giáo viên" scriptable="true" 
		layout="easyui/datagrid/datagrid" 
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
		<dg.dataGrid id="dg_student_order" title="Danh sách học phí" scriptable="true" 
		layout="easyui/datagrid/datagrid" 
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
				sql="<?php echo @$payment_period_sql;?>" layout="category-select-list" onChange="searchStudentOrder();"></form.combobox>
		</hform>
	</layout.toolbar>
</dg.dataGrid>
	</div>
	<div title="Bài thi">
		<dg.dataGrid id="dg_test_class" title="Danh sách bài thi" scriptable="true" 
		layout="easyui/datagrid/datagrid" 
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
						sql="<?php echo @$class_sql;?>"
							layout="category-select-list"></form.combobox>
			</frm.formItem>
			<frm.formItem type="user-defined" name="testId" required="false" label="Bài thi">
				<form.combobox name="testId"
						sql="<?php echo @$test_sql;?>"
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
		<dg.dataGrid id="dg_test_student_mark" title="Kết quả thi" 
		table="test_student_mark" width="550px" height="250px">
	<dg.dataGridItem field="id" width="80">Id</dg.dataGridItem>
	<dg.dataGridItem field="studentName" width="120">Học sinh</dg.dataGridItem>
	<dg.dataGridItem field="testName" width="120">Bài kiểm tra</dg.dataGridItem>
	<dg.dataGridItem field="mark" width="120">Điểm</dg.dataGridItem>
	<dg.dataGridItem field="status" width="120">Trạng thái</dg.dataGridItem>
	<layout.toolbar id="dg_test_student_mark_toolbar">
	<hform id="dg_test_student_mark_search" onsubmit="searchTestStudentMark(); return false;">
		<form.combobox label="Bài thi" id="searchTestStudentMarkTestId" name="testId"
			sql="<?php echo @$test_sql;?>" layout="category-select-list" onChange="searchTestStudentMark();"></form.combobox>
	</hform>
</layout.toolbar>
</dg.dataGrid>
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
