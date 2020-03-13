<?php

$ch =  curl_init("https://fcm.googleapis.com/fcm/send");

$header = array("Content-Type:application/json","Authorization:key=AAAAeLqoPjQ:APA91bHvsQkqy9gcgC-PkCEi9Fs4dYjAjDDDz3s-uDQE0IvAFAZ0Zf8tsq0THPuw7Jnytp6ZXoHBuIJIPPJuuFFHvODMBSBAxcy9FAivkkBKOKILBUHfkHvJRXiwV6l3J0bK__hP0p3T");
$data=json_encode(array("to"=>"/topics/all", "notification" => array("title"=>"Nuevo Pet Tip!", "body" => $_REQUEST['post_titulo'] )));

curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);

curl_exec($ch);

header("Refresh: 0.1; url= publicaciones.php");

?>
