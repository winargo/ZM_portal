<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <h4 class="header-title">Add New Partner</h4>
            <?php $this->load->view("component/alert.php") ?>
            <form action="<?php echo base_url('partner/add') ?>" method="post" enctype="multipart/form-data" >
                <div class="col-md-6">
                    <div class="card-box">
                        <h4 class="m-b-20">Partner Info</h4>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'alias','label'=>'Alias Partner','type'=>'')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'name','label'=>'Partner Name','type'=>'')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'address','label'=>'Company Address in Accordance with Deed','type'=>'','pattern'=>'^[a-zA-Z0-9\\.\\,\\-\\/ ]*$')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'deedEstNo','label'=>'Deed of Establishment No','type'=>'digits','minLength'=>'10','maxLength'=>'30')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'tinNo','label'=>'TIN Number','minLength'=>'14','maxLength'=>'16')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'nibSiupTdpNo','label'=>'NIB/SIUP/TDP','minLength'=>'10','maxLength'=>'30')) ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-box">
                        <h4 class="m-b-20">PIC Data</h4>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'picName','label'=>'Fullname','type'=>'','pattern'=>'^[a-zA-Z ]*$','minLength'=>'1')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'picAddress','label'=>'Address according to ID','type'=>'','pattern'=>'^[a-zA-Z0-9\\.\\,\\-\\/ ]*$')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'picIdNumber','label'=>'ID Number','minLength'=>'15','maxLength'=>'16')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'picTinNumber','label'=>'TIN Number','minLength'=>'14','maxLength'=>'16')) ?>
                        <?php $this->load->view("component/input-phone", array('name'=>'picPhoneNumber','label'=>'Phone Number / Mobile')) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'picEmail','label'=>'Email','type'=>'email','minLength'=>'1','maxLength'=>'100')) ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-box form-horizontal">
                        <h4 class="m-b-20">Cooperation Agreement</h4>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'coopBankName','label'=>'Bank Name','type'=>'')) ?>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'coopAccountNumber','label'=>'Account Number','type'=>'digits')) ?>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'coopAccountName','label'=>'Account Name','type'=>'')) ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Settlement Period</label>
                            <?php $this->load->view("component/input-radio", array('name'=>'coopSettlementPeriod','value'=>'daily','label'=>'Daily','default'=>'daily')) ?>
                            <?php $this->load->view("component/input-radio", array('name'=>'coopSettlementPeriod','value'=>'weekly','label'=>'Weekly','default'=>'daily')) ?>
                            <?php $this->load->view("component/input-radio", array('name'=>'coopSettlementPeriod','value'=>'monthly','label'=>'Monthly','default'=>'daily')) ?>
                        </div>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'coopPeriod','label'=>'Period of Cooperation','type'=>'digits','default'=>'')) ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Type of Cooperation</label>
                            <?php $this->load->view("component/input-radio", array('name'=>'coopType','value'=>'deposit','label'=>'Deposit','default'=>'deposit')) ?>
                            <?php $this->load->view("component/input-radio", array('name'=>'coopType','value'=>'comission','label'=>'Comission Based','default'=>'deposit')) ?>
                        </div>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'coopNominal','label'=>'Nominal of Cooperation','type'=>'digits','default'=>'')) ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-box form-horizontal">
                        <h4 class="m-b-20">Attachment
                            <span class="badge badge-info" data-toggle="tooltip" title="" data-original-title="Maximum file size 5 MB, Only Accept PDF, DOC, and Image">?</span>
                        </h4>
                        <?php $this->load->view("component/input-file-add", array('name'=>'attachIncorporationDeed','label'=>'Deed of Corporation')) ?>
                        <?php $this->load->view("component/input-file-add", array('name'=>'attachSkKemenkumham','label'=>'SK Kemenhumkam')) ?>
                        <?php $this->load->view("component/input-file-add", array('name'=>'attachAmendmentDeed','label'=>'Deed of Amendement (If Available)')) ?>
                        <?php $this->load->view("component/input-file-add", array('name'=>'attachTin','label'=>'Company TIN')) ?>
                        <?php $this->load->view("component/input-file-add", array('name'=>'attachNib','label'=>'NIB')) ?>
                        <?php $this->load->view("component/input-file-add", array('name'=>'attachPic','label'=>'Person In Charge ID')) ?>
                        <?php $this->load->view("component/input-file-add", array('name'=>'attachStatementLetter','label'=>'Statement Letter')) ?>
                        <?php $this->load->view("component/input-file-add", array('name'=>'attachBusinessPhoto','label'=>'Business Photo')) ?>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary m-l-10">Add</button>
                    <a href="<?php echo base_url('/partner') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
        <?php $this->load->view("template/base-js.php") ?>
    </div>
</body>
</html>
