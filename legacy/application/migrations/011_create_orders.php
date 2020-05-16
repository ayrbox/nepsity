<?php

class Migration_Create_Orders extends CI_Migration {
        
    public function up() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'order_number' => array('type' => 'VARCHAR', 'constraint' => 20),
            'order_date' => array('type' => 'DATETIME'),
            'customer_id' => array('type' => 'INT', 'constraint' => '11'),
            'delivery_id' => array('type' => 'INT', 'constraint' => '11'),                      
            'amount' => array('type' => 'DECIMAL', 'constraint' => '10,2'),
            'delivery_charge' => array('type' => 'DECIMAL', 'constraint' => '10,2'),
            'total_amount' => array('type' => 'DECIMAL', 'constraint' => '10,2'),            
            'status' => array('type' =>'VARCHAR', 'constraint' => '20', 'default' => 'ORDERED'),
            'note' => array('type' => 'VARCHAR', 'constraint' => '1000')                                  
        );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('orders');        
    }
        
    public function down() {
        $this->dbforge->drop_table('orders');
    }
    
}