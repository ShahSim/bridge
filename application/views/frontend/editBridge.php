<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php if($this->session->flashdata('status')):?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('status')?>      
                    </div>
                <?php endif;?>
                <form id="edit_bridge_form" action="<?= base_url('update_bridge/').$master->id?>" method="POST"> 
                    <div class="card-header">
                        <h5>Bridge Information
                            <a href="<?= base_url()?>" class="btn btn-danger float-right">Back</a>
                        </h5> 
                    </div>
                    <div class="card-body">   
                        <div class="form-group">
                            <label for="">Bridge Name</label>
                            <input type="text" class="form-control" name="bridge_name" value="<?= $master->bridge_name?>" maxlength="50" size="50">
                            <small id="bridge_name_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Division</label>
                            <input type="text" class="form-control " name="division" value="<?= $master->division?>" maxlength="50" size="50">
                            <small id="division_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Road no</label>
                            <!-- <input type="text" class="form-control" name="road_no" value="" maxlength="50" size="50"> -->
                            <select id="road_no_input" class="form-control" name="road_no">
                                <option value="<?= $master->road_no?>"  selected hidden><?= $master->road_no?></option>
                            </select>
                            <small id="road_no_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Road</label>
                            <!-- <input type="text" class="form-control" name="road" value="" maxlength="50" size="50"> -->
                            <select id="road_input" class="form-control" name="road">
                                <option value="<?= $master->road?>" selected hidden><?= $master->road?></option>
                            </select>
                            <small id="road_error" class="text-danger"></small>
                        </div>   
                                         
                    </div>
                    
                    <div class="card-header">
                        <h6>Google map link</h6> 
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Latitude</label>
                            <input id="latitude_edit" type="text" class="form-control" name="latitude" value="<?= $google_map_link->latitude?>" maxlength="50" size="50">
                            <small id="latitude_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Longitude</label>
                            <input id="longitude_edit" type="text" class="form-control" name="longitude" value="<?= $google_map_link->longitude?>" maxlength="50" size="50">
                            <small id="longitude_error" class="text-danger"></small>
                        </div>

                    </div>

                    <div class="card-header">
                        <h6>Submitted</h6> 
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Demand letter</label>
                            <select class="form-select" name="demand_letter">
                                <option value="<?= $submitted->demand_letter?>" selected hidden><?= $submitted->demand_letter?></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <small id="demand_letter_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">BIWTA clearance</label>
                            <select class="form-select" name="BIWTA_clearance">
                                <option value="<?= $submitted->BIWTA_clearance?>" selecte hidden><?= $submitted->BIWTA_clearance?></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <small id="BIWTA_clearance_error" class="text-danger"></small>
                        </div>   

                        <div class="form-group">
                            <label for="">Google map link</label>
                            <select class="form-select" name="Google_map_link">
                                <option id="GML_op_1" value="<?= $submitted->Google_map_link?>" selelted hidden ><?= $submitted->Google_map_link?></option>
                                <option id="GML_op_2" value="Yes">Yes</option>
                                <option id="GML_op_3" value="No">No</option>
                            </select>
                            <small id="Google_map_link_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Checklist</label>
                            <select class="form-select" name="checklist">
                                <option value="<?= $submitted->checklist?>" selected hidden><?= $submitted->checklist?></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <small id="checklist_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Topo survey</label>
                            <select class="form-select" name="topo_survey">
                                <option value="<?= $submitted->topo_survey?>" selected hidden><?= $submitted->topo_survey?></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <small id="topo_survey_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">X section</label>
                            <select class="form-select" name="x_section">
                                <option value="<?= $submitted->x_section?>" selected hidden><?= $submitted->x_section?></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <small id="x_section_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Soil test</label>
                            <select class="form-select" name="soil_test">
                                <option value="<?= $submitted->soil_test?>" selected hidden><?= $submitted->soil_test?></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <small id="soil_test_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Pictures</label>
                            <select class="form-select" name="pictures">
                                <option value="<?= $submitted->pictures?>" selected hidden><?= $submitted->pictures?></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <small id="pictures_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Existing bridge dimension</label>
                            <select class="form-select" name="existing_bridge_dimension">
                                <option value="<?= $submitted->existing_bridge_dimension?>" selected hidden><?= $submitted->existing_bridge_dimension?></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <small id="existing_bridge_dimension_error" class="text-danger"></small>
                        </div>


                    </div>


                    <div class="card-header">
                        <h6>Design phase data</h6> 
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Design</label>
                            <input type="text" class="form-control" name="design" value="<?= $design_phase->design?>" maxlength="50" size="50">
                            <small id="design_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">E nothi sent</label>
                            <input type="text" class="form-control" name="e_nothi_sent" value="<?= $design_phase->e_nothi_sent?>" maxlength="50" size="50">
                            <small id="e_nothi_sent_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">E nothi approved</label>
                            <input type="text" class="form-control" name="e_nothi_approved" value="<?= $design_phase->e_nothi_approved?>" maxlength="50" size="50">
                            <small id="e_nothi_approved_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Sent with covering letter</label>
                            <input type="text" class="form-control" name="sent_with_covering_letter" value="<?= $design_phase->sent_with_covering_letter?>" maxlength="50" size="50">
                            <small id="sent_with_covering_letter_error" class="text-danger"></small>
                        </div>

                    </div>


                    <div class="card-footer">
                        <div class="form-group w-100 d-flex justify-content-center">
                                <button id="submit_edit_btn" type="submit" class="btn btn-primary mt-3" value="<?= $master->id?>">SAVE</button>  
                        </div>
                    </div>
   
                </form>
            </div>
        </div>
    </div>
</div> 

