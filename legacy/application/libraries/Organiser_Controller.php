<?php


class Organiser_Controller extends Secure_Controller {
    
    public function __construct() {       
        parent::__construct();
        
        $this->data['organiser'] = $this->session->userdata['user_organiser'];
        
        
        $this->data['navigation'] = $this->get_navigation();
        
        
    }
    
    
    
    private function get_navigation() {
                
        $dashboard = array(
            'code' => 'DASHBOARD',
            'name' => 'Dashboard',
            'icon' => 'icon-desktop',
            'color' => 'nred',
            'link' => 'portal'                       
        );
                
        $event = array(
            'code' => 'EVENTS',
            'name' => 'Your Events',
            'icon' => 'icon-th',
            'color' => 'nlightblue',
            'link' => 'portal/events',
            'children' => array(
                array('code' => 'NEWEVENT', 'name' => 'Create new event', 'link' => 'portal/event/edit'),
                array('code' => 'LIVEEVENT', 'name' => 'Live events', 'link' => 'portal/event/live'),
                array('code' => 'PASTEVENT', 'name' => 'Past events', 'link' =>'portal/event/past')
            )
        );
        
        
        $profile = array(
            'code' => 'PROFILE',
            'name' => 'Profile',
            'icon' => 'icon-file-alt',
            'color' => 'nviolet',
            'link' => 'portal',
            'children' => array(
                array('code' => 'PROFILE', 'name' => 'Details', 'link' => 'portal/organiser/profile'), 
                array('code' => 'SETTINGS', 'name' => 'Settings', 'link' => 'portal/organiser/settings')                
            )
        );
        
        $logout = array(
            'code' => 'LOGOUT',
            'name' => 'Logout',
            'icon' => 'icon-off',
            'color' => 'norange',
            'link' => 'security/logout'                       
        );
        
        
        $navigation = array();
        array_push($navigation, $dashboard);
        array_push($navigation, $event);
        array_push($navigation, $profile);
        array_push($navigation, $logout);

        return $navigation;
    }
    
}
