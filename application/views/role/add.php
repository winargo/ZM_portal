<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <h4 class="header-title">Add Role</h4>
            <?php $this->load->view("component/alert.php") ?>
            <form action="<?php echo base_url('role/add') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="col-md-12">
                    <div class="card-box">
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'name','label'=>'Name','type'=>'')) ?>
                        <?php foreach ($pages as $page) :?>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo $page?></label>
                                <div class="col-md-9 m-t-5">
                                    <?php $this->load->view("component/radio-role", array('page'=>$page,'value'=>$page,'label'=>'Full Access','checked'=>false)) ?>
                                    <?php if ($page !== 'History'): ?>
                                    <?php $this->load->view("component/radio-role", array('page'=>$page,'value'=>$page.' Read Only','label'=>'Read Only','checked'=>false)) ?>
                                    <?php endif; ?>
                                    <?php $this->load->view("component/radio-role", array('page'=>$page,'value'=>$page.' No Access','label'=>'No Access','checked'=>true)) ?>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary m-l-10">Add</button>
                    <a href="<?php echo base_url('/user') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
        <?php $this->load->view("template/base-js.php") ?>
    </div>
</body>
</html>
