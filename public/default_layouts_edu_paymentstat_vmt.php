<?php
$class = $data->getClass();
$students = $class->getRawStudents();
// danh sách học sinh đã thanh toán
$payment = $class->getStudentIdPaids();
?>
<a href="<?php echo BASE_REQUEST . '/demo/paymentstatPrint'; ?>?classId=<?php echo $class->getId()?>&periodId=0" target="_blank">Xem bản in</a>
	
<table border="1" cellpadding="4px" cellspacing="0" style="border-collapse:collapse;margin: 15px;width: 1000px;">
	<tr>
		<th colspan="9"><?php echo $class->getName()?></th>
	</tr>
	<tr>
		<th>Họ tên</th>
		<th>Số điện thoại</th>
		<th>Học phí</th>
		<th>Trạng thái</th>
		
	</tr>
	<?php $index = 0; ?>
	<?php foreach ( $students as $student ) : ?>
	<?php $index++; ?>
	<tr>
		<td><?php echo @$index;?>. <?php echo $student->getName(); ?></td>
		<td><?php echo $student->getPhone(); ?></td>
		<td><?php echo $class->getAmountFormated(); ?></td>
		<td><?php echo $payment->getStatus($student); ?></td>
	</tr>
	<?php endforeach; ?>
</table>
<table>
	<tr><td>Sĩ số:</td><td> <?php echo @$index;?> học sinh</td></tr>
	<tr><td>Đã thanh toán:</td><td> <?php echo $payment->getNumberOfPaids(); ?> học sinh</td></tr>
	<tr><td>Chưa thanh toán:</td><td> <?php echo $payment->getNumberOfNonPaids(); ?> học sinh</td></tr>
</table>