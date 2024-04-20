<?php

$db_host = 'monorail.proxy.rlwy.net:50150';
$db_user = 'root';
$db_pass = 'dwWqbFZJQHBsgeqFGZnRMTQKxgaVvEqb';

$db_name = "railway";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$con) {
    echo "No connection";
}
