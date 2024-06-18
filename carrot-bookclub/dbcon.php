<?php
ini_set( 'display_errors', '0' );//혹시나 warning 메세지
$hostname="localhost";
$dbuserid="pma";
$dbpasswd="";
$dbname="test";

$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);
if ($mysqli->connect_errno) {
    die('Connect Error: '.$mysqli->connect_error);
}


// echo "<pre>";
// print_r($rsc);
?>