<?php

// echo -n -e "\xAA\x11\x06\x01\x01\x19" | nc 10.0.1.250 1515


//off
//echo -n -e "\xAA\x11\x06\x01\x00\x18" | nc 10.0.1.250 1515

$server = "10.0.1.250";
$port = "1515";

$commands = array(
    "\xAA\x11\x01\x01\x01\x14",
    "\xAA\x11\x02\x01\x01\x15",
    "\xAA\x11\x03\x01\x01\x16",
    "\xAA\x11\x04\x01\x01\x17",
    "\xAA\x11\x05\x01\x01\x18",
    "\xAA\x11\x06\x01\x01\x19",
    "\xAA\x11\x07\x01\x01\x1A",
    "\xAA\x11\x08\x01\x01\x1B",
);

// $preamble = 0xAA;
// $cmd_power = 0x11;
// $deviceid = 0x06;
// $seperator = 0x00;
// $cmd_value = 0x01;
// $checksum = hexdec($cmd_power)+hexdec($deviceid)+ hexdec($seperator) + hexdec($cmd_value);
// echo $checksum;
// $packetdata = "\xAA\x11\x06\x01\x00\x18";

//$packetdata = $preamble.$cmd_power.$deviceid.$seperator.$cmd_value.dechex($checksum);

foreach ($commands as $value) {
    echo "running command : ". $value ."\n";
    $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    $sockconnect = socket_connect($sock, $server, $port);

    socket_write($sock, $value, strlen($value));

    socket_close($sock);

}

