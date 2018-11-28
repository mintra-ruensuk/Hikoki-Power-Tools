<?php include ('includes/header.php'); ?>
<?php include_once ('includes/connection.php'); ?>

<script type="text/javascript" src="js/ckeditor.js"></script>
<?php 
	
	$a = new ASCDealer;
	if (isset($_GET['id'])) {
		$ascDealer = $a->getASCDealerById($_GET['id']);
	}
	
	$allASCDealer = $a->getASCDealers();
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>Authorized Server Center & Dealer </h1>
		</div>
	</div>
	</br>
	<div class="row">
		<form name="addNew" class="form-horizontal myform" action="manage_asc_dealer_action.php" method="POST" enctype="multipart/form-data" >
		  <div class="form-group">
		  	<label for="" class="col-sm-2 control-label">Type</label>
		  	<div class="col-sm-10">
		  		<div class='radio'>
			  		<label>
			  			<input type='radio' name='serviceID' value='asc'
			  			if($ascDealer["service_type"] == "asc") {
	  						echo " checked ";
	  					}
			  			/>Authorized Server Center: ศูนย์บริการ
			  		</lable>
			  	</div>
			  	<div class='radio'>
			  		<label>
			  			<input type='radio' name='serviceID' value='dealer'
			  			if($ascDealer["service_type"] == "dealer") {
	  						echo " checked ";
	  					}
			  			/>Dealer: ตัวแทนจำหน่าย
			  		</lable>
				</div>		  		
		  	</div>
		  </div>

		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Power Tools Type</label>
		    <div class="col-sm-10">
		    	<?php
		    		$regions = $a->getRegions();
		    		if (is_array($regions) || is_object($regions)){
		    			foreach ($regions as $type) {
			    			echo "<div class='radio'>";
	  						echo "<label><input type='radio' name='regionID' value='".$type['id']."'";
	  						if($type['id'] == $ascDealer["region_id"]) {
	  							echo " checked ";
	  						}
	  						echo ">".$type["region_en"].": ".$type["region_th"]."</label>";
								echo "</div>"	;
							}
						}
		    	?>

				</label>
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Detail (EN)</label>
		    <div class="col-sm-10">
		    	<textarea id="editorEN" name="editorEN" rows="10" cols="80">
            <?php 
            	if(isset($ascDealer['list_en']))
            		echo $ascDealer['list_en']; 
            ?>    
            </textarea> 
            <script>
                // Replace the <textarea id="editorEN"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editorEN' ); 
            </script> 
		    </div>
		  </div>
		   <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Detail (TH)</label>
		    <div class="col-sm-10">
		    	<textarea id="editorTH" name="editorTH" rows="10" cols="80">
            <?php 
            	if(isset($ascDealer['list_th']))
            		echo $ascDealer['list_th']; 
            ?>    
            </textarea> 
            <script>
                // Replace the <textarea id="editorEN"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editorTH' ); 
            </script> 
		    </div>
		  </div>

		 
		  
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		    	<input type='hidden' name='action_type' value='add' />
		    	<input type='hidden' name='id' value=<?php if(isset($ascDealer["id"]))echo $ascDealer['id']; ?>    />
		      <button type="submit" class="btn btn-default">Save Data</button>
		    </div>
		  </div>
		</form>    
		
		<form style="display: none;" class="deleteform" action="manage_asc_dealer_action.php" method="POST"  >
			<input type='hidden' name='action_type' value='' />
			<input type='hidden' name='id' value='' />
		</form> 	
	</div>
	

	<div class="row">
		<?php
			if (is_array($allASCDealer) || is_object($allASCDealer))
			{
				echo "<table class='table table-bordered'>";
				echo "<tr><th>Type</th><th>Detail (TH)</th><th></th></tr>";
				foreach ($allASCDealer as $result) {

					echo "<tr typeid='".$result['id']."'>";
					echo "<td class=''>".$result['service_type']."</td>";
					echo "<td class=''>".$result['list_th']."</td>";

					
					echo "<td><a href='manage_asc_dealer.php?id=".$result["id"]."' class='btn btn-info update-btn' value=''>View & Update</a>&nbsp;&nbsp;&nbsp;";
					echo "<input type='hidden' name='product-id' value='".$result['id']."' />";
					echo "<input type='button' class='btn btn-danger delete-btn' value='Delete'/>";

					echo "</td></tr>";
				}
				echo "</table>";
			}
		?>
		
	</div>
</div>
<script>
	window.onload = function() {
		var index = {
			init: function() {
				
				$(".myform").submit(function() {
				   // if(confirm("Are you sure you want to do delete?"){
				   //   return true;
				   // }
				   var self = this;
				   var isError = false;
				   


				   	if(!isError) {
				   		self.submit();
				   	}
				   return false;
				});

				$(".delete-btn").click(function(item){
					var self = this;
				   swal({   
				   		title: "Are you sure?",   
				   		text: "You will not be able to recover this!",   
				   		type: "warning",   
				   		showCancelButton: true,   
				   		confirmButtonColor: "#DD6B55",   
				   		confirmButtonText: "Yes, delete it!",   
				   		closeOnConfirm: false 
				   	}, function(){   
				   		var typeid=$(item.target).parent().parent().attr("typeid");
							$("input[name='id']").val(typeid);
							$("input[name='action_type").val("delete");
							$(".deleteform").submit();
				   	});
				});

			}
		}
		index.init();
	}
</script>
<?php include ('includes/footer.php'); ?>