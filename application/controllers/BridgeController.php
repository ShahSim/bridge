<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BridgeController extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->database();
	}
/////////////////////
	public function index()
	{
        $this->load->view('common/header');
		$this->load->view('common/top');
		$this->load->view('common/side');
		$this->load->view('testView');
		$this->load->view('common/footer');
		$this->load->view('scriptSupport/testViewJS');
	}



	////////////
	///////////
	//Bridge information page
	public function bridges()
	{
		$this->load->model('BridgeModel');
		$data['master']= $this->BridgeModel->getInfo('master');
		$data['google_map_link']= $this->BridgeModel->getInfo('google_map_link');
		$data['submitted']= $this->BridgeModel->getInfo('submitted');
		$data['design_phase']= $this->BridgeModel->getInfo('design_phase');	
		$data['all_joined']=$this->BridgeModel->joinAllTable();

		$this->load->view('common/header');
		$this->load->view('common/top');
		$this->load->view('common/side');
		$this->load->view('frontend/infoBridge',$data);
		$this->load->view('common/footer');
		$this->load->view('scriptSupport/infoBridgeJS');
	}

	public function wtf()
	{
		$this->load->model('BridgeModel');
		$data=$this->BridgeModel->joinAllTable();

		json_encode($data);
	}
	///////
	///////
	//////

	 //Validating inputs
	 //////////////////
	 //////////////////
	 public function validateMasterInput()
	 {
	   $this->form_validation->set_rules('bridge_name', 'Bridge Name','trim|required');
	   $this->form_validation->set_rules('division', 'Division','trim|required');
	   $this->form_validation->set_rules('road', 'Road', 'trim|required');
	   $this->form_validation->set_rules('road_no', 'Road No', 'trim|required');

	   return $this->form_validation->run();
	 }

	 public function validateOtherInput()
	 {	 
	   $this->validateMasterInput();

	   $this->form_validation->set_rules('latitude', 'Latitude','trim|numeric');
	   $this->form_validation->set_rules('longitude', 'Longitude','trim|numeric');

	   $this->form_validation->set_rules('design', 'Design','trim');
	   $this->form_validation->set_rules('e_nothi_sent', 'E nothi sent','trim');
	   $this->form_validation->set_rules('e_nothi_approved', 'E nothi approved','trim');
	   $this->form_validation->set_rules('sent_with_covering_letter', 'Sent with covering letter','trim');


	   return $this->form_validation->run();
	 }
	 /////////
	 /////////
	 //////////
	//Adding new bridge
	public function addBridge()
	{
		$this->load->view('common/header');
		$this->load->view('common/top');
		$this->load->view('common/side');
		$this->load->view('frontend/addBridge');
		$this->load->view('common/footer');
		$this->load->view('scriptSupport/addBridgeJS');
	}

	public function submitBridge()
	{        
        if($this->validateMasterInput())
        {
          $master_data= [
            'bridge_name'=>$this->input->post('bridge_name'),
            'division'=>$this->input->post('division'),
            'road'=>$this->input->post('road'),
            'road_no'=>$this->input->post('road_no')
          ];

		  $google_map_link_data= [
            'latitude'=>$this->input->post('latitude'),
            'longitude'=>$this->input->post('longitude')
          ];

		  $submitted_data= [
            'demand_letter'=>"No",
            'BIWTA_clearance'=>"No",
            'Google_map_link'=>"No",
            'checklist'=>"No",
			'topo_survey'=>"No",
			'x_section'=>"No",
			'soil_test'=>"No",
			'pictures'=>"No",
			'existing_bridge_dimension'=>"No"
          ];

		  $design_phase_data= [
            'design'=>$this->input->post('design'),
            'e_nothi_sent'=>$this->input->post('e_nothi_sent'),
            'e_nothi_approved'=>$this->input->post('e_nothi_approved'),
            'sent_with_covering_letter'=>$this->input->post('sent_with_covering_letter')
          ];

          $this->load->model('BridgeModel');
          $this->BridgeModel->insertMasterInfo('master', $master_data);
		  $this->BridgeModel->insertMasterInfo('google_map_link', $google_map_link_data);
		  $this->BridgeModel->insertMasterInfo('submitted', $submitted_data);
		  $this->BridgeModel->insertMasterInfo('design_phase', $design_phase_data);
          $this->session->set_flashdata('status', 'New bridge data inserted successfully');

          $status = ['success'=> true];

        }

        else 
        { 
          $status =[
            'error'   => true,
            'bridge_name_error'=>form_error('bridge_name'),
            'division_error'=>form_error('division'),
            'road_error'=>form_error('road'),
            'road_no_error'=>form_error('road_no')
          ];
        }

		echo json_encode($status);

	}
	/////////

	//Edit bridge info
	public function editBridge($id)
	{
		$this->load->model('BridgeModel');
        $data['master'] = $this->BridgeModel->getEditInfo('master', $id);
		$data['google_map_link'] = $this->BridgeModel->getEditInfo('google_map_link', $id);
		$data['submitted'] = $this->BridgeModel->getEditInfo('submitted', $id);
		$data['design_phase'] = $this->BridgeModel->getEditInfo('design_phase', $id);

		$this->load->view('common/header');
		$this->load->view('common/top');
		$this->load->view('common/side');
		$this->load->view('frontend/editBridge', $data);
		$this->load->view('common/footer');
		$this->load->view('scriptSupport/editBridgeJS');
	}


	public function updateBridge($id)
	{        
        if($this->validateOtherInput())
        {
          $master_data= [
            'bridge_name'=>$this->input->post('bridge_name'),
            'division'=>$this->input->post('division'),
            'road'=>$this->input->post('road'),
            'road_no'=>$this->input->post('road_no')
          ];

		  $google_map_link_data= [
            'latitude'=>$this->input->post('latitude'),
            'longitude'=>$this->input->post('longitude')
          ];

		  $Google_map_link=$this->input->post('Google_map_link');
		  if($this->input->post('latitude') and $this->input->post('longitude')){$Google_map_link='Yes';}

		  $submitted_data= [
            'demand_letter'=>$this->input->post('demand_letter'),
            'BIWTA_clearance'=>$this->input->post('BIWTA_clearance'),
            'Google_map_link'=>$Google_map_link,
            'checklist'=>$this->input->post('checklist'),
			'topo_survey'=>$this->input->post('topo_survey'),
			'x_section'=>$this->input->post('x_section'),
			'soil_test'=>$this->input->post('soil_test'),
			'pictures'=>$this->input->post('pictures'),
			'existing_bridge_dimension'=>$this->input->post('existing_bridge_dimension')
          ];

		  $design_phase_data= [
            'design'=>$this->input->post('design'),
            'e_nothi_sent'=>$this->input->post('e_nothi_sent'),
            'e_nothi_approved'=>$this->input->post('e_nothi_approved'),
            'sent_with_covering_letter'=>$this->input->post('sent_with_covering_letter')
          ];

          $this->load->model('BridgeModel');
          $this->BridgeModel->updateInfo('master', $master_data, $id);
		  $this->BridgeModel->updateInfo('google_map_link', $google_map_link_data, $id);
		  $this->BridgeModel->updateInfo('submitted', $submitted_data, $id);
		  $this->BridgeModel->updateInfo('design_phase', $design_phase_data, $id);
          $this->session->set_flashdata('status', 'Bridge data updated successfully');

          $status = ['success'=> true];

        }

        else 
        { 
          $status =[
            'error'   => true,
            'bridge_name_error'=>form_error('bridge_name'),
            'division_error'=>form_error('division'),
            'road_error'=>form_error('road'),
            'road_no_error'=>form_error('road_no'),

			'latitude_error'=>form_error('latitude'),
			'longitude_error'=>form_error('longitude'),

			// 'demand_letter_error'=>form_error('demand_letter'),
			// 'BIWTA_clearance_error'=>form_error('BIWTA_clearance'),
			// 'Google_map_link_error'=>form_error('Google_map_link'),
			// 'checklist_error'=>form_error('checklist'),
			// 'topo_survey_error'=>form_error('topo_survey'),
			// 'x_section_error'=>form_error('x_section'),
			// 'soil_test_error'=>form_error('soil_test'),
			// 'pictures_error'=>form_error('pictures'),
			// 'existing_bridge_dimension_error'=>form_error('existing_bridge_dimension'),

			'design_error'=>form_error('design'),
			'e_nothi_sent_error'=>form_error('e_nothi_sent'),
			'e_nothi_approved_error'=>form_error('e_nothi_approved'),
			'sent_with_covering_letter_error'=>form_error('sent_with_covering_letter')
          ];
        }

		//$this->editBridge($id);

		echo json_encode($status);

	}

///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
//////Deleting Employee
      public function delete($id)
      {
        $this->load->model('BridgeModel');
        $this->BridgeModel->deleteInfo($id);
        //$this->index();

      }
}

?>
