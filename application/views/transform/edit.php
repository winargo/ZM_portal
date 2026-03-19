<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <h4 class="header-title">Update Transform</h4>
            <?php $this->load->view("component/alert.php") ?>
            <form action="<?php echo base_url('transform/'.$transform->id)?>" method="post" enctype="multipart/form-data" class="form-horizontal" id="transformForm">
                <div class="col-md-12">
                    <div class="card-box">
                        <input type="hidden" name="id" value="<?php echo $transform->id?>">
                        <?php $this->load->view("component/input-text-readonly-horizontal", array('name'=>'transformId','label'=>'Alias','type'=>'','pattern'=>'^[a-zA-Z0-9\\.\\,\\-\\_ ]*$','default'=>$transform->transformId)) ?>
                        <?php if (in_array('Transform',$this->session->userdata('pages'))): ?>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'name','label'=>'Name','type'=>'','pattern'=>'^[a-zA-Z0-9\\.\\,\\-\\_ ]*$','default'=>$transform->name)) ?>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'method','label'=>'Method','type'=>'','pattern'=>'^[a-zA-Z0-9\\. ]*$','default'=>$transform->method)) ?>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'url','label'=>'Url','type'=>'url','pattern'=>'','default'=>$transform->url)) ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Format Type</label>
                            <?php $this->load->view("component/input-radio", array('name'=>'type','value'=>'JSON_TO_JSON','label'=>'Json to Json','default'=>$transform->type)) ?>
                            <?php $this->load->view("component/input-radio", array('name'=>'type','value'=>'JSON_TO_XML','label'=>'Json to Xml','default'=>$transform->type)) ?>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Flow Type</label>
                            <?php $this->load->view("component/input-radio", array('name'=>'flowType','value'=>'Sync','label'=>'Synchronous','default'=>$transform->flowType)) ?>
                            <?php $this->load->view("component/input-radio", array('name'=>'flowType','value'=>'Async','label'=>'Asynchronous','default'=>$transform->flowType)) ?>
                        </div>
                        <?php else: ?>
                        <?php $this->load->view("component/input-text-readonly-horizontal", array('name'=>'name','label'=>'Name','type'=>'','pattern'=>'^[a-zA-Z0-9\\.\\,\\-\\_ ]*$','default'=>$transform->name)) ?>
                        <?php $this->load->view("component/input-text-readonly-horizontal", array('name'=>'method','label'=>'Method','type'=>'','pattern'=>'^[a-zA-Z0-9 ]*$','default'=>$transform->method)) ?>
                        <?php $this->load->view("component/input-text-readonly-horizontal", array('name'=>'url','label'=>'Url','type'=>'url','pattern'=>'','default'=>$transform->url)) ?>
                        <?php $this->load->view("component/input-text-readonly-horizontal", array('name'=>'type','label'=>'Format Type','type'=>'','pattern'=>'','default'=>$transform->type)) ?>
                        <?php $this->load->view("component/input-text-readonly-horizontal", array('name'=>'flowType','label'=>'Flow Type','type'=>'','pattern'=>'','default'=>$transform->flowType)) ?>
                        <?php endif; ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="fileRq">File Request</label>
                            <div class="col-md-9">
                                <?php if (in_array('Transform',$this->session->userdata('pages'))): ?>
                                <input type="file" class="filestyle" name="fileRq" data-buttonname="btn-default" accept="*" />
                                <?php endif; ?>
                                <textarea class="form-control m-t-10" readonly><?php echo $transform->fileRequest?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="fileRs">File Response</label>
                            <div class="col-md-9">
                                <?php if (in_array('Transform',$this->session->userdata('pages'))): ?>
                                <input type="file" class="filestyle" name="fileRs" data-buttonname="btn-default" accept="*" />
                                <?php endif; ?>
                                <textarea class="form-control m-t-10" readonly><?php echo $transform->fileResponse?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="fileCb">File Callback</label>
                            <div class="col-md-9">
                                <?php if (in_array('Transform',$this->session->userdata('pages'))): ?>
                                <input type="file" class="filestyle" name="fileCb" data-buttonname="btn-default" accept="*" />
                                <?php endif; ?>
                                <textarea class="form-control m-t-10" readonly><?php echo $transform->fileCallback?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <?php if (in_array('Transform',$this->session->userdata('pages'))): ?>
                    <button type="button" id="updateTransform" class="btn btn-primary m-l-10">Update</button>
                    <a href="<?php echo base_url('/transform') ?>" class="btn btn-default">Cancel</a>
                    <?php else: ?>
                    <a href="<?php echo base_url('/transform') ?>" class="btn btn-default">Back</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
        <?php $this->load->view("template/base-js.php") ?>
    </div>
    <script>
    $('#updateTransform').click(function(){
        var formData = new FormData();
        
        $.each($('#transformForm').find("input[type='file']"), function(i, tag) {
            $.each($(tag)[0].files, function(i, file) {
                formData.append(tag.name, file);
            });
        });

        $.each($('#transformForm').find("input[type='text']"), function(i, tag) {
            if (tag.name != '') {
                formData.append(tag.name, tag.value);
            }
        });

        $.each($('#transformForm').find("input[type='hidden']"), function(i, tag) {
            if (tag.name != '') {
                formData.append(tag.name, tag.value);
            }
        });
        
        formData.append('type', $("input[name='type']:checked").val());
        formData.append('flowtype', $("input[name='flowType']:checked").val());

        $.ajax({
            url: '<?php echo URL_API_BACKEND_JS ?>'+'/transform/Update',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            enctype: 'multipart/form-data',
            success: function(data){
                setTimeout(function (){
                    location.href='/transform';
                }, 500);
            }
        })

    });
    </script>
</body>
</html>
