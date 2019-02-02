

<div class="row">
	<div class="col-4" style="margin-top: 2%">
<div class="shadow p-3 mb-5 bg-white rounded" style="background-color: #fff;">
<form class="" method="POST" action="connect.php" enctype="multipart/form-data">                              
                                <div class="block block-themed block-rounded block-shadow">
                                    <div class="block-header bg-gd-dusk">
                                        <div class="form-group row mb-3">
                                        
                                            <div class="col-12 text-center push">
                                            	<input type="file" id="inputupl" hidden>
                                                <button type="button" id="btnupl" class="btn btn-success" style="padding-left: 10%;padding-right: 10%;">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                  
                                    </div>
                                
                                    <div class="block-content">
                                    	 <div class="form-group row">
                                            <div class="col-12">
                                                <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom">
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

			<!-- form users-->
<div class="col-4" style="margin-top: 2%">
			<div class="shadow p-3 mb-5 bg-white rounded" style="background-color: #fff;">
				                             
                                <div class="block block-themed block-rounded block-shadow">
                                    <div class="block-header bg-gd-dusk">
                                        <div class="row mb-3">
                                            <div class="col-12 text-center push" style="margin-bottom: 10%;margin-top: 2%;">
                                            	<img src="img/img1.jpg" style="width: 50%;height: 120%;border-radius: 50%;margin-bottom: 0%;">
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="block-content">
                                    	 <div class="row">
                                            <div class="col-12 text-center push" style="margin-bottom: 4%;">
                                                <label>test</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-center push">
                                                <label>test2</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
			</div>
			</div>

		</div>


		<script type="text/javascript">
			document.getElementById('btnupl').addEventListener('click', openDialog);

				function openDialog() {
				  document.getElementById('inputupl').click();
				}
		</script>