<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <?php if (in_array('Partner',$this->session->userdata('pages'))): ?>
            <a class="btn btn-primary pull-right m-b-10" style="margin-top:-4px" href="/partner/add">
                <icon class="fa fa-plus"></icon>
            </a>
            <?php endif; ?>
            <h4 class="header-title">Partner List</h4>
            <div class="col-md-12">
                <div class="col-md-12 m-b-20">
                    <table class="table table-striped m-0" id="datatable">
                        <thead>
                            <tr>
                                <th>Partner Alias</th>
                                <th>Partner Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th style="width:100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($partners as $partner) :?>
                            <tr>
                                <td><?php echo $partner->alias?></td>
                                <td><?php echo $partner->name?></td>
                                <td><?php echo $partner->picEmail?></td>
                                <td><?php echo $partner->picPhoneNumber?></td>
                                <?php if (in_array('Partner',$this->session->userdata('pages'))): ?>
                                <td>
                                    <div class="col-md-5">
                                        <a class="btn btn-primary btn-sm" href="/partner/<?php echo $partner->id?>">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-5">
                                        <form action="/partner/status/<?php echo $partner->id?>" method="post" enctype="multipart/form-data" class="m-b-0">
                                            <button type="submit" class="btn btn-default btn-sm">
                                                <i class="fa fa-<?php echo $partner->status ? 'check-' : '' ?>square-o"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <?php else: ?>
                                <td>
                                    <div class="col-md-5">
                                        <a class="btn btn-default btn-sm" href="/partner/<?php echo $partner->id?>">
                                            <i class="fa fa-eye"></i>
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
        <?php $this->load->view("template/base-js.php") ?>
    </div>
</body>
</html>
