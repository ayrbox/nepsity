<?php 

class Subscriptions_M extends MY_Model {
    
    protected $_table_name = 'subscriptions';
    protected $_order_by = 'email';
    public $rules = array(
        'email' => array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email|xss_clean'),
        'token' => array('field' => 'token', 'label' => 'Token', 'rules' => 'trim|required')    
    );
       
    function __construct() {
        parent::__construct();
    }
    
}