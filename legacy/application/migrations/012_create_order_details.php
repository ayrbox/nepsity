<?php

class Migration_Create_Order_details extends CI_Migration {
        
    public function up() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'order_id' => array('type' => 'INT', 'constraint' => 11),
            'ticket_type_id' => array('type' => 'INT', 'constraint' => '11'),
            'ticket_type' => array('type' => 'VARCHAR', 'constraint' => '50'),
            'quantity' => array('type' => 'INT', 'constraint' => '11'),
            'price' => array('type' => 'DECIMAL', 'constraint' => '10,2'),
            'amount' => array('type' => 'DECIMAL', 'constraint' => '10,2')                                                       
        );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('order_details');        
    }
        
    public function down() {
        $this->dbforge->drop_table('order_details');
    }
    
}