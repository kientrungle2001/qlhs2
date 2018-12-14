<?php
	$class = $data->getClass();	
	$teacher = $class->getTeacher();
	$teacher2 = $class->getTeacher2();
	
	$students = $class->getRawStudents();
	$index = 1;
	$stdSchedules = $class->getVMTSchedules();
?>
<a href="<?php echo BASE_REQUEST . '/demo/musterPrint'; ?>?classId=<?php echo $class->getId() ?>" target="_blank">Xem bản in</a>
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
	Buổi <?php echo @$i;?><br />
	<select id="muster_<?php echo $class->getId(); ?>_1970-01-<?php echo ($i < 10) ? '0':'' ?><?php echo @$i;?>"
						onchange="submitClassMuster('<?php echo $class->getId(); ?>', '1970-01-<?php echo ($i < 10) ? '0':'' ?><?php echo @$i;?>', this.value)">
					<option value="0">N/A</option>
					<option value="1">CM</option>
					<option value="2">NTT</option>
					<option value="3">NKT</option>
					<option value="4">KTT</option>
					<option value="5">DH</option>
				</select></td>
	<?php } ?>
</tr>
<?php foreach ( $students as $student ) : ?>
<?php $stdSchedule = @$stdSchedules[$student->getId()]; ?>
<tr>
	<td><?php echo @$index;?></td>
	<td><?php echo $student->getName();?></td>
	<td><?php echo $student->getPhone();?></td>
	<?php for($i = 1; $i < 18; $i++) { ?>
	<td><select id="muster_<?php echo $class->getId(); ?>_1970-01-<?php echo ($i < 10) ? '0':'' ?><?php echo @$i;?>"
						onchange="submitMuster('<?php echo $class->getId(); ?>','<?php echo $student->getId(); ?>', '1970-01-<?php echo ($i < 10) ? '0':'' ?><?php echo @$i;?>', this.value)">
					<option value="0">N/A</option>
					<option value="1">CM</option>
					<option value="2">NTT</option>
					<option value="3">NKT</option>
					<option value="4">KTT</option>
					<option value="5">DH</option>
				</select>
				<script type="text/javascript">
				$('#muster_<?php echo $class->getId() ?>_<?php echo $student->getId() ?>_1970-01-<?php echo ($i < 10) ? '0':'' ?><?php echo @$i;?>').val("<?php echo @$stdSchedule['1970-01-' . (($i < 10) ? '0':'').$i]['status']; ?>");
			</script>
				</td>
	<?php } ?>
</tr>
<?php $index ++ ?>
<?php endforeach; ?>
</table>