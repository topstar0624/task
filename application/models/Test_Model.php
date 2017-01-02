<?
class Test_Model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->dbforge();
		date_default_timezone_set('Asia/Tokyo');
	}

	function create_table_model()
	{
	    echo 'create_table_modelだお';
		$this->dbforge->add_field(
			array(
				'id' => array(
					'type' => 'INT',
					'constraint' => 9,
					'unsigned' => TRUE,
					'auto_increment' => TRUE,
				),
				'key' => array(
					'type' => 'VARCHAR',
					'constraint' => 255,
				),
				'email' => array(
					'type' => 'VARCHAR',
					'constraint' => 255,
				),
				'pass' => array(
					'type' => 'VARCHAR',
					'constraint' => 255,
				),
				'created' => array(
					'type' => 'DATETIME',
				),
				'modified' => array(
					'type' =>'TIMESTAMP',
				),
				'deleted' => array(
					'type' =>'DATETIME',
				),
			)
		);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('test');
	}
}