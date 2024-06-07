$(function(e) {
	// Untuk input comment paling pertama
	var input_comment_primer = $('.input_comment').not('.data_comment .input_comment');
	var input = input_comment_primer.find('.input_data_comment');
	input.on('click', function(e) {
		input_comment_primer.find('.form_submit').show();
	});


	$('.btn_toggle_comment').on('click', function(e) {
		toggle_comment( this );
	});
	$('.btn_toggle_cancel').on('click', function(e) {
		var input_comment = $(this).parents('.input_comment');
		// Cek apakah input comment primer atau input comment reply
		var valid_parent = input_comment.parents('.data_comment');
		if (  valid_parent.length < 1) {
			// Input comment yang paling pertama primer, ilangin input di form submitnya aja
			input_comment.find('.form_submit').hide();
		}else{
			// Input comment reply didalam data_comment. maka ilangin seluruh input di form
			input_comment.hide();
		}
	});

});
function toggle_comment( btn ) {
	btn = $(btn);
	var data_toggle_target = btn.attr('data-toggle-target');
	var data_comment = btn.parents('.data_comment');
	var jenis_data = data_comment.attr('data-jenis-comment');
	data_comment = data_comment.filter( "." + jenis_data );	
	switch( data_toggle_target ){
		case "open_input_reply" :
		open_input_reply( data_comment );
		break;
		case "open_comment_reply" :
		open_comment_reply( btn, data_comment );
		break;
	}
}
function open_input_reply( data_comment ) {
	var input_comment = data_comment.find('.input_comment');
	input_comment.show();
	input_comment.find('.input_data_comment').focus();
}
function open_comment_reply( btn, data_comment ) {
	var container_data_comment = data_comment.parents('.container_data_comment');
	var data_comment_reply = container_data_comment.find('.data_comment.reply');
	// Hitung data comment reply
	var count_reply = data_comment_reply.length;
	var text_btn;
	if ( data_comment_reply.is(':visible') ) {
		data_comment_reply.hide();
		text_btn = "Tampilkan " + count_reply + " balasan";
	}else{
		data_comment_reply.show();
		text_btn = "Sembunyikan " + count_reply + " balasan";
	}

	btn.find('span').text( text_btn );
}