<?php
class Migration_Create_Ticket_types extends CI_Migration {
        
    public function up() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),            
            'description' => array('type' => 'VARCHAR', 'constraint' => '11')            
        );
                
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('ticket_types');
                
    }
    
    public function down() {
        $this->dbforge->drop_table('ticket_types');
    }

}