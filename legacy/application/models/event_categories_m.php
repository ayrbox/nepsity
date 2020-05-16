<?php

class Event_categories_m extends MY_Model {
   
    protected $_table_name = 'event_categories';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'name';
    protected $_timestamps = FALSE;
    
    
    public $rules = array(
        'name' => array('field' => 'name', 'label' => 'Name', 'rules' => 'trim|required|xss_clean'),               
        'description' => array('field' => 'description', 'label' => 'Description', 'rules' => 'trim|xss_clean'),
    );
   
    
   public function get_categories() {
       
        $categories = $this->get();        
        $result_categories = array();
        
        foreach($categories as $category) {
            
            $result_categories[$category->id] = $category->name;
                        
        }

        return $result_categories;
   }     
}
