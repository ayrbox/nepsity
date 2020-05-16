<?php


class Ticket_m extends MY_Model {
    
    protected $_table_name = 'tickets';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'ticket_number';
    protected $_rules = array();
    protected $_timestamps = FALSE;
        
        
        
    public function get_new() {
        $ticket = new stdClass();
        
        //$ticket->
        
        return $ticket;
    }    
}
