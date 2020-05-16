<?php

class Migration_Create_Events extends CI_Migration {
        
    public function up() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'title' => array('type' => 'VARCHAR', 'constraint' => '100'),
            'date' => array('type' => 'DATETIME'),
            'time' => array('type' => 'VARCHAR', 'constraint' => '100'),
            'venue' => array('type' => 'VARCHAR', 'constraint' => '200'),
            'event_category_id' => array('type' => 'INT', 'constraint' => '11'),
            'description' => array('type' => 'TEXT', 'null' => TRUE),
            'organiser_id' => array('type' => 'INT', 'constraint' => '11'),
            'featured' => array('type' => 'INT', 'constraint' => 11),
        );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('events');
        
    }
    
    public function down() {
        $this->dbforge->drop_table('events');
    }

}