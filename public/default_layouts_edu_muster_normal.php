<div class="easyui-tabs" style="width:1100px;height:auto;padding: 5px;">
<?php
	$class = $data->getClass();
	
	$class->makePaymentStats();
	$class->makeTeacherStats();
	
	$teacher = $class->getTeacher();
	$teacher2 = $class->getTeacher2();
	
	$periods = $class->getPeriods();
	$students = $class->getRawStudents();
	
	// hien thi bang thanh toan
	$periodCount = count($periods);
	$periodIndex = 0;
?>
	<?php foreach ( $periods as $period ) : ?>
	<div title="<?php echo $period->getName()?>" <?php if($periodCount==$periodIndex) { echo 'data-options="selected: true"'; } ?>>
		<a href="<?php echo BASE_REQUEST . '/demo/musterPrint'; ?>?classId=<?php echo $class->getId() ?>&periodId=<?php echo $period->getId()?>" target="_blank">Xem bản in</a>
			<?php  $schedules = $period->getSchedules();
			$stdSchedules = $period->getStudentSchedules(); 
			$teacherSchedules = $period->getTeacherSchedules(); 
			?>
			<table border="1" cellpadding="4px" cellspacing="0" style="border-collapse:collapse;margin: 15px;">
			<tr>
				<th>STT</th>
				<th>Họ tên</th>
				<th>Số điện thoại<br />
				Điểm danh giáo viên<br />
				Điểm danh cả lớp</th>
				<?php foreach ( $schedules as $date ) : ?>
				<th><?php echo date('d/m', strtotime($date))?>
				<br />
				<select class="muster_teacher_<?php echo $class->getId(); ?>_<?php echo $period->getId(); ?>" id="teacher_<?php echo $class->getId(); ?>_<?php echo @$date;?>" onchange="submitTeacherMuster('<?php echo $class->getId(); ?>', '<?php echo @$date;?>', this.value)">
					<option value="0">---</option>
					<?php if ( $teacher ) : ?>
						<option value="<?php echo $teacher->getId(); ?>"><?php echo $teacher->getLastName(); ?></option>
					<?php endif; ?>
					<?php if ( $teacher2 ) : ?>
						<option value="<?php echo $teacher2->getId(); ?>"><?php echo $teacher2->getLastName(); ?></option>
					<?php endif; ?>
				</select>
				<?php if(isset($teacherSchedules[$date])) { ?>
				<script>
					$('#teacher_<?php echo $class->getId(); ?>_<?php echo @$date;?>').val('<?php echo $teacherSchedules[$date] ?>');
				</script>
				<?php } ?>
				<br />
				<select id="muster_<?php echo $class->getId(); ?>_<?php echo @$date;?>"
						onchange="submitClassMuster('<?php echo $class->getId(); ?>', '<?php echo @$date;?>', this.value)">
					<option value="0">N/A</option>
					<option value="1">CM</option>
					<option value="2">NTT</option>
					<option value="3">NKT</option>
					<option value="4">KTT</option>
					<option value="5">DH</option>
				</select>
				</th>
				<?php endforeach; ?>
				<th>
				Giáo viên<br />
				<select onchange="submitAllTeacherMuster('<?php echo $class->getId(); ?>', '<?php echo $period->getId(); ?>', this.value)">
					<option value="0">---</option>
					<?php if ( $teacher ) : ?>
						<option value="<?php echo $teacher->getId(); ?>"><?php echo $teacher->getLastName(); ?></option>
					<?php endif; ?>
					<?php if ( $teacher2 ) : ?>
						<option value="<?php echo $teacher2->getId(); ?>"><?php echo $teacher2->getLastName(); ?></option>
					<?php endif; ?>
				</select><br />
				Học sinh</th>
			</tr>
			<?php 
			$stdIndex = 0;
			foreach($stdSchedules as $studentId => $stdSchedule){ 
				$student = $students[$studentId];
				$stdIndex++;
				?>
				<tr>
					<td><?php echo @$stdIndex;?></td>
					<td><?php echo $student->getName(); ?></td>
					<td><?php echo $student->getPhone(); ?></td>
				<?php foreach ( $schedules as $date ) : ?>
					<td>
					<?php if(isset($stdSchedule[$date])) { ?><select class="muster_<?php echo $class->getId() ?>_<?php echo @$date;?> muster_student_<?php echo $class->getId() ?>_<?php echo $period->getId() ?>_<?php echo $student->getId() ?>" id="muster_<?php echo $class->getId() ?>_<?php echo $period->getId() ?>_<?php echo $student->getId() ?>_<?php echo @$date;?>" name="muster[<?php echo $class->getId() ?>][<?php echo $period->getId() ?>][<?php echo $student->getId() ?>][<?php echo @$date;?>]"
					onchange="submitMuster('<?php echo $class->getId() ?>', '<?php echo $student->getId() ?>', '<?php echo @$date;?>', this.value)">
				<option value="0">N/A</option>
				<option value="1">CM</option>
				<option value="2">NTT</option>
				<option value="3">NKT</option>
				<option value="4">KTT</option>
				<option value="5">DH</option>
			</select><script type="text/javascript">
				$('#muster_<?php echo $class->getId() ?>_<?php echo $period->getId() ?>_<?php echo $student->getId() ?>_<?php echo @$date;?>').val("<?php echo $stdSchedule[$date]['status']; ?>");
			</script><?php } else { ?>&nbsp;<?php } ?>
					</td>
				<?php endforeach; ?>
				<td>
					<select class="muster_<?php echo $class->getId() ?>" id="muster_<?php echo $class->getId() ?>_<?php echo $student->getId() ?>" name="muster[<?php echo $class->getId() ?>][<?php echo $student->getId() ?>]"
					onchange="submitStudentMuster('<?php echo $class->getId() ?>', '<?php echo $period->getId() ?>', '<?php echo $student->getId() ?>',  this.value)">
						<option value="0">N/A</option>
						<option value="1">CM</option>
						<option value="2">NTT</option>
						<option value="3">NKT</option>
						<option value="4">KTT</option>
						<option value="5">DH</option>
					</select>
				</td>
				</tr>
			<?php } ?>
			</table>
	</div>
	<?php endforeach; ?>