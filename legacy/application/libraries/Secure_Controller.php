<?php

class Secure_Controller extends MY_Controller {
    
    
    function __construct() {
        
        parent::__construct();

        $this->data['meta_title'] = 'Nepsity.com';
        
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('user_m');
        
        
        //Login check
        $exception_urls = array('security/login', 'security/logout');
        if(in_array(uri_string(), $exception_urls) == FALSE) {
            if($this->user_m->loggedin() == FALSE) {
                redirect('security/login');
            }
        }
        
    }    
}
