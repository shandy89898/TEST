$(document).ready(function(e) {
	$('.content_search .col_search').on('click', function(e) {
		var col_search =$(this);
		var content_search = col_search.parents('.content_search');
		var btn_closeSearch = content_search.find('.btn_closeSearch');
		btn_closeSearch.show();
		if ( content_search.hasClass('active') == false ) {
			//Jika dia sedang tidak sedang aktif, maka aktifkan
			content_search.addClass('active');
			$('html').bind('click', function(e) {
				var target_click = $(e.target);
				if ( target_click.is('.col_search *') == false ) {
					// Jika yang di klik buka input, maka tutup content search
					close_search();
				}
			});
		}

	});
	$('.btn_closeSearch').on('click', function(e) {
		close_search();
	});

	// Modal pop up untuk setiap produk
	$('.btn_popup_info').on('click', function(e) {
		var btn_popup_info = $(this);
		var card_data = btn_popup_info.parents('.card_data');
		var popUp_info_target = card_data.find('.popUp_info');

		//Tutup atau nonaktifkan semua popup_info yang sedang aktif 
		close_popUpInfo();
		popUp_info_target.addClass('active');
	});
	$('.btn_close_popup, .backdrop').on('click', function(e) {
		close_popUpInfo();
	});

	// Indicator nilai stok yang dipesan setiap item produk
	$('.indicator_box').find('button').on('click', function(e) {
		// Perhatikan untuk setiap id pada button di indicator box tidak boleh diubah ubah agar aevent js tidak error
		var btn_indicator_qty = $(this);
		var indicator_box = btn_indicator_qty.parents('.indicator_box');
		var id_btn = btn_indicator_qty.attr('id');
		var input_qty = indicator_box.find('input');
		var nilai_qty = input_qty.val();


		// Setiap id button tersebut punya fungsinya yang berbeda
		//Jadi setiap button di klik akan dilakukan proses increment ( btn_plus_indicator ) atau proses decrement ( btn_minus_indicator ) terhadap nilai input sesuai dengan jenis id button tersebut
		if (  id_btn == "btn_plus_indicator" ) {
			nilai_qty++;
		}else if ( id_btn == "btn_minus_indicator" ) {
			// Berikan batasan agar nilainya qty yang dipesan tidak boleh nol atau kurang dari nol. Jadi jika btn minus di pencet dan pesanan ada di 1, maka tidak bisa decrement dan di update nilainya, karena nanti hasilnya jadi nol atau kurang dari nol dan itu gak boleh.
			if ( nilai_qty <= 1 ) {
				console.log('Pesanan gak boleh 0 atau minus!');
				return false;
			}
			nilai_qty--;
		}

		//Update ke input
		input_qty.val( nilai_qty );

	})
	// Disable input untuk yang ada di dalam indicator box, agar user tidak bisa mengotak ngatik
	var indicator_box = $('.indicator_box');
	var input_qty = indicator_box.find('input');
	input_qty.prop('readonly', true);


});

function close_popUpInfo() {
	$('.popUp_info').removeClass('active');
}

function close_search() {
	$('.content_search').removeClass('active');
	$('html').unbind('click');
	$('.btn_closeSearch').hide();
}