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
	<?php if($period->getId() == pzk_request()->getPeriodId()) {
			$hidden = 'display: block;';
		} else {  
			$hidden = 'display: none;';
		} ?>
	
	<div title="<?php echo $period->getName()?>" style="<?php echo @$hidden;?>" <?php if($periodCount==$periodIndex) { echo 'data-options="selected: true"'; } ?>>
		<h3>Điểm danh lớp <?php echo $class->getName() ?></h3>
			<?php  $schedules = $period->getSchedules();
			$stdSchedules = $period->getStudentSchedules(); 
			$teacherSchedules = $period->getTeacherSchedules(); 
			?>
			<table border="1" cellpadding="4px" cellspacing="0" style="border-collapse:collapse;margin: 15px;">
			<tr>
				<th>STT</th>
				<th>Họ tên</th>
				<th>Số điện thoại
				<?php foreach ( $schedules as $date ) : ?>
				<th><?php echo date('d/m', strtotime($date))?>
				</th>
				<?php endforeach; ?>
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
					<td>&nbsp;</td>
				<?php endforeach; ?>
				</tr>
			<?php } ?>
			</table>
	</div>
	<?php endforeach; ?>