<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: store.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $mobileError = null;
         
        // keep track post values
        $Title = $_POST['Title'];
        $Location = $_POST['Location'];
        $Description = $_POST['Description'];
        $Prix = $_POST['Prix'];
        $Nombre_copie = $_POST['Nombre_copie'];
        $target_dir = "img/";
        $target_path = basename($_FILES["fileToUpload"]["name"]) ;

        if (empty($target_path)) {
           $target_file = $_POST["oldfile"] ;
        }else{
            $target_file = $target_dir . $target_path;
        }
        


        // validate input
        $valid = true;
        if (empty($Title)) {
            $TitleError = true;
            $valid = false;
        }

        if (empty($Location)) {
            $LocationError = true;
            $valid = false;
        }
         
        if (empty($Description)) {
            $DescriptionError = true;
            $valid = false;
        }
         
        if (empty($Prix)) {
            $PrixError = true;
            $valid = false;
        }
         
        if (empty($Nombre_copie)) {
            $ncError = true;
            $valid = false;
        }

         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE monument  set Title = ?, Location = ?, Description =? , Prix =? , Nombre_copie =? ,Image =? WHERE id_mon = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($Title,$Location,$Description,$Prix,$Nombre_copie,$target_file,$id));
            Database::disconnect();
            header("Location: store.php");
        }
    }
?>