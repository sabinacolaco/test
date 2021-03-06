<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->library('curl');
        $result = $this->curl->simple_get('https://demomedia.co.uk/files/contacts.json');

        $result = json_decode($result, true);
        $data['tableRows'] = $result;
		$this->load->view('welcome_message', $data);
	}
    
    function getdata() {
      $this->load->library('curl');
      $result = $this->curl->simple_get('https://demomedia.co.uk/files/contacts.json');
      $result = json_decode($result, true);
      $id = $this->input->post('id');
      
      $output = "";               
      foreach ($result as $row) {
      if($row['id'] == $id) {
      $output .= "First name: " .$row['firstName'] . '<br>';
      $output .= "Last name: " .$row['lastName'] . '<br>';
    
        }
    }       
    echo '<center><ul class="list-group"><li class="list-group-item">'.$output.'</li></ul></center>';
    }
}
