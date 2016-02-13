<?php
$UserClass=new user();

$filters['id']=1;
$users=$UserClass->get_users($filters,'','all');
arraylist($users);


?>