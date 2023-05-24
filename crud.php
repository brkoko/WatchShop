<?php
include('database.php');
if (isset($_POST['edit_watch'])) {
    $data = [
        'id' => $_POST['id'],
        'brand' => $_POST['brand'],
        'model' => $_POST['model'],
        'price' => $_POST['price'],
        'img'  => $_POST['img']
    ];
    $query = "UPDATE watches SET brand = ?, model = ?, price = ?, img = ? WHERE id = ?";
    $query_run = $GLOBALS['mysqli']->prepare($query);
    $query_run->bind_param('ssdsi', 
                                     $data['brand'],
                                     $data['model'],
                                     $data['price'],
                                     $data['img'],
                                     $data['id']);
    $query_run->execute([
                        $data['brand'],
                        $data['model'],
                        
                        $data['price'],
                        $data['img'],
                        $data['id']]);
    if ($query_run) {
        header("LOCATION: add.php");
    } else {
        echo "Message not sent";
    }
};
if (isset($_POST['add_watch'])) {
    $data = [
        'brand' => $_POST['brand'],
        'model' => $_POST['model'],
        'price' => $_POST['price'],
       
        'img'  => $_POST['img']
    ];
    $query = "INSERT INTO watches(brand, model, price,img) VALUES (?,?,?,?)";
    $query_run = $GLOBALS['mysqli']->prepare($query);
    $query_run->bind_param('ssds', $data['brand'],
                                     $data['model'],
                                     $data['price'],
                                     $data['img']);
    $query_run->execute([$data['brand'],
                        $data['model'],
                        $data['price'],
                        $data['img']]);
    if ($query_run) {
        header("LOCATION: add.php");
    } else {
        echo "Message not sent";
    }
};

if (isset($_POST['remove_watch'])) {
    $data = [
        'id' => $_POST['id'],
        'brand' => $_POST['brand'],
        'model' => $_POST['model'],
        'price' => $_POST['price'],
        'img'  => $_POST['img']
    ];
    $query = "DELETE FROM watches WHERE id = ?";
    $query_run = $GLOBALS['mysqli']->prepare($query);
    $query_run->bind_param('i',  $data['id']);
    $query_run->execute([$data['id']]);
    if ($query_run) {
        header("LOCATION: add.php");
    } else {
        echo "Message not sent";
    }
};