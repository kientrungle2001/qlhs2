<span id="wrapper-<?php echo @$data->id;?>" class="ajax-reload-selector" data-table="classes" data-id="<?php echo @$data->id;?>">
	<input class="ajax-reload-input" id="<?php echo @$data->id;?>" type="hidden" <?php $tmp = @$data->name; if (isset($data->name) && $data->name !== "null" && $data->name !== null && $data->name !== false) {echo 'name="'.$tmp.'"'; } ?> <?php $tmp = @$data->value; if (isset($data->value) && $data->value !== "null" && $data->value !== null && $data->value !== false) {echo 'value="'.$tmp.'"'; } ?> <?php $tmp = @$data->onChange; if (isset($data->onChange) && $data->onChange !== "null" && $data->onChange !== null && $data->onChange !== false) {echo 'onChange="'.$tmp.'"'; } ?>/>
	<span id="label-<?php echo @$data->id;?>" data-field="name" class="ajax-reload-label">(Trống)</span>
</span>
<a href="#" onclick='pzk.elements.<?php echo @$data->id;?>.showCourseSelectorDialog(<?php echo @$data->defaultFilters;?>); return false;'>[Chọn Lớp]</a>
<a href="#" onclick="pzk.elements.<?php echo @$data->id;?>.resetCourseSelector(); return false;">[x Bỏ chọn]</a>
