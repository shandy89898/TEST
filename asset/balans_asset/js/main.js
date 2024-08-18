

function upload_file(obj, dataFile, callback ) {
	var inputUpload = $(obj);
	//Methode untuk mengambil dan membuat link source file 
	var file = dataFile.target.files[0]; 
	var fileName = file.name; // Mengambil nama file
	var fileSrc = URL.createObjectURL(file);
	//Menampilkan gambar di frame elemen dan hilangkan efek border

	/*Jadi pada fungsi call back ini, 
	argument 1 adalah nilainya string berupa nama file
	argument 2 adalah nilainya string beerupa url file 
	*/
	callback( fileName, fileSrc );

	console.log("Nama file:", fileName); // Menampilkan nama file di konsol
}
function upload_file_template( file_name ) {
	console.log(1);
	var container_form = $('.container_formUpload');
	var before = container_form.find('.before');
	var after = container_form.find('.after');

	before.hide();
	//Buat konten kata katanya pada section after
	after.find('#file_name').text( file_name );
	after.show();
}

$(document).ready(function(e) {	






	//======================================== EVENT UNTUK HALAMAN BERKAITAN SIDEBAR ADMIN =====================

	//Membuat semua div parent yang memiliki table memiliki batasan maksimal lebar jika si table lebarnya melebihi ukuran si parent tersebut karena suatu konten kolomnya
	//Dilakukan di javascript agar menjadi otomatis di semua halaman terkait sidebar pada halaman admin itu memiliki case tersebut dengan pasti halaman terkait sidebar untuk content memiliki nama class .content_prime
	var table = $('.content_prime .table');
	var parent_table = table.parents('div');
	parent_table.css({
		'max-width' : "100%",
		'overflow' : "auto",
	});


	//Event untuk upload file pada template
	$('input[name=upload_file_template]').on('change', function(file) {
		var input_file = $(this);
		upload_file( input_file, file, function(  file_name  ) {
			upload_file_template( file_name );
		} );
	});

	//Event untuk upload file gambar pada produk, dengan elemen input tipe files yang akan bekerja yang memiliki class file_img
	// $('#modal_tambah_data').modal('show');

	$('.container_formUpload.upload_img').find('input[type=file]').on('change', function( file ) {
		var input_file = $(this);
		upload_file( input_file, file, function(  file_name, file_src  ) {

			var input_file = $(this);
			var parent_input = input_file.parents( '.container_formUpload' ); //Anggaplah div apa saja
			var frame_img = parent_input.find('.frame');	
			var img_thumb = frame_img.find('img');

			frame_img.show();
			img_thumb.attr('src', file_src );
		} );


	});



	// Event untuk header_menu_data di sidebar admin
	$('.header_menu_data').on('click', function() {
		var header_menu_data = $(this);
		var row_menu = header_menu_data.parents('.row_menu');
		var container_sub_menu = row_menu.find('.container_sub_menu');
		var time = 100;	

		if ( !container_sub_menu.is(':visible') ) {
			//Jika sub menu tertutup, maka buka
			container_sub_menu.show( 5, function () {
				$('html').bind('click', function(e) {
					// Hingakan sub menu dari row menu yang sedang terbuka
					var target = $(e.target);
					var row_menu_active = $('.row_menu').filter(':visible');
					var container_sub_menu_active = row_menu.find('.container_sub_menu');
					container_sub_menu_active.hide();
					$('html').unbind('click');
				});
			} );

		}
	});

	// Untuk fungsi jika ada yasng input file upload gambar
	$('.upload_img').find('input[type=file]').on('change', function(dataFile) {
		upload_img_produk( this, dataFile, '.upload_img img' );
	});

	//Tombol untuk memunculkan sidebar
	$('.btn_sidebar').on('click', function(e) {

		var btn_sidebar = $(this);
		//Jika terdapat sidebar right untuk cart saat event btn sidebar 
		var parent = btn_sidebar.parents('.icon_nav.cart');
		if ( parent.length > 0 ) {
			// Jika parentnya merupakan cart elemen
			var sidebar =  $('.sidebar_right');
		}else{
			// Jika sidebarnya adalah untuk sidebar biasa
			var sidebar = $('.sidebar').filter('.sidebar_left');
		} 

		if ( sidebar.is(':visible') ) {
			// Jika sidebar sedang muncul, maka hilangkan 
			sidebar.hide();
			// alert('hilang');

		}else{
			// Jika sidebar sedang hilang, maka munculkan 
			sidebar.show();
			// alert('muncul');
		}
	});
	//Tombol untuk menghilangkan sidebar
	$('.btn_close').on('click', function(e) {
		var btn_close = $(this);
		var sidebar = btn_close.parents('.sidebar');
		sidebar.hide();
	});

	// ++++++ Event berkaitan dengan nav header dengan modal untuk mobile dan dekstop +++++++
	// Tombol untuk memunculkan menu modal pada nav responsive untuk tampilan website
	$('.nav_responsive .row_dekstop').on('click', function(e) {
		var row_dekstop = $(this);
		var nav_responsive = row_dekstop.parents('.nav_responsive');
		var row_menu_modal = nav_responsive.find('.row_menu_modal');
		var menu_modal = row_menu_modal.find('.menu_modal');
		var icon = row_dekstop.find('.icon i');
		if ( menu_modal.is(':visible') == false ) {
			menu_modal.show( function(e) {
				$('html').bind('click', function(e) {
					var el_target = $(e.target);
					if ( el_target.is('.nav_responsive') == false ) {
						//Jika yang dia klik bukan menu responsive
						menu_modal.hide();
						$('html').unbind('click');
					}
				});
			} );
			icon.removeClass('fa-chevron-right');
			icon.addClass('fa-times');
		}else{
			menu_modal.hide();
			icon.removeClass('fa-times');
			icon.addClass('fa-chevron-right');
		}

	});
	// Tombol untuk memunculkan menu modal pada nav responsive untuk tampilan mobile
	$('.nav_responsive .row_mobile .user_img_el').on('click', function(e) {
		var nav_responsive = $(this).parents('.nav_responsive');
		var menu_modal = nav_responsive.find('.menu_modal');
		menu_modal.show('slide', function() {
			$('html').bind('click', function(event) {
				//Cek apakah obj yang yang diklik itu berupa objek nav itu sendiri atau bukan, jika bukan maka tutup nav, jika iya maka nav tetap terbuka

				var el_event = $( event.target ); //Untuk akses bentuk objek dari eventnya saaat klik di suatu area 
				if ( el_event.is('.menu_modal') == false ) {
					//Jika objek yang diklik bukan bgian dari dari menu_modal, maka tutup menu modalnya tersebut
					menu_modal.hide();
					$('html').unbind('click'); //Agar fungsi event klik tidak terjadi lagi saat nav sudah tertutup dan mencegah konflik
				}	
			});
		});

	});
	// ++++++ Event berkaitan dengan nav header dengan modal untuk mobile dan dekstop +++++++

	//======================================== EVENT UNTUK HALAMAN BERKAITAN SIDEBAR ADMIN =====================





	//======================================== EVENT UNTUK HALAMAN LANDING =====================

	// ++++++ event terkait nav pada landing ++++

	// btn content menu di menu section pada navigasi header
	$('.btn_content_menu').on('click', function(e) {

		// alert();

		var btn_content_menu = $(this);
		var content_menu_target = btn_content_menu.parents('.content_menu');

		$('html').unbind('click');

		//Jika yang dikliknya itu  adalah content menu yang sudah aktif, maka jangan dilanjutkan. Cukup hilangkan saja content menu yang dipilih
		// if ( content_menu_target.is('.content_menu.active') ) {	
		// 	content_menu_target.removeClass('active');
		// 	return false; //Menghentikan laju fungsi
		// }

		// non aktifkan content menu yang bukan di pilih
		$('.content_menu').removeClass('active');

		//Jika yang dipilih itu adalah content menu yang sedang aktif juga, maka jangan beri dia aktif
		// Jika yang dipilih tidak sedang aktif, maka buat dia aktif, tapi jika sedang aktif maka jangan buat dia aktif
		content_menu_target.addClass('active');

		// Jika yang diklik adalah elemen selain .menu_section_container dan para child di dalamnya maka tutup content_menu 
		setTimeout(function(e) {
			$('html').bind('click', function(e) {
				var obj_click = $( e.target );
				if ( obj_click.is('.menu_section_container') == true || obj_click.is('.menu_section_container *') == true  ) {

					//Jika yang diklik merupakan area menu section sidebar dan didalamnya, maka tidak di tutup menu section sidebarnya
					console.log('Yang diklik area menu section sidebar');
				}else{
					//Jika yang di klik bukan menu_section_container yang berarti di conten_ menu yang sedang aktif maka non aktifkan semua content_menu
					$('.content_menu').removeClass('active');
					$('html').unbind('click');
				}
			});
		}, 100);


	});
	// $('.btn_content_menu').eq(0).click();


	//Untuk btn close setiap fitur pada nav 
	$('header .btn_close_fitur').on('click', function(e) {
		var btn_close_fitur = $(this);
		var col_header_row = btn_close_fitur.parents('.col_header_row');
		// Cek apakah param mobile muncul atau tidak
		//Jika tidak muncul ( display = none ) , artinya web berada di tampilan mobile dan jika muncul ( display != none ) artinya web berada bukan responsive
		var el_param_mobile = col_header_row.find('.param_mobile');
		var param_mobile = el_param_mobile.is( ":visible" );
		var content_menu_target = col_header_row.parents('.content_menu');
		if ( param_mobile == true ) {
			//Jika muncul dan di tampilan mobile, maka hanya tutup fitur tempat dia berada saja atau yang sedang aktif
			var row_menu_fitur = content_menu_target.find('.row_menu_fitur.data_jenis_fitur');
			var content_section_fitur = content_menu_target.find('.content_section');

			hide_contentSection( row_menu_fitur, content_section_fitur );

		}else{

			//Jika muncul dan di tampilan web, maka hanya tutup semua content menu
			console.log('Tutup fitur untuk event di device web');

			var content_menu = $('.content_menu');
			content_menu.removeClass('active');

		}
	});

	// Event untuk memunculkan ( Bentuk bars ) dan menghilangkan ( Bentuk silang )nav menu section  pada bentuk responsive
	$('header .btn_nav_header').on('click', function(e) {
		var header = $( this ).parents('header');
		var menu_section = header.find('.menu_section');
		if ( menu_section.is(':visible') == false) {

			// Ketika navnya sedang hilang, maka munculkan
			menu_section.show(); 
		}else{
			// Ketika navnya sedang muncul, maka hilangkan
			menu_section.hide();
		}
	});

	// ++++++ End Of untuk event terkait nav pada landing ++++



	// Untuk section tap slide pada landing page
	$('.indicator_col').on('click', function(e) {
		// Agar script ini bisa bekerja untuk lebih dari section dengan konsep yang sama dan tidak akan tertukar
		var indicator_col_target = $(this);//Yang barusan dipilih
		var section_slide = indicator_col_target.parents('.section_slide');



		//Buat indicator col yang sebelumnya aktif jadi tidak aktif
		var indicator_col_active = section_slide.find('.indicator_col').filter('.active');
		if ( indicator_col_active.length > 0 ) {
			indicator_col_active.removeClass('active');
		}

		//Buat indicator col yang barusan dipilih jadi aktif 

		indicator_col_target.addClass('active');

		// Kemudian terapkan ke yang slide terkait
		var data_idTarget_slide = indicator_col_target.attr('data-idTarget-slide');
		var id_target = "#" + data_idTarget_slide;


		var my_slide = section_slide.find('.my_slide');
		var my_slide_target = my_slide.filter(id_target);

		// Hilangkan dulu slide yang sedang tampil
		my_slide.hide();
		my_slide.removeClass('active');

		//Munculkan my slide target 
		my_slide_target.show('slide');
		my_slide_target.addClass('active');

	});
	//Mengklik indicator section slide dengan index awal di semua section slide agar slide pertama muncul
	var section_slide = $('.section_slide');
	for (var i = 0; i < section_slide.length; i++) {
		var section_slide_target = section_slide.eq(i);
		var indicator_first = section_slide_target.find('.indicator_col').first();
		indicator_first.click();
	}

	// Ketika data_jenis_fitur sudah diklik berdasarkan data relasi 
	$('.row_menu_fitur.data_jenis_fitur').on('click', function(e) {
		var row_menu_jenisFitur = $(this);
		var data_idJenis_fitur = row_menu_jenisFitur.attr('data-idJenis-fitur');
		var content_menu = row_menu_jenisFitur.parents('.content_menu');
		var content_section_target = content_menu.find('.content_section.data_jenis_fitur').filter( "#" + data_idJenis_fitur );

		// Tutup semua yang sedang aktif, rowm_menu_fitur dan content_section
		hide_contentSection(
			content_menu.find('.row_menu_fitur.data_jenis_fitur'),
			content_menu.find('.content_section.data_jenis_fitur')
			);

		// Buat semua aktif untuk row_menu_fitur dan content_section
		row_menu_jenisFitur.addClass('active');
		content_section_target.addClass('active');

	});
	//Jika param mobile tidak muncul dan di tampilan web
	// Note : jika kita pake visible gfak akan bener, karena walupun di tampilan mobile param mobile sudah menjadi display block, tapi akan tetap visiblenya false atau dianggap hilang. Karena parentnya dia itu secara default memang hilang.
	// Maka dari itu kita pake nilai dengan properti display untuk jadikan parameter nilai kondisi
	if ( $('.param_mobile').css('display') == "none" ) {
		//Jika berada di tampilan web
		open_first_contentSection();
	}

	// Untuk faq
	$('.header_faq').on('click', function(e) {
		faq_event(this);
	});

	//======================================== END OF EVENT UNTUK HALAMAN LANDING =====================


	//======================================== EVENT UNTUK HALAMAN AUTH =====================
	// Login Indicator
	$('.indicator .btn_auth').on('click', function(e) {

		var btn_auth = $(this);
		indicator_pageAuth( btn_auth );

	});
	$('.login_page.img_section, .login_page.form_section').addClass('active');
	$('.sign_page.img_section, .sign_page.form_section').addClass('out');

	//Penentuan siapa yang akan terbuka terlebih dahulu
	var target_id = window.location.hash; //Berisi nilai #nilai_target pada url, contoh https://domain.com#user, maka dia akan mengambil #user
	if ( target_id == "#sign_page" ) {
		//Jika targetnya pada link url ada hash #sign, maka buka page yang sign. Ini adalah antisipasi ketika sedang buka sign page kemudian gak sengaja ke refresh, maka page sign langsung terbuka. Ini terjadi karega pertama kalin page di reload yang pertama kali terbuka pasti page login,maka alihkan dengan tanda hash sign 
		var btn_auth_sign = $('.sign_content .btn_auth');
		btn_auth_sign.click();
	}
	//======================================== END OF EVENT UNTUK HALAMAN AUTH =====================

});






function open_first_contentSection() {
	//Pencet seluruh row_menu_fitur untuk index awal dari setiap content menu agar seluruh content section urutan index awal di setiap menu section container terbuka
	for (var i = 0; i < $('.content_menu').length; i++) {
		var content_menu = $('.content_menu').eq(i);
		var row_menu_jenisFitur = content_menu.find('.row_menu_fitur.data_jenis_fitur').eq(0);
		row_menu_jenisFitur.click();
	}

}

function hide_contentSection( row_menu_fitur, content_section ) {
	// INGAT!! Untuk menghilangkan content_section harus dibarengi dengan row_menu_fitur karena keduanya saling berhubungan dan akan mempengaruhi fungsi event lainnya 
	// dan juga row_menu_fiturnya itu yang ada class .data_jenis_fitur agar fungsi bisa berjalan

	row_menu_fitur.removeClass('active');
	content_section.removeClass('active');
}

function indicator_pageAuth(btn_auth) {

	//Note btn_auth itu berbentuk link
	var indicator_el = btn_auth.parents('.indicator');
	var page_auth_active = indicator_el.attr('data_pageAuth_active'); 

	// alert( btn_auth.attr('href') );
	if ( page_auth_active == "login" ) {
		//Jika yang sedang aktif atau muncul untuk page login, maka tampilkan sign page dan page auth active diubah ke sign pada fungsi yang dijalankan.
		signPage_active( indicator_el );
		btn_auth.attr('href', '#sign_page');

	}else if ( page_auth_active == "sign" ){
		//Jika yang sedang aktif atau muncul untuk page sign, maka tampilkan page login dan page auth active diubah ke login pada fungsi yang dijalankan 
		loginPage_active( indicator_el );
		btn_auth.attr('href', '#login_page');

	}

}


// ---------------------------------------- Event Berkaitan Dengan di Landing 


function faq_event(obj) {
	var header_faq = $(obj);
	var box_faq_target = header_faq.parents('.box_faq');

	//Jika box_faq yang dipilih itu tadinya sudah buka atau aktif, maka tutup yang box_faq yang dipilih saja.
	if ( box_faq_target.filter('.active').length > 0 ) {
		box_faq_target.removeClass('active');
		return false; //Menghentikan laju fungsi
	}

	//Hilangkan aktif di semua box_faq 
	$('.box_faq').removeClass('active');

	//Jadikan box_faq_target jadi aktif
	box_faq_target.addClass('active', 'blind');
}


// ---------------------------------------- Event Berkaitan Dengan di Landing 



function get_interval_animasi( selector ) {
	// Ini bekerja dengan sesuai hanya untuk case yang login page
	var interval_animasi = $(selector).css('transition-duration');
	interval_animasi = interval_animasi.split('');
	var last_index = interval_animasi.length - 1;
	interval_animasi.splice( last_index, 1 );
	interval_animasi = parseFloat( interval_animasi );
	interval_animasi = interval_animasi * 1000;//Ingat 1s itu adalah 1000ms
	interval_animasi = interval_animasi - ( interval_animasi * 90 / 100 );

	return interval_animasi; //Dikemabalikan masih dalam satuan second
}

function get_durasi_animasi( selector ) {
	// Ini bekerja dengan sesuai untuk semua

	var interval_animasi = $(selector).css('transition-duration');
	interval_animasi = interval_animasi.split('');
	var last_index = interval_animasi.length - 1;
	interval_animasi.splice( last_index, 1 );
	interval_animasi = interval_animasi.join("");
	interval_animasi = parseFloat( interval_animasi );
	interval_animasi = interval_animasi * 1000;//Ingat 1s itu adalah 1000ms

	return interval_animasi; //Dikemabalikan dalam kondisi sudah satuan milisecond
}

function signPage_active( indicator_el ) {



	// AKan bekerja ketika yang aktif adalah login dan membuat sign page masuk, login page keluar 

	var sign_page = $('.sign_page');
	var login_page = $('.login_page');

	//Yang keluar adalah login page untuk .form_section dan .img_section 
	login_page.addClass('out');

	// Setelah interval animasi keluar selesai, maka yang masuk adalah sign page untuk form_section dan img_section
	var interval_animasi = get_interval_animasi( '.form_section' );
	sign_page.show();
	setTimeout(function() {

		// Hilangkan active pada yang login page dan hilangkan juga login page 
		login_page.removeClass('active');
		login_page.hide();

		//Form Sign Masuk
		sign_page.addClass('active');
		sign_page.removeClass('out');

		// Ubah Parameter di Indicator, karena sekarang sign aktif maka isi dengan nilai sign
		// dan ubah juga posisinya. Jika sign page active atau muncul, maka indicator ada di kiri
		indicator_el.removeClass('login');
		indicator_el.addClass('sign'); //Supaya pindah ke kiri
		indicator_el.attr('data_pageAuth_active', "sign");

	}, interval_animasi);

}


function loginPage_active( indicator_el ) {




	// Akan bekerja ketika yang aktif adalah sign page dan membuat login page masuk kemudian sign page keluar 

	var sign_page = $('.sign_page');
	var login_page = $('.login_page');

	//Yang keluar adalah sign page untuk .form_section dan .img_section 
	sign_page.addClass('out');

	// Setelah animasi keluar, maka yang masuk adalah login page untuk form_section dan img_section
	var interval_animasi = get_interval_animasi( '.form_section' );
	login_page.show();
	setTimeout(function() {

		// Hilangkan active pada yang sign page 
		sign_page.removeClass('active');
		sign_page.hide();

		//Form Login Masuk
		login_page.addClass('active');
		login_page.removeClass('out');

		// Ubah Parameter di Indicator, karena sekarang login aktif maka isi dengan nilai login
		// dan ubah juga posisinya. Jika login page active atau muncul, maka indicator ada di kanan
		indicator_el.removeClass('sign');
		indicator_el.addClass('login'); //Supaya pindah ke kanan
		indicator_el.attr('data_pageAuth_active', "login");


	}, interval_animasi);



}



function upload_img_produk(obj, dataFile, img_frame_el) {
	var inputUpload = $(obj);
	//Methode untuk mengambil dan membuat link source file 
	var file = dataFile.target.files[0]; 
	var fileSrc = URL.createObjectURL(file);
	//Menampilkan gambar di frame elemen dan hilangkan efek border
	var img_frame = $( img_frame_el );
	img_frame.attr('src', fileSrc);
	img_frame.show();

	$('.gambar h1').remove();
}



