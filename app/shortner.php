<?php
/**
* URL Shorten API for Bitly
* @version API v3
* @author Mohideen
* @link http://www.mohideen-sh.com/bitly
*/
/**
 * Bitly Api Usages
 */

# Include main bitly class
include 'bitly.class.php';
# Bitly User name
$login = 'mohideensh';
# Bitly API key
$api = 'R_edb043d052134d95ad566d0b4ab71b48';

$bitly = new Bitly($login, $api);

if (is_ajax()) {
	if (isset($_POST["inputURL"]) && !empty($_POST["inputURL"])) { //Checks if action value exists
		$inputURL = $_POST["inputURL"];
		# Shorten Long URL
		$shorten = $bitly->shorten($inputURL);
		echo json_encode($shorten);
	}
}

function is_ajax() {
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

?>