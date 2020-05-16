<?php 

class User_M extends MY_Model {
    
    protected $_table_name = 'users';
    protected $_order_by = 'name';
    public $rules = array(
        'email' => array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email|xss_clean'),
        'password' => array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required')    
    );
    
    public $rules_admin = array(
        'name' => array('field' => 'name', 'label' => 'Name', 'rules' => 'trim|required|xss_clean'),
        'email' => array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'),
        'password' => array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|matches[confirm_password]'),
        'confirm_password' => array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'trim|matches[password]')           
    );
         
    function __construct() {
        parent::__construct();
    }
    
    public function login() {         
        
        $user = $this->get_by(array(
            'email' => $this->input->post('email'),
            'password' => $this->hash($this->input->post('password'))
        ), TRUE);
        
        
        if(count($user)) {
                        
            // log in uer
            $data = array( 
                'name' => $user->name,
                'email' => $user->email,
                'id' => $user->id,
                'loggedin' => TRUE,                
            );            
            $this->session->set_userdata($data);
            
            $this->is_organiser($user->id);            
            $this->is_member($user->id);
            
            return TRUE;
        }
    }
    
    
    private function is_organiser($user_id) {
        
        $this->load->model('organiser_m');
        $organiser = $this->organiser_m->get_user_organiser($user_id);
        
        if(count($organiser)) {
           
            $this->session->set_userdata('user_type', 'ORGANISER');
            $this->session->set_userdata('user_organiser', $organiser);
            
            return TRUE;
            
        } else {            
            return FALSE;           
        }
    }

    private function is_member($user_id) {
        //TODO CHECK MEMEMBERS TABLE
        return FALSE;
    }
    
    
    
    public function logout() {
        $this->session->sess_destroy();        
    }
    
    public function loggedin() {
        return (bool) $this->session->userdata('loggedin');   
    }
    
    public function user_type() {
        return $this->session->userdata['user_type'];
    }
    
    public function get_new() {
        $user = new stdClass();
        $user->name = '';
        $user->email = '';
        $user->password = '';      
        return $user;
    }
    
    public function hash($string) {
        return hash('sha512', $string . config_item('encryption_key'));        
    }       
}