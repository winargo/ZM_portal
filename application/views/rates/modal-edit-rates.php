<div id="editRatesModal<?php echo $partnerProduct->id?>" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Update Rates</h4>
            </div>
            <form action="<?php echo base_url('rates/edit') ?>" method="post" enctype="multipart/form-data" class="modal-body form-horizontal" style="padding-bottom:0px">
                <?php $this->load->view("component/input-text-readonly-horizontal", array('name'=>'productName','label'=>'API Name','default'=>$partnerProduct->api->apiName)) ?>
                <?php $this->load->view("component/input-text-readonly-horizontal", array('name'=>'apiCode','label'=>'API Code','default'=>$partnerProduct->api->apiId)) ?>
                <input type="hidden" name="id" value="<?php echo $partnerProduct->id?>">
                <input type="hidden" name="apiId" value="<?php echo $partnerProduct->api->id?>">
                <input type="hidden" name="partnerId" value="<?php echo isset($this->session->flashdata('get')['p']) ? $this->session->flashdata('get')['p'] : '' ?>">
                <?php $this->load->view("component/input-text-horizontal", array('name'=>'partnerPrice','label'=>'Partner Sell Price','type'=>'digits','default'=>$partnerProduct->partnerPrice)) ?>
                <?php $this->load->view("component/input-text-horizontal", array('name'=>'partnerFee','label'=>'Partner Admin Fee','type'=>'digits','default'=>$partnerProduct->partnerFee)) ?>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="biller1Select">Biller / Price / Admin Fee 1</label>
                    <div class="col-md-9">
                        <select class="form-control form-white select2 text-left" style="width: 100%" name="biller1Select" id="biller1Select<?php echo $partnerProduct->id?>">
                            <?php $notFound = true ?>
                            <?php foreach ($partnerProduct->billerApiId as $billerApi) :?>
                                <?php if($billerApi->priority == 1) :?>
                                    <?php $notFound = false ?>
                                    <option value="<?php echo $billerApi->billerApiId->biller->id?>">
                                        <?php echo $billerApi->billerApiId->biller->billerName?> / <?php echo number_format($billerApi->billerApiId->billerPrice,0,',','.')?> / <?php echo number_format($billerApi->billerApiId->adminFee,0,',','.')?>
                                    </option>
                                <?php endif;?>
                            <?php endforeach;?>
                            <?php if ($notFound): ?>
                                <option></option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="biller2Select">Biller / Price / Admin Fee 2</label>
                    <div class="col-md-9">
                        <select class="form-control form-white select2 text-left" style="width: 100%" name="biller2Select" id="biller2Select<?php echo $partnerProduct->id?>">
                            <?php $notFound = true ?>
                            <?php foreach ($partnerProduct->billerApiId as $billerApi) :?>
                                <?php if($billerApi->priority == 2) :?>
                                    <?php $notFound = false ?>
                                    <option value="<?php echo $billerApi->billerApiId->biller->id?>">
                                        <?php echo $billerApi->billerApiId->biller->billerName?> / <?php echo number_format($billerApi->billerApiId->billerPrice,0,',','.')?> / <?php echo number_format($billerApi->billerApiId->adminFee,0,',','.')?>
                                    </option>
                                <?php endif;?>
                            <?php endforeach;?>
                            <?php if ($notFound): ?>
                                <option></option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group m-b-20">
                    <label class="col-md-3 control-label" for="biller3Select">Biller / Price / Admin Fee 3</label>
                    <div class="col-md-9">
                        <select class="form-control form-white select2 text-left" style="width: 100%" name="biller3Select" id="biller3Select<?php echo $partnerProduct->id?>">
                        <?php $notFound = true ?>
                            <?php foreach ($partnerProduct->billerApiId as $billerApi) :?>
                                <?php if($billerApi->priority == 3) :?>
                                    <?php $notFound = false ?>
                                    <option value="<?php echo $billerApi->billerApiId->biller->id?>">
                                        <?php echo $billerApi->billerApiId->biller->billerName?> / <?php echo number_format($billerApi->billerApiId->billerPrice,0,',','.')?> / <?php echo number_format($billerApi->billerApiId->adminFee,0,',','.')?>
                                    </option>
                                <?php endif;?>
                            <?php endforeach;?>
                            <?php if ($notFound): ?>
                                <option></option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="url">Url Callback</label>
                    <div class="col-md-9">
                        <input type="text" name="url" value="<?php echo $partnerProduct->url?>" class="form-control" />
                    </div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary m-t-10" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
