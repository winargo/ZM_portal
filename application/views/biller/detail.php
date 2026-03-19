<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <h4 class="header-title">Update Biller</h4>
            <?php $this->load->view("component/alert.php") ?>
            <form action="<?php echo base_url('biller/detail/'.$biller->id) ?>" method="post" enctype="multipart/form-data" >
                <div class="col-md-6">
                    <div class="card-box">
                        <h4 class="m-b-20">Biller Info</h4>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'id','label'=>'Biller Id','type'=>'','default'=>$biller->id)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'billerAlias','label'=>'Biller Alias','type'=>'','default'=>$biller->billerAlias)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'billerName','label'=>'Biller Name','type'=>'','default'=>$biller->billerName)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'address','label'=>'Company Address in Accordance with Deed','type'=>'','pattern'=>'^[a-zA-Z0-9\\.\\,\\-\\/ ]*$','default'=>$biller->address)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'deedEstNo','label'=>'Deed of Establishment No','type'=>'digits','minLength'=>'10','maxLength'=>'30','default'=>$biller->deedEstNo)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'tinNo','label'=>'TIN Number','minLength'=>'14','maxLength'=>'16','default'=>$biller->tinNo)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'nibSiupTdpNo','label'=>'NIB/SIUP/TDP','minLength'=>'10','maxLength'=>'30','default'=>$biller->nibSiupTdpNo)) ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-box" style="min-height:632px">
                        <h4 class="m-b-20 display-inline">PIC Data</h4>
                        <?php if (in_array('Biller',$this->session->userdata('pages'))): ?>
                        <button class="btn btn-primary pull-right m-b-10" type="button" data-toggle="modal" data-target="#addPICModal">
                            <icon class="fa fa-plus"></icon>
                        </button>
                        <?php endif; ?>
                        <table class="table table-striped m-0" id="pic">
                            <thead>
                                <tr>
                                    <th>Team</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($pics as $pic) :?>
                                <tr>
                                    <td style="padding-left:0px"><?php echo $pic->team ?></td>
                                    <td style="padding-left:0px"><?php echo $pic->name ?></td>
                                    <td style="padding-left:0px"><?php echo $pic->contact ?></td>
                                    <td style="padding-left:0px"><?php echo $pic->email ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-box">
                        <h4 class="m-b-20">Deposit</h4>
                        <?php if (in_array('Biller',$this->session->userdata('pages'))): ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'depositAccount','label'=>'Account Number','type'=>'digits','minLength'=>'1','default'=>$biller->depositAccount)) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'depositBankName','label'=>'Bank Name','type'=>'','pattern'=>'^[a-zA-Z ]*$','default'=>$biller->depositBankName)) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'depositBranch','label'=>'Branch Name','type'=>'','default'=>$biller->depositBranch)) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'depositVA','label'=>'Virtual Account','type'=>'digits','default'=>$biller->depositVA)) ?>
                        <?php else: ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'depositAccount','label'=>'Account Number','type'=>'digits','minLength'=>'1','default'=>$biller->depositAccount)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'depositBankName','label'=>'Bank Name','type'=>'','pattern'=>'^[a-zA-Z ]*$','default'=>$biller->depositBankName)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'depositBranch','label'=>'Branch Name','type'=>'','default'=>$biller->depositBranch)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'depositVA','label'=>'Virtual Account','type'=>'digits','default'=>$biller->depositVA)) ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-box">
                        <h4 class="m-b-20">Reconciliation System</h4>
                        <?php if (in_array('Biller',$this->session->userdata('pages'))): ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'reconSftpIp','label'=>'IP','type'=>'','pattern'=>'^[0-9\\. ]*$','default'=>$biller->reconSftpIp)) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'reconSftpPort','label'=>'Port','type'=>'digits','default'=>$biller->reconSftpPort)) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'reconSftpFolder','label'=>'Folder','type'=>'','pattern'=>'^[a-zA-Z0-9\\/\\.\\- ]*$','default'=>$biller->reconSftpFolder)) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'reconEmail','label'=>'Email','type'=>'email','default'=>$biller->reconEmail)) ?>
                        <?php else: ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'reconSftpIp','label'=>'IP','type'=>'','pattern'=>'^[0-9\\. ]*$','default'=>$biller->reconSftpIp)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'reconSftpPort','label'=>'Port','type'=>'digits','default'=>$biller->reconSftpPort)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'reconSftpFolder','label'=>'Folder','type'=>'','pattern'=>'^[a-zA-Z0-9\\/\\.\\- ]*$','default'=>$biller->reconSftpFolder)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'reconEmail','label'=>'Email','type'=>'email','default'=>$biller->reconEmail)) ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-box form-horizontal">
                        <h4 class="m-b-20">Attachment
                        <span class="badge badge-info" data-toggle="tooltip" title="" data-original-title="Maximum file size 5 MB, Only Accept PDF, DOC, and Image">?</span></h4>
                        <?php $this->load->view("component/input-file-edit", array('name'=>'pks','label'=>'PKS','url'=>$biller->pks)) ?>
                        <?php $this->load->view("component/input-file-edit", array('name'=>'api','label'=>'API','url'=>$biller->api)) ?>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <?php if (in_array('Biller',$this->session->userdata('pages'))): ?>
                    <button type="submit" class="btn btn-primary m-l-10">Update</button>
                    <a href="<?php echo base_url('/biller/'.$biller->id) ?>" class="btn btn-default">Cancel</a>
                    <?php else: ?>
                    <a href="<?php echo base_url('/biller/'.$biller->id) ?>" class="btn btn-default">Back</a>
                    <?php endif; ?>
                </div>
                <?php $this->load->view("component/table-audit-trails.php", array('auditTrails'=>$auditTrails)) ?>
            </form>
        </div>
        <?php $this->load->view("biller/modal-add-pic") ?>
        <?php $this->load->view("template/base-js.php") ?>
    </div>
    <script language="JavaScript">
        $("#addPICForm").submit(function(e){
            e.preventDefault();
            $('#addPICModal').modal('hide');

            let tdOpen = '<td style="padding:0px;"><input value="';
            let tdClosed = '" readonly="" class="form-control seamless" style="padding:0px;"/></td>';
            
            let parameter = "'"+$('#phone').val()+"'";
            let inputHidden = '<tr id="'+$('#phone').val()+'">';
            let teamColumn = tdOpen+$('#team').val()+'" name="team[]" '+tdClosed;
            let nameColumn = tdOpen+$('#name').val()+'" name="name[]" '+tdClosed;
            let phoneColumn = tdOpen+'62'+$('#phone').val()+'" name="contact[]" '+tdClosed;
            let emailColumn = tdOpen+$('#email').val()+'" name="email[]" '+tdClosed;
            let actionColumn = '<td><button class="btn btn-danger" type="button" onclick="removePic('+parameter+')"><i class="fa fa-trash"></button></td></tr>';

            let row = inputHidden.concat(teamColumn, nameColumn, phoneColumn, emailColumn,actionColumn);
            $('#pic tr:last').after(row);
           
            setTimeout(function(){
                $('#team').val('');
                $('#name').val('');
                $('#phone').val('');
                $('#email').val('');
            }, 500);
        });

        function removePic(phone){
            $('#'+phone).remove();
        }
    </script>
</body>
</html>
