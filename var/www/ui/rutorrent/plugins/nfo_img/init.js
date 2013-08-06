plugin.loadLang();

if(plugin.enabled && plugin.canChangeMenu()) {
	theWebUI.showNfoImg = function(id) {
		$("#nfoimg_html").html("Checking...");
		theDialogManager.show("dlg_nfoimg");

		var AjaxReq = jQuery.ajax({
			type: "GET",
			timeout: theWebUI.settings["webui.reqtimeout"],
			async : true,
			cache: false,
			data: "id=" + id,
			url: "plugins/nfo_img/check.php",
			success: function(data){
				if(data == 'not_found') {
					theDialogManager.hide("dlg_nfoimg");
					askYesNo(theUILang.nfoImgNotFoundTitle, theUILang.nfoImgNotFound, "");
					return;
				}
				if(data.substr(0,5) == 'error' || data == '') {
					if(data == '') {
						data = 'error:undefined error';
					}
					theDialogManager.hide("dlg_nfoimg");
					askYesNo(theUILang.nfoImgErrorTitle, theUILang.nfoImgError+data.substr(6), "");
					return;
				}
				$("#nfoimg_html").html(''+
					'<img style="border: 0; padding: 0; margin: 0;" src="plugins/nfo_img/get_img.php?id='+data+'" />'+
					'<form name="nfo_img2" method="GET" action="/plugins/nfo_img/get_img.php" style="padding-top: 8px;">'+
					'<input type="hidden" name="id" value="'+data+'" /><input type="hidden" name="save" value="save" />'+
					'<input type="submit" value="Save image..." /></form>');
				$("#nfoimg_html img").bind("contextmenu",function(e) { e.stopPropagation(); });
				theDialogManager.center("dlg_nfoimg");
			}
		});
	}

	plugin.createMenu = theWebUI.createMenu;
	theWebUI.createMenu = function(e, id) {
		plugin.createMenu.call(this, e, id);
		if(plugin.enabled) {
			theContextMenu.add([theUILang.showNfoImg, "theWebUI.showNfoImg('"+id+"')"]);
			theDialogManager.make( 'dlg_nfoimg', 'NFO Image', '<div style="text-align: center;  padding: 8px; overflow: auto; width: 656px; height: 496px" id="nfoimg_html">Loading...</div>');
		}
	}
}
