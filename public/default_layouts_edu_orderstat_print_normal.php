<div class="easyui-tabs" style="width:1100px;height:auto;padding: 5px;">
<?php
	$class = $data->getClass();	
	$class->makeOrderStats();
	$periods = $class->getPeriods();
	$students = $class->getRawStudents();
	
	// hien thi bang thanh toan
	$periodCount = count($periods);
	$periodIndex = 0;
	$subject = $class->getSubject();
?>
	<?php foreach ( $periods as $period ) : ?>
	<?php 	
	if($period->getId() !== pzk_request('periodId')) continue;
	$payment = $period->getStudentIdPaids($class, $students); $periodIndex++; ?>
	<div title="<?php echo $period->getName()?>" <?php if($periodCount==$periodIndex) { echo 'data-options="selected: true"'; } ?>>
	<table border="1" cellpadding="4px" cellspacing="0" style="border-collapse:collapse;margin: 15px;width: 1000px;">
		<tr>
			<th colspan="14">Môn <?php echo $subject->getName()?> - Lớp <?php echo $class->getName()?> - <?php echo $period->getName()?></th>
		</tr>
		<tr>
			<th>Họ tên</th>
			<th>Số điện thoại</th>
			<th>Học phí</th>
			<th>Trạng thái</th>
                        <th>Ngày in Hóa đơn</th>
		</tr>
	<?php 	 
		$stdIndex = 0;$total = 0;
		foreach($students as $student) {   
		$stdIndex++;
		$total += $payment->getRawAmount($student);
		?>
		<tr>
			<td><?php echo @$stdIndex;?>. <?php echo $student->getName() ?></td>
			<td><?php echo $student->getPhone() ?></td>
			<td><?php echo $payment->getAmount($student); ?></td>
			<td><?php echo $payment->getStatus($student); ?></td>
                        <td><?php echo $payment->getCreated($student); ?></td>
		</tr>
	<?php 	} ?>
		<tr>
			<td colspan="2"><strong>Tổng cộng</strong></td>
			<td colspan="2"><strong><?php echo product_price($total); ?></strong></td>
		</tr>
	</table>
	</div>
	<?php endforeach; ?>
</div>