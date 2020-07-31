<?php
/**
 * Webhook for Time Bot- Facebook Messenger Bot
 */
$access_token = "EAAH2rRTZBh34BAMezpfC0rj4SwEQmxUK5jqZBmT9LYVC6hOR9SlnRSQHEaaPwjFazLYJVbunEPv4wjUvOZBYSeN75ZCcIiVTKH0qGbuBoNctZAmZAGbHpfI4a5fZCnZC7aHIpnbzfgI6XLbrgYZACyFYZC8lU9ZBW9ouKxvoJnNgJ9STwZDZD";
// Your webhook varification token
$verify_token = "qt_bot";
$hub_verify_token = null;
if(isset($_REQUEST['hub_challenge'])) {
    $challenge = $_REQUEST['hub_challenge'];
    $hub_verify_token = $_REQUEST['hub_verify_token'];
}
if ($hub_verify_token === $verify_token) {
    echo $challenge;
}
$input = json_decode(file_get_contents('php://input'), true);
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];
$message_to_reply = '';
/**
 * Some Basic rules to validate incoming messages
 */

switch(strtolower($message))
{
	case "hi":
		$message_to_reply = "Hello!";
		break;
    case "hello":
        $message_to_reply ="Hi!";
        break;
    case "lol":
        $message_to_reply ="HAHAHA!";
        break;
	case "haha":
        $message_to_reply ="LOL!";
        break;
    default:
        $message_to_reply ="Chadify Bot says : Inaaral ko pa yan! try haha, lol, hello or hi";
}

//API Url
$url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$access_token;
//Initiate cURL.
$ch = curl_init($url);
//The JSON data.
$jsonData = '{
    "recipient":{
        "id":"'.$sender.'"
    },
    "message":{
        "text":"'.$message_to_reply.'"
    }
}';
//Encode the array into JSON.
$jsonDataEncoded = $jsonData;
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
//Execute the request
if(!empty($input['entry'][0]['messaging'][0]['message'])){
    $result = curl_exec($ch);
}

?>