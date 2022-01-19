<?php 
require_once('config.php');
$conn = new mysqli($config['db']['host'],$config['db']['username'],$config['db']['pw'],$config['db']['db_name']);
if(!$conn){
    echo 'error'.mysql_connect_error();
} 
