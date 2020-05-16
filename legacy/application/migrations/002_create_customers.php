<?php

class Migration_Create_customers extends CI_Migration {
    
    
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'address' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',                               
            ),
            'address1' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'postcode' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
            ),
            'contact_number' => array(
                'type' => 'VARCHAR',
                'constraint' => '30'
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            )
        ));

        $this->dbforge->add_key('id',TRUE);
        $this->dbforge->create_table('customers');
    }

    public function down()
    {
        $this->dbforge->drop_table('customers');
    }
    
}
