<?php 



class Security extends Secure_Controller {
    
    public function login() {
               
        $this->user_m->loggedin() == FALSE || $this->redirect_portal();
        
        $rules = $this->user_m->rules;                
        $this->form_validation->set_rules($rules);
                        
        if($this->form_validation->run() == TRUE) {
 
            if($this->user_m->login() == TRUE) {
                                
                if(!$this->redirect_portal()) {                                    
                    $this->user_m->logout();                                                   
                    $this->data['error'] = 'Unable to recognise user. Please contact nepsity.com';                    
                }                                
            } else {                
                $this->session->set_flashdata('error', 'Email or password is not correct.');
                redirect('security/login', 'refresh');                
            }
        }
                
        $this->data['page_view'] = 'login';
        $this->load->view('_layout_modal', $this->data);

    }
    
    
    public function logout() {        
        $rules = $this->user_m->logout();        
        redirect('security/login');    
    }
    
    
    public function redirect_portal() {

        if($this->user_m->user_type() == 'ORGANISER') {
            
            redirect('portal');            
            return TRUE;
        } 
        
        return FALSE;
    }
        
}
