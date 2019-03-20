<?php
     session_start();
if (!empty($_SESSION)) {

    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $mobileError = null;
         
        // keep track post values
        $id_user = $_SESSION['id_user'];
        $Title = $_POST['Title'];
        $Location = $_POST['Location'];
        $Description = $_POST['Description'];
        $Prix = $_POST['Prix'];
        $Nombre_copie = $_POST['Nombre_copie'];
        $target_dir = "img/";
        $target_path = basename($_FILES["fileToUpload"]["name"]) ;
        $target_file = $target_dir . $target_path;


        $test = "ok";

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

        if (empty($target_path)) {
            $tpError = true;
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO monument (id_user,Title,Location,Description,Prix,Nombre_copie,Image) values(?, ?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($id_user,$Title,$Location,$Description,$Prix,$Nombre_copie,$target_file));
            Database::disconnect();
            header("Location: store.php");
        }
    }






 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <link   href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
    	body {
    background:#354545;
}
.nav-tabs {
    min-height:100vh;
    transition: all 300ms cubic-bezier(0.65, 0.05, 0.36, 1);
    will-change: left, width;
    box-shadow: inset -1px 0 10px rgba(0, 0, 0, 0.4);
    background: #293749;
    display: block;
}
.nav-tabs a {
    padding:30px;
}
.nav-tabs li i {
    font-size: 120%;
}
.nav-tabs li a {
    color:#fff;
    display:block;
}
.nav-tabs li:hover {
    background:#167696;
}
.nav-tabs li a:hover {
    color:#fff;
    text-decoration:none;
}
.nav-tabs li:hover i {
    color:#fff;
}
.nav-tabs li.active {
    background:#0f4698;
}
.nav-tabs li.active i {
    color:#fff;
}
.nav-tabs li.active:hover {
    background:#167696;
}
.nav-tabs li.active:hover i {
    color:#fff;
}

.nav-tabs li { cursor:pointer; }


#showdata input{
	color: #fff;
    background-color: rgba(0, 0, 0, 0.3);
}
#showdata textarea{
	color: #fff;
    background-color: rgba(0, 0, 0, 0.3);
}

    </style>

</head>
 
<body>

	<nav class="navbar navbar-inverse navbar-light bg-light">
	<div class="container-fluid">
	  <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION['name_user']; ?></a>

	  <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><i  style="font-size: 170%;" class="fa fa-sign-out"></i></a></li>
    	</ul>
    </div>
	</nav>

		<div class="container-fluid">
		<div class="row">
		        <ul class="nav nav-tabs">
		            <li class="active"><a data-toggle="tab" href="#Store" role="tab"><i class="fa fa-shopping-bag"></i></a></li>
		            <li><a data-toggle="tab" href="#Users" role="tab"><i class="fa fa-user"></i></a></li>
		            <li><a href="logout.php" ><i class="fa fa-sign-out"></i></a></li>
		        </ul>
		

		<div class="col-md-11">
		<div class="tab-content">
                                     
				    <div role="tabpanel" class="tab-pane active" role="tabpanel" id="Store">

				    <div class="row">

				    	<div id="formstandar" class="col-4" style="margin-top: 2%;">
				    	<div class="shadow p-3 mb-5 rounded" style="background-color: #28a745;">
				    		<div class="form-group row mb-3">
                                <div class="col-12 text-center push" style="margin-top: 35%;margin-bottom: 35%;">
                                    <button type="button" onclick="change()" class="btn btn-info" style="padding-left: 10%;padding-right: 10%;border: 1px solid;">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
				    	</div>
				    	</div>

				    <div  id="forminsert" class="col-4" style="margin-top: 2%;">
					<div class="shadow p-3 mb-5 rounded" style="background-color: rgb(248, 249, 250);">
						<form class="" method="POST" action="" enctype="multipart/form-data">
                        <div class="block block-themed block-rounded block-shadow">
          
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success" style="border-radius: 100%;margin-top: -18%; margin-right: -10%;">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    
                            </div>
                            <div class="block-content" style="margin-top: -5%;margin-bottom: -5%;">
                            	 <div class="form-group row">
                                    <div class="col-12">
                                        <input type="text" class="form-control <?php if(@$TitleError){ echo 'is-invalid'; } ?>" id="Title" name="Title" placeholder="Title" value="<?php echo @$_POST['Title'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <input type="text" class="form-control <?php if(@$LocationError){ echo 'is-invalid'; } ?>" id="Location" name="Location" placeholder="Location" value="<?php echo @$_POST['Location'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                    	<textarea class="form-control <?php if(@$DescriptionError){ echo 'is-invalid'; } ?>" rows="4" id="Description" name="Description" placeholder="Description"><?php echo @$_POST['Description'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                            <div class="col-12 text-left push">
                                            	<input type="file" class="form-control <?php if(@$tpError){ echo 'is-invalid'; } ?>" name="fileToUpload">
                                            </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <input type="text" class="form-control <?php if(@$PrixError){ echo 'is-invalid'; } ?>" id="Prix" name="Prix" placeholder="Prix: $" value="<?php echo @$_POST['Prix'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" class="form-control <?php if(@$ncError){ echo 'is-invalid'; } ?>" id="Nombre_copie" name="Nombre_copie" placeholder="Nombre copie" value="<?php echo @$_POST['Nombre_copie'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    	</form>
					</div>
					</div>


<?php
                   
                   $pdo = Database::connect();
                   $sqlstore = 'SELECT * FROM monument';
                   $qs=$pdo->query($sqlstore);
                   foreach ($qs as $row) {
                  ?>


					<!-- form store -->
					<div class="col-4" style="margin-top: 2%;">
					
						<form id="showdata" method="POST" action="" enctype="multipart/form-data">
                            <div class="shadow p-3 rounded" style="background-image: url('<?php print $row['Image'] ?>');background-size: 140%; background-repeat: no-repeat;">
                        <div class="block block-themed block-rounded block-shadow">
          
                                    <div class="text-right">
                                        <button type="button" id="btnwarning" onclick="btnedit()" class="btn btn-warning" style="border-radius: 100%;margin-top: -18%;">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                     
                                        <button type="button" onclick="savechange(<?php print $row['id_mon'] ?>)" id="btnsuccess" class="btn btn-success" style="border-radius: 100%;margin-top: -18%; ">
                                            <i class="fa fa-check"></i>
                                        </button>

                                        <button type="button" onclick="btnremove(<?php print $row['id_mon'] ?>)" class="btn btn-danger" style="border-radius: 100%;margin-top: -18%;margin-right: -10%;">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                            		</div>


                             <div id="formsave" class="block-content" style="margin-top: -5%;margin-bottom: -5%;color: #fff">
                            	 <div class="form-group row">
                                    <div class="col-12">
                                    	<label><?php print $row['Title'] ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                    	<label><?php print $row['Location'] ?></label>
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom: 46%">
                                    <div class="col-12">
                                    	<label><?php print $row['Description'] ?></label>
                                    </div>
                                </div>
                                <div class="form-group row text-center">
                                    <div class="col-6">
                                    	<label><?php print $row['Prix'] ?>$</label>
                                    </div>
                                    <div class="col-6">
                                    	<label><?php print $row['Nombre_copie'] ?></label>
                                    </div>
                                </div>
                            </div>

                            <div id="formedit" class="block-content" style="margin-top: -5%;margin-bottom: -5%;">
                            	 <div class="form-group row">
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="Title" placeholder="Title" value="<?php print $row['Title'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="Location" placeholder="Location" value="<?php print $row['Location'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                    	<textarea class="form-control" rows="4" name="Description" placeholder="Description"><?php print $row['Description'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                            <div class="col-12 text-left push">
                                            	<input type="file" class="form-control" name="fileToUpload">
                                                <input type="hidden" name="oldfile" value="<?php print $row['Image'] ?>">
                                            </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="Prix" placeholder="Prix" value="<?php print $row['Prix'] ?>">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" class="form-control" name="Nombre_copie" placeholder="Nombre copie" value="<?php print $row['Nombre_copie'] ?>">
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
                        </form>                    
                    </div>
                    <!-- fin form store-->

<?php
                   }
                   Database::disconnect();
                    ?>



					</div>
				</div>
               
			   <div role="tabpanel" class="tab-pane" role="tabpanel" id="Users">
				<?php
				include 'users.php';
				?>
				</div>
              
			  <div role="tabpanel" class="tab-pane" role="tabpanel" id="grades">
			 	
				</div>
			</div>
			</div>
			</div>
		</div>



		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Delet Art</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        Do you want to delet this record !
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" id="savedelet" class="btn btn-danger">Delet</button>
		      </div>
		    </div>
		  </div>
		</div>




	<script type="text/javascript">
		
		$(document).ready(function(){
		    $('.nav-tabs li').click(function() {
		        $(this).siblings('li').removeClass('active');
		        $(this).addClass('active');
		    });
		});

        var test = "<?php echo @$test; ?>" + "T";

        console.log(test);

        if(test == "T"){
            $("#forminsert").hide();
        }else{
            $("#formstandar").hide();
        }

		//$("#forminsert").hide();
			function change(){
				$("#formstandar").hide();
				$("#forminsert").show();
			}


		//edite art	
			$("#btnsuccess").hide();
			$("#formedit").hide();

		function btnedit(){
			$("#btnwarning").hide();
			$("#btnsuccess").show();
			$("#formsave").hide();
			$("#formedit").show();
		}		

		//save art
		function btnsave(){
			$("#btnwarning").show();
			$("#btnsuccess").hide();
			$("#formsave").show();
			$("#formedit").hide();
		}

		//save change

		function savechange(id){
			var ur = 'editestore.php?id='+id;
                $('#showdata').attr('action', ur);
                $('#showdata').submit();
		}

		//delet art 

		function btnremove(id){

			$("#exampleModal").modal();
			
			$('#savedelet').click(function () {

				var ur = 'deletstore.php?id='+id;
                $('#showdata').attr('action', ur);
                $('#showdata').submit();    

			});
		}



	</script>    					
</body>
</html>

<?php 

}else{

header("location: login.php");
 
}
 ?>
