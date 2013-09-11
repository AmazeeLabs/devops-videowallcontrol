<?php

$server = "10.0.1.250";
$port = "1515";

$commands = array(
    "\xAA\x11\x01\x01\x01\x14",
    "\xAA\x11\x01\x01\x01\x14",
    "\xAA\x11\x02\x01\x01\x15",
    "\xAA\x11\x03\x01\x01\x16",
    "\xAA\x11\x04\x01\x01\x17",
    "\xAA\x11\x05\x01\x01\x18",
    "\xAA\x11\x06\x01\x01\x19",
    "\xAA\x11\x07\x01\x01\x1A",
    "\xAA\x11\x08\x01\x01\x1B",
);

foreach ($commands as $value) {
    sleep(2);
    echo "running command : ". $value ."\n";
    $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    $sockconnect = socket_connect($sock, $server, $port);
    socket_write($sock, $value, strlen($value));
    socket_close($sock);
}

