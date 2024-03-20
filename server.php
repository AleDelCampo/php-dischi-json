<?php

$json_file = 'dischi.json';

$json_data = file_get_contents($json_file);

$data = json_decode($json_data, true);

header('Content-Type: application/json');

echo json_encode($data);






