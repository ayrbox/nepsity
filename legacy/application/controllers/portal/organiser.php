<?php

class Organiser extends Organiser_Controller {
    
    
    
    var $__logo_path = 'media/organisers/logo/';
    var $__banner_path = 'media/organisers/banner/';
    
    public function __construct() {
        
        parent::__construct();
        $this->load->model('organiser_m');
        
    }
    
    
    public function index() {
        redirect('portal');
    }    
    
    
    public function profile() {
        
        $this->data['profile'] = $this->organiser_m->get($this->data['organiser']->id);
        

        $rules = $this->organiser_m->rules;
        $this->form_validation->set_rules($rules);
        
        if($this->form_validation->run() == TRUE) {
                
            $data = $this->organiser_m->get_post_data();
            $this->organiser_m->save($data, $this->data['organiser']->id);
            
            
            $this->data['success'] = 'Profile information has been saved successfully';
            
            $this->load->library('NS_Upload', array('height' => 140, 'width' => 140));
            if( $this->ns_upload->upload(realpath($this->__logo_path), 'logo') ) {

                if($this->ns_upload->file_name != '') {

                    $data['logo_image'] = '/' . $this->__logo_path . $this->ns_upload->file_name;    
                    $this->organiser_m->save($data, $this->data['organiser']->id);
                    $this->data['profile'] = $this->organiser_m->get($this->data['organiser']->id);

                }

            } else {

                $this->data['error'] = $this->ns_upload->error;
   
            }
            //redirect('portal');
        
        }
        
        $this->load->model('organiser_banners_m');
        $this->data['banners'] = $this->organiser_banners_m->get_banners($this->data['organiser']->id);   
        
        $this->data['navigation_code'] = "PROFILE";
            
        $this->data['page_view'] = 'portal/profile';            
        $this->load->view('portal/_layout', $this->data);
    }


    public function settings() {

        $this->load->model('user_m');
        
        
        $id = $this->session->userdata['id'];

        $this->data['user'] = $this->user_m->get($id);
        count($this->data['user']) || $this->data['errors'][] = 'User could not be found';  

        $rules = $this->user_m->rules_admin;
        $id || $rules['password']['rules'] .= '|required';         
                        
        $this->form_validation->set_rules($rules);                       
        if($this->form_validation->run() == TRUE) {                       
            
            $data = $this->user_m->array_from_post(array('name', 'email', 'password'));
            $data['password'] = $this->user_m->hash($data['password']);
            
            $this->user_m->save($data, $id);
            $this->data['success'] = 'Profile information has been saved successfully';
            $this->data['user'] = $this->user_m->get($id);
                
        }

        $this->data['navigation_code'] = "SETTINGS";
        $this->data['page_view'] = 'portal/settings';
        $this->load->view('portal/_layout', $this->data);
        
    }

    public function coverpic($action, $id) {
        
        $this->load->model('organiser_banners_m');
        
        if($action == 'delete') {
            $this->organiser_banners_m->delete($id);
            $this->data['success'] = "Conver picture is deleted";            
        }
        
        
        $this->load->library('NS_Upload', array('height' => 300, 'width' => 900));            
        if( $this->ns_upload->upload(realpath($this->__banner_path), 'coverpic') ) {

            if($this->ns_upload->file_name != '') {
                $data['organiser_id'] = $this->data['organiser']->id;
                $data['banner_image'] = '/' . $this->__banner_path . $this->ns_upload->file_name;    
                $this->organiser_banners_m->save($data);                
                
            }
        }

        $this->data['banners'] = $this->organiser_banners_m->get_banners($this->data['organiser']->id);
     
        $this->data['navigation_code'] = "PROFILE";
        $this->data['page_view'] = 'portal/banners';
        $this->load->view('portal/_layout', $this->data);
    }
}
