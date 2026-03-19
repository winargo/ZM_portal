<div id="editBillerProductModal<?php echo $billerProduct->id?>" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Update Biller API</h4>
            </div>
            <form class="modal-body form-horizontal" action="<?php echo base_url('billerProduct/edit') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $billerProduct->id?>" name="id" />
                <input type="hidden" value="<?php echo $billerProduct->biller->id?>" name="billerId" />
                <input type="hidden" value="<?php echo $billerProduct->api->id?>" name="apiId" />
                <?php $this->load->view("component/input-text-readonly-horizontal", array('name'=>'apiCode','label'=>'API Code','default'=>$billerProduct->api->apiId)) ?>
                <?php $this->load->view("component/input-text-readonly-horizontal", array('name'=>'apiName','label'=>'API Name','default'=>$billerProduct->api->apiName)) ?>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="transformId">Transform</label>
                    <div class="col-md-9">
                        <select class="form-control form-white select2" name="transformId" id="transformId" style="width:100%">
                            <option value="<?php echo $billerProduct->transformId?>"><?php echo $billerProduct->transformId?></option>
                            <?php foreach ($transforms as $transform) :?>
                                <?php if (strpos($transform->method, '.') === false): ?>
                                <option value="<?php echo $transform->transformId?>"><?php echo $transform->name?></option>
                                <?php endif; ?>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <?php $this->load->view("component/input-text-horizontal", array('name'=>'billerCode','label'=>'Biller Code','type'=>'','maxLength'=>'100','pattern'=>'^[a-zA-Z0-9\\.\\, ]*$','default'=>$billerProduct->billerCode)) ?>
                <?php $this->load->view("component/input-text-horizontal", array('name'=>'denom','label'=>'Denom','type'=>'digits','default'=>$billerProduct->denom)) ?>
                <?php $this->load->view("component/input-text-horizontal", array('name'=>'billerPrice','label'=>'Biller Price','type'=>'digits','default'=>$billerProduct->billerPrice)) ?>
                <?php $this->load->view("component/input-text-horizontal", array('name'=>'adminFee','label'=>'Admin Fee','type'=>'digits','default'=>$billerProduct->adminFee)) ?>
                <div class="col-md-12 text-center m-b-10">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
