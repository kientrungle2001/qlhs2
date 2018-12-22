<div style="margin-top: 10px;">
	<?php require BASE_DIR . '/' . pzk_app()->getUri('constants.php')?>
	<div class="clear"></div>

	<div style="float:left; width: 600px;">
	<?php 
		$filters = array(
			'online' 			=> 	0,
			'classed'			=>		-1
		);
		$defaultAdd = array_merge($filters, array(
			'status'				=> 	0,
			'type'						=>		1,
			'rating'				=> 	0,
			'color'					=> 	'',
			'fontStyle' => 	'',
			'assignId'		=>		''
		));
	?>
	{include grid/student/component/datagrid}
	</div>
	<div style="float:left; margin-left: 10px; margin-top: 0px; width: auto;">
		{include grid/student/component/classify_student}
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
		
	</script>
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
	]]>
</script>
</div>