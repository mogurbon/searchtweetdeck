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

			echo mb_detect_encoding(iconv("ASCII", "UTF-8//IGNORE", $result->text));
			echo "<br>";
		  $tweets[]['screen_name']=utf8_encode($result->user->screen_name);
		  $tweets[]['text']=utf8_encode($result->text);
		}
		die;
        echo json_encode($tweets);


	}
	public function unicode_to_utf8( $str ) {
    
        $utf8 = '';
        
        foreach( $str as $unicode ) {
        
            if ( $unicode < 128 ) {

                $utf8.= chr( $unicode );
            
            } elseif ( $unicode < 2048 ) {
                
                $utf8.= chr( 192 +  ( ( $unicode - ( $unicode % 64 ) ) / 64 ) );
                $utf8.= chr( 128 + ( $unicode % 64 ) );
                        
            } else {
                
                $utf8.= chr( 224 + ( ( $unicode - ( $unicode % 4096 ) ) / 4096 ) );
                $utf8.= chr( 128 + ( ( ( $unicode % 4096 ) - ( $unicode % 64 ) ) / 64 ) );
                $utf8.= chr( 128 + ( $unicode % 64 ) );
                
            } // if
            
        } // foreach
    
        return $utf8;
    
    } // unicode_to_utf8
}



