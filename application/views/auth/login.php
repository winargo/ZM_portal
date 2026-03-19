<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="wrapper-page">
                <div class="m-t-40 card-box">
                    <div class="text-center">
                        <h2 class="text-uppercase m-t-0 m-b-30">
                            <a href="/" class="">
                                <span><img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="" height="30">
                                <span style="color:#626773 !important;font-size:21px">Biller Management</span>
                            </span>
                            </a>
                        </h2>
                    </div>
                    <div class="account-content">
                        <form action="<?php echo site_url('login') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group m-b-20">
                                <div class="col-xs-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" required="" autofocus>
                                </div>
                            </div>
                            <div class="form-group m-b-20">
                                <div class="col-xs-12">
                                    <a class="text-muted pull-right font-14" href="/forget-password">Forgot Your Password ?</a>
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" required="">
                                </div>
                            </div>
                            <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert-danger text-center" style="background-color:white">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                            <?php endif; ?>
                            <div class="form-group account-btn text-center m-t-10">
                                <div class="col-xs-12">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
