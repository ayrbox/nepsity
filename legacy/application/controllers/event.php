<?php

class Event extends Front_Controller {
    
    public function __construct() {        
        parent::__construct();                
        $this->load->model('event_m');
        $this->load->model('event_ticket_m');                                              
    }

    public function tickets($event_id) {       
        if($this->input->post('ticket_quantity') != FALSE) {
            if($this->ticketSelected() == TRUE) {               
                                 
                $this->load->library('cart');                               
                
                $this->cart->destroy(); // destory existing cart before creating new one.
                
                $event_ticket_id = $this->input->post('hd_event_ticket_id');            //get values from submitted form
                $ticket_quantities = $this->input->post('ticket_quantity');
                $ticket_price = $this->input->post('hd_ticket_price');
                $ticket_name = $this->input->post('hd_ticket');
                     
                $index = 0;
                foreach($ticket_quantities as $ticket_quantity) {
                    if($ticket_quantity > 0) 
                    {
                        $this->cart->insert(array(
                            'id' => $event_ticket_id[$index],
                            'qty' => $ticket_quantities[$index],
                            'price' => $ticket_price[$index],
                            'name' => $ticket_name[$index]
                        ));
                    }
                    $index++;
                }
                                
                redirect('checkout');
                                
            } else {
                $this->data['message'] = 'Please select ticket quantity to proceed';
            }
        }        
        
        $this->data['event_id'] = $event_id;
        $this->data['event'] = $this->event_m->get_event_details($event_id, TRUE);        
        $this->data['event_tickets'] = $this->event_ticket_m->get_event_tickets($event_id);
        $this->data['ticket_quantity'] = $this->event_ticket_m->get_ticket_quantity();
        
        $this->data['page_view'] = 'events/tickets';
        $this->load->view('_layout_main', $this->data);
        
    }

    private function ticketSelected() {
        $ticket_quantities = $this->input->post('ticket_quantity');
               
        foreach($ticket_quantities as $ticket_quantity) {
            if($ticket_quantity > 0) return TRUE;
        }
        return FALSE;
    }
 
 
    public function issue() {
       
    }
    
    public function cancel() {
        
    }
    
    
    public function index() {
    
        $selected_cat = $this->input->post('categories');
        
        $page_number = $this->input->post('page_number'); $page_number || $page_number = 1;
        $order_by = $this->input->post('order_by'); $order_by || $order_by = 'date';
        $ascending = $this->input->post('ascending') == 'TRUE' ? TRUE : FALSE;

        $this->data['events'] = $this->event_m->get_events($selected_cat, $order_by, $ascending, $page_number);        
        $this->load->model('event_categories_m');
        $this->data['categories'] = $this->event_categories_m->get();
        
        $this->data['selected_categories'] = $selected_cat;
        $this->data['page_number'] = $page_number;
        $this->data['order_by'] = $order_by;
        $this->data['ascending'] = $ascending;
        $this->data['sorting'] = $this->event_m->sorting();
        

        $this->data['page_view'] = 'front/events';
        $this->load->view('front/_layout', $this->data);
        
    }
    
    
    public function details($id) {

        $this->data['event'] = $this->event_m->get_event_details($id);
        $this->data['event_tickets'] = $this->event_ticket_m->get_event_tickets($id);
        
        $this->data['page_view'] = 'front/event_details';
        $this->load->view('front/_layout', $this->data);
        
    }
    
    public function service($year, $month) {
        
        $events = $this->event_m->get_events_by_month($year, $month);
        
                
        /* 
         * creating link for events
         */
        foreach($events as $event) {          
          $event->event_link = site_url('event/details/' . $event->id);        
        }
        
        
        $this->data['events'] = $events;        
        $this->load->view('front/event_service.php', $this->data);
                    
    }
        
}
    