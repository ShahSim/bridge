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
                <div class="card-header">
                    <h5>Insert Bridge Information
                    <a href="<?= base_url()?>" class="btn btn-danger float-right">Back</a>
                    </h5> 
                    
                </div>
                <div class="card-body">
                    <form id="add_bridge_form" method="POST"> 
                        <div class="form-group">
                            <label for="">Bridge Name</label>
                            <input type="text" class="form-control" name="bridge_name" maxlength="50" size="50">
                            <small id="bridge_name_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Division</label>
                            <input type="text" class="form-control " name="division" maxlength="50" size="50">
                            <small id="division_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Road no</label>
                            <!-- <input type="text" class="form-control" name="road_no" maxlength="50" size="50"> -->
                            <select id="road_no_input" class="form-control" name="road_no">
                                <option value="" selected hidden>--select--</option>
                            </select>
                            <small id="road_no_error" class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Road</label>
                            <!-- <input type="text" class="form-control" name="road" maxlength="50" size="50"> -->
                            <select id="road_input" class="form-control" name="road">
                                <option value="" selected hidden>--select--</option>
                            </select>
                            <small id="road_error" class="text-danger"></small>
                        </div>

                        <div class="form-group w-100 d-flex justify-content-center">
                            <button id="submit_master_button" type="submit" class="btn btn-primary">Create</button>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
