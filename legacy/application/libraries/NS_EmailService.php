<?php


class NS_EmailService {

    var $_protocol;        
    var $_host;
    var $_port;
    var $_user;
    var $_password;
    var $_charset;
    var $_newline;
    var $_mailtype;

    var $_from;
    var $_from_name;

    public function __construct($params) {
        
        $this->CI =& get_instance();
        $this->CI->load->config('email_config');
        
        $this->_protocol = $this->CI->config->item('protocol');
        $this->_host = $this->CI->config->item('smtp_host');
        $this->_port = $this->CI->config->item('smtp_port');
        $this->_user = $this->CI->config->item('smtp_user');
        $this->_password = $this->CI->config->item('smtp_pass');        
        $this->_charset = $this->CI->config->item('charset');
        $this->_newline = $this->CI->config->item('newline');
        $this->_mailtype = $this->CI->config->item('mailtype');
        
        $this->_from = $this->CI->config->item('send_from');
        $this->_from_name = $this->CI->config->item('send_from_name');
        
    }
    
    
    public function send($to, $subject, $message) {
        
        $configuration = array(
            'protocol' => $this->_protocol,
            'smtp_host' => $this->_host,
            'smtp_port' => $this->_port,
            'smtp_user' => $this->_user,
            'smtp_pass' => $this->_password,
            'charset' => $this->_charset,
            'newline' => $this->_newline,
            'mailtype' => $this->_mailtype
        );
                
        $this->CI->load->library('email');
        $this->CI->email->initialize($configuration);
        
        $this->CI->email->from($this->_from);
        $this->CI->email->to($to);
        $this->CI->email->subject($subject);
        $this->CI->email->message($message);
        
        return $this->CI->email->send();
    }
    
}
