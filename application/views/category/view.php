<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <?php if (in_array('Biller',$this->session->userdata('pages'))): ?>
            <button class="btn btn-primary pull-right" style="margin-top:-4px;margin-right:6px" type="button" data-toggle="modal" data-target="#addBillerProduct">
                <icon class="fa fa-plus"></icon>
            </button>
            <?php endif; ?>
            <?php $this->load->view("category/modal-add-biller-product",array('products'=>$products,'billerId'=>$billerId,'transforms'=>$transforms)) ?>
            <?php foreach ($billerProducts as $billerProduct) :?>
                <?php $this->load->view("category/modal-edit-biller-product",array('billerProduct'=>$billerProduct,'products'=>$products,'transforms'=>$transforms)) ?>
            <?php endforeach;?>
            <h4 class="header-title"><a href="/biller/<?php echo $billerId?>" style="color:#676a6c"><?php echo $billerProducts[0]->biller->billerName?></a> > <?php echo $category?></h4>
            <?php $this->load->view("component/alert.php") ?>
            <div class="col-md-12">
                <div class="col-md-12 m-b-20">
                    <table class="table table-striped m-0" id="datatableProducts">
                        <thead>
                            <tr>
                                <th>API Code</th>
                                <th>Biller Code</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Denom</th>
                                <th>Biller Price</th>
                                <th>Admin Fee</th>
                                <?php if (in_array('Biller',$this->session->userdata('pages'))): ?>
                                <th style="width:100px">Action</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php $this->load->view("template/base-js.php") ?>
    </div>
    <script>

    let products = [
        <?php foreach ($billerProducts as $billerProduct) :?>
        {
            "id":"<?php echo $billerProduct->id?>-<?php echo $billerProduct->status?>",
            "apiId":"<?php echo $billerProduct->api->apiId?>",
            "billerCode":"<?php echo $billerProduct->billerCode?>",
            "apiName":"<?php echo $billerProduct->api->apiName?>",
            "apiDescription":"<?php echo $billerProduct->api->apiDescription?>",
            "denom":"<?php echo $billerProduct->denom?>",
            "billerPrice":"<?php echo $billerProduct->billerPrice?>",
            "adminFee":"<?php echo $billerProduct->adminFee?>",
        },
        <?php endforeach;?>
    ]

    $('#datatableProducts').dataTable( {
        "data": products,
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
            { "data": "billerCode" },
            { "data": "apiName" },
            { "data": "apiDescription" },
            { "data": "denom",
                "render": function ( data, type, row, meta ) {
                    return data == '' ? data : data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },
            },
            { "data": "billerPrice",
                "render": function ( data, type, row, meta ) {
                    return data == '' ? data : data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },
            },
            { "data": "adminFee",
                "render": function ( data, type, row, meta ) {
                    return data == '' ? data : data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },
            },
            <?php if (in_array('Biller',$this->session->userdata('pages'))): ?>
            { "data": "id",
                "render": function ( data, type, row, meta ) {
                    return '<div><div class="col-md-5"><button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#editBillerProductModal'+data.substr(0, data.indexOf('-'))+'"><icon class="fa fa-pencil"></icon></button></div><div class="col-md-5"><form action="/billerProduct/status/'+data.substr(0, data.indexOf('-'))+'" method="post" enctype="multipart/form-data" class="m-b-0"><button type="submit" class="btn btn-default btn-sm"><i class="fa '+ (data.substr(data.indexOf('-') + 1) == '1' ? 'fa-check-square-o' : 'fa-square-o') +'"></i></button></form></div></div>';
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
