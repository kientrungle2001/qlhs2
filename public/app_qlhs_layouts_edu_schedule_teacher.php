<?php if(!$data->getIsAjax()):?>
<?php $teachers = _db()->selectAll()->fromTeacher()->result();?>
<h1>Thời khóa biểu giáo viên</h1>
<form method="get">
	<input name="currentWeek" value="<?php echo @$data->currentWeek;?>" />
	<select name="teacherId">
	<?php foreach ( $teachers as $teacher ) : ?>
<option value="<?php echo @$teacher['id'];?>" <?php if($teacher['id'] == $data->getTeacherId()):?>selected<?php endif;?>><?php echo @$teacher['name'];?></option>
	<?php endforeach; ?>
	</select>
	<button type="submit">Xem</button>
</form>
<?php endif;?>

<?php if($data->getTeacherId()):?>
<?php
$bgs = array(
	'1' => '#abc',
	'2'	=>	'#bac',
	'3'	=>	'#cba'
);
$schedules = $data->getSchedules();
$dailies = array();
foreach($schedules as $schedule) {
	if(!isset($dailies[$schedule['studyDate']])) {
		$dailies[$schedule['studyDate']] = array();
	}
	$dailies[$schedule['studyDate']][] = $schedule;
}
?>
<div class="schedule-daily">
<?php foreach($dailies as $day => $schedules):?>
	<div class="schedule-daily-item" style="height: auto; width: 90%;">
		<div class="room-name"><?php echo date('D d/m', strtotime($day));?></div>
		<?php foreach ( $schedules as $schedule ) : ?>
			<div class="class-name" style="background: <?php echo $bgs[$schedule['subjectId']]?>; margin-bottom: 3px;padding: 5px; text-align: justify"><?php echo @$schedule['roomName'];?> - <?php echo @$schedule['className'];?> - <?php echo @$schedule['subjectName'];?> - <?php echo @$schedule['teacherName'];?></div>
		<?php endforeach; ?>
	</div>
<?php endforeach;?>
</div>
<?php endif;?>