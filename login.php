<?php
     
    require 'database.php';

    session_start();
 
    if ( !empty($_POST)) {
        // keep track validation errors SUBSTRING(colName, 1, 1)
        $nameError = null;
        $emailError = null;
        $mobileError = null;

        $valid = true;
         
        // keep track post values
        $email = $_POST['email'];
        $password = $_POST['password'];

        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT Id_user,Nom FROM user WHERE Email = '". $email ."' and password = '" .$password."'";
            $q=$pdo->query($sql);
            $count = $q->fetch();           
      
              // If result matched $myusername and $mypassword, table row must be 1 row
                
              if($count != null) {
                
                $_SESSION['id_user'] = $count["Id_user"];
                $_SESSION['name_user'] = $count["Nom"];
                $_SESSION['email_user'] = $email;

                //print_r($_SESSION['email_user']);exit();

                header("location: store.php");
              }else {
                
                 $error = "Your Login Name or Password is invalid";
                 
              }

            Database::disconnect();
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
 
<body style="background-image: url('img/back.png');">
    <div class="container">
            
         <div class="content">
          <div class="row">

            <div class="col-md-4 col-sm-12 align-center offset-md-4 shadow p-3 mb-5 bg-white rounded" style="background-color: #fff; margin-top: 12%;padding: 3%">
               
                            
                            <form class="" method="POST" action="">
                                

                                <div class="block block-themed block-rounded block-shadow">
                                    <div class="block-header bg-gd-dusk">
                                        <h3 class="block-title">Monuments Catalog Login</h3>
                                  
                                    </div>
                                
                                    <div class="block-content">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="login-username">E-mail</label>
                                                <input type="text" class="form-control" id="email" name="email" value="<?php echo @$email ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="login-password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                              <p style="color: red;"><?php echo @$error; ?></p>
                                        </div>
                                        <div class="form-group row mb-0">
                                        
                                            <div class="col-sm-6 text-sm-right push">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="si si-login mr-10"></i> Se connecter
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            

    </div> <!-- /container -->
  </body>
</html>
