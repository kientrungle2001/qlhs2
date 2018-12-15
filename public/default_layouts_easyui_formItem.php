<tr>
	<td><?php echo @$data->label;?><?php echo @$data->text;?></td>
	<td>
	<?php if (@$data->type == 'user-defined') { ?>
		<?php $data->displayChildren('all');?>
	<?php } else { ?>
	<input <?php $tmp = @$data->type; if (isset($data->type) && $data->type !== "null" && $data->type !== null && $data->type !== false) {echo 'type="'.$tmp.'"'; } ?> <?php $tmp = @$data->name; if (isset($data->name) && $data->name !== "null" && $data->name !== null && $data->name !== false) {echo 'name="'.$tmp.'"'; } ?> <?php $tmp = @$data->value; if (isset($data->value) && $data->value !== "null" && $data->value !== null && $data->value !== false) {echo 'value="'.$tmp.'"'; } ?> <?php $tmp = @$data->onclick; if (isset($data->onclick) && $data->onclick !== "null" && $data->onclick !== null && $data->onclick !== false) {echo 'onclick="'.$tmp.'"'; } ?> <?php if ( @$data->validatebox=="true" ) : ?>class="easyui-validatebox"<?php endif; ?> <?php $tmp = @$data->required; if (isset($data->required) && $data->required !== "null" && $data->required !== null && $data->required !== false) {echo 'required="'.$tmp.'"'; } ?>>
	<?php } ?>
	</td>
</tr>