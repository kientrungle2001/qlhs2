<div style="margin-top: 10px;">
	<?php require_once BASE_DIR . '/' . pzk_app()->getUri('constants.php')?>
	<wdw.dialog id="dg_class_selector"  	
				width="700px" 			height="auto" 
				title="Chọn lớp"		layout="easyui/window/dialog">
		<dg.dataGrid id="dg_classes" 
				title="Quản lý lớp học" 
				scriptable="true" 		table="classes" 
				width="600px" 			height="400px" 
				rownumbers="false" 		pageSize="50">
			<dg.dataGridItem field="id" 			width="40">		Id				</dg.dataGridItem>
			<dg.dataGridItem field="name" 			width="120">	Tên lớp			</dg.dataGridItem>
			<dg.dataGridItem field="subjectName" 	width="120">	Môn học			</dg.dataGridItem>
			<dg.dataGridItem field="teacherName" 	width="120">	Giáo viên		</dg.dataGridItem>
			<dg.dataGridItem field="amount" 		width="100">	Học phí			</dg.dataGridItem>
			<dg.dataGridItem field="status" 		width="40">		TT				</dg.dataGridItem>
			<dg.dataGridItem field="assignName" 	width="140">	Phụ trách		</dg.dataGridItem>
			
			<layout.toolbar id="dg_classes_toolbar">
				<hform id="dg_classes_search">
					<form.combobox id="searchTeacher" name="teacherId" onChange="searchClasses()"
							sql="{teacher_sql}" layout="category-select-list"></form.combobox>
					<form.combobox id="searchSubject2" name="subjectId" onChange="searchClasses()"
							sql="{subject_sql}" layout="category-select-list"></form.combobox>
					<form.combobox id="searchLevel" name="level" onChange="searchClasses()"
							sql="{class_level_sql}" layout="category-select-list"></form.combobox>
					<form.combobox id="searchStatus" name="status" onChange="searchClasses()"
							sql="{class_status_sql}" layout="category-select-list"></form.combobox>
					<layout.toolbarItem action="searchClasses()" icon="search" />
					<layout.toolbarItem action="$dg_classes.detail(function(row) { 
						selectClassSelector(row);
						jQuery('#dg_class_selector').dialog('close');
					});" icon="sum" />
				</hform>
			</layout.toolbar>
		</dg.dataGrid>
	</wdw.dialog>
	
	<div class="clear"></div>
	<div style="float:left; width: 600px;">
	<!-- Thêm học sinh mới -->
	<easyui.layout.panel collapsible="true" title="Thêm học sinh" collapsed="true"> <br />
		<hform id="add-dg" method="post" title="Thêm học sinh mới">
			<strong>Tên học sinh: </strong><form.textField name="name" />
			<strong> SĐT: </strong><form.textField name="phone" /><br /><br />
			<strong> Ngày nhập học: </strong><form.textField type="date" name="startStudyDate" value="{current_date}" />
			<form.textField type="submit" value="Thêm học sinh" onclick="pzk.elements.dg.addMode().save('#add-dg'); return false;" />
			<strong> </strong>
			<form.textField type="reset" value="Nhập lại" />
		</hform>
	</easyui.layout.panel>
	<!-- Hết form thêm học sinh mới  -->
	<!-- Danh sách học sinh  -->
	<dg.dataGrid id="dg" title="Quản lý học sinh" scriptable="true" layout="easyui/datagrid/datagrid" 
			onRowContextMenu="studentMenu" nowrap="false"
			table="student" width="600px" height="450px"
			rowStyler="studentRowStyler" defaultFilters='{"type": 0}'>
		<dg.dataGridItem field="id" width="40">Id</dg.dataGridItem>
		<dg.dataGridItem field="name" width="140">Tên học sinh</dg.dataGridItem>
		<dg.dataGridItem field="phone" width="80">Số điện thoại</dg.dataGridItem>
		<!--dg.dataGridItem field="school" width="120">Trường</dg.dataGridItem-->
		<dg.dataGridItem field="currentClassNames" width="100">Lớp</dg.dataGridItem>
		<!--dg.dataGridItem field="classNames" width="100">Lớp Đã Học</dg.dataGridItem-->
		<dg.dataGridItem field="periodNames" width="100">Kỳ thanh toán</dg.dataGridItem>
		<dg.dataGridItem field="startStudyDate" width="100">Ngày vào học</dg.dataGridItem>
		<dg.dataGridItem field="note" width="140">Ghi chú</dg.dataGridItem>
		<dg.dataGridItem field="assignName" width="140">Phụ trách</dg.dataGridItem>
		<!-- Toolbar cho danh sách học sinh -->
		<layout.toolbar id="dg_toolbar">
			<hform id="dg_search" onsubmit="searchStudent(); return false;">
				<strong>Tên học sinh: </strong><form.textField width="120px" name="name" id="searchName" onChange="searchStudent();" />
				<strong> SĐT: </strong><form.textField width="80px" name="phone" id="searchPhone" onChange="searchStudent();" />
				<input type="hidden" name="classIds" id="searchClassIds" />
				<a href="#" id="selected_class" style="max-width: 120px; overflow: hidden;white-space: nowrap;"></a>
				<button onClick="$('#dg_class_selector').dialog('open'); return false;">Chọn lớp</button>
				<form.combobox label="Chọn kỳ thanh toán" id="searchPeriod" name="periodId"
					sql="{payment_period_sql}" layout="category-select-list" onChange="searchStudent();"></form.combobox>
				<form.combobox label="Chọn kỳ chưa thanh toán" id="searchnotlikePeriod" name="notlikeperiodId"
					sql="{payment_period_sql}" layout="category-select-list" onChange="searchStudent();"></form.combobox>
				<select name="color" id="searchColor" onChange="searchStudent();">
					<option value="">Chọn màu</option>
					<option value="red">Đỏ</option>
					<option value="blue">Xanh da trời</option>
					<option value="green">Xanh lá cây</option>
					<option value="yellow">Vàng</option>
					<option value="purple">Tím</option>
					<option value="grey">Xám</option>
				</select>
				<select name="fontStyle" id="searchFontStyle" onChange="searchStudent();">
					<option value="">Chọn kiểu</option>
					<option value="bold">Đậm</option>
					<option value="italic">Nghiêng</option>
					<option value="underline">Gạch chân</option>
				</select>
				<form.combobox label="Người phụ trách" id="searchAssignId" name="assignId"
					sql="{teacher_sql}" onChange="searchStudent();"
					layout="category-select-list"></form.combobox>
				<select name="type" id="searchType" onChange="searchStudent();">
					<option value="">Phân loại</option>
					<option value="1">Đang học</option>
					<option value="0">Tiềm năng</option>
					<option value="2">Lâu năm</option>
				</select>
				<select name="rating" id="searchRating" onChange="searchStudent();">
					<option value="">Xếp hạng</option>
					<option value="0">Chưa xếp hạng</option>
					<option value="1">Kém</option>
					<option value="2">Trung Bình</option>
					<option value="3">Khá</option>
					<option value="4">Giỏi</option>
					<option value="5">Xuất Sắc</option>
				</select>
				<select name="status" id="searchStatus" onChange="searchStudent();">
					<option value="">Trạng thái</option>
					<option value="0">Đang học</option>
					<option value="1">Dừng học</option>
				</select>
				<input type="submit" style="display: none;" value="Tìm" />
				<layout.toolbarItem id="searchButton" action="searchStudent();" icon="search" />
				<br />
				<layout.toolbarItem action="$dg.add()" icon="add" />
				<layout.toolbarItem action="$dg.edit()" icon="edit" />
				<layout.toolbarItem action="$dg.del()" icon="remove" />
				<layout.toolbarItem action="$dg.detail({url: '{url /student/detail}', 'gridField': 'id', 'action': 'render', 'renderRegion': '#student-detail'}); $dg.detail(function(row) { selectClass(row); });" icon="sum" />
			</hform>
		</layout.toolbar>
		<!-- Hết toolbar cho danh sách học sinh -->
		<!-- Dialog thêm sửa học sinh -->
		<wdw.dialog gridId="dg" width="700px" height="auto" title="Học sinh">
			<frm.form gridId="dg">
				<frm.formItem type="hidden" name="id" label="" />
				<frm.formItem name="name" required="true" validatebox="true" label="Tên học sinh" />
				<frm.formItem name="phone" label="Số điện thoại" />
				<frm.formItem name="school"  label="Trường" />
				<frm.formItem type="date" name="birthDate" label="Ngày sinh" />
				<frm.formItem name="address" label="Địa chỉ" />
				<frm.formItem name="parentName" label="Phụ huynh" />
				<frm.formItem type="date" name="startStudyDate" label="Ngày nhập học" value="{? echo date('Y-m-d'); ?}" />
				<frm.formItem type="date" name="endStudyDate" label="Ngày dừng học" />
				<frm.formItem name="note" label="Ghi chú" />
				<frm.formItem name="color" label="Màu sắc" type="user-defined">
					<select name="color">
						<option value="">Bình thường</option>
						<option value="red">Đỏ</option>
						<option value="blue">Xanh da trời</option>
						<option value="green">Xanh lá cây</option>
						<option value="yellow">Vàng</option>
						<option value="purple">Tím</option>
						<option value="grey">Xám</option>
					</select>
				</frm.formItem>
				<frm.formItem name="fontStyle" label="Kiểu chữ" type="user-defined">
					<select name="fontStyle">
						<option value="">Bình thường</option>
						<option value="bold">Đậm</option>
						<option value="italic">Nghiêng</option>
						<option value="underline">Gạch chân</option>
					</select>
				</frm.formItem>
				<frm.formItem name="assignId" label="Người phụ trách" type="user-defined">
					<form.combobox label="Người phụ trách" name="assignId"
				sql="{teacher_sql}"
					layout="category-select-list"></form.combobox>
				</frm.formItem>
				<frm.formItem name="online" label="Học tại" type="user-defined">
					<select name="online">
						<option value="">Học tại</option>
						<option value="0">Trung tâm</option>
						<option value="1">Trực tuyến</option>
					</select>
				</frm.formItem>
				<frm.formItem name="classed" label="Đã xếp lớp" type="user-defined">
					<select name="classed">
						<option value="">Chọn</option>
						<option value="1">Đã xếp lớp</option>
						<option value="0">Chờ xếp lớp</option>
					</select>
				</frm.formItem>
				<frm.formItem name="type" label="Phân loại" type="user-defined">
					<select name="type">
						<option value="">Phân loại</option>
						<option value="1">Đang học</option>
						<option value="0">Tiềm năng</option>
						<option value="2">Lâu năm</option>
					</select>
				</frm.formItem>
				<frm.formItem name="rating" label="Xếp hạng" type="user-defined">
					<select name="rating">
						<option value="0">Chưa xếp hạng</option>
						<option value="1">Kém</option>
						<option value="2">Trung Bình</option>
						<option value="3">Khá</option>
						<option value="4">Giỏi</option>
						<option value="5">Xuất Sắc</option>
					</select>
				</frm.formItem>
				<frm.formItem name="status" label="Đã dừng học" type="user-defined">
					<select name="status">
						<option value="1">Đang học</option>
						<option value="0">Dừng học</option>
					</select>
				</frm.formItem>
			</frm.form>
		</wdw.dialog>
		<!-- Hết dialog thêm sửa học sinh -->
	</dg.dataGrid>
	<!-- Hết form thêm danh sách học sinh -->
	</div>
	<div style="float:left; margin-left: 10px; margin-top: 0px; width: auto;">
		<!-- Nghiệp vụ xếp lớp học sinh -->
		<easyui.layout.panel collapsible="true" title="Xếp lớp" width="100%">
			<span>Xếp lớp: </span>
			<form.combobox label="Chọn lớp" id="cmbClass" name="classId"
				sql="{class_sql}" layout="category-select-list"></form.combobox><span>Ngày vào học: </span>
			<input name="startStudyDate4" type="date" id="startStudyDate4" value="<?php echo date('Y-m-d', time())?>" />
			<layout.toolbarItem action="$dg.addToTable({url: '{url /dtable/add}?table=class_student', 'gridField': 'studentId', 'tableField': 'classId', 'tableFieldSource': '#cmbClass', 'tableField2': 'startClassDate', 'tableFieldSource2': '#startStudyDate4'}); setTimeout(function(){$dg.reload();}, 1000);" icon="add" />
			<br />
			<span>Chuyển từ lớp: </span>
			<form.combobox label="Chọn lớp" id="cmbClass3" name="classId"
				sql="{class_sql}"
					layout="category-select-list"></form.combobox>
			<span> sang lớp: </span>
			<form.combobox label="Chọn lớp" id="cmbClass2" name="classId"
				sql="{class_sql}"
					layout="category-select-list"></form.combobox><span>Ngày: </span>
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
