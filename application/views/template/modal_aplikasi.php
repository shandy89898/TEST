

<script type="text/javascript" src="<?= base_url() ?>asset/main_asset/js/sweetalert2.js"></script>




<?php 

    // Ingat $this->session->flashdata() mengembalikan nilai arraay associatif, dengan [ "key_flash", 'flashdata' ] 
    //Kita tampung flash yang sudah diset, dan kita keluarkan semuanya
    // Hal ini dilakukan agar tidak adanya msg flash data yang terlewat dan ditampilkan secara otomatis
  //Kenapa key ikutan di libatkan, agar jika mendebug error leih udah dilakukan
$flash_ready = []; //Berbentuk array associatif
foreach ($this->session->flashdata() as $key_flash => $msg_flash ) {
    $flash_ready[ $key_flash ] = $msg_flash;
}
?>


<?php foreach ($flash_ready as $key_flash => $msg_flash ): ?>
    <script type="text/javascript">
      Swal.fire({
        title: "<?= $msg_flash ?>",
        icon: "info",
    });
</script>
<?php endforeach ?>