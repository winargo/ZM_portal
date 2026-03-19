<?php $this->load->view("template/script.php") ?>
<?php $this->load->view("template/datatables-js.php") ?>

<script src="<?php echo base_url('assets/js/jquery.app.js'); ?>"></script>
<script>
    $(".select2").select2();
    $('form').parsley();

    $(document).ready(function() {
        var thousands = $('.thousand').each(function(index,element){
            element.innerHTML = thousandSeparator(element.innerHTML);
        });
    });

    function thousandSeparator(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    var handleDataTableButtons = function () {
        "use strict";
        0 !== $("#datatable").length && $("#datatable").DataTable({
            order: [[ 0, "desc" ],[ 1, "desc" ]],
            dom: "Bfrtip",
            buttons: [{
                extend: "excel",
                className: "btn-sm"
            }],
            responsive: !0
        })
    },
    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                handleDataTableButtons()
            }
        }
    }();
    TableManageButtons.init();
</script>
