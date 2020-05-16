<?php

class Migration_Create_Event_Categories extends CI_Migration {
        
    public function up() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'name' => array('type' => 'VARCHAR', 'constraint' => '100'),
            'description' => array('type' => 'VARCHAR', 'constraint' => '500')                                  
        );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('event_categories');        
    }
    
    public function down() {
        $this->dbforge->drop_table('event_categories');
    }

}