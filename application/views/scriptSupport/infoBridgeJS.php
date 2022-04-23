<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- BEGIN PLUGINS JS -->
<script src="<?= base_url()?>/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>/assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- END PLUGINS JS -->

<!-- BEGIN PAGE LEVEL JS -->
<!-- <script src="<?= base_url()?>/assets/javascript/pages/dataTables.bootstrap.js"></script> -->
<!-- <script src="<?= base_url()?>/assets/javascript/pages/datatables-responsive-demo.js"></script>  -->
<!-- END PAGE LEVEL JS -->

<script>
    $(document).ready(function () {
        
        $('#master_dt_responsive, #google_map_link_dt_responsive, #submitted_dt_responsive, #design_phase_dt_responsive, #all_joined_dt_responsive').dataTable({
            "scrollY": 450,
            "scrollX": true
        });
     

        ////Hide and show tables
        $('#table_container > div').hide();
        $('#master_table').show();
        $('#btn_nav > button').addClass('btn-secondary');
        $('#master_table_btn').toggleClass('btn-secondary btn-info');

        $('#master_table_btn, #google_map_link_table_btn, #submitted_table_btn, #design_phase_table_btn, #all_joined_table_btn').click(function (e) { 
            e.preventDefault();

            $('#btn_nav > button').removeClass('btn-info');
            $('#btn_nav > button').addClass('btn-secondary');
            $(this).removeClass('btn-secondary');
            $(this).addClass('btn-info');

            $('#table_container > div').hide();
            $('#'+ $(this).val()).show();
        });

        /////////////////////////

        //Deleting information
        $("#master_dt_responsive").on("click", ".confirm-delete", function() {
            confirmDialog = confirm("Are you sure?");

            if (confirmDialog) {
                var id = $(this).val();
                $.ajax({
                    type: "DELETE",
                    url: "<?= base_url('delete_bridge/') ?>" + id,
                    success: function(response) {
                        alert('Data deleted');
                        window.location.reload();
                    }
                });
            }

            //return false;
        });
        //////////////////////////////
    });
</script>