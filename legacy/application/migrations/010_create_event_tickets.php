<?php

class Migration_Create_Event_tickets extends CI_Migration {
        
    public function up() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'event_id' => array('type' => 'INT', 'constraint' => '11'),
            'ticket_type_id' => array('type' => 'INT', 'constraint' => '11'),
            'ticket_description' => array('type' => 'VARCHAR', 'constraint' => '100'),
            'price' => array('type' => 'DECIMAL', 'constraint' => '10,2'),            
            'status' => array('type' => 'VARCHAR', 'constraint'=> '20'),
            'sale_open_on' => array('type' => 'DATETIME'),
            'sale_close_on' => array('type' => 'DATETIME')
        );
                
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('event_tickets');
                
    }
    
    public function down() {
        $this->dbforge->drop_table('event_tickets');
    }

}