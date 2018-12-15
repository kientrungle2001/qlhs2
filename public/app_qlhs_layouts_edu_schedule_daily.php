<h1>Thời khóa biểu theo ngày</h1>
<form method="get">
	<input type="date" name="currentDate" value="<?php echo @$data->currentDate;?>" />
	<button type="submit">Xem</button>
</form>

<?php
$schedules = $data->getSchedules();
?>
<div class="schedule-daily">
<?php foreach ( $schedules as $schedule ) : ?>
	<div class="schedule-daily-item">
		<div class="room-name"><?php echo @$schedule['roomName'];?></div>
		<div class="subject-name"><?php echo @$schedule['subjectName'];?></div>
		<div class="teacher-name"><?php echo @$schedule['teacherName'];?></div>
		<div class="class-name"><?php echo @$schedule['className'];?></div>
		<div class="study-time"><?php echo @$schedule['studyTime'];?></div>
	</div>
<?php endforeach; ?>
</div>