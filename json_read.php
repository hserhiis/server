<?php
$res = file_get_contents('select.js');
$data = json_decode($res, true);
var_dump($data);