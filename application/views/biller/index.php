<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <?php if (in_array('Biller',$this->session->userdata('pages'))): ?>
            <a class="btn btn-primary pull-right m-b-10" style="margin-top:-4px" href="/biller/add">
                <icon class="fa fa-plus"></icon>
            </a>
            <?php endif; ?>
            <h4 class="header-title">Biller List</h4>
            <div class="row" style="margin-bottom:10px">
                <div class="col-md-offset-9 col-md-1 text-right m-t-10">Search:</div>
                <div class="col-md-2">
                    <input class="form-control" id="searchBox"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" id="returnRow">
                    <?php foreach ($billers as $biller) :?>
                        <?php $this->load->view("component/text-box.php",array('id'=>$biller->id,'url'=>'biller','text'=>$biller->billerName)) ?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <?php $this->load->view("template/base-js.php") ?>
    </div>
    <script>
        let billers = [
        <?php foreach ($billers as $biller) :?>
            {
                'id':'<?php echo $biller->id?>',
                'name':'<?php echo $biller->billerName?>',
            },
        <?php endforeach;?>
        ];

        $('#searchBox').on("keyup",function() {
            $('#returnRow').html('');
            let search = $('#searchBox').val();
            billers.forEach(function (biller){
                if (biller.name.toLowerCase().includes(search.toLowerCase())) {
                    let current = $('#returnRow').html();
                    $('#returnRow').html( current + '<div class="col-sm-3 p-5"><a href="/biller/'+biller.id+'"><div class="card-box text-center box-list"><h4>'+biller.name+'</h4></div></a></div>');   
                }
            });
        });
    </script>
    <style>.switch{display:none}</style>
</body>
</html>
