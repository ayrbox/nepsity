<?php

class Front_Controller extends MY_Controller {    
    function __construct() {
        
        parent::__construct();
        
        $this->data['meta_title'] = 'Nepsity.com';
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('user_m');
    }
        
}
