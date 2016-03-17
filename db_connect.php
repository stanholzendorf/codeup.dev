<?php

$dbc = new PDO(DB_HOST . DB_NAME, DB_USER, DB_PASS);


$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);