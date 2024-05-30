<?php

function showOutput($data){
    $jsonData = json_encode($data);
    header('Content-Type: application/json');
    echo $jsonData;
}
