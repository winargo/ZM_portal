<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <h4 class="header-title">Add New Biller</h4>
            <?php $this->load->view("component/alert.php") ?>
            <form action="<?php echo base_url('biller/add') ?>" method="post" enctype="multipart/form-data" >
                <div class="col-md-6">
                    <div class="card-box">
                        <h4 class="m-b-20">Biller Info</h4>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'billerAlias','label'=>'Biller Alias','type'=>'')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'billerName','label'=>'Biller Name','type'=>'')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'address','label'=>'Company Address in Accordance with Deed','type'=>'','pattern'=>'^[a-zA-Z0-9\\.\\,\\-\\/ ]*$')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'deedEstNo','label'=>'Deed of Establishment No','type'=>'digits','minLength'=>'10','maxLength'=>'30')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'tinNo','label'=>'TIN Number','minLength'=>'14','maxLength'=>'16')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'nibSiupTdpNo','label'=>'NIB/SIUP/TDP','minLength'=>'10','maxLength'=>'30')) ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-box" style="min-height:576px">
                        <h4 class="m-b-20 display-inline">PIC Data</h4>
                        <button class="btn btn-primary pull-right m-b-10" type="button" data-toggle="modal" data-target="#addPICModal">
                            <icon class="fa fa-plus"></icon>
                        </button>
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
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-box">
                        <h4 class="m-b-20">Deposit</h4>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'depositAccount','label'=>'Account Number','type'=>'digits','minLength'=>'1')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'depositBankName','label'=>'Bank Name','type'=>'','pattern'=>'^[a-zA-Z ]*$')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'depositBranch','label'=>'Branch Name','type'=>'')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'depositVA','label'=>'Virtual Account','type'=>'digits')) ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-box">
                        <h4 class="m-b-20">Reconciliation System</h4>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'reconSftpIp','label'=>'IP','type'=>'','pattern'=>'^[0-9\\. ]*$')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'reconSftpPort','label'=>'Port','type'=>'digits')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'reconSftpFolder','label'=>'Folder','type'=>'','pattern'=>'^[a-zA-Z0-9\\/\\.\\- ]*$')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'reconEmail','label'=>'Email','type'=>'email')) ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-box form-horizontal">
                        <h4 class="m-b-20">Attachment
                        <span class="badge badge-info" data-toggle="tooltip" title="" data-original-title="Maximum file size 5 MB, Only Accept PDF, DOC, and Image">?</span></h4>
                        <?php $this->load->view("component/input-file-add", array('name'=>'pks','label'=>'PKS')) ?>
                        <?php $this->load->view("component/input-file-add", array('name'=>'api','label'=>'API')) ?>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary m-l-10">Add</button>
                    <a href="<?php echo base_url('/biller') ?>" class="btn btn-default">Cancel</a>
                </div>
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
