<?php 

require 'db.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id']; 
    $db->query("DELETE FROM cms WHERE id='$id'"); 
    header('Location: index.php');
    exit;
} else {
    echo 'Tidak ada ID yang diberikan';
}
