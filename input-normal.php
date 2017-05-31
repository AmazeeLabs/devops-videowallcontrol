<?php

$server = "10.0.1.250";
$port = "1515";

$commands = array(
  "\xAA\x14\x01\x01\x20\x36", # MagicConnect
  "\xAA\x14\x02\x01\x23\x3A", # HDMI 2 - Zoom
  "\xAA\x14\x03\x01\x23\x3B", # HDMI 2 - Zoom
  "\xAA\x14\x04\x01\x20\x39",  # MagicConnect
  "\xAA\x14\x05\x01\x20\x40",  # MagicConnect
  "\xAA\x14\x06\x01\x22\x3D",  # HDMI
  "\xAA\x14\x07\x01\x22\x3E",  # HDMI
  "\xAA\x14\x08\x01\x20\x3D"  # MagicConnect
);

foreach ($commands as $value) {
    sleep(1);
    echo "running command : ". $value ."\n";
    $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    $sockconnect = socket_connect($sock, $server, $port);
    socket_write($sock, $value, strlen($value));
    socket_close($sock);
}
