<?php
	$class = $data->getClass();	
	$teacher = $class->getTeacher();
	$teacher2 = $class->getTeacher2();
	
	$students = $class->getRawStudents();
	$index = 1;
	$stdSchedules = $class->getVMTSchedules();
?>
<table border="1" cellpadding="4px" cellspacing="0" style="border-collapse: collapse; margin: 15px; width: 100%;">
<tr>
	<th rowspan="2">STT</th>
	<th rowspan="2">Họ và tên</th>
	<th rowspan="2">Số Điện Thoại</th>
	<th colspan="17">Điểm danh</th>
</tr>
<tr>
	
	<?php for($i = 1; $i < 18; $i++) { ?>
	<td>
	<?php echo @$i;?></td>
	<?php } ?>
</tr>
<?php foreach ( $students as $student ) : ?>
<?php $stdSchedule = @$stdSchedules[$student->getId()]; ?>
<tr>
	<td><?php echo @$index;?></td>
	<td><?php echo $student->getName();?></td>
	<td><?php echo $student->getPhone();?></td>
	<?php for($i = 1; $i < 18; $i++) { ?>
	<td>&nbsp;</td>
	<?php } ?>
</tr>
<?php $index ++ ?>
<?php endforeach; ?>
</table>