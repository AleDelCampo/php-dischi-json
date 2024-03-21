<?php

$discsString = file_get_contents('./dischi.json');

$disc_list = json_decode($discsString);

if (isset ($_GET['discIndex']) && $_GET['discIndex'] != '') {

    $disc_index = $_GET['discIndex'];

    $selected_album = $disc_list[$disc_index];

    $album_json = json_encode($selected_album);

    header('Content-Type: application/json');
    echo $album_json;

} else {

    $discs_string = json_encode($disc_list);

    header('Content-Type: application/json');
    echo $discs_string;

}