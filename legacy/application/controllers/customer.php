<?php

class Customer extends Front_Controller {

    public function __construct() {
        
        parent::__construct();
        $this->load->model('customer_m');                
    }
    
    public function index() {        
        $customers = $this->customer_m->get_by(array('email' => 'customer@hotmail.com'));        
        var_dump($customers);        
    }   
    
    
    public function save() {
        /*
        $data = array(
            'name' => 'savin',
            'address' => '107 shaftavery road',
            'address1' => 'feltham, London  ',
            'postcode' => 'tw14 9lw',
            'contact_number' => '07508665459',
            'email' => 'savin@hotmail.com'
        );*/
    
        $data = array(
            'name' => 'Sabin',            
            'email' => 'srdx7@hotmail.com'
        );
        
        $customers = $this->customer_m->save($data, 4);
        
        var_dump($customers);
    
    }
    
    public function delete() {
        
        $this->customer_m->delete(4);
    }

} 