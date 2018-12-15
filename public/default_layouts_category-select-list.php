<?php 
$data->items = _db()->query($data->sql);
?>
<select <?php $tmp = @$data->id; if (isset($data->id) && $data->id !== "null" && $data->id !== null && $data->id !== false) {echo 'id="'.$tmp.'"'; } ?> <?php $tmp = @$data->name; if (isset($data->name) && $data->name !== "null" && $data->name !== null && $data->name !== false) {echo 'name="'.$tmp.'"'; } ?> <?php $tmp = @$data->multiple; if (isset($data->multiple) && $data->multiple !== "null" && $data->multiple !== null && $data->multiple !== false) {echo 'multiple="'.$tmp.'"'; } ?> class="easyui-combobox2" <?php $tmp = @$data->onChange; if (isset($data->onChange) && $data->onChange !== "null" && $data->onChange !== null && $data->onChange !== false) {echo 'onChange="'.$tmp.'"'; } ?>>
<option value=""><?php echo @$data->label;?></option>
<?php
if(isset($data->items) && is_array($data->items)) {
foreach($data->items as $item) {
	$selected = '';
	$rel = '';
	$rel2 = '';
	if ($item['value'] == @$data->value) {
		$selected = 'selected="selected"';
	}
	if(isset($data->dependence) && isset($data->dependenceField)) {
		$rel = 'rel="'.@$item[$data->dependenceField].'"';
	}
	
	if(isset($data->dependence2) && isset($data->dependenceField2)) {
		$rel2 = 'rel2="'.@$item[$data->dependenceField2].'"';
	}
?>
<option value="<?php echo @$item['value'];?>" <?php echo @$selected;?> <?php echo @$rel;?> <?php echo @$rel2;?>><?php echo @$item['label'];?></option>
<?php
}
}
?>
</select>

<?php if(isset($data->dependence)) { ?>
<?php $randomField = 'randomField' . rand(0, 1000000); 
$randomTime = rand(1000, 1500);
?>
<span id="<?php echo @$randomField;?>">&nbsp;</span>
<script type="text/javascript">
	setTimeout(function() {
		var $form = $('#<?php echo @$randomField;?>').parents('form');
		$form.find('[name=<?php echo @$data->dependence;?>]').change(function() {
			if($(this).val() == '') {
				$form.find('[name=<?php echo @$data->name;?>]').find('option').removeClass ('hidden-<?php echo @$data->dependence;?>');
			} else {
				$form.find('[name=<?php echo @$data->name;?>]').find('option').removeClass ('hidden-<?php echo @$data->dependence;?>');
				$form.find('[name=<?php echo @$data->name;?>]').find('option[rel!="'+$(this).val()+'"]').addClass('hidden-<?php echo @$data->dependence;?>');
			}
		});
	}, <?php echo @$randomTime;?>);
</script>
<?php } ?>

<?php if(isset($data->dependence2)) { ?>
<?php $randomField2 = 'randomField2' . rand(0, 1000000); 
$randomTime2 = rand(1000, 1500);
?>
<span id="<?php echo @$randomField2;?>">&nbsp;</span>
<script type="text/javascript">
	setTimeout(function() {
		var $form = $('#<?php echo @$randomField2;?>').parents('form');
		$form.find('[name=<?php echo @$data->dependence2;?>]').change(function() {
			if($(this).val() == '') {
				$form.find('[name=<?php echo @$data->name;?>]').find('option').removeClass ('hidden-<?php echo @$data->dependence2;?>');
			} else {
				$form.find('[name=<?php echo @$data->name;?>]').find('option').removeClass ('hidden-<?php echo @$data->dependence2;?>');
				$form.find('[name=<?php echo @$data->name;?>]').find('option[rel2!="'+$(this).val()+'"]').addClass('hidden-<?php echo @$data->dependence2;?>');
			}
		});
	}, <?php echo @$randomTime;?>);
</script>
<?php } ?>