<?php

class Organiser_m extends MY_Model {
   
    protected $_table_name = 'organisers';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'name';    
    protected $_timestamps = FALSE;
    
    
    public $rules = array(
        'name' => array('field' => 'name', 'label' => 'Name', 'rules' => 'trim|required|xss_clean'),
        'about' => array('field' => 'about', 'label' => 'About', 'rules' => 'trim|required|xss_clean'),
        'location' => array('field' => 'location', 'label' => 'Location', 'rules' => 'trim|xss_clean'),
        'contact_address' => array('field' => 'contact_address', 'label' => 'Name', 'rules' => 'trim|required|xss_clean'),
        'members' => array('field' => 'members', 'label' => 'Members', 'rules' => 'trim|xss_clean'),
        'announcement' => array('field' => 'annoucement', 'label' => 'Announcement', 'rules' => 'trim|xss_clean')        
    );

    public function get_partners() {
        return $this->get_by(array('partner' => 'Y'));
    }
    
    
    public function get_user_organiser($user_id) {
        
        $this->_primary_key = 'organisers.id';
        $this->db->select('organisers.*, u.user_id');        
        $this->db->join('organiser_users as u','u.organiser_id = organisers.id', 'inner');
        
        return parent::get_by(array('u.user_id' => $user_id), TRUE);        
    }


    public function get_post_data() {
        return $this->array_from_post(
            array('name', 'location', 'about', 'announcement', 'contact_address', 'members')
        );
    }

}
