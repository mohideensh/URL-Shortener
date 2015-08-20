<?php
/**
* URL Shorten API for Bitly
* @version API v3
* @author Mohideen
* @link http://www.mohideen-sh.com
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
# Shorten Long URL
$shorten = $bitly->shorten('http://www.mindvalley.com');
# Expend Short URL
$expend = $bitly->expend('http://bit.ly/15MCr0p');

print_r($bitly);
print_r($shorten);
print_r($expend);

?>