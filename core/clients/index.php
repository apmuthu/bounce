<?php
$client_id = $_GET['id'];


include('./connect.php');
include('../funcs/get_client_name.php');

$client_name = get_client_name($client_id);

include('./html/form.html');
include('./html/bot.html');







?>