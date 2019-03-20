<?php
    require 'database.php';
     
    if ( !empty($_GET)) {
        // keep track post values
        $id = $_GET['id'];
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM monument  WHERE id_mon = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: store.php");
         
    }
?>