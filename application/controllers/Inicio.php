<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Abraham\TwitterOAuth\TwitterOAuth;
class Inicio extends CI_Controller {
    
	
	public function index()
	{
            
        /*$connection = new TwitterOAuth(CONSUMERKEY, CONSUMERSECRET, ACCESTOKEN, ACCESTOKENSECRET);
        $content = $connection->get("account/verify_credentials");
        $search=$connection->get('search/tweets', ['q'=>'ramsay']);*/
        $this->load->helper('url');
            
		$this->load->view('index_view');
	}
	public function searchTweets()
	{
		$word=$this->input->post('word');
		
		$connection = new TwitterOAuth(CONSUMERKEY, CONSUMERSECRET, ACCESTOKEN, ACCESTOKENSECRET);
		$content = $connection->get("account/verify_credentials");
        #$content = $connection->get("account/verify_credentials");
        $search=$connection->get('search/tweets', ['q'=>'ramsay']);

		foreach ($search->statuses as $result) {
		  //echo $result->user->screen_name . ": " . $result->text . "<br>";
		  $tweets[]['screen_name']=$result->user->screen_name;
		  $tweets[]['text']=$result->text;
		}

        echo json_encode($tweets);
	}
}



