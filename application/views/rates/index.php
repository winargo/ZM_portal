<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <h4 class="header-title">Rates Management</h4>
            <div class="col-md-12">
                <div class="card-box row">
                    <form action="<?php echo site_url('rates') ?>" method="post" enctype="multipart/form-data" id="searchForm">
                        <div class="form-group col-md-6">
                            <label class="col-md-4 m-t-10 control-label text-right">Partner</label>
                            <div class="col-md-8">
                                <select class="form-control form-white select2" name="partnerSelect" id="partnerSelect">
                                    <option></option>
                                    <?php foreach ($partners as $partner) :?>
                                        <option value="<?php echo $partner->id?>"><?php echo $partner->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 m-t-10 control-label  text-right">Category</label>
                            <div class="col-md-8">
                                <select class="form-control form-white select2" name="categorySelect" id="categorySelect">
                                    <option></option>
                                    <?php foreach ($categories as $category) :?>
                                        <option value="<?php echo $category?>"><?php echo $category?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 text-center m-t-10">
                            <a class="btn btn-default" href="/rates">Clear</a>
                        </div>
                    </form>
                </div>
                <?php $this->load->view("component/alert.php") ?>
                <?php if ($this->session->flashdata('get') && 
                isset($this->session->flashdata('get')['p']) &&
                isset($this->session->flashdata('get')['c']) &&
                $this->session->flashdata('get')['p'] != '' &&
                $this->session->flashdata('get')['c'] != ''): ?>
                <div class="col-md-12 m-b-20">
                    <div class="row">
                        <?php if (in_array('Rates',$this->session->userdata('pages'))): ?>
                        <button class="btn btn-primary pull-right m-b-10" type="button" data-toggle="modal" data-target="#addRatesModal">
                            <icon class="fa fa-plus"></icon> Add
                        </button>
                        <?php endif; ?>
                        <?php $this->load->view("rates/modal-add-rates.php",array('products'=>$products,'billerProducts'=>$billerProducts)) ?>
                        <?php foreach ($partnerProducts as $partnerProduct) :?>
                            <?php $this->load->view("rates/modal-edit-rates.php",array('products'=>$products,'billerProducts'=>$billerProducts,'partnerProduct'=>$partnerProduct)) ?>
                            <?php $this->load->view("rates/modal-delete-rates", array('id'=>$partnerProduct->id,'name'=>$partnerProduct->api->apiName,'category'=>$partnerProduct->api->apiCategory,'partnerId'=>$partnerProduct->partner->id)) ?>
                        <?php endforeach;?>
                    </div>
                    <table class="table table-striped m-0" id="datatableRates">
                        <thead>
                            <tr>
                                <th>API Code</th>
                                <th>API Name</th>
                                <th>Selection</th>
                                <th>Denom</th>
                                <th>Sell Price</th>
                                <th>Partner Admin Fee</th>
                                <th>Biller 1</th>
                                <th>Biller 2</th>
                                <th>Biller 3</th>
                                <?php if (in_array('Rates',$this->session->userdata('pages'))): ?>
                                <th style="width:100px">Action</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <script>
        document.getElementById('partnerSelect').value='<?php echo isset($this->session->flashdata('get')['p']) ? $this->session->flashdata('get')['p'] : '' ?>';
        document.getElementById('categorySelect').value='<?php echo isset($this->session->flashdata('get')['c']) ? $this->session->flashdata('get')['c'] : '' ?>';
        </script>
        <?php $this->load->view("template/base-js.php") ?>
    </div>
    <script>

    var url = new URL(location.href);

    function goToAddParameterToURL(key,value){
        if (url.searchParams.get(key) || url.searchParams.get(key)==='') {
            url.searchParams.set(key,value);
        } else {
            url.searchParams.append(key, value);
        }
        return url;
    }

    $("#partnerSelect").change(function(e) {
        location.href=goToAddParameterToURL('p',e.target.value);
    });

    $("#categorySelect").change(function(e) {
        location.href=goToAddParameterToURL('c',e.target.value);
    });

    let products = {
        <?php foreach ($products as $product) :?>
        "<?php echo $product->id?>":"<?php echo $product->apiId?>",
        <?php endforeach;?>
    }

    let billerApis = [
        <?php foreach ($billerProducts as $billerProduct) :?>
        {
            "apiId":"<?php echo $billerProduct->api->id?>",
            "billerApiId":"<?php echo $billerProduct->id?>",
            "billerId":"<?php echo $billerProduct->biller->id?>",
            "optionText":"<?php echo $billerProduct->biller->billerName?> / <?php echo number_format($billerProduct->billerPrice,0,',','.')?> / <?php echo number_format($billerProduct->adminFee,0,',','.')?>",
            "status":"<?php echo $billerProduct->status?>",
        },
        <?php endforeach;?>   
    ]

    $('#apiId').change(function(e) {
        let api = $("#apiId option:selected").val();
        $("#apiCode").val(products[api]);

        $('#biller1Select').find('option').remove().end().append('<option />');
        $('#biller2Select').find('option').remove().end().append('<option />');
        $('#biller3Select').find('option').remove().end().append('<option />');

        billerApis.forEach(function (billerApi){
            if (billerApi.apiId == api) {
                $('#biller1Select').append('<option value="'+billerApi.billerId+'">'+billerApi.optionText+'</option>');
                $('#biller2Select').append('<option value="'+billerApi.billerId+'">'+billerApi.optionText+'</option>');
                $('#biller3Select').append('<option value="'+billerApi.billerId+'">'+billerApi.optionText+'</option>');
            }
        });
    });

    <?php foreach ($partnerProducts as $product) :?>
    billerApis.forEach(function (billerApi){
        if (billerApi.apiId == <?php echo $product->api->id?> && billerApi.status) {
            $('#biller1Select<?php echo $product->id?>').append('<option value="'+billerApi.billerId+'">'+billerApi.optionText+'</option>');
            $('#biller2Select<?php echo $product->id?>').append('<option value="'+billerApi.billerId+'">'+billerApi.optionText+'</option>');
            $('#biller3Select<?php echo $product->id?>').append('<option value="'+billerApi.billerId+'">'+billerApi.optionText+'</option>');
        }
    });

    <?php endforeach;?>
    
    let rates = [               
        <?php foreach ($partnerProducts as $product) :?>
        {
            "id":"<?php echo $product->id?>",
            "apiId":"<?php echo $product->api->apiId?>",
            "apiName":"<?php echo $product->api->apiName?>",
            "apiSelection":"<?php echo $product->api->apiSelection?>",
            "nominal":"<?php echo $product->api->nominal?>",
            "partnerPrice":"<?php echo $product->partnerPrice?>",
            "partnerFee":"<?php echo $product->partnerFee?>",
            "billerName1":"",
            "billerName2":"",
            "billerName3":"",
            <?php foreach ($product->billerApiId as $billerApi) :?>
                <?php if($billerApi->priority == 1) :?>
                    "billerName1": "<?php echo $billerApi->billerApiId->biller->billerName?>",
                <?php endif;?>
            <?php endforeach;?>
            <?php foreach ($product->billerApiId as $billerApi) :?>
                <?php if($billerApi->priority == 2) :?>
                    "billerName2": "<?php echo $billerApi->billerApiId->biller->billerName?>",
                <?php endif;?>
            <?php endforeach;?>
            <?php foreach ($product->billerApiId as $billerApi) :?>
                <?php if($billerApi->priority == 3) :?>
                    "billerName3": "<?php echo $billerApi->billerApiId->biller->billerName?>",
                <?php endif;?>
            <?php endforeach;?>
        },
        <?php endforeach;?>
    ]

    $('#datatableRates').dataTable( {
        "data": rates,
        "dom": "Bfrtip",
        "buttons": [{
            "extend": "excel",
            "className" : "btn-sm",
            "text": "Excel",
            exportOptions: {
                columns: ':visible',
                format: {
                    body: function(data, row, column, node) {
                        return $.isNumeric(data.replace('.', '')) ? data.replace('.', '') : data;
                    }
                }
            }
        }],
        "deferRender": true,
        "order": [[ 0, "desc" ]],
        "columns": [
            { "data": "apiId" },
            { "data": "apiName" },
            { "data": "apiSelection" },
            { "data": "nominal" ,
                "render": function ( data, type, row, meta ) {
                    return data == '' ? data : data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },
            },
            { "data": "partnerPrice" ,
                "render": function ( data, type, row, meta ) {
                    return data == '' ? data : data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },
            },
            { "data": "partnerFee" ,
                "render": function ( data, type, row, meta ) {
                    return data == '' ? data : data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },
            },
            { "data": "billerName1" },
            { "data": "billerName2" },
            { "data": "billerName3" },
            <?php if (in_array('Rates',$this->session->userdata('pages'))): ?>
            { "data": "id" ,
                "render": function ( data, type, row, meta ) {
                    return '<div><div class="col-md-5"><button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#editRatesModal'+data+'"><i class="fa fa-pencil"></i></button></div><div class="col-md-5"><button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#deleteModal'+data+'"><i class="fa fa-trash"></i></button></div></div>';
                },
            },
            <?php endif; ?>
        ],
        "columnDefs": [
            {
                "targets": 4,
                "className": 'text-right'
            },
            {
                "targets": 5,
                "className": 'text-right'
            },
            {
                "targets": 6,
                "className": 'text-right'
            },
        ],
    } );
    
    </script>
</body>
</html>
