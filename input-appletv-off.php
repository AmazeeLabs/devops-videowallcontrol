<?php

$server = "10.0.1.250";
$port = "1515";

$commands = array(
    "\xAA\x14\x08\x01\x20\x3D"
);

foreach ($commands as $value) {
    sleep(1);
    echo "running command : ". $value ."\n";
    $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    $sockconnect = socket_connect($sock, $server, $port);
    socket_write($sock, $value, strlen($value));
    socket_close($sock);
}

