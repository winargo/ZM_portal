<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <h4 class="header-title">Update Partner</h4>
            <?php $this->load->view("component/alert.php") ?>
            <form action="<?php echo base_url('partner/'.$partner->id)?>" method="post" enctype="multipart/form-data" >
                <div class="col-md-6">
                    <div class="card-box">
                        <h4 class="m-b-20">Partner Info</h4>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'id','label'=>'Id Partner','type'=>'','default'=>$partner->id)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'alias','label'=>'Alias Partner','type'=>'','default'=>$partner->alias)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'name','label'=>'Partner Name','type'=>'','default'=>$partner->name)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'address','label'=>'Company Address in Accordance with Deed','type'=>'','pattern'=>'^[a-zA-Z0-9\\.\\,\\-\\/ ]*$','default'=>$partner->address)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'deedEstNo','label'=>'Deed of Establishment No','type'=>'digits','minLength'=>'10','maxLength'=>'30','default'=>$partner->deedEstNo)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'tinNumber','label'=>'TIN Number','minLength'=>'14','maxLength'=>'16','default'=>$partner->tinNo)) ?>
                    <?php $this->load->view("component/input-text-readonly", array('name'=>'nibSiupTdpNo','label'=>'NIB/SIUP/TDP','minLength'=>'10','maxLength'=>'30','default'=>$partner->nibSiupTdpNo)) ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-box">
                        <h4 class="m-b-20">PIC Data</h4>
                        <?php if (in_array('Partner',$this->session->userdata('pages'))): ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'picName','label'=>'Fullname','type'=>'','pattern'=>'^[a-zA-Z ]*$','minLength'=>'1','default'=>$partner->picName)) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'picAddress','label'=>'Address according to ID','type'=>'','pattern'=>'^[a-zA-Z0-9\\.\\,\\-\\/ ]*$','default'=>$partner->picAddress)) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'picIdNumber','label'=>'ID Number','minLength'=>'15','maxLength'=>'16','default'=>$partner->picIdNumber)) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'picTinNumber','label'=>'TIN Number','minLength'=>'14','maxLength'=>'16','default'=>$partner->picTinNumber)) ?>
                        <?php $this->load->view("component/input-phone", array('name'=>'picPhoneNumber','label'=>'Phone Number / Mobile','default'=>$partner->picPhoneNumber)) ?>
                        <?php $this->load->view("component/input-text-vertical", array('name'=>'picEmail','label'=>'Email','type'=>'email','minLength'=>'1','maxLength'=>'100','default'=>$partner->picEmail)) ?>
                        <?php else: ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'picName','label'=>'Fullname','type'=>'','pattern'=>'^[a-zA-Z ]*$','minLength'=>'1','default'=>$partner->picName)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'picAddress','label'=>'Address according to ID','type'=>'','pattern'=>'^[a-zA-Z0-9\\.\\,\\-\\/ ]*$','default'=>$partner->picAddress)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'picIdNumber','label'=>'ID Number','minLength'=>'15','maxLength'=>'16','default'=>$partner->picIdNumber)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'picTinNumber','label'=>'TIN Number','minLength'=>'14','maxLength'=>'16','default'=>$partner->picTinNumber)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'picPhoneNumber','label'=>'Phone Number','minLength'=>'14','maxLength'=>'16','default'=>$partner->picPhoneNumber)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'picEmail','label'=>'Email','type'=>'email','minLength'=>'1','maxLength'=>'100','default'=>$partner->picEmail)) ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-box form-horizontal">
                        <h4 class="m-b-20">Cooperation Agreement</h4>
                        <?php if (in_array('Partner',$this->session->userdata('pages'))): ?>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'coopBankName','label'=>'Bank Name','type'=>'','default'=>$partner->coopBankName)) ?>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'coopAccountNumber','label'=>'Account Number','type'=>'digits','default'=>$partner->coopAccountNumber)) ?>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'coopAccountName','label'=>'Account Name','type'=>'','default'=>$partner->coopAccountName)) ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Settlement Period</label>
                            <?php $this->load->view("component/input-radio", array('name'=>'coopSettlementPeriod','value'=>'daily','label'=>'Daily','default'=>$partner->coopSettlementPeriod)) ?>
                            <?php $this->load->view("component/input-radio", array('name'=>'coopSettlementPeriod','value'=>'weekly','label'=>'Weekly','default'=>$partner->coopSettlementPeriod)) ?>
                            <?php $this->load->view("component/input-radio", array('name'=>'coopSettlementPeriod','value'=>'monthly','label'=>'Monthly','default'=>$partner->coopSettlementPeriod)) ?>
                        </div>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'coopPeriod','label'=>'Period of Cooperation','type'=>'digits','default'=>$partner->coopPeriod)) ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Type of Cooperation</label>
                            <?php $this->load->view("component/input-radio", array('name'=>'coopType','value'=>'deposit','label'=>'Deposit','default'=>$partner->coopType)) ?>
                            <?php $this->load->view("component/input-radio", array('name'=>'coopType','value'=>'comission','label'=>'Comission Based','default'=>$partner->coopType)) ?>
                        </div>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'coopNominal','label'=>'Nominal of Cooperation','type'=>'digits','default'=>$partner->coopNominal)) ?>
                        <?php else: ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'coopBankName','label'=>'Bank Name','type'=>'','default'=>$partner->coopBankName)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'coopAccountNumber','label'=>'Account Number','type'=>'digits','default'=>$partner->coopAccountNumber)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'coopAccountName','label'=>'Account Name','type'=>'','default'=>$partner->coopAccountName)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'coopSettlementPeriod','label'=>'Settlement Period','type'=>'','default'=>$partner->coopSettlementPeriod)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'coopPeriod','label'=>'Period of Cooperation','type'=>'','default'=>$partner->coopPeriod)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'coopType','label'=>'Type of Cooperation','type'=>'','default'=>$partner->coopType)) ?>
                        <?php $this->load->view("component/input-text-readonly", array('name'=>'coopNominal','label'=>'Nominal of Cooperation','type'=>'digits','default'=>$partner->coopNominal)) ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-box form-horizontal">
                        <h4 class="m-b-20">Attachment
                            <span class="badge badge-info" data-toggle="tooltip" title="" data-original-title="Maximum file size 5 MB, Only Accept PDF, DOC, and Image">?</span>
                        </h4>
                        <?php $this->load->view("component/input-file-edit", array('name'=>'attachIncorporationDeed','label'=>'Deed of Corporation','url'=>$partner->attachIncorporationDeed)) ?>
                        <?php $this->load->view("component/input-file-edit", array('name'=>'attachSkKemenkumham','label'=>'SK Kemenhumkam','url'=>$partner->attachSkKemenkumham)) ?>
                        <?php $this->load->view("component/input-file-edit", array('name'=>'attachAmendmentDeed','label'=>'Deed of Amendement (If Available)','url'=>$partner->attachAmendmentDeed)) ?>
                        <?php $this->load->view("component/input-file-edit", array('name'=>'attachTin','label'=>'Company TIN','url'=>$partner->attachTin)) ?>
                        <?php $this->load->view("component/input-file-edit", array('name'=>'attachNib','label'=>'NIB','url'=>$partner->attachNib)) ?>
                        <?php $this->load->view("component/input-file-edit", array('name'=>'attachPic','label'=>'Person In Charge ID','url'=>$partner->attachPic)) ?>
                        <?php $this->load->view("component/input-file-edit", array('name'=>'attachStatementLetter','label'=>'Statement Letter','url'=>$partner->attachStatementLetter)) ?>
                        <?php $this->load->view("component/input-file-edit", array('name'=>'attachBusinessPhoto','label'=>'Business Photo','url'=>$partner->attachBusinessPhoto)) ?>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <?php if (in_array('Partner',$this->session->userdata('pages'))): ?>
                    <button type="submit" class="btn btn-primary m-l-10">Update</button>
                    <a href="<?php echo base_url('/partner') ?>" class="btn btn-default">Cancel</a>
                    <?php else: ?>
                    <a href="<?php echo base_url('/partner') ?>" class="btn btn-default">Back</a>
                    <?php endif; ?>
                </div>
                <?php $this->load->view("component/table-audit-trails.php", array('auditTrails'=>$auditTrails)) ?>
            </form>
        </div>
        <?php $this->load->view("template/base-js.php") ?>
    </div>
</body>
</html>
