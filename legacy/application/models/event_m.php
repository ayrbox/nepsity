<?php

class Event_m extends MY_Model {
   
    protected $_table_name = 'events';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'title';
    protected $_timestamps = FALSE;
    
    
    public $rules = array(
        'title' => array('field' => 'title', 'label' => 'Title', 'rules' => 'trim|required|xss_clean'),
        'date' => array('field' => 'date', 'label' => 'Date', 'rules' => 'trim|required|xss_clean'),
        'time' => array('field' => 'time', 'label' => 'Time', 'rules' => 'trim|required|xss_clean'),
        'event_category_id' => array('field' => 'event_category_id', 'label' => 'Event Category', 'rules' => 'trim|is_natural'),
        'organiser_id' => array('field' => 'organiser_id', 'label' => 'Organiser', 'rules' => 'trim|is_natural'),
        'description' => array('field' => 'description', 'label' => 'Description', 'rules' => 'trim|xss_clean'),
        'venue' => array('field' => 'venue', 'label' => 'Venue', 'rules' => 'trim|required|ss_clean'),
        'facebook_link' => array('field' => 'facebook_link', 'label' => 'Facebook Link', 'rules' => 'trim'),
        'twitter_link' => array('field' => 'twitter_link', 'label' => 'Twitter Link', 'rules' => 'trim'),
        'sales_link' => array('field' => 'sales_link', 'label' => 'Sales Link', 'rules' => 'trim'),        
    );

    public function get_new() {        
        $event = new stdClass();        
        $event->title = '';
        $event->date = new DateTime();
        $event->time = '';
        $event->venue = '';
        $event->event_category_id = 0;
        $event->description = '';
        $event->organiser_id = 0;
        $event->facebook_link = '';
        $event->twitter_link = '';
        $event->sales_link = ''; 
        $event->image_banner = '/media/default/img/event_banner.jpg';
        $event->image_thumb = '/media/default/img/event_thumb.jpg';  
        
        return $event;

    }

    public function get_event_details($id = NULL, $single = FALSE) {        
        //GET EVENT DETAIL        
        $this->_primary_key = 'events.id';        
        $this->db->select('events.*, c.name as event_category, o.name as organiser');        
        $this->db->join('event_categories as c','c.id = events.event_category_id', 'left');
        $this->db->join('organisers as o','o.id = events.organiser_id', 'left');                      
        return parent::get($id, $single);
    }
    
    public function get_events_by_month($year, $month) {
        $this->_primary_key = 'events.id';        
        $this->db->select('events.id, events.title, events.description, DATE_FORMAT(events.date, "%d/%m/%Y") AS date, c.name as event_category, o.name as organiser', FALSE);        
        $this->db->join('event_categories as c','c.id = events.event_category_id', 'left');
        $this->db->join('organisers as o','o.id = events.organiser_id', 'left');
        
        $this->db->where( 'YEAR(events.date)', $year );
        $this->db->where( 'MONTH(events.date)', $month );                       
         
        return parent::get();
    }

    public function get_events($categories = NULL, $order_by = NULL, $ascending = TRUE, $page_number = 1) {
        
        
        $this->_primary_key = 'events.id';        
        $this->db->select('events.*, c.name as event_category, o.name as organiser');        
        $this->db->join('event_categories as c','c.id = events.event_category_id', 'left');
        $this->db->join('organisers as o','o.id = events.organiser_id', 'left');                      
        
        if($categories) {
            $this->db->where_in('events.event_category_id', $categories);
        }
        
        if($order_by) {
            $this->db->order_by($order_by, ($ascending)?'ASC':'DESC');
        } else {
            $this->db->order_by('date', 'DESC');
        }        
        
        $page_size = 20;        
        $record_offset = ($page_number - 1) * $page_size;

        $this->db->limit($page_size, $record_offset);         
        return parent::get();
    }
    
    public function get_events_list($organiser_id, $live, $page_number = 1) {
        
        $this->_primary_key = 'event.id';
        $this->db->select('events.*, c.name as event_category');
        $this->db->join('event_categories as c', 'c.id = events.event_category_id', 'left');
        
        if($live) {        
            $this->db->where('date >= CURDATE()');
        } else {
            $this->db->where('date < CURDATE()');
        }
        
        !$organiser_id || $this->db->where('organiser_id', $organiser_id); 
        
        $page_size = 20;
        $record_offset = ($page_number - 1) * $page_size;
        
        $this->db->limit($page_size, $record_offset);
        return parent::get();

    }
    
    public function sorting() {
        $sorting = array('date|TRUE' => 'Date Earliest', 
            'date|FALSE' => 'Date Later',
            'events.title|TRUE' => 'Event Name (A-Z)',
            'events.title|FALSE' => 'Event Name (Z-A)',
            'organiser|TRUE' => 'Organiser Name (A-Z)',
            'organiser|FALSE' => 'Organiser Name (Z-A)');
                    
        return $sorting;
    }

    public function get_featured() {
        $this->_primary_key = 'events.id';        
        $this->db->select('events.*, c.name as event_category, o.name as organiser');        
        $this->db->join('event_categories as c','c.id = events.event_category_id', 'left');
        $this->db->join('organisers as o','o.id = events.organiser_id', 'left');
        
        return parent::get_by(array('featured' => 1));
    } 
    
    
    public function get_recent() {
        $this->_primary_key = 'events.id';        
        $this->db->select('events.*, c.name as event_category, o.name as organiser');        
        $this->db->join('event_categories as c','c.id = events.event_category_id', 'left');
        $this->db->join('organisers as o','o.id = events.organiser_id', 'left');
        $this->db->limit(10);
        $this->db->order_by('date');
        
        return parent::get();        
    }

    public function get_post_data() {
        $event_data = $this->array_from_post(
            array('title', 'time', 'venue', 'event_category_id', 'description', 'organiser_id', 'facebook_link', 'twitter_link', 'sales_link')
        );
                
        $event_data['date'] = date("Y-m-d", strtotime( str_replace( '/', '-', $this->input->post('date') )));
        return $event_data;
    }
}
