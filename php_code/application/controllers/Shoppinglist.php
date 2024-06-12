<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shoppinglist extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->model('Item_model');
        $this->load->model('Category_model');
    }

    public function index() {
		$data['categories'] = $this->Category_model->get_categories();
		$this->load->view('shopping_list', $data);
	}

	public function fetch_items() {
		$category_id = $this->input->get('category_id');
		$status = $this->input->get('status');

		if (empty($category_id)) $category_id = null;
		if (empty($status)) $status = null;

		$filters = [];
		if ($category_id !== null) {
			$filters['category_id'] = $category_id;
		}
		if ($status !== null) {
			$filters['status'] = $status;
		}

		$items = $this->Item_model->get_items($filters);
		$data['items'] = $items;
		$this->load->view('items_list', $data);
	}
    public function add_item() {
        $data = array(
            'name' => $this->input->post('name'),
            'category_id' => $this->input->post('category_id'),
        );
        $this->Item_model->add_item($data);
        echo json_encode(array("status" => TRUE));
    }

    public function delete_item($id) {
        $this->Item_model->delete_item($id);
        echo json_encode(array("status" => TRUE));
    }

    public function mark_as_purchased($id) {
        $data = array('status' => 'purchased');
        $this->Item_model->update_item($id, $data);
        echo json_encode(array("status" => TRUE));
    }

    public function add_category() {
        $data = array('name' => $this->input->post('category_name'));
        $this->Category_model->add_category($data);
        echo json_encode(array("status" => TRUE));
    }
}
/* End of file '/Shoppinglist.php' */
/* Location: ./application/controllers//Shoppinglist.php */
