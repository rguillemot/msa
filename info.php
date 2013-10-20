<?php
echo getenv("DATABASE_URL")."<br/>"."\n";
print($DATABASE_URL)."<br/>"."\n";
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
