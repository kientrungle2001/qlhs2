<select class="easyui-combobox" <?php $tmp = @$data->id; if (isset($data->id) && $data->id !== "null" && $data->id !== null && $data->id !== false) {echo 'id="'.$tmp.'"'; } ?> <?php $tmp = @$data->title; if (isset($data->title) && $data->title !== "null" && $data->title !== null && $data->title !== false) {echo 'title="'.$tmp.'"'; } ?> <?php $tmp = @$data->name; if (isset($data->name) && $data->name !== "null" && $data->name !== null && $data->name !== false) {echo 'name="'.$tmp.'"'; } ?> <?php $tmp = @$data->style; if (isset($data->style) && $data->style !== "null" && $data->style !== null && $data->style !== false) {echo 'style="'.$tmp.'"'; } ?> <?php $tmp = @$data->valueField; if (isset($data->valueField) && $data->valueField !== "null" && $data->valueField !== null && $data->valueField !== false) {echo 'valueField="'.$tmp.'"'; } ?> <?php $tmp = @$data->textField; if (isset($data->textField) && $data->textField !== "null" && $data->textField !== null && $data->textField !== false) {echo 'textField="'.$tmp.'"'; } ?> <?php $tmp = @$data->groupField; if (isset($data->groupField) && $data->groupField !== "null" && $data->groupField !== null && $data->groupField !== false) {echo 'groupField="'.$tmp.'"'; } ?> <?php $tmp = @$data->groupFormatter; if (isset($data->groupFormatter) && $data->groupFormatter !== "null" && $data->groupFormatter !== null && $data->groupFormatter !== false) {echo 'groupFormatter="'.$tmp.'"'; } ?> <?php $tmp = @$data->mode; if (isset($data->mode) && $data->mode !== "null" && $data->mode !== null && $data->mode !== false) {echo 'mode="'.$tmp.'"'; } ?> <?php $tmp = @$data->url; if (isset($data->url) && $data->url !== "null" && $data->url !== null && $data->url !== false) {echo 'url="'.$tmp.'"'; } ?> <?php $tmp = @$data->method; if (isset($data->method) && $data->method !== "null" && $data->method !== null && $data->method !== false) {echo 'method="'.$tmp.'"'; } ?> <?php $tmp = @$data->data; if (isset($data->data) && $data->data !== "null" && $data->data !== null && $data->data !== false) {echo 'data="'.$tmp.'"'; } ?> <?php $tmp = @$data->filter; if (isset($data->filter) && $data->filter !== "null" && $data->filter !== null && $data->filter !== false) {echo 'filter="'.$tmp.'"'; } ?> <?php $tmp = @$data->formatter; if (isset($data->formatter) && $data->formatter !== "null" && $data->formatter !== null && $data->formatter !== false) {echo 'formatter="'.$tmp.'"'; } ?> <?php $tmp = @$data->loader; if (isset($data->loader) && $data->loader !== "null" && $data->loader !== null && $data->loader !== false) {echo 'loader="'.$tmp.'"'; } ?> <?php $tmp = @$data->loadFilter; if (isset($data->loadFilter) && $data->loadFilter !== "null" && $data->loadFilter !== null && $data->loadFilter !== false) {echo 'loadFilter="'.$tmp.'"'; } ?> <?php $tmp = @$data->onBeforeLoad; if (isset($data->onBeforeLoad) && $data->onBeforeLoad !== "null" && $data->onBeforeLoad !== null && $data->onBeforeLoad !== false) {echo 'onBeforeLoad="'.$tmp.'"'; } ?> <?php $tmp = @$data->onLoadSuccess; if (isset($data->onLoadSuccess) && $data->onLoadSuccess !== "null" && $data->onLoadSuccess !== null && $data->onLoadSuccess !== false) {echo 'onLoadSuccess="'.$tmp.'"'; } ?> <?php $tmp = @$data->onLoadError; if (isset($data->onLoadError) && $data->onLoadError !== "null" && $data->onLoadError !== null && $data->onLoadError !== false) {echo 'onLoadError="'.$tmp.'"'; } ?> <?php $tmp = @$data->onSelect; if (isset($data->onSelect) && $data->onSelect !== "null" && $data->onSelect !== null && $data->onSelect !== false) {echo 'onSelect="'.$tmp.'"'; } ?> <?php $tmp = @$data->onUnselect; if (isset($data->onUnselect) && $data->onUnselect !== "null" && $data->onUnselect !== null && $data->onUnselect !== false) {echo 'onUnselect="'.$tmp.'"'; } ?>>
    <?php $data->displayChildren('all');?>
</select>