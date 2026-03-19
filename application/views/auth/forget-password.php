<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="wrapper-page">
                <div class="m-t-40 card-box">
                    <div class="text-center">
                        <h2 class="text-uppercase m-t-0 m-b-30">
                            <a href="/" class="text-success">
                                <span><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" height="30"></span>
                                <span style="color:#626773 !important;font-size:21px">Biller Management</span>
                            </a>
                        </h2>
                    </div>
                    <div class="account-content">
                        <form class="form-horizontal" method="POST" action="/">
                            <div class="form-group m-b-20">
                                <div class="col-xs-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" required="" autofocus>
                                </div>
                            </div>
                            <div class="form-group account-btn text-center m-t-10">
                                <div class="col-xs-6">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                                </div>
                                <div class="col-xs-6">
                                    <a href="/login" class="btn btn-lg btn-default btn-block" type="submit">Cancel</a>
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
