<?php

$access_token = "EAAH2rRTZBh34BAMezpfC0rj4SwEQmxUK5jqZBmT9LYVC6hOR9SlnRSQHEaaPwjFazLYJVbunEPv4wjUvOZBYSeN75ZCcIiVTKH0qGbuBoNctZAmZAGbHpfI4a5fZCnZC7aHIpnbzfgI6XLbrgYZACyFYZC8lU9ZBW9ouKxvoJnNgJ9STwZDZD";
$verify_token = "qt_bot";
$hub_verify_token = null;
if(isset($_REQUEST['hub_challenge'])) {
 $challenge = $_REQUEST['hub_challenge'];
 $hub_verify_token = $_REQUEST['hub_verify_token'];
}
if ($hub_verify_token === $verify_token) {
 echo $challenge;
}

?>