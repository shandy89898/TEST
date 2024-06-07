<!-- 
<div class="body_background">
    <img src="<?=base_url()?>asset/auth_asset/gam/bg.jpg">
</div> -->

<!-- Container Form -->
<div class="container_form">
    <div class="container-fluid">
        <div class="row justify-content-center">

            <!-- Box Form -->
            <div class="col-sm-7 box_form">     


                <div class="container-fluid">
                    <div class="row">
                        <!-- Left Section -->
                        <div class="col-md left_section">


                            <!-- Sign Page - Img Section -->
                            <div class="sign_page img_section">
                                <div class="content_section">
                                    <img src="<?=base_url()?>asset/main_asset/gam/logo_panjang.png">
                                    <h3> Register Your <br> Account </h3>
                                </div>
                            </div>
                            <!-- End Of Sign Page - Img Section -->

                            <!-- Login page - Form Section -->
                            <div class="login_page form_section">
                                <h1 class="page_title"> Login </h1>
                                <form method="post" action="<?=base_url()?>Auth/login">


                                    <div class="form-group">
                                        <label> User  / Email : </label>
                                        <input autosave type="text" name="user" class="form-control" required placeholder="Your Registred Email">
                                    </div>

                                    <div class="form-group">
                                        <label> Password : </label>
                                        <input autosave type="password" name="password" class="form-control"  required placeholder="Your Password">
                                    </div>

                                    <div class="form-group text-right">
                                        <button class="btn btn-success">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- End Of Login page - Form Section -->
                        </div>
                        <!-- End Of Left Section -->

                        <!-- Right Section -->
                        <div class="col-md right_section">

                            <!-- Login Page - Img Section -->
                            <div class="login_page img_section">
                                <div class="content_section">
                                    <img src="<?=base_url()?>asset/main_asset/gam/logo_panjang.png">
                                    <h3> Welcome Back <br> Mate </h3>
                                </div>

                            </div>
                            <!-- End Of Login Page - Img Section -->


                            <!-- Sign page - Form Section -->
                            <div class="sign_page form_section">
                                <h1 class="page_title"> Sign </h1>
                                <form method="post" action="<?= base_url() ?>Auth/sign">


                                    <div class="form-group">
                                        <label> Name : </label>
                                        <input autosave type="text" name="nama" class="form-control" required placeholder="Your Name">
                                    </div>

                                    <div class="form-group">
                                        <label> User : </label>
                                        <input autosave type="text" name="user" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label> Email : </label>
                                        <input autosave type="text" name="email" class="form-control" required placeholder="Your Email">
                                    </div>

                                    <div class="form-group">
                                        <label> Password : </label>
                                        <input autosave type="password" name="password" class="form-control"  required placeholder="Your Password">
                                    </div>

                                    <div class="form-group">
                                        <label> Confirm Password : </label>
                                        <input autosave type="password" name="password_confirm" class="form-control"  required placeholder="Confirm Pasword">
                                    </div>

                                    <div class="form-group text-right">
                                        <button class="btn btn-success">
                                            Sign
                                        </button>
                                    </div>

                                </form>
                            </div>
                            <!-- End Of Sign page - Form Section -->
                        </div>
                        <!-- End Of Right Section -->

                    </div>
                </div>

                <div class="indicator login" data_pageAuth_active="login">


                    <!-- Muncul Ketika login page sedang aktif ( Ada di posisi kanan ) -->
                    <div class="login_content">
                        <p class="mb-1"> Belum Daftar ? </p>
                        <a href="#sign_page" class="btn btn-secondary btn_auth">
                            <span> <i class="fas fa-arrow-left ml-2"></i> </span>
                            Daftar Disini 
                        </a>
                    </div>

                    <!-- Muncul Ketika sign page sedang aktif ( Ada di posisi kiri ) -->
                    <div class="sign_content">
                        <p class="mb-1"> Sudah Daftar ? </p>
                        <a href="#login_page" class="btn btn-secondary btn_auth">
                            Login Disini 
                            <span> <i class="fas fa-arrow-right ml-2"></i> </span>
                        </a>
                    </div>


                </div>

            </div>
            <!-- End Of Box Form -->
        </div>
    </div>

</div>
<!-- End Of Container Form -->



<script type="text/javascript">
        
  


</script>