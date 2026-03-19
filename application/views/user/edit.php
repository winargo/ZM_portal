<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <h4 class="header-title">Update User</h4>
            <?php $this->load->view("component/alert.php") ?>
            <form action="<?php echo base_url('user/'.$user->id) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="col-md-12">
                    <div class="card-box">
                        <input type="hidden" name="id" id="id" value="<?php echo $user->id ?>"/>
                        <?php $this->load->view("component/input-text-readonly-horizontal", array('name'=>'email','label'=>'Email','type'=>'email','default'=>$user->email)) ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="role">Role</label>
                            <div class="col-md-9">
                                <select class="form-control select2" name="role" id="role">
                                    <option value="<?php echo $user->role->id?>"><?php echo $user->role->name?></option>
                                    <?php foreach ($roles as $role) :?>
                                        <option value="<?php echo $role->id?>"><?php echo $role->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
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
