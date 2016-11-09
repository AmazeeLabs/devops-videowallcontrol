<?php


// set screens 2 3 6 7 to hdmi1

$server = "10.0.1.250";
$port = "1515";

$commands = array(
    "\xAA\x14\x02\x01\x21\x38",
    "\xAA\x14\x03\x01\x21\x39",
    "\xAA\x14\x06\x01\x21\x3C",
    "\xAA\x14\x07\x01\x21\x3D",
    "\xAA\x84\x02\x01\x00\x87",
    "\xAA\x84\x03\x01\x00\x88",
    "\xAA\x84\x06\x01\x00\x8B",
    "\xAA\x84\x07\x01\x00\x8C",
);

foreach ($commands as $value) {
    sleep(1);
    echo "running command : ". $value ."\n";
    $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    $sockconnect = socket_connect($sock, $server, $port);
    socket_write($sock, $value, strlen($value));
    socket_close($sock);
}
