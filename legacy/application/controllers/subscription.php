<?php

class Subscription extends Front_Controller {
    
    public function __construct() {        
        parent::__construct();
    }
    

    public function subscribe() {
        
        $to = $this->input->post('subscription_email');
        $subject = 'Subscription Confirmation';
        $message = '
Your email has been registered for our news letter subscription.

Our team will keep you inform about latest news and views.


To unsubscribe please follow then link http://www.nepsity.com/admin/apps/unsubscribe/' . $subscriptionToken . '

Regards,
Nepsity Team';

        $email_subscription = new NS_EmailService();        
        if($email_subscription->send($to, $subject, $message)) {
            
            $this->load->model('subscriptions_m');
            
            $data = array(
                'email' => $to,
                'token' => $this->generate_token()
            );        
            $this->subscriptions_m->save($data);            
        }
        
        $this->load->library('user_agent');
        if($this->agent->is_referral()) {
            
            //$this->session->set_flashdata('success', 'Subscription cofirmation has been send successfully.');
            
            redirect($this->agent->referrer());    
        } else {
            redirect();
        }
    }

    private function generate_token($length = 32) {
        
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $random_string;
    }
}