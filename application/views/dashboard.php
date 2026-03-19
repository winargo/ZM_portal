<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <h4 class="header-title">Home</h4>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box col-sm-4 col-sm-offset-4">
                        <div class="row text-center">
                            <img src="<?php echo $this->session->userdata('picture'); ?>" width="80" style="border-radius:50%">
                            <h4><?php echo $this->session->userdata('name'); ?></h4>
                            <h5><?php echo $this->session->userdata('email'); ?></h5>
                            <h5><?php echo $this->session->userdata('role'); ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view("template/base-js.php") ?>
    </div>
</body>
</html>
