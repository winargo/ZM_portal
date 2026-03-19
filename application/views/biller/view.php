<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <?php if (in_array('Biller',$this->session->userdata('pages'))): ?>
            <button class="btn btn-danger pull-right" style="margin-top:-4px;margin-right:6px" type="button" id="activateCategory">
                <icon class="fa fa-times"></icon>
            </button>
            <button class="btn btn-primary pull-right" style="margin-top:-4px;margin-right:6px" type="button" data-toggle="modal" data-target="#addBillerProduct">
                <icon class="fa fa-plus"></icon>
            </button>
            <?php $this->load->view("category/modal-add-biller-product",array('products'=>$products,'billerId'=>$biller->id,'transforms'=>$transforms)) ?>
            <?php endif; ?>
            <a class="btn btn-default pull-right" style="margin-top:-4px;margin-right:6px" href="/biller/detail/<?php echo $biller->id?>">
                <icon class="fa fa-eye"></icon>
            </a>
            <h4 class="header-title"><?php echo $biller->billerName?></h4>
            <div class="row" style="margin-bottom:10px">
                <div class="col-md-offset-9 col-md-1 text-right m-t-10">Search:</div>
                <div class="col-md-2">
                    <input class="form-control" id="searchBox"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" id="returnRow">
                    <?php foreach ($categories as $category) :?>
                        <?php $this->load->view("component/text-box.php",array('id'=>$biller->id.'/'.$category,'url'=>'category','text'=>$category)) ?>
                    <?php endforeach;?>
                    </div>
            </div>
        </div>
        <?php $this->load->view("template/base-js.php") ?>
    </div>
    <script>
        $('#activateCategory').click(function() {
            $('.switch').toggle();
        });

        $('.switch-category').on('change', function (e, data) {
            $.getJSON('<?php echo URL_API_BACKEND_JS ?>/gui/billerApi/category/status/toggle/<?php echo $biller->id?>/'+e.target.id+'/'+(e.target.checked ? 'active' : 'inactive'), function() {});
        }); 

        let categories = [
        <?php foreach ($categories as $category) :?>
            {
                'name':'<?php echo $category?>',
            },
        <?php endforeach;?>
        ];

        $('#searchBox').on("keyup",function() {
            $('#returnRow').html('');
            let search = $('#searchBox').val();
            categories.forEach(function (category){
                if (category.name.toLowerCase().includes(search.toLowerCase())) {
                    let current = $('#returnRow').html();
                    $('#returnRow').html( current + '<div class="col-sm-3 p-5"><div class="pull-right switch m-t-r-10"><input type="checkbox" data-plugin="switchery" data-color="#039cfd" data-size="small" checked></div><a href="/category/<?php echo $biller->id?>/'+category.name+'"><div class="card-box text-center box-list"><h4>'+category.name+'</h4></div></a></div>');   
                }
            });
            $('[data-plugin="switchery"]').each(function (idx, obj) {
                new Switchery($(this)[0], $(this).data());
            });
        });

        $('#apiId').change(function(e){
            $('#apiCode').val(e.target.value);
        });
    </script>
    <style>.switch{display:none}</style>
</body>
</html>
