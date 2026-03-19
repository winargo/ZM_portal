<div id="addBillerProduct" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add Biller API</h4>
            </div>
            <form class="modal-body form-horizontal" action="<?php echo base_url('billerProduct/add') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $billerId?>" name="billerId" />
                <div class="form-group">
                    <label class="col-md-3 control-label" for="apiId">API Name</label>
                    <div class="col-md-9">
                        <select class="form-control form-white select2" name="apiId" id="apiId" style="width:100%">
                            <option></option>
                            <?php foreach ($products as $product) :?>
                                <option value="<?php echo $product->id?>"><?php echo $product->apiName?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="transformId">Transform</label>
                    <div class="col-md-9">
                        <select class="form-control form-white select2" name="transformId" id="transformId" style="width:100%">
                            <option></option>
                            <?php foreach ($transforms as $transform) :?>
                                <?php if (strpos($transform->method, '.') === false): ?>
                                <option value="<?php echo $transform->transformId?>"><?php echo $transform->name?></option>
                                <?php endif; ?>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <?php $this->load->view("component/input-text-horizontal", array('name'=>'billerCode','label'=>'Biller Code','type'=>'','maxLength'=>'100','pattern'=>'^[a-zA-Z0-9\\.\\, ]*$')) ?>
                <?php $this->load->view("component/input-text-horizontal", array('name'=>'denom','label'=>'Denom','type'=>'digits')) ?>
                <?php $this->load->view("component/input-text-horizontal", array('name'=>'billerPrice','label'=>'Biller Price','type'=>'digits')) ?>
                <?php $this->load->view("component/input-text-horizontal", array('name'=>'adminFee','label'=>'Admin Fee','type'=>'digits')) ?>
                <div class="col-md-12 text-center m-b-10">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
