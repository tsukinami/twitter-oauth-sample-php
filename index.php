<?php

session_start();

require 'vendor/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

require_once 'config.php';

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
$request_token = $connection->oauth('oauth/request_token', ['oauth_callback' => OAUTH_CALLBACK]);

$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

$url = $connection->url('oauth/authenticate', ['oauth_token' => $request_token['oauth_token']]);

header("Location: {$url}");
