  $(function(e) {

    // Merubah semua text area didalam form ke bentuk bagus teaxtarea dan harus terhubung ke library summernote
    $('form textarea').summernote();


    $('.btn_opt').on('click', function(e) {
      var btn_opt = $(this);
      var kolom_opt = btn_opt.parents('.kolom_opt');
      var menu_opt = kolom_opt.find('.menu_opt');
      menu_opt.show( function(e) {
        //Call back, jika terbuka dan user klik elemen lain, maka elemen ini akan tertutup
        $( 'html').bind('click', function(e) {
          var target_click = $(e.target);
          //Jika bukan menu row yang sedang dibuka yang di klik, maka menu row ini akan tertutup 
          if ( target_click.is('.menu_opt ') == false ) {
            menu_opt.hide();
          }
          //Batalkan event html agar keadaan kembali ke semula 
          $( 'html' ).unbind('click');
        });
      } );
    });

    $('.box_upload').find('input[type=file]').on('change', function(dataFile) {
      upload_img_produk( this, dataFile );
    });

  });

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

  function upload_img_produk(obj, dataFile, img_frame_el = ".img_frame" ) {


    var inputUpload = $(obj);

    //Methode untuk mengambil dan membuat link source file 
    var file = dataFile.target.files[0]; 
    var fileSrc = URL.createObjectURL(file);
    //Menampilkan gambar di frame elemen dan hilangkan efek border
    var img_frame = $( img_frame_el );
    img_frame.attr('src', fileSrc);
    img_frame.show();


    // Implementasikan gambar
    $('.before_upload').hide();
    $('.after_upload').show();

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

  //Event untuk upload file pada template
  $('input[name=upload_file_template]').on('change', function(file) {
    var input_file = $(this);
    upload_file( input_file, file, function(  file_name  ) {
      upload_file_template( file_name );
    } );
  });


































  