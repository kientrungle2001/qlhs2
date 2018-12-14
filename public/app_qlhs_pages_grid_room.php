<?php require BASE_DIR . '/' . pzk_app()->getUri('constants.php')?>
<div>
	<div style="width: 400px; float: left;">
		<dg.dataGrid id="dg" title="Quản lý phòng học" table="room" width="400px" height="450px">
	<dg.dataGridItem field="id" width="80">Id</dg.dataGridItem>
	<dg.dataGridItem field="name" width="120">Tên phòng</dg.dataGridItem>
	<dg.dataGridItem field="size" width="80">Cỡ</dg.dataGridItem>
	<dg.dataGridItem field="status" width="80">Trạng thái</dg.dataGridItem>
	
	<layout.toolbar id="dg_toolbar">
		<layout.toolbarItem action="$dg.add()" icon="add" />
		<layout.toolbarItem action="$dg.edit()" icon="edit" />
		<layout.toolbarItem action="$dg.del()" icon="remove" />
		<layout.toolbarItem action="searchClasses(); searchAsset(); searchRoom(); showCalendar();" icon="sum" />
	</layout.toolbar>
	<wdw.dialog gridId="dg" width="700px" height="auto" title="Phòng học">
		<frm.form gridId="dg">
			<frm.formItem type="hidden" name="id" required="false" label="" />
			<frm.formItem name="name" required="true" validatebox="true" label="Tên phòng" />
			<frm.formItem name="size" required="false" label="Cỡ" />
			<frm.formItem type="user-defined" name="status" required="false" label="Trạng thái">
				<form.combobox name="status"
					layout="easyui/form/combobox">
					<option value="0">Không sẵn có</option>
					<option value="1">Sẵn có</option>
					<option value="-1">Đang sửa</option>
				</form.combobox>
			</frm.formItem>
		</frm.form>
	</wdw.dialog>
</dg.dataGrid>

	</div>
	<div style="width: 800px;float: left; margin-left: 10px;">
		<div class="easyui-tabs" style="width: 800px;">
			<div title="Các lớp">
				<dg.dataGrid id="dg_classes" title="Quản lý lớp học" scriptable="true" table="classes" width="800px" height="500px" rownumbers="false" pageSize="50">
	<dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
	<dg.dataGridItem field="name" width="120">Tên lớp</dg.dataGridItem>
	<dg.dataGridItem field="subjectName" width="120">Môn học</dg.dataGridItem>
	<!--dg.dataGridItem field="level" width="120">Trình độ</dg.dataGridItem-->
	<dg.dataGridItem field="teacherName" width="120">Giáo viên</dg.dataGridItem>
	<!--dg.dataGridItem field="teacher2Name" width="120">Giáo viên 2</dg.dataGridItem-->
	<dg.dataGridItem field="roomName" width="100">Phòng</dg.dataGridItem>
	<dg.dataGridItem field="startDate" width="160">Ngày bắt đầu</dg.dataGridItem>
	<dg.dataGridItem field="endDate" width="160">Ngày kết thúc</dg.dataGridItem>
	<dg.dataGridItem field="amount" width="100">Học phí</dg.dataGridItem>
	<dg.dataGridItem field="status" width="40">TT</dg.dataGridItem>
	
	<layout.toolbar id="dg_classes_toolbar">
		<hform id="dg_classes_search">
			<form.combobox label="Chọn giáo viên"
					id="searchTeacher" name="teacherId"
					sql="<?php echo @$teacher_sql;?>"
					layout="category-select-list" onChange="searchClasses()"></form.combobox>
			<form.combobox label="Chọn môn học"
					id="searchSubject" name="subjectId"
					sql="<?php echo @$subject_sql;?>"
					layout="category-select-list" onChange="searchClasses()"></form.combobox>
			<form.combobox label="Chọn khối"
					id="searchLevel" name="level"
					sql="select distinct(level) as value, level as label from classes order by label asc"
					layout="category-select-list" onChange="searchClasses()"></form.combobox>
			<form.combobox label="Chọn trạng thái"
					id="searchStatus" name="status"
					sql="select distinct(status) as value, status as label from classes order by label asc"
					layout="category-select-list" onChange="searchClasses()"></form.combobox>
			<layout.toolbarItem action="searchClasses()" icon="search" />
		</hform>
	</layout.toolbar>
</dg.dataGrid>

			</div>
			<div title="Tài sản">
				<dg.dataGrid id="dg_asset" title="Quản lý tài sản" scriptable="true" table="asset" 
		width="800px" height="500px" rownumbers="false" pageSize="50">
	<dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
	<dg.dataGridItem field="name" width="120">Tài sản</dg.dataGridItem>
	<dg.dataGridItem field="teacherName" width="120">Giáo viên</dg.dataGridItem>
	<dg.dataGridItem field="roomName" width="100">Phòng</dg.dataGridItem>
	<dg.dataGridItem field="storeName" width="100">Kho</dg.dataGridItem>
	<dg.dataGridItem field="quantity" width="100">Số lượng</dg.dataGridItem>
	<dg.dataGridItem field="status" width="40">TT</dg.dataGridItem>
</dg.dataGrid>

			</div>
			<div title="Các buổi học">
			<dg.dataGrid id="dg_schedule" title="Quản lý lịch phòng" scriptable="true" table="schedule" 
		width="800px" height="500px" rownumbers="false" pageSize="50">
	<dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
	<dg.dataGridItem field="className" width="120">Lớp</dg.dataGridItem>
	<dg.dataGridItem field="studyDate" width="120">Ngày học</dg.dataGridItem>
	<dg.dataGridItem field="studyTime" width="120">Giờ học</dg.dataGridItem>
	<dg.dataGridItem field="status" width="40">TT</dg.dataGridItem>
</dg.dataGrid>

			</div>
			<div title="Lịch phòng">
				Lịch phòng
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
	<div style="clear: both;"></div>
	<script type="text/javascript">
		function searchClasses() {
			pzk.elements.dg_classes.filters({
				'teacherId' : jQuery('#searchTeacher').val(), 
				'subjectId': jQuery('#searchSubject').val(), 
				'level': jQuery('#searchLevel').val(),
				'status': jQuery('#searchStatus').val(),
				'roomId': pzk.elements.dg.getSelected('id')
			});
		}
		function searchRoom() {
			pzk.elements.dg_schedule.filters({
				'roomId': pzk.elements.dg.getSelected('id')
			});
		}
		function searchAsset() {
			pzk.elements.dg_asset.filters({
				'roomId': pzk.elements.dg.getSelected('id')
			});
		}
		
	</script>
	<script>
	function showCalendar() {
		var week = $('#weekSelector').val();
		var roomId = pzk.elements.dg.getSelected('id');
		if(!week) {
			alert('Nhập tuần');
			return false;
		}
		if(!roomId) {
			alert('Chọn phòng để xem');
			return false;
		}
		$.ajax({
			url: BASE_URL + '/index.php/schedule/room',
			type: 'post',
			data: {
				currentWeek: week,
				roomId: roomId,
				isAjax: true
			},
			success: function(resp) {
				$('#calendarResult').html(resp);
			}
		});
	}
	</script>
</div>

