<?php
class Event_ticket_m extends MY_Model {
    
    protected $_table_name = 'event_tickets';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'ticket_type_id';
    protected $_timestamps = FALSE;
    
    public $rules = array(
        'event_id' => array('field' => 'event_id', 'label' => 'Event', 'rules' => 'trim|required|is_natural'),
        'ticket_type_id' => array('field' => 'ticket_type_id', 'label' => 'Ticket Type', 'rules' => 'trim|required|is_natural'),
        'price' => array('field' => 'price', 'label' => 'Price', 'rules' => 'trim|required'),
        'status' => array('field' => 'status', 'label' => 'Status', 'rules' => 'trim'),
        'sale_open_on' => array('field' => 'sale_open_on', 'label' => 'Sale Open On (Date)', 'rules' => 'trim'),
        'sale_close_on' => array('field' => 'sale_close_on', 'label' => 'Sale Close On (Date)', 'rules' => 'trim'),
    );

    public function get_new() {        
        $event_ticket = new stdClass();
        
        $event_ticket->event_id = -1;
        $event_ticket->ticket_type_id = -1;
        $event_ticket->price = 0;
        $event_ticket->status = '';
        $event_ticket->sale_open_on = '';
        $event_ticket->sale_close_on = '';
        
        return $event_ticket;
    }

    public function get_event_tickets($event_id) {        
        $this->db->select('event_tickets.*, ticket_types.description as ticket_type');        
        $this->db->join('ticket_types','ticket_types.id = event_tickets.ticket_type_id', 'left');
        return $this->get_by(array('event_id' => $event_id));
    }


    public function get_ticket_quantity() {
        $ticket_quntity = array();
        for($i = 0; $i <= 10; $i++) {
            $ticket_quntity[$i] = $i;
        }
        return $ticket_quntity;
    }
}