<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="">
            <a href="/" class="logo">
                <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo" class="logo-lg" />
                <div style="display:inline">Biller Management</div>
            </a>
        </div>
    </div>
    <!-- Top navbar -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <ul class="nav navbar-nav hidden-sm hidden-xs top-navbar-items pull-right">
                    <li><a href="/">Home</a></li>
                    <?php $this->load->view("component/list-pages", array('role'=>'Biller','url'=>'','name'=>'')) ?>
                    <?php $this->load->view("component/list-pages", array('role'=>'Partner','url'=>'','name'=>'')) ?>
                    <?php $this->load->view("component/list-pages", array('role'=>'API','url'=>'product','name'=>'')) ?>
                    <?php $this->load->view("component/list-pages", array('role'=>'Transform','url'=>'','name'=>'')) ?>
                    <?php $this->load->view("component/list-pages", array('role'=>'Rates','url'=>'','name'=>'')) ?>
                    <?php $this->load->view("component/list-pages", array('role'=>'History','url'=>'report','name'=>'')) ?>
                    <?php $this->load->view("component/list-pages", array('role'=>'User','url'=>'','name'=>'')) ?>
                    <li><a href="/auth/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </div> <!-- end navbar -->
</div>
