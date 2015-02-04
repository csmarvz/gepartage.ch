<?php
    include('xcrud/xcrud.php');
	$xcrud_users = Xcrud::get_instance();
    $xcrud_objects = Xcrud::get_instance();
	$xcrud_ads = Xcrud::get_instance();
	$xcrud_messages = Xcrud::get_instance();
	$xcrud_user_object = Xcrud::get_instance();
	
	$xcrud_users->table('users');
    $xcrud_objects->table('objects');
	$xcrud_ads->table('ads');
	$xcrud_ads->relation('object_id','objects','id','name',array());
	$xcrud_messages->table('messages');
	$xcrud_user_object->table('user_object');
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>ADMIN GEPARTAGE</title>
</head>
 
<body>
 
<?php
	echo $xcrud_users->render();
    echo $xcrud_objects->render();
	echo $xcrud_ads->render();
	echo $xcrud_messages->render();
	echo $xcrud_user_object->render();
?>
 
</body>
</html>