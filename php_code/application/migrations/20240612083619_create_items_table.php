<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_items_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}

	public function up()
    {
        $fields = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'category_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'status' => array(
                'type' => 'ENUM("purchased", "not_purchased")',
                'default' => 'not_purchased',
            ),
           'created_at datetime default current_timestamp',
            // 'date_added' => array(
            //     'type' => 'TIMESTAMP',
            //     'default' => 'CURRENT_TIMESTAMP',
            // )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('category_id');
        $this->dbforge->create_table('items', TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('items', TRUE);
    }
}
/* End of file '20240612083619_create_items_table' */
/* Location: ./E:\WorkFiles\PHPProjects\test_proj1\php_code\application\migrations/20240612083619_create_items_table.php */
