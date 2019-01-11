<div id="<?php echo @$data->id;?>" class="easyui-dialog" style="width:<?php echo @$data->width;?>;height:<?php echo @$data->height;?>;padding:10px 20px"
        closed="<?php echo @$data->closed;?>" buttons="#<?php echo @$data->buttons;?>"
        title="<?php echo @$data->title;?>">
	<?php $data->displayChildren('all');?>
        <div id="dlg-buttons-<?php echo @$data->gridId;?>">
                <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="pzk.elements.<?php echo @$data->gridId;?>.save()">Save</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg-<?php echo @$data->gridId;?>').dialog('close')">Cancel</a>
        </div>
</div>