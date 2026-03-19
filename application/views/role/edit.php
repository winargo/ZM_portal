<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <h4 class="header-title">Update Role</h4>
            <?php $this->load->view("component/alert.php") ?>
            <form action="<?php echo base_url('role/'.$role->id) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="col-md-12">
                    <div class="card-box">
                        <input type="hidden" name="id" id="id" value="<?php echo $role->id ?>"/>
                        <?php $this->load->view("component/input-text-readonly-horizontal", array('name'=>'name','label'=>'Name','type'=>'','default'=>$role->name)) ?>
                        <?php foreach ($pages as $page) :?>
                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo $page?></label>
                                <div class="col-md-9 m-t-5">
                                    <?php $this->load->view("component/radio-role", array('page'=>$page,'value'=>$page,'label'=>'Full Access','checked'=>in_array($page, $role->pages))) ?>
                                    <?php if ($page !== 'History'): ?>
                                    <?php $this->load->view("component/radio-role", array('page'=>$page,'value'=>$page.' Read Only','label'=>'Read Only','checked'=>in_array($page.' Read Only', $role->pages))) ?>
                                    <?php endif; ?>
                                    <?php $this->load->view("component/radio-role", array('page'=>$page,'value'=>$page.' No Access','label'=>'No Access','checked'=>!in_array($page, $role->pages) && !in_array($page.' Read Only', $role->pages))) ?>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary m-l-10">Update</button>
                    <a href="<?php echo base_url('/user') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
        <?php $this->load->view("template/base-js.php") ?>
    </div>
</body>
</html>
