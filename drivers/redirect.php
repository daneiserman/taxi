<?php
session_start();
if(isset($_SESSION['id'])) {
    echo 'office.html';
}
else {
    echo 'index.html';
}
?>