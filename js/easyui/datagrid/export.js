PzkEasyuiDatagridExport = PzkObj.pzkExt({
	startOver: function() {
		var tabs = jQuery('#tabs-'+this.id);
		tabs.tabs('select', 0);
		var result = jQuery('#result-'+this.id);
		result.html('Nhấn nút hoàn thành để bắt đầu');
	},
	startExport: function() {
		var tabs = jQuery('#tabs-'+this.id);
		tabs.tabs('select', 3);
		var result = jQuery('#result-'+this.id);
		result.html('Đang export...');
		var item = this.item;
		var fieldsJQuery = this.getFieldsJQuery();
		var fields = [];
		for (var field in item) {
			var checked = fieldsJQuery.find('[name="selected['+field+']"]')[0].checked;
			if(checked) {
				var fieldOptions = {};
				fieldOptions.index = field;
				fieldOptions.title = fieldsJQuery.find('[name="title['+field+']"]').val();
				fieldOptions.map = fieldsJQuery.find('[name="map['+field+']"]').val();
				fields.push(fieldOptions);
			}
		}
		var grid = this.getGrid();
		var type = jQuery('#tabs-' + this.id).find('[name=type]').val();
		var range = jQuery('#tabs-' + this.id).find('[name=range]').val();
		if(range === 'search') {
			var searchOptions = window[this.searchOptions];
			var options = searchOptions();
			options.fieldOptions = fields;
			grid.export(options, type, function(){
				result.html('Đã export xong');
			});
		} else {
			grid.export({
				fieldOptions: fields
			}, type, function(){
				result.html('Đã export xong');
			});
		}
		
	},
	next: function() {
		var tabs = jQuery('#tabs-'+this.id);
		var index = this.getCurrentIndex();
		if(index < 3)
			tabs.tabs('select', index+1);
	},
	prev: function() {
		var tabs = jQuery('#tabs-'+this.id);
		var index = this.getCurrentIndex();
		if(index > 0)
			tabs.tabs('select', index-1);
	},
	onSelect: function() {

	},
	getCurrentIndex: function() {
		var tabs = jQuery('#tabs-'+this.id);
		var tab = tabs.tabs('getSelected');
		var index = tabs.tabs('getTabIndex',tab);
		return index;
	},
	init: function() {
		var that = this;
		var grid = this.getGrid();
		grid.getRows({}, function(resp){
			var item = resp.rows[0];
			that.item = item;
			var fieldTable = `<table border="1" style="border-collapse: collapse; width: 100%;">
					<tr>`;
					for(var field in item) {
						fieldTable += `<th>`+field+`</th>`;
					}
					
					fieldTable += `</tr>
					<tr>`;
					for(var field in item) {
						fieldTable += `<td><input type="checkbox" checked="checked" name="selected[`+field+`]" /></td>`;
					}
					fieldTable += `</tr><tr>`;
					for(var field in item) {
						fieldTable += `<td><input type="text" placeholder="title for `+field+`" name="title[`+field+`]" /></td>`;
					}
					fieldTable += `</tr><tr>`;
					for(var field in item) {
						fieldTable += `<td><textarea placeholder="map for `+field+`" name="map[`+field+`]"></textarea></td>`;
					}
						
					fieldTable += `</tr></table>`;
					that.getFieldsJQuery().html(fieldTable);
		});
	},
	getGrid: function() {
		return pzk.elements[this.gridId];
	},
	getFieldsJQuery: function() {
		return $('#fields-'+this.id);
	}
});