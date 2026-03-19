<html>
<?php $this->load->view("template/head.php") ?>
<body>
    <div id="page-wrapper">
        <?php $this->load->view("template/bar.php") ?>
        <div id="page-right-content">
            <h4 class="header-title">Transaction History</h4>
            <div class="col-md-12">
                <div class="card-box row">
                    <form action="<?php echo site_url('report') ?>" method="post" enctype="multipart/form-data" id="searchForm">
                        <div class="form-group col-md-6">
                            <label class="col-md-4 m-t-10 control-label text-right">Partner</label>
                            <div class="col-md-8">
                                <select class="form-control form-white select2" name="partnerSelect" id="partnerSelect">
                                    <option value="<?php echo $this->session->flashdata('post') ? $this->session->flashdata('post')['partnerSelect'] : '' ?>">
                                        <?php echo $this->session->flashdata('post') ? ($this->session->flashdata('post')['partnerSelected'] ? $this->session->flashdata('post')['partnerSelected'] : 'All') : 'All' ?>
                                    </option>
                                    <option value="">All</option>
                                    <?php foreach ($partners as $partner) :?>
                                        <option value="<?php echo $partner->id?>"><?php echo $partner->name?></option>
                                    <?php endforeach;?>
                                </select>
                                <input type="hidden" name="partnerSelected" id="partnerSelected"/>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 m-t-10 control-label  text-right">Category</label>
                            <div class="col-md-8">
                                <select class="form-control form-white select2" name="categorySelect" id="categorySelect">
                                    <option value="<?php echo $this->session->flashdata('post') ? $this->session->flashdata('post')['categorySelect'] : '' ?>">
                                        <?php echo $this->session->flashdata('post') ? ($this->session->flashdata('post')['categorySelect'] ? $this->session->flashdata('post')['categorySelect'] : 'All') : 'All' ?>
                                    </option>
                                    <option value="">All</option>
                                    <?php foreach ($categories as $category) :?>
                                        <option value="<?php echo $category?>"><?php echo $category?></option>
                                    <?php endforeach;?>
                                </select>
                                <input type="hidden" name="memberSelected" id="memberSelected"/>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 m-t-10 control-label  text-right">Biller</label>
                            <div class="col-md-8">
                                <select class="form-control form-white select2" name="billerSelect" id="billerSelect">
                                    <option value="<?php echo $this->session->flashdata('post') ? $this->session->flashdata('post')['billerSelect'] : '' ?>">
                                        <?php echo $this->session->flashdata('post') ? ($this->session->flashdata('post')['billerSelected'] ? $this->session->flashdata('post')['billerSelected'] : 'All') : 'All' ?>
                                    </option>
                                    <option value="">All</option>
                                    <?php foreach ($billers as $biller) :?>
                                        <option value="<?php echo $biller->id?>"><?php echo $biller->billerName?></option>
                                    <?php endforeach;?>
                                </select>
                                <input type="hidden" name="billerSelected" id="billerSelected"/>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 m-t-10 control-label  text-right">Date</label>
                            <div class="col-md-8">
                                <div class="input-daterange input-group" id="date-range">
                                    <input type="text" class="form-control" name="start" id="start"/>
                                    <span class="input-group-addon b-0">to</span>
                                    <input type="text" class="form-control" name="end" id="end"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center m-t-10">
                            <button type="submit" class="btn btn-primary m-l-10">Submit</button>
                            <a class="btn btn-default" href="/report">Clear</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 m-b-20">
                    <table class="table table-striped m-0" id="datatableReport">
                        <thead>
                            <tr>
                                <th>Date Time</th>
                                <th>Trx Id</th>
                                <th>API Code</th>
                                <th>Partner</th>
                                <th>Partner Sell Price</th>
                                <th>Partner Trx Id</th>
                                <th>Biller</th>
                                <th>Biller Price</th>
                                <th>Biller Trx Id</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php $this->load->view("template/base-js.php") ?>
        <script src="<?php echo base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
    </div>
    <script>
    let reports = [
        <?php foreach ($reports as $report) :?>
        {
            "tid":"<?php echo $report->bmTid?>",
            "dateTime":"<?php echo DateTime::createFromFormat('Y-m-d\TH:i:s.uO', $report->creationDate)->add(new DateInterval('PT7H'))->format('F j, Y H:i')?>",
            "apiCode":"<?php echo $report->partnerCode?>",
            "partner":"<?php echo $report->partnerName?>",
            "sellPrice":"<?php echo $report->partnerPrice?>",
            "partnerTid":"<?php echo $report->partnerTid?>",
            "biller":"<?php echo $report->billerName?>",
            "billerPrice":"<?php echo $report->billerPrice?>",
            "billerTid":"<?php echo $report->billerTid?>",
            "status":"<?php echo $report->status?>",
        },
        <?php endforeach;?>
    ]

    $('#datatableReport').dataTable( {
        "data": reports,
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
        "order": [[ 0, "desc" ], [ 1, "desc" ]],
        "columns": [
            { "data": "dateTime" },
            { "data": "tid" },
            { "data": "apiCode" },
            { "data": "partner" },
            { "data": "sellPrice" ,
                "render": function ( data, type, row, meta ) {
                    return data == '' ? data : data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },
            },
            { "data": "partnerTid" },
            { "data": "biller" },
            { "data": "billerPrice",
                "render": function ( data, type, row, meta ) {
                    return data == '' ? data : data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },
            },
            { "data": "billerTid" },
            { "data": "status" }
        ],
        "columnDefs": [
            {
                "targets": 4,
                "className": 'text-right'
            },
            {
                "targets": 7,
                "className": 'text-right'
            },
        ],
    } );

    $(document).ready(function() {
        $('#partnerSelected').val('<?php echo $this->session->flashdata('post') ? $this->session->flashdata('post')['partnerSelected'] : '' ?>');
        $('#billerSelected').val('<?php echo $this->session->flashdata('post') ? $this->session->flashdata('post')['billerSelected'] : '' ?>');
    });

    $("#partnerSelect").change(function() {
        let partnerSelected = $("#partnerSelect option:selected").text();
        $('#partnerSelected').val(partnerSelected);
    });

    $("#billerSelect").change(function() {
        let billerSelected = $("#billerSelect option:selected").text();
        $('#billerSelected').val(billerSelected);
    });

    $('#date-range').datepicker({
        toggleActive: true,
        format: 'dd-mm-yyyy',
        endDate: new Date(),
    });
    let startDate = <?php echo ($this->session->flashdata('post') ? "'".$this->session->flashdata('post')['start']."'" : 'null' )?>;
    if (startDate == null) {
        $('#start').val(moment().subtract(1, 'days').format("DD-MM-YYYY"));
    } else {
        $('#start').val(startDate);
    }
    let endDate = <?php echo ($this->session->flashdata('post') ? "'".$this->session->flashdata('post')['end']."'" : 'null' )?>;
    if (endDate == null) {
        $('#end').val(moment().format("DD-MM-YYYY"));
    } else {
        $('#end').val(endDate);
    }
    </script>
</body>
</html>
