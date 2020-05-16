<?php 



class Organiser extends Front_Controller {
    
        
    public function __construct() {
        parent::__construct();
        $this->load->model('organiser_m');
        $this->load->model('organiser_banners_m');
    }
    
    
    
    public function index() {
        
        $this->data['organisers'] = $this->organiser_m->get();        
        
        $this->data['page_view'] = 'front/organisers';
        $this->load->view('front/_layout', $this->data);
                
    }
    
    
    public function details($id) {
        
        $organiser = $this->organiser_m->get($id);        
        $organiser->banners = $this->organiser_banners_m->get_banners($id);        
        $this->data['organiser'] = $organiser;                 
        
        $this->data['page_view'] = 'front/organiser_detail';
        $this->load->view('front/_layout', $this->data);
        
    }

}
