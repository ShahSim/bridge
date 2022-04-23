<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script>
    $(document).ready(function () {

        // $('#latitude_edit').change(function (e) { 
        //     e.preventDefault();
        //     $('#GML_op_1').attr('selected',false);
        //     $('#GML_op_2').attr('selected',true);
        // });
        // if($('#latitude_edit').val()!=0 && $('#longitude_edit').val()!=0)
        // {
        //     $('#GML_op_1').attr('selected',false);
        //     $('#GML_op_2').attr('selected',true);
        // }

        //Getting road no
        $('#road_input').attr('disabled', 'disabled');
        $.ajax({
                    method: "GET",
                    url: "http://localhost/bridgeAppAPI/testAPI",
                    dataType: "json",
                    success: function(data) {
                         Object.keys(data).forEach(function(key) {
                            $('#road_no_input').append($('<option>').val(data[key].RoadNo).text(data[key].RoadNo));
                        });
                    }
                })
        ///////////////////
        
        //Getting road name by road no
        $('#road_no_input').change(function (e) { 
            e.preventDefault();
            $('#road_input').attr('disabled', false);
            $('#road_input').html('<option value="" selected hidden>--select--</option>');
            //console.log($(this).find(':selected').text());
            console.log($(this).val());

            $.ajax({
                    method: "GET",
                    url: "http://localhost/bridgeAppAPI/testRoad/"+$(this).val(),
                    dataType: "json",
                    success: function(data) {
                         Object.keys(data).forEach(function(key) {
                            $('#road_input').append($('<option>').val(data[key].RoadName).text(data[key].RoadName));
                        });
                    }
                })
        });
        ////////////////////

        
        $('#edit_bridge_form').on('submit', function(event) {
            event.preventDefault();
            id_global = $('#submit_edit_btn').val();
            $.ajax({
                url: "<?= base_url('update_bridge/')?>"+id_global,
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('#submit_edit_btn').attr('disabled', 'disabled');
                },

                success: function(data) {
                    if (data.error) {
                        
                        Object.keys(data).forEach(function(key) {

                            console.log(key,data[key]);

                            if (data[key] != '') {
                                $('#'+key).html(data[key]);
                            } else {
                                $('#'+key).html('');
                            }
                        });

                        alert('Input Error!!');

                    }

                    if (data.success) {
                        window.location.reload();
                    }
                    $('#submit_edit_btn').attr('disabled', false);
                }
            })
        });
    });
</script>