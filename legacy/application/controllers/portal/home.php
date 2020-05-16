<?php 

class Home extends Organiser_Controller {

    public function index() {

        $this->data['navigation_code'] = "DASHBOARD";
        
        $this->data['page_view'] = 'portal/dashboard';        
        $this->load->view('portal/_layout', $this->data);
    }
    
}
