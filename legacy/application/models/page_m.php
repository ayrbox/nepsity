<?php 

class Page_M extends MY_Model {
    
    protected $_table_name = 'pages';
    protected $_order_by = 'order';
        
    /*
    public $rules = array(
        'email' => array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email|xss_clean'),
        'password' => array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required')    
    );*/
    
    public $rules = array(    
        'title' => array('field' => 'title', 'label' => 'Title', 'rules' => 'trim|required|max_length[100]|xss_clean'),
        'slug' => array('field' => 'slug', 'label' => 'Slug', 'rules' => 'trim|required|max_length[100]|callback__unique_slug|xss_clean'),
        'order' => array('field' => 'order', 'label' => 'Order', 'rules' => 'trim|is_natural|xss_clean'),
        'body' => array('field' => 'body', 'label' => 'Body', 'rules' => 'trim|required')           
    );
         
    function __construct() {
        parent::__construct();
    }
           
    public function get_new() {
        $page = new stdClass();
        $page->title = '';
        $page->slug = '';
        $page->order = '';
        $page->body = '';
              
        return $page;
    }
    
    public function array_from_post($fields) {
        $data = array();
        foreach($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }    
}