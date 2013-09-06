<?php

$server = "10.0.1.250";
$port = "1515";

$commands = array(
    "\xAA\x14\x02\x01\x18\x2F",
    "\xAA\x14\x03\x01\x18\x30",
    "\xAA\x14\x06\x01\x18\x33",
    "\xAA\x14\x07\x01\x18\x34",
);

foreach ($commands as $value) {
    sleep(1);
    echo "running command : ". $value ."\n";
    $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    $sockconnect = socket_connect($sock, $server, $port);
    socket_write($sock, $value, strlen($value));
    socket_close($sock);
}

