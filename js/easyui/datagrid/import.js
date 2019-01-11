PzkEasyuiDatagridImport = PzkObj.pzkExt({
	init: function() {
		var that = this;
		var $fileUpload = $('#file-' + this.id);
		$fileUpload.change(function(evt){
			var file    = evt.target.files[0];
			var reader  = new FileReader();

			reader.addEventListener("load", function () {
				var items = [];
				var str = reader.result;
				var lines = str.split(/\r\n|\r|\n/g);
				lines.forEach(function(line, index) {
					if(index > 20) return false;
					try {
						var item = JSON.parse(line);
						items.push(item);
					} catch(err) {
						console.log(err);
					}
				});
				console.log(items);
				that.sampleItems = items;
				that.next();
				that.previewImport();
			}, false);

			if (file) {
					reader.readAsText(file);
			}
		});
	},
	startOver: function() {
		var tabs = jQuery('#tabs-'+this.id);
		tabs.tabs('select', 0);
		var result = jQuery('#result-'+this.id);
		result.html('Nhấn nút hoàn thành để bắt đầu');
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
	getCurrentIndex: function() {
		var tabs = jQuery('#tabs-'+this.id);
		var tab = tabs.tabs('getSelected');
		var index = tabs.tabs('getTabIndex',tab);
		return index;
	},
	getGrid: function() {
		return pzk.elements[this.gridId];
	},
	getFieldsJQuery: function() {
		return $('#fields-'+this.id);
	},
	previewImport: function() {
		var that = this;
		var item = that.sampleItems[0];
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
					
				fieldTable += `</tr></table>`;
				that.getFieldsJQuery().html(fieldTable);
	}
});