<?php

class Organiser_banners_m extends MY_Model {
   
    protected $_table_name = 'organiser_banners';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'organiser_id';    
    protected $_timestamps = FALSE;
    
    
    
    public function get_banners($organiser_id) {
                
        return parent::get_by(array('organiser_id' => $organiser_id));

    }
}