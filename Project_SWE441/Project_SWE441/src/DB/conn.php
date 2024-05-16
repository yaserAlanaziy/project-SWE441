<?php
$conn = new mysqli("localhost", "root", "", "online_store");

if ($conn->connect_error) {
    echo "error";
}
