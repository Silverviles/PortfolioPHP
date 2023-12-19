<?php

include_once 'config.php';
include_once 'secret.php';

$apiUrl = 'https://api.github.com';

$username = 'silverviles';

$token = $GITHUB_TOKEN;

$endpoint = '/users/' . $username;

$url = $apiUrl . $endpoint;

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'User-Agent: Your-App', 
    'Authorization: Bearer ' . $token,
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    die('Curl error: ' . curl_error($ch));
}

curl_close($ch);

$data = json_decode($response, true);

echo 'GitHub User Details:<br>';
echo 'Username: ' . $data['login'] . '<br>';
echo 'Name: ' . $data['name'] . '<br>';
echo 'Location: ' . $data['location'] . '<br>';

?>
