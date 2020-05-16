<?php


class Customer_m extends MY_Model {
    
    protected $_table_name = 'customers';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'name';    
    protected $_timestamps = FALSE;

    public $rules = array(
        'name' => array('field' => 'name', 'label' => 'Name', 'rules' => 'trim|required|xss_clean'),
        'address' => array('field' => 'address', 'label' => 'Address', 'rules' => 'trim|required|xss_clean'),
        'address1' => array('field' => 'addess1', 'label' => 'Address Line 1', 'rules' => 'trim|xss_clean'),
        'postcode' => array('field' => 'postcode', 'label' => 'Postcode', 'rules' => 'trim|required|xss_clean'),
        'contact_number' => array('field' => 'contact_number', 'label' => 'Contact Number', 'rules' => 'trim|required|xss_clean'),
        'email' => array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email|xss_clean')                   
    );

}
