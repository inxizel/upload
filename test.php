<?php
	
	$serial = '12345696541254';
	$mathe = '489798897897999';
	$status = 1;
	$shop = 'lienquanmobile.shop';

	$res = callback($serial,$mathe,$status,$shop);

	var_dump($res);

	function callback($serial,$mathe,$status,$shop){
	    $post = '{
	    	"serial" : "'.$serial.'",
		    "mathe" : "'.$mathe.'",
		    "status" : "'.$status.'"
		}';

	    
	    $url = "https://" . $shop . "/Content/ajax/site/callback.php";
	    
		$headers = array(
			'Content-Type: application/json',
		);
		$curl = new cURL($headers);
		$curl->post($url, $post);
		$res = $curl->getText();
	    $jsonRes = json_decode($res);
	    return $jsonRes;
	}


class cURL {
	private $headers;
	private $cookie_file;
	private $rescode;
	private $text;
	function __construct($headers = array(), $cookie_file = 'cook') {
		$this->headers = $headers;
		$this->cookie_file=dirname(__FILE__) . "/" . $cookie_file . '.txt';
		$this->rescode = 200;
	}
	
	function get($url) {
		$ch = curl_init($url);	
		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie_file);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie_file);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		$this->text = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$this->rescode = $httpcode;
		curl_close($ch);
	}
	function post($url, $data) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie_file);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie_file);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		$this->text = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if(curl_errno($ch) == 28) $httpcode = 403;
		$this->rescode = $httpcode;
		curl_close($ch);
	}
	public function getText()
	{
		return $this->text;
	}
	public function getStatus()
	{
		return $this->rescode;
	}
}