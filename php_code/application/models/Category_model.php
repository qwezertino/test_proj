<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Category_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_categories() {
        return $this->db->get('categories')->result();
    }

    public function add_category($data) {
        return $this->db->insert('categories', $data);
    }
}
/* End of file '/Category_model.php' */
/* Location: ./application/models//Category_model.php */