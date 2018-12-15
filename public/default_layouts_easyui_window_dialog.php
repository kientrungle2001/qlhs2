<div id="<?php echo @$data->id;?>" class="easyui-dialog" style="width:<?php echo @$data->width;?>;height:<?php echo @$data->height;?>;padding:10px 20px"
        closed="<?php echo @$data->closed;?>" buttons="#<?php echo @$data->buttons;?>"
        title="<?php echo @$data->title;?>">
	<?php $data->displayChildren('all');?>
</div>