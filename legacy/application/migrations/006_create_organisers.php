<?php

class Migration_Create_Organisers extends CI_Migration {
        
    public function up() {
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'name' => array('type' => 'VARCHAR', 'constraint' => '100'),
            'about' => array('type' => 'TEXT NULL'),
            'location' => array('type' => 'TEXT NULL'),
            'contact_address' => array('type' => 'VARCHAR', 'constraint' => '1000'),
            'members' => array('type' => 'VARCHAR', 'constraint' => '1000'),
            'announcement' => array('type' => 'VARCHAR', 'constraint' => '1000'),
            'logo_image' => array('type' => 'VARCHAR', 'constraint' => '1000'),
            'partner' => array('type' => 'VARCHAR', 'constraint' => '1', 'default' => 'N')                                  
        );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('organisers');        
    }
        
    public function down() {
        $this->dbforge->drop_table('organisers');
    }

}