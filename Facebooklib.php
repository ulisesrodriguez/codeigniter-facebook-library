<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*

  Author		Ulises Rodríguez
  Site:			http://www.ulisesrodriguez.com	
  Twitter:		https://twitter.com/#!/isc_ulises
  Facebook:		http://www.facebook.com/ISC.Ulises
  Github:		https://github.com/ulisesrodriguez
  Email:		ing.ulisesrodriguez@gmail.com
  Skype:		systemonlinesoftware
  Location:		Guadalajara Jalisco Mexíco
 
  Facebook
*/


class Facebooklib{
	
	private $config = array(); 
	
	private $facebook = null;
	
	private $user = null;
	
	private $user_profile = null;
		 
    public function __construct()
    {
        
		require 'facebook/src/facebook.php';
 
    }
 
 	
	public function config( $appId, $app_secret ){
		
		if( empty( $appId  ) or empty( $app_secret ) ) return false;
		
		$this->config['appId'] = $appId;
		$this->config['secret'] = $app_secret;
		$this->config['fileUpload'] = false; // optional
		
		
		$this->facebook = new Facebook( $this->config );
		
				
						
		// Get User ID
		$this->user = $this->facebook->getUser();
				
		if ($this->user) {
		  try {
			// Proceed knowing you have a logged in user who's authenticated.
			$this->user_profile = $this->facebook->api('/me');
		  } catch (FacebookApiException $e) {
				error_log($e);
				$this->user = null;
		  }
		}
	
	
	}
	
	
	public function return_profile(){
		
		if( !empty( $this->user_profile ) )
			return $this->user_profile;
		else
			return null;	
		
	}
	
	
	
	public function parse_signed_request( $signed_request ) {
	  
	  list($encoded_sig, $payload) = explode('.', $signed_request, 2); 
	
	  // decode the data
	  $sig = $this->base64_url_decode($encoded_sig);
	  
	  $data = json_decode($this->base64_url_decode($payload), true);
	
	  if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
		error_log('Unknown algorithm. Expected HMAC-SHA256');
		return null;
	  }
	
	  // check sig
	  $expected_sig = hash_hmac('sha256', $payload, $this->config['secret'], $raw = true);
	  if ($sig !== $expected_sig) {
		error_log('Bad Signed JSON signature!');
		return null;
	  }
	
	  return $data;
	}
	
	public function base64_url_decode($input) {
		return base64_decode(strtr($input, '-_', '+/'));
	}

	
	
	
	
	
	public function logout(){
	
		$this->facebook->destroySession();
		
	}
	
	
	
	
	
	
	
	
	
	// Logput
	public function logoutUrl(){
						
		return $this->facebook->getLogoutUrl();
				
	}	
		 
 
}

?>