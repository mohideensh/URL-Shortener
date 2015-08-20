<?php
/**
* URL Shorten API for Bitly
* @version API v3
* @author Mohideen
* @link http://www.mohideen-sh.com
*/
class Bitly
{
	var $apiURL = 'http://api.bit.ly/v3/';
	var $apiQuery = '';

	/**
	 * @param str $login as Bitly username
	 * @param str $apiKey as Bitly API Key
	 */
	function __construct($username, $apiKey)
	{
		$this->apiQuery  = 'login=' . $username;
		$this->apiQuery .= '&apiKey=' . $apiKey;
		$this->apiQuery .= '&format=json';
	}

	/**
	 * Short Long URL
	 * @param string URL
	 * @return string || void
	 */
	function shorten($uri)
	{
		$this->apiQuery .= '&uri=' . urlencode($uri);
		$query = $this->apiURL . 'shorten?' . $this->apiQuery;
		$data  = $this->curl($query);
		$json  = json_decode($data);
		return isset($json->data->url) ? $json->data->url : '';
	}

	/**
	 * Expend Short URL
	 * @param str URL
	 * @return str || void
	 */
	function expend($uri)
	{
		$this->apiQuery .= '&shortUrl='.urlencode($uri);
		$query = $this->apiURL . 'expand?' . $this->apiQuery;
		$data  = $this->curl($query);
		$json  = json_decode($data);
		return isset($json->data->expand[0]->long_url) ? $json->data->expand[0]->long_url : '';
	}

	/**
	 * Send CURL Request
	 * @param string URL
	 * @return string
	 */
	function curl($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
}
?>