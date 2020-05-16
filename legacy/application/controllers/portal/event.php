<?php

class Event extends Organiser_Controller {

    var $__thumb_path = 'media/events/img/';
    var $__banner_path = 'media/events/banner/';
    
    public function __construct() {
        
        parent::__construct();
        $this->load->model('event_m');
        $this->load->model('event_categories_m');
        
    }
    
    
    public function index() {
        redirect('portal');
    }
    
    public function delete($id = NULL) {
        
        if($id != NULL) {
            $event = $this->event_m->get($id);
            
            $this->load->helper('file');
            
            unlink(realpath('.' . $event->image_thumb));
            unlink(realpath('.' . $event->image_banner));
            
            $this->event_m->delete($id);
                    
            $this->session->set_flashdata('success', 'Event is deleted successfully');                    
        } else {
            $this->session->set_flashdata('error', 'Could not find event.');
        }
        redirect('portal/event/live');
    }
    
    public function edit($id = NULL) {

        if($id == NULL) {
            $this->data['event'] = $this->event_m->get_new();
            
        } else {
            $this->data['event'] = $this->event_m->get_event_details($id);    
        }
        
        
        
        $this->data['categories'] = $this->event_categories_m->get_categories();        
        $rules = $this->event_m->rules;
        
        $upload_error = FALSE;
        
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE) {
            
            
            
            $thumb_result = $this->upload_thumb();
            if(!$thumb_result->success) {
                $this->data[error] = "Event thumb image could not be uploaded.";
                $upload_error = TRUE;                                
            }
            
            $banner_result = $this->upload_banner();
            if(!$banner_result->success) {                
                $this->data[error] = "Event banner could not be uploaded.";
                $update_error = TRUE;                                            
            }
            
            if(!$upload_error) {
                $data = $this->event_m->get_post_data();
                !$thumb_result->filename || $data['image_thumb'] = $thumb_result->filename;
                !$banner_result->filename || $data['image_banner'] = $banner_result->filename;

                $this->event_m->save($data, $id);
                
                $this->data['success'] = "Event has been created successfully";
                                
                redirect('portal/event/live');
            }

        }
        
        $this->data['navigation_code'] = "NEWEVENT";
        
        $this->data['page_view'] = 'portal/event_form'; 
        $this->load->view('portal/_layout', $this->data);
        
    }

    private function upload_banner() {

        $__upload_result = new stdClass();
        
        $oBannerUpload = new NS_Upload(array('height' => 320, 'width' => 960));
        
        if( $oBannerUpload->upload(realpath($this->__banner_path), 'bannerimage') ) {

            $__upload_result->success = TRUE;

            if($oBannerUpload->file_name != '') {
                $__upload_result->filename = '/' . $this->__banner_path . $oBannerUpload->file_name;
                $__upload_result->error = '';
                                
            } else {                
                $__upload_result->filename = '';
                $__upload_result->error = '';

            }

        } else {                        
            $__upload_result->success = FALSE;
            $__upload_result->filename = '';
            $__upload_result->error = $oBannerUpload->error;
        }
        unset($oBannerUpload);
        
        return $__upload_result;
    }
    
    private function upload_thumb() {

        $__upload_result = new stdClass();
        

        $this->load->library('NS_Upload', array('height' => 325, 'width' => 325));
        if( $this->ns_upload->upload(realpath($this->__thumb_path), 'eventthumb') ) {

            $__upload_result->success = TRUE;
            
            if($this->ns_upload->file_name != '') {               
                $__upload_result->filename = '/' . $this->__thumb_path . $this->ns_upload->file_name;
                $__upload_result->error = '';
                                
            } else {                
                $__upload_result->filename = '';
                $__upload_result->error = '';

            }

        } else {                        
            $__upload_result->success = FALSE;
            $__upload_result->filename = '';
            $__upload_result->error = $this->ns_upload->error;
                           
        }
        
        return $__upload_result;
    }
    
    public function live() {
        $this->data['navigation_code'] = "LIVEEVENT";
        
        $this->data['events'] = $this->event_m->get_events_list($this->data['organiser']->id, TRUE); 

        $this->data['page_view'] = 'portal/events';        
        $this->load->view('portal/_layout', $this->data);

    }
    
    public function past() {
        $this->data['navigation_code'] = "PASTEVENT";
        
        $this->data['events'] = $this->event_m->get_events_list($this->data['organiser']->id, FALSE); 

        $this->data['page_view'] = 'portal/events';        
        $this->load->view('portal/_layout', $this->data);
    } 
}