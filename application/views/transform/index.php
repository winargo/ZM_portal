<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <?php if (in_array('Transform',$this->session->userdata('pages'))): ?>
            <a class="btn btn-primary pull-right m-b-10" style="margin-top:-4px" href="/transform/add">
                <icon class="fa fa-plus"></icon>
            </a>
            <?php endif; ?>
            <h4 class="header-title">Transform</h4>
            <div class="col-md-12">
                <div class="col-md-12 m-b-20">
                    <table class="table table-striped m-0" id="datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Method</th>
                                <th style="width:100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($transforms as $transform) :?>
                            <tr>
                                <td><?php echo $transform->name?></td>
                                <td><?php echo $transform->method?></td>
                                <td>
                                    <div class="col-md-12">
                                        <?php if (in_array('Transform',$this->session->userdata('pages'))): ?>
                                        <a class="btn btn-primary btn-sm" href="/transform/<?php echo $transform->id?>">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <?php else: ?>
                                        <a class="btn btn-default btn-sm" href="/transform/<?php echo $transform->id?>">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
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
