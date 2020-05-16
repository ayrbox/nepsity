<?php

class NS_Upload {
    
    public $error = '';
    public $file_name = '';
    public $file_path = '';
    
    private $__height = -1;
    private $__width = -1;

    public function __construct($params) {
                
        if($params) {            
            $this->__height = $params['height'];
            $this->__width = $params['width'];            
        }        
    
        $this->CI =& get_instance();                
    }
    
    public function upload($file_path, $userfile) {
        
        $config_upload['allowed_types'] = 'jpg|jpeg|gif|png';
        $config_upload['max_size'] = 2000;
        $config_upload['upload_path']  = $file_path;                                     
        $config_upload['file_name'] = $this->random_file_name() . '.jpg';
        
        var_dump($config_upload);
        
        if (!empty($_FILES[$userfile]['name'])) {
            
            $this->CI->load->library('upload');
            $this->CI->upload->initialize($config_upload);
                        
            if(!$this->CI->upload->do_upload($userfile)) {
            
                $this->error = $this->CI->upload->display_errors();
                return FALSE;                
            }
            
            $upload_data = $this->CI->upload->data();
            $this->file_name = $upload_data['file_name'];
            $this->file_path = $upload_data['full_path'];
            
            $this->resize();
            
            return TRUE;
                         
        } else {
            return TRUE;
        }

    }
     
    
    private function resize() {
        
        if($this->__height < 0 || $this->__width < 0) return TRUE;
        
        $config = array (            
            'source_image' => $this->file_path,           
            'width' => $this->__width,
            'height' => $this->__height,
            'maintain_ratio' => FALSE,
            'image_library' => 'gd2'                        
        );
        
        $this->CI->load->library('image_lib');
        $this->CI->image_lib->initialize($config);
                        
        if ( ! $this->CI->image_lib->resize()){
            $this->error = $this->CI->image_lib->display_errors();
            echo $this->error;
            exit;
            return FALSE;
            
        }
        
        return TRUE;                
    }
    
    
    private function random_file_name($length = 15) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }    
}