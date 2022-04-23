<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- .page-title-bar -->
<header class="page-title-bar">
    <?php if($this->session->flashdata('status')):?>
      <div class="alert alert-success">
          <?= $this->session->flashdata('status')?>      
      </div>
    <?php endif;?>
    <!-- .breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">
          <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Tables</a>
        </li>
      </ol>
    </nav><!-- /.breadcrumb -->
    <!-- title -->
    <h1 class="page-title"> Showing Bridge Information 
        <a href="<?= base_url('/add_bridge')?>" class="btn btn-primary float-right">Add Bridge</a>
    </h1>
    <p class="text-muted"> Resize your browser window to see it in action. </p><!-- /title -->
</header><!-- /.page-title-bar -->
<!-- .page-section -->
<div class="page-section">
  <!-- .card -->
  <div class="card card-fluid">
    <!-- .card-body -->
    <div class="card-body">
      <div id="btn_nav" class="d-flex flex-row justify-content-center">
        <button id="master_table_btn" class="btn btn-sm mx-1" value="master_table">Master</button>
        <button id="google_map_link_table_btn" class="btn btn-sm mx-1" value="google_map_link_table">Google Map Link</button>
        <button id="submitted_table_btn" class="btn btn-sm mx-1" value="submitted_table">Submitted</button>
        <button id="design_phase_table_btn" class="btn btn-sm mx-1" value="design_phase_table">Design Phase</button>
        <button id="all_joined_table_btn" class="btn btn-sm mx-1" value="all_joined_table">All Joined</button>
      </div>
      <!-- .table -->
      <div id="table_container" class="container">

          <div id="master_table" class="my-4">
            <h5>Master Table</h5>
            <?php $this->load->view('frontend/infoBridgeTables/master'); ?>   
          </div> 

          <div id="google_map_link_table" class="my-4">
            <h5>Google Map Link Table</h5>
            <?php $this->load->view('frontend/infoBridgeTables/google_map_link'); ?>
          </div>

          <div id="submitted_table" class="my-4">
            <h5>Submitted Table</h5>
            <?php $this->load->view('frontend/infoBridgeTables/submitted'); ?>
          </div>

          <div id="design_phase_table" class="my-4">
            <h5>Design Phase Table</h5>
            <?php $this->load->view('frontend/infoBridgeTables/design_phase'); ?>
          </div>

          <div id="all_joined_table" class="my-4">
            <h5>All Joined Table</h5>
            <?php $this->load->view('frontend/infoBridgeTables/all_joined'); ?>
          </div>

      </div>
      <!-- /.table -->
    </div><!-- /.card-body -->
  </div><!-- /.card -->
</div><!-- /.page-section -->

