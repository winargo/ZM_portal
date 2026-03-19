<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <h4 class="header-title">Add API</h4>
            <?php $this->load->view("component/alert.php") ?>
            <form action="<?php echo base_url('product/add') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="col-md-12">
                    <div class="card-box">
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'apiId','label'=>'API Code','type'=>'','maxLength'=>'100','pattern'=>'^[a-zA-Z0-9 ]*$')) ?>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'apiName','label'=>'API Name','type'=>'','maxLength'=>'100','pattern'=>'^[a-zA-Z0-9\\.\\,\\+\\(\\)\\/\\- ]*$')) ?>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'apiDescription','label'=>'API Description','maxLength'=>'200','type'=>'','pattern'=>'^[a-zA-Z0-9\\.\\,\\+\\(\\)\\/\\- ]*$')) ?>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'apiCategory','label'=>'API Category','type'=>'','maxLength'=>'100','pattern'=>'^[a-zA-Z0-9]*$')) ?>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'nominal','label'=>'Nominal','type'=>'digits')) ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="apiSelection">API Selection</label>
                            <div class="col-md-9">
                                <?php $this->load->view("component/input-radio", array('name'=>'apiSelection','value'=>'PRICE','label'=>'Biller Price','default'=>'billerPrice')) ?>
                                <?php $this->load->view("component/input-radio", array('name'=>'apiSelection','value'=>'PRIORITY','label'=>'Priority','default'=>'billerPrice')) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary m-l-10">Add</button>
                    <a href="<?php echo base_url('/product') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
        <?php $this->load->view("template/base-js.php") ?>
    </div>
</body>
</html>
