<?php

function require_db() {
    $dbcon = new dbcon(DB_HOST, DB_USER, DB_PASS, DB_NAME);
}