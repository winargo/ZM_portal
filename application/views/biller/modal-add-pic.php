<div id="addPICModal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add PIC</h4>
            </div>
            <div class="modal-body form-horizontal" style="padding-bottom:0px">
                <form id="addPICForm">
                    <?php $this->load->view("component/input-text-horizontal-no-default", array('name'=>'team','label'=>'Team','type'=>'')) ?>
                    <?php $this->load->view("component/input-text-horizontal-no-default", array('name'=>'name','label'=>'Name','type'=>'')) ?>
                    <?php $this->load->view("component/input-phone-horizontal-no-default", array('name'=>'phone','label'=>'Phone')) ?>
                    <?php $this->load->view("component/input-text-horizontal-no-default", array('name'=>'email','label'=>'Email','type'=>'email')) ?>
                    <div class="form-group text-center">
                        <button id="addPIC" class="btn btn-primary" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
