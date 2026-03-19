<div id="addRatesModal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add Rates</h4>
            </div>
            <form action="<?php echo base_url('rates/add') ?>" method="post" enctype="multipart/form-data" class="modal-body form-horizontal" style="padding-bottom:0px">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="productSelect">API Name</label>
                    <div class="col-md-9">
                        <select class="form-control form-white select2 text-left" style="width: 100%" name="apiId" id="apiId">
                        <option></option>
                        <?php foreach ($products as $product) :?>
                            <option value="<?php echo $product->id?>"><?php echo $product->apiName?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="partnerId" value="<?php echo isset($this->session->flashdata('get')['p']) ? $this->session->flashdata('get')['p'] : '' ?>">
                <?php $this->load->view("component/input-text-readonly-horizontal", array('name'=>'apiCode','label'=>'API Code','default'=>'')) ?>
                <?php $this->load->view("component/input-text-horizontal", array('name'=>'partnerPrice','label'=>'Partner Sell Price','type'=>'digits','default'=>'')) ?>
                <?php $this->load->view("component/input-text-horizontal", array('name'=>'partnerFee','label'=>'Partner Admin Fee','type'=>'digits','default'=>'')) ?>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="biller1Select">Biller / Price / Admin Fee 1</label>
                    <div class="col-md-9">
                        <select class="form-control form-white select2 text-left" style="width: 100%" name="biller1Select" id="biller1Select">
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="biller2Select">Biller / Price / Admin Fee 2</label>
                    <div class="col-md-9">
                        <select class="form-control form-white select2 text-left" style="width: 100%" name="biller2Select" id="biller2Select">
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="form-group m-b-20">
                    <label class="col-md-3 control-label" for="biller3Select">Biller / Price / Admin Fee 3</label>
                    <div class="col-md-9">
                        <select class="form-control form-white select2 text-left" style="width: 100%" name="biller3Select" id="biller3Select">
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="url">Url Callback</label>
                    <div class="col-md-9">
                        <input type="text" name="url" class="form-control" />
                    </div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary m-t-10" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
