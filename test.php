<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

include 'onesignalhelper.php';

$result = OnesignalHelper::sendPushNotification('Foo', null, '557', '108');
var_dump($result);

?>