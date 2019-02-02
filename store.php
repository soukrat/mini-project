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
    box-sizing:border-box;
    background:#354545;
}
.nav-tabs {
    min-height:100vh;
    left:0;
    width:90px;
    transition: all 300ms cubic-bezier(0.65, 0.05, 0.36, 1);
    will-change: left, width;
    box-shadow: inset -1px 0 10px rgba(0, 0, 0, 0.4);
    background: #293749;
    display: block;
}
.nav-tabs li {
    padding:10px;
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
 
<body style="background-image: url('img/back.png');">

	<nav class="navbar navbar-inverse navbar-light bg-light">
		<div class="container-fluid">
	  <a class="navbar-brand" href="#">Mini prject</a>

	  <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    	</ul>
    </div>
	</nav>

		<div class="row">
    	<div class="col-md-1">
		        <ul class="nav nav-tabs">
		            <li class="active"><i class="fa fa-arrows"></i><a data-toggle="tab" href="#Store" role="tab">Store</a></li>
		            <li><i class="fa fa-battery-2"></i><a data-toggle="tab" href="#Users" role="tab">Users</a></li>
		            <li><i class="fa fa-bell"></i><a data-toggle="tab" href="#" role="tab">bell</a></li>
		            <li><i class="fa fa-bicycle"></i><a data-toggle="tab" href="#" role="tab">Disconnect</a></li>
		        </ul>
		</div>
		

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
						<form class="" method="POST" action="connect.php" enctype="multipart/form-data">
                        <div class="block block-themed block-rounded block-shadow">
          
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success" style="border-radius: 100%;margin-top: -18%; margin-right: -10%;">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    
                            </div>
                            <div class="block-content" style="margin-top: -5%;margin-bottom: -5%;">
                            	 <div class="form-group row">
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="location" name="location" placeholder="Location">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                    	<textarea class="form-control" rows="4" id="desc" name="desc" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                            <div class="col-12 text-left push">
                                            	<input type="file" class="form-control">
                                            </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="nmbcomp" name="nmbcomp" placeholder="Nombre copie">
                                    </div>
                                </div>
                            </div>
                        </div>
                    	</form>
					</div>
					</div>

					<!-- form store -->
					<div class="col-4" style="margin-top: 2%;">
					<div class="shadow p-3 rounded" style="background-image: url('img/img1.jpg');height: 88%;">
						<form id="showdata" method="POST" action="connect.php" enctype="multipart/form-data">
                        <div class="block block-themed block-rounded block-shadow">
          
                                    <div class="text-right">
                                        <button type="button" id="btnwarning" onclick="btnedit()" class="btn btn-warning" style="border-radius: 100%;margin-top: -18%;">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                     
                                        <button type="button" id="btnsuccess" onclick="btnsave()" class="btn btn-success" style="border-radius: 100%;margin-top: -18%; ">
                                            <i class="fa fa-check"></i>
                                        </button>

                                        <button type="button" onclick="btnremove()" class="btn btn-danger" style="border-radius: 100%;margin-top: -18%;margin-right: -10%;">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                            		</div>

                             <div id="formsave" class="block-content" style="margin-top: -5%;margin-bottom: -5%;color: #fff">
                            	 <div class="form-group row">
                                    <div class="col-12">
                                    	<label>test</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                    	<label>location</label>
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom: 46%">
                                    <div class="col-12">
                                    	<label>description</label>
                                    </div>
                                </div>
                                <div class="form-group row text-center">
                                    <div class="col-6">
                                    	<label>20$</label>
                                    </div>
                                    <div class="col-6">
                                    	<label>4</label>
                                    </div>
                                </div>
                            </div>

                            <div id="formedit" class="block-content" style="margin-top: -5%;margin-bottom: -5%;">
                            	 <div class="form-group row">
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="location" name="location" placeholder="Location">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                    	<textarea class="form-control" rows="4" id="desc" name="desc" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                            <div class="col-12 text-left push">
                                            	<input type="file" id="file" class="form-control">
                                            </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" class="form-control" id="nmbcomp" name="nmbcomp" placeholder="Nombre copie">
                                    </div>
                                </div>
                            </div>
                        </div>
                    	</form>
					</div>
					</div>
					<!-- fin form store-->

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

	<script type="text/javascript">
		
		$(document).ready(function(){
		    $('.nav-tabs li').click(function() {
		        $(this).siblings('li').removeClass('active');
		        $(this).addClass('active');
		    });
		});

		$("#forminsert").hide();
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

		//delet art 
		function btnremove(){

		}

	</script>    					
</body>
</html>