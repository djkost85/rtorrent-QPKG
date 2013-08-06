//
// ruTorrent Torrent-Addition Auto-Labels
// Version 0.8 
// by thezwallrus
//

//
// jquery replace
//

$("#tadd_label").wrap('<div id="taddl_cont" />').remove();
$("#taddl_cont").append('<select id="tadd_label" name="tadd_label" style="width:120px;margin-left:4px;"></select>'+
			'<input type="text" id="newLabel" value="'+ theUILang.New_label +'" title="'+ theUILang.New_label +'" style="width:90px;"/>'+
			'<input type="button" id="add_newLabel" value="+" class="Button" style="width:30px;" />');
$("#tadd_label").append($('<OPTION></OPTION>')
		.val('')
		.text(''));

$('#addtorrent label').css({'margin-top':'4px'});
$('#addtorrent label:eq(4)').css({'margin-top':'10px'});
$('#addtorrenturl label').css({'margin-top':'4px'});

//
// jQuery listeners
//

var addLab = $('#add_newLabel');
addLab.click( function() {
	setTimeout( function() {
		$('#tadd_label')
		.append($('<OPTION></OPTION>')
		.val( $('#newLabel').val() )
		.text( $('#newLabel').val() )
		.attr('selected','selected') );
		$('#newLabel').val( $('#newLabel').attr('title') );
	}, 300)
});



var newLab = $('#newLabel');

newLab.focus( function() {
	if(this.value == $(this).attr('title')) {
		this.value='';
	}
});

newLab.blur( function() {
	if(this.value == '') {
		this.value = $(this).attr('title');
	}
});

//
// load labels into dropdown
//

theWebUI.initLabelDirs = function()
{
		setTimeout( function() {
			jQuery.each(theWebUI.cLabels, function(lbl, nothing) {
				$('#tadd_label').append($('<OPTION></OPTION>').val(lbl).html(lbl));
			})
		}, 3000 );
	        plugin.markLoaded();
};

theWebUI.initLabelDirs();
