<?php
define('DATABASE_URL','mysql://bdba84f80d95ca:d542c948@us-cdbr-east-04.cleardb.com/heroku_9266c6d369ac25a?reconnect=true');
#echo DATABASE_URL."<br/>"."\n";
$db = parse_url(DATABASE_URL);
print("database:".trim($db["path"],"/")."<br/>"."\n");
print("user".$db["user"]."<br/>"."\n");
print("pass".$db["pass"]."<br/>"."\n");
print("host".$db["host"]."<br/>"."\n");
$database=trim($db["path"],"/");
$user=$db["user"];
$pass=$db["pass"];
$host=$db["host"];
$co = mysql_connect( $host, $user, $pass, $host);
if($co) {print("OK"."<br/>"."\n");} else {print("KO"."<br/>"."\n");}
?>
