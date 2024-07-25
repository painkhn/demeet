<php

$token = '7167637771:AAFaxsYeIYHt-PDtV6aPZtgMJ3PtJmUG_9A';

$chat_id = '-4212312981';

$ip = $_SERVER['REMOTE_ADDR'];
$os = $_SERVER['HTTP_USER_AGENT'];
$country = '';

$geo = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"), true);
if ($geo) {
    $country = $geo['country'];
}

$message = "Пользователь: {$ip} ({$os}) из {$country}";

$url = "https://api.telegram.org/bot{$token}/sendMessage";
$params = [
    'chat_id' => $chat_id,
    'text' => $message,
];
$headers = [
    'Content-Type: application/json',
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
curl_close($ch);

echo $response;

?>