<?php

class Home extends Front_Controller {
    
    public function __construct() {        
        parent::__construct();
    }
    


    public function index() {
        
        $this->load->model('event_m');
        $this->data['events'] = $this->event_m->get();
        $this->data['featured'] = $this->event_m->get_featured();
        $this->data['recent']=  $this->event_m->get_recent();
        
        $this->load->model('organiser_m');        
        $this->data['partners'] = $this->organiser_m->get_partners();
        
        
        $this->data['page_view'] = 'front/home';
        $this->load->view('front/_layout', $this->data);
                 
    }
                  
}