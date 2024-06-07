$(document).ready(function() {


   $('.slide_video').eq(0).addClass('active');
   $('.btn_indicator_slide').on('click', function(e) {

      // return 1; //Hapus baris ini agar slide bekerja dengan baik
      var btn_indicator_slide = $(this);
      var data_slide = btn_indicator_slide.attr('data-slide');
      var slide_video = $('.slide_video');
      var slide_video_active = slide_video.filter('.active');

      if ( data_slide == "next" ) {
         var slide_video_target = slide_video_active.next().filter('.slide_video');
         // Jika slide next habis, balikin ke awal
         if ( slide_video_target.length < 1 ) {
            slide_video_target = $('.slide_video').first();
         }
      }else if (data_slide == "prev"){
         // Jika slide next habis, balikin ke akhir
         var slide_video_target = slide_video_active.prev().filter('.slide_video');
         if ( slide_video_target.length < 1 ) {
            slide_video_target = $('.slide_video').last();
         }
      }

      //Buat semua slide yang sedang aktif jadi non aktif agar bisa di gantikan dan stop reset video didalamnya 
      slide_video_active.removeClass('active');
      stopVideo( slide_video_active );

      //Ubah slide target jadi aktif dan play video didalamnya 
      slide_video_target.addClass('active');
      playVideo( slide_video_target );
   });
   $('.btn_indicator_slide.right').click();

   //Jika video sudah selesai, maka slide pindah secara otomatis ke next
   $('video').on('ended', function(e) {
      $('.btn_indicator_slide.right').click();
   }); 


})

function playVideo( slide_video ) {
   var video_el = slide_video.find('video');
   var source_video = video_el[0]; //Jalanin source yang pertama pada el video
   source_video.play();
}
function pauseVideo( slide_video ) {
   var video_el = slide_video.find('video');
   var source_video = video_el[0]; //Jalanin source yang pertama pada el video
   source_video.pause();
}
function stopVideo( slide_video ) {
   var video_el = slide_video.find('video');
   var source_video = video_el[0]; //Jalanin source yang pertama pada el video

   source_video.pause();
   source_video.currentTime = 0; // Reset video to the beginning
}


// var player;
// function onYouTubeIframeAPIReady() {
   //   player = new YT.Player('yt_1', {
      //     events: {
         //       'onReady': onPlayerReady
         //    }
         // });

         // function playYT() {
            //    player.playVideo();
            // }
            // function stopYT() {
               //    player.stopVideo();

               // }