<div <?php $tmp = @$data->id; if (isset($data->id) && $data->id !== "null" && $data->id !== null && $data->id !== false) {echo 'id="'.$tmp.'"'; } ?> class="easyui-dialog <?php echo @$data->class;?>" style="width:<?php echo @$data->width;?>;height:<?php echo @$data->height;?>;padding:10px 20px"
		closed="<?php echo @$data->closed;?>" buttons="#<?php echo @$data->buttons;?>"
		title="<?php echo @$data->title;?>"
		data-options="iconCls:'icon-redo',resizable:true,modal:true">
		<div id="tabs-<?php echo @$data->id;?>" class="easyui-tabs" style="width: <?php echo (intval($data->width) - 50)?>px; min-height: <?php echo (intval($data->height) - 100)?>px;">
			<div title="Chọn Định Dạng">
				<div style="padding-top: 50px;padding-bottom: 50px; text-align: center;">
					<input id="file-<?php echo @$data->id;?>" type="file" />
				</div>
			</div>
			<div id="fields-<?php echo @$data->id;?>" title="Chọn Trường Và Kiểu Dữ Liệu">
				<table border="1" style="border-collapse: collapse; width: 100%;">
					<tr>
						<th>id</th>
						<th>name</th>
						<th>phone</th>
						<th>email</th>
						<th>status</th>
					</tr>
					<tr>
						<td><input type="checkbox" checked /></td>
						<td><input type="checkbox" checked /></td>
						<td><input type="checkbox" checked /></td>
						<td><input type="checkbox" checked /></td>
						<td><input type="checkbox" checked /></td>
					</tr>
					<tr>
						<td>
							<input type="text" placeholder="id" />
						</td>
						<td>
							<input type="text" placeholder="name" />
						</td>
						<td>
							<input type="text" placeholder="phone" />
						</td>
						<td>
							<input type="text" placeholder="email" />
						</td>
						<td>
							<input type="text" placeholder="status" />
						</td>
					</tr>
					<tr>
						<td>
							<textarea placeholder="map for id"></textarea>
						</td>
						<td>
						<textarea placeholder="map for name"></textarea>
						</td>
						<td>
						<textarea placeholder="map for phone"></textarea>
						</td>
						<td>
						<textarea placeholder="map for email"></textarea>
						</td>
						<td>
						<textarea placeholder="map for status"></textarea>
						</td>
					</tr>
				</table>
			</div>
			<div title="Kết quả">
				<div style="padding-top: 50px; padding-bottom: 50px; text-align: center;" id="result-<?php echo @$data->id;?>">Nhấn nút hoàn thành để bắt đầu</div>
			</div>
		</div>
	<?php $data->displayChildren('all');?>
	<br />
	<div id="dlg-buttons-<?php echo @$data->id;?>">
		<a href="#" class="easyui-linkbutton" iconCls="icon-reload" 
				onclick="pzk.elements.<?php echo @$data->id;?>.startOver()">Bắt đầu</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-back" 
				onclick="pzk.elements.<?php echo @$data->id;?>.prev()">Quay lại</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-next"
				onclick="pzk.elements.<?php echo @$data->id;?>.next()">Tiếp tục</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" 
				onclick="pzk.elements.<?php echo @$data->id;?>.startImport()">Hoàn thành</a>
	</div>
</div>