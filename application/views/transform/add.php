<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <h4 class="header-title">Add Transform</h4>
            <?php $this->load->view("component/alert.php") ?>
            <form action="transform/add" method="post" enctype="multipart/form-data" class="form-horizontal" id="transformForm">
                <div class="col-md-12">
                    <div class="card-box">
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'transformId','label'=>'Alias','type'=>'','pattern'=>'^[a-zA-Z0-9\\.\\,\\-\\_ ]*$')) ?>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'name','label'=>'Name','type'=>'','pattern'=>'^[a-zA-Z0-9\\.\\,\\-\\_ ]*$')) ?>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'method','label'=>'Method','type'=>'','pattern'=>'^[a-zA-Z0-9\\. ]*$')) ?>
                        <?php $this->load->view("component/input-text-horizontal", array('name'=>'url','label'=>'Url','type'=>'url','pattern'=>'','default'=>'')) ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Format Type</label>
                            <?php $this->load->view("component/input-radio", array('name'=>'type','value'=>'JSON_TO_JSON','label'=>'Json to Json','default'=>'JSON_TO_JSON')) ?>
                            <?php $this->load->view("component/input-radio", array('name'=>'type','value'=>'JSON_TO_XML','label'=>'Json to Xml','default'=>'JSON_TO_JSON')) ?>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Flow Type</label>
                            <?php $this->load->view("component/input-radio", array('name'=>'flowType','value'=>'Sync','label'=>'Synchronous','default'=>'Sync')) ?>
                            <?php $this->load->view("component/input-radio", array('name'=>'flowType','value'=>'Async','label'=>'Asynchronous','default'=>'Sync')) ?>
                        </div>
                        <?php $this->load->view("component/input-file-add", array('name'=>'fileRq','label'=>'File Request')) ?>
                        <?php $this->load->view("component/input-file-add", array('name'=>'fileRs','label'=>'File Response')) ?>
                        <?php $this->load->view("component/input-file-add", array('name'=>'fileCb','label'=>'File Callback')) ?>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="button" id="addTransform" class="btn btn-primary m-l-10">Add</button>
                    <a href="<?php echo base_url('/transform') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
        <?php $this->load->view("template/base-js.php") ?>
    </div>
    <script>
    $('#addTransform').click(function(){
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

        formData.append('type', $("input[name='type']:checked").val());
        formData.append('flowtype', $("input[name='flowType']:checked").val());

        $.ajax({
            url: '<?php echo URL_API_BACKEND_JS ?>'+'/transform/Add',
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
