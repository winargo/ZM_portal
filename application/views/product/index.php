<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <?php if (in_array('API',$this->session->userdata('pages'))): ?>
            <a class="btn btn-primary pull-right" style="margin-top:-4px" href="/product/add">
                <icon class="fa fa-plus"></icon>
            </a>
            <?php endif; ?>
            <h4 class="header-title">API</h4>
            <div class="col-md-12">
                <div class="col-md-12 m-b-20">
                    <div class="row">
                        <?php $this->load->view("rates/modal-add-rates.php") ?>
                    </div>
                    <table class="table table-striped m-0" id="datatableProducts">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Nominal</th>
                                <th>Selection</th>
                                <?php if (in_array('API',$this->session->userdata('pages'))): ?>
                                <th style="width:55px">Action</th>
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
        <?php foreach ($products as $product) :?>
        {
            "code":"<?php echo $product->apiId?>",
            "name":"<?php echo $product->apiName?>",
            "description":"<?php echo $product->apiDescription?>",
            "category":"<?php echo $product->apiCategory?>",
            "nominal":"<?php echo $product->nominal?>",
            "selection":"<?php echo $product->apiSelection?>",
            "id":"<?php echo $product->id?>",
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
            { "data": "code" },
            { "data": "name" },
            { "data": "description" },
            { "data": "category" },
            { "data": "nominal",
                "render": function ( data, type, row, meta ) {
                    return data == '' ? data : data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },
            },
            { "data": "selection" },
            { "data": "id",
                "render": function ( data, type, row, meta ) {
                    return '<div class="col-md-12"><a class="btn btn-primary btn-sm" href="/product/'+data+'"><i class="fa fa-pencil"></i></a></div>';
                },
            },
        ],
        "columnDefs": [
            {
                "targets": 4,
                "type": "num-fmt",
                "className": 'text-right'
            },
        ],
    } );
    </script>
</body>
</html>
