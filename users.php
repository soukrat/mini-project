

<div class="row">
	<div class="col-4" style="margin-top: 2%">
        <div class="shadow p-3 mb-5 bg-white rounded" style="background-color: #fff;">
                            <form class="" method="POST" action="createuser.php" enctype="multipart/form-data">                              
                                <div class="block block-themed block-rounded block-shadow">
                                    <div class="block-header bg-gd-dusk">
                                        <div class="form-group row mb-3">
                                        
                                            <div class="col-12 text-center push">
                                            	<input type="file" id="inputupl" name="fileToUpload" hidden>
                                                <button type="button" id="btnupl" class="btn btn-success" style="padding-left: 10%;padding-right: 10%;">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                  
                                    </div>
                                
                                    <div class="block-content">
                                    	 <div class="form-group row">
                                            <div class="col-12">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Nom">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-12 text-center push">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="si si-login mr-10"></i> Ajouter
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
		</div>
    </div>



<?php
                   
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM user';
                   $q=$pdo->query($sql);
                   foreach ($q as $row) {
                  ?>


			<!-- form users-->
            <div class="col-4" style="margin-top: 2%">
			         <div class="shadow p-3 mb-5 bg-white rounded" style="background-color: #fff;">
				            <form>                 
                                <div class="block block-themed block-rounded block-shadow">
                                    <div class="block-header bg-gd-dusk">
                                        <div class="row mb-3">
                                            <div class="col-12 text-center push" style="margin-bottom: 10%;margin-top: 2%;">
                                            	<img src="<?php print $row['Image'] ?>" style="width: 50%;height: 120%;border-radius: 50%;margin-bottom: 0%;">
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="block-content">
                                    	 <div class="row">
                                            <div class="col-12 text-center push" style="margin-bottom: 4%;">
                                                <label><?php print $row['Nom'] ?></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-center push">
                                                <label><?php print $row['Email'] ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
			         </div>
			</div>

            <?php
                   }
                   Database::disconnect();
                    ?>

</div>


		<script type="text/javascript">
			document.getElementById('btnupl').addEventListener('click', openDialog);

				function openDialog() {
				  document.getElementById('inputupl').click();
				}
		</script>