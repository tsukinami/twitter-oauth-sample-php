<?php

session_start();

require 'vendor/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

require_once 'config.php';

$access_token = $_SESSION['access_token'];
print_r($access_token);

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

$user = $connection->get("account/verify_credentials");

print_r($user);
