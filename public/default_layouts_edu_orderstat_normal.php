<div class="easyui-tabs" style="width:1100px;height:auto;padding: 5px;">
<?php
	$class = $data->getClass();	
	$class->makeOrderStats();
	$periods = $class->getPeriods();
	$students = $class->getRawStudents();
	
	// hien thi bang thanh toan
	$periodCount = count($periods);
	$periodIndex = 0;
?>
	<?php foreach ( $periods as $period ) : ?>
	<?php 	$payment = $period->getStudentIdPaids($class, $students); $periodIndex++; ?>
	<div title="<?php echo $period->getName()?>" <?php if($periodCount==$periodIndex) { echo 'data-options="selected: true"'; } ?>>
	<a href="<?php echo BASE_REQUEST . '/demo/orderstatPrint'; ?>?classId=<?php echo $class->getId() ?>&periodId=<?php echo $period->getId()?>" target="_blank">Xem bản in</a>
	<table border="1" cellpadding="4px" cellspacing="0" style="border-collapse:collapse;margin: 15px;width: 1000px;">
		<tr>
			<th colspan="14"><?php echo $period->getName()?></th>
		</tr>
		<tr>
			<th>Họ tên</th>
			<th>Số điện thoại</th>
			<th>Học phí</th>
			<th>Trạng thái</th>
                        <th>Ngày in Hóa đơn</th>
						<th>Ghi chú</th>
		</tr>
	<?php 	 
		$stdIndex = 0;
		foreach($students as $student) {   
		$stdIndex++;
		?>
		<tr>
			<th><?php echo @$stdIndex;?>. <?php echo $student->getName() ?></th>
			<th><?php echo $student->getPhone() ?></th>
			<th><?php echo $payment->getAmount($student); ?></th>
			<th><?php echo $payment->getStatus($student); ?></th>
                        <th><?php echo $payment->getCreated($student); ?></th>
						<th><?php echo $student->getNote() ?></th>
		</tr>
	<?php 	} ?>
	</table>
	</div>
	<?php endforeach; ?>
</div>