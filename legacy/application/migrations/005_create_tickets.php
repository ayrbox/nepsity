<?php

class Migration_Create_Tickets extends CI_Migration {
        
    public function up() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'event_id' => array('type' => 'INT', 'constraint' => '11'),
            'order_id' => array('type' => 'INT', 'constraint' => '11'), 
            'ticket_number' => array('type' => 'INT', 'constraint' => '11'),
            'ticket_type' => array('type' => 'VARCHAR', 'constraint' => '50'),            
            'price' => array('type' => 'DECIMAL', 'constraint' => '10,2'),            
            'issue_date' => array('type' => 'DATETIME'), 
            'status' => array('type' =>'VARCHAR', 'constraint' => '20', 'default' => 'ISSUED'),
            'note' => array('type' => 'VARCHAR', 'constraint' => '1000'),                                  
        );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tickets');        
    }
        
    public function down() {
        $this->dbforge->drop_table('tickets');
    }

}
