<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <h4 class="header-title">User Management</h4>
            <div class="col-md-12">
                <ul class="nav nav-tabs tabs-bordered nav-justified">
                    <li class="active">
                        <a href="#user" data-toggle="tab" aria-expanded="false">User</a>
                    </li>
                    <li class="">
                        <a href="#role" data-toggle="tab" aria-expanded="false">Role</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="user">
                        <?php if (in_array('User',$this->session->userdata('pages'))): ?>
                        <a class="btn btn-primary pull-right m-b-10" style="margin-top:-4px" href="/user/add">
                            <icon class="fa fa-plus"></icon>
                        </a>
                        <?php endif; ?>
                        <div class="col-md-12 m-b-20">
                            <table class="table table-striped m-0" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <?php if (in_array('User',$this->session->userdata('pages'))): ?>
                                        <th style="width:100px">Action</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) :?>
                                    <tr>
                                        <td><?php echo $user->email?></td>
                                        <td><?php echo $user->role->name?></td>
                                        <?php if (in_array('User',$this->session->userdata('pages'))): ?>
                                        <td>
                                            <div class="col-md-12">
                                                <a class="btn btn-primary btn-sm" href="/user/<?php echo $user->id?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="role">
                        <?php if (in_array('User',$this->session->userdata('pages'))): ?>
                        <a class="btn btn-primary pull-right m-b-10" style="margin-top:-4px" href="/role/add">
                            <icon class="fa fa-plus"></icon>
                        </a>
                        <?php endif; ?>
                        <div class="col-md-12 m-b-20">
                            <table class="table table-striped m-0" id="datatable2">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Akses</th>
                                        <?php if (in_array('User',$this->session->userdata('pages'))): ?>
                                        <th style="width:100px">Action</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($roles as $role) :?>
                                    <tr>
                                        <td><?php echo $role->name?></td>
                                        <td><?php echo implode(", ",$role->pages)?></td>
                                        <?php if (in_array('User',$this->session->userdata('pages'))): ?>
                                        <td>
                                            <div class="col-md-12">
                                                <a class="btn btn-primary btn-sm" href="/role/<?php echo $role->id?>">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view("template/base-js.php") ?>
    </div>
    <script>
        $('#datatable2').dataTable();
    </script>
</body>
</html>
