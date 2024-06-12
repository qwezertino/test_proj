<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Item_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_items($filters = []) {
		foreach ($filters as $key => $value) {
			if (in_array($key, ['category_id', 'status'])) {
				$this->db->where('items.' . $key, $value);
			}
		}

		$this->db->select('items.*, categories.name as category_name');
		$this->db->from('items');
        $this->db->join('categories', 'items.category_id = categories.id', 'left');
        return $this->db->get()->result();
	}
	public function add_item($data) {
        return $this->db->insert('items', $data);
    }

    public function delete_item($id) {
        return $this->db->delete('items', array('id' => $id));
    }

    public function update_item($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('items', $data);
    }
}
/* End of file '/Item_model.php' */
/* Location: ./application/models//Item_model.php */