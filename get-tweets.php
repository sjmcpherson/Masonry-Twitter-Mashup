<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
session_start();
require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "sjmcpherso";
$notweets = 10;
$consumerkey = "wxVWjM0A3tbHQj69akGgovi94";
$consumersecret = "sQIyKkDPdaTW7dTYd17jh4K9in5hhsiwaWMPVHRFOiQG4sADKb";
$accesstoken = "223649556-6LwOXBoK0di8fq98VXC4AddKVwxdL9FRduV6q7pm";
$accesstokensecret = "oN9JWme5Pwcl3B9GffgBxsk8mElgwqTxmkJl8gh5PTpPe";

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>