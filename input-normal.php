<?php

$server = "10.0.1.250";
$port = "1515";

$commands = array(
  "\xAA\x14\x01\x01\x20\x36", # MagicConnect
  "\xAA\x14\x02\x01\x23\x3A", # HDMI
  "\xAA\x14\x03\x01\x23\x3B", # HDMI
  "\xAA\x14\x04\x01\x20\x39"  # MagicConnect
);

foreach ($commands as $value) {
    sleep(1);
    echo "running command : ". $value ."\n";
    $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    $sockconnect = socket_connect($sock, $server, $port);
    socket_write($sock, $value, strlen($value));
    socket_close($sock);
}
