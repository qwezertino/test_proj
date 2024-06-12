<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migrate extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->library('migration');
    }

    public function index()
    {
        if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        }
        else
        {
            echo 'Migrations ran successfully!';
        }
    }
}
/* End of file '/Migrate.php' */
/* Location: ./application/controllers//Migrate.php */
