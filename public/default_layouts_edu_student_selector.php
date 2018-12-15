<?php
$name = $data->name;
?>
<span id="wrapper-<?php echo @$data->id;?>" class="ajax-reload-selector" data-table="student" data-id="<?php echo @$data->id;?>">
	<input class="ajax-reload-input" id="<?php echo @$data->id;?>" type="hidden" <?php $tmp = @$data->name; if (isset($data->name) && $data->name !== "null" && $data->name !== null && $data->name !== false) {echo 'name="'.$tmp.'"'; } ?> <?php $tmp = @$data->value; if (isset($data->value) && $data->value !== "null" && $data->value !== null && $data->value !== false) {echo 'value="'.$tmp.'"'; } ?> <?php $tmp = @$data->onChange; if (isset($data->onChange) && $data->onChange !== "null" && $data->onChange !== null && $data->onChange !== false) {echo 'onChange="'.$tmp.'"'; } ?>/>
	<span id="label-<?php echo @$data->id;?>" data-field="name" class="ajax-reload-label">(Trống)</span>
</span>
<a href="#" onclick="pzk.elements.<?php echo @$data->id;?>.showStudentSelectorDialog(); return false;">[Chọn Học sinh]</a>
<a href="#" onclick="pzk.elements.<?php echo @$data->id;?>.resetStudentSelector(); return false;">[x Bỏ chọn]</a>
<script>
	function studentRowStyler(index, row) {
		var style = '';
		if(row.color !== '') {
			style += 'color:' + row.color + ';';
		}
		
		if(row.fontStyle !== '') {
			if(row.fontStyle === 'bold')
				style += 'font-weight: bold;';
			else if(row.fontStyle === 'italic') {
				style += 'font-style: italic;';
			} else if(row.fontStyle === 'underline') {
				style += 'text-decoration: underline;';
			}
		}
		if(style === '') {
			var studentDate = new Date(row.startStudyDate);
			var currentDate = new Date();
			return (currentDate.getTime() - studentDate.getTime() > 365 * 24 * 3600 * 1000) ?  'color: grey;': '';
		} else {
			console.log(style);
			return style;
		}
	}
</script>
