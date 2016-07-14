<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Abraham\TwitterOAuth\TwitterOAuth;
class Inicio extends CI_Controller {
    
	
	public function index()
	{
            
        $connection = new TwitterOAuth(CONSUMERKEY, CONSUMERSECRET, ACCESTOKEN, ACCESTOKENSECRET);
        $content = $connection->get("account/verify_credentials");
        $search=$connection->get('search/tweets', ['q'=>'ramsay']);
        $this->load->helper('url');
            
		$this->load->view('index_view');
	}
}



