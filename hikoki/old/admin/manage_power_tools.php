<?php include ('includes/header.php'); ?>
<?php include_once ('includes/connection.php'); ?>
<?php 
	
	$a = new PowerTools;
	$products =  $a->getProducts();
	if (isset($_GET['product_id'])) {
		$product = $a->getProductById($_GET['product_id']);
	}
?>
<script type="text/javascript" src="js/ckeditor.js"></script>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>Power Tools <small>Add / Remove the power tools</small></h1>
		</div>
	</div>
	</br>
	<div class="row">
		<form name="addPowerTools" class="form-horizontal myform" action="manage_power_tools_action.php" method="POST" enctype="multipart/form-data" >
		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Product Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="productName" placeholder="e.g. DB10DL" value=<?php echo $product['product_name']; ?> >
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Short Description (EN)</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="shortEN" placeholder="Short Description in English" value="<?php echo $product['short_description_en']; ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Short Description (TH)</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="shortTH" placeholder="Short Description in Thai" value="<?php echo $product['short_description_th']; ?>" >
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Specification (EN)</label>
		    <div class="col-sm-10">
		    	<textarea id="editorEN" name="editorEN" rows="10" cols="80">
            <?php echo $product['specification_en']; ?>    
            </textarea> 
            <script>
                // Replace the <textarea id="editorEN"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editorEN' ); 
            </script> 
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Specification (TH)</label>
		    <div class="col-sm-10">
		      <textarea id="editorTH" name="editorTH" rows="10" cols="80">
            <?php echo $product['specification_th']; ?>   
            </textarea> 
            <script>
                // Replace the <textarea id="editorTH"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editorTH' ); 
            </script> 
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Image</label>
		    <div class="col-sm-10">
		    	<?php 
		    		if($product['user_image_dir'] != null){
		    			echo "<img src=".$product['admin_image_dir']. " />";
		    		} 

		    	?>
		    	<input type="text" class="form-control" id="image-text" disabled>
		      <label class="btn btn-default btn-file">
				  Browser <input type="file" name="imageFile" id="image-file" style="display: none;">
				</label>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">PDF File</label>
		    <div class="col-sm-10">
		    	<?php 
		    		if($product['admin_file_dir'] != null){
		    			echo "File location is : ".$product['admin_file_dir'];
		    		} 

		    	?>
		    	<input type="text" class="form-control" id="pdf-text" disabled>
		      <label class="btn btn-default btn-file">
				  Browser <input type="file" name="pdfFile" id="pdf-file" style="display: none;">
				</label>
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">New Product?</label>
		    <div class="col-sm-10">
		    	<div class="checkbox">
		        <label>
		        	<?php 
		        		if($product["is_new_product"] != null && $product["is_new_product"] == true) {
		        	?>
		        	<input type="checkbox" name="isNewProduct" checked> check me
		        	<?php
		        		}else{ 
		        	?>
		          	<input type="checkbox" name="isNewProduct"> check me
		          <?php
		        		}
		          ?>
		        </label>
		      </div>
				</label>
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Power Tools Type</label>
		    <div class="col-sm-10">
		    	<?php
		    		$types = $a->getTypes();
		    		if (is_array($types) || is_object($types)){
		    			foreach ($types as $type) {
			    			echo "<div class='radio'>";
	  						echo "<label><input type='radio' name='typeID' value='".$type['id']."'";
	  						if($type['id'] == $product["power_tools_type_id"]) {
	  							echo " checked ";
	  						}
	  						echo ">".$type["type_name_en"].": ".$type["type_name_th"]."</label>";
								echo "</div>"	;
							}
						}
		    	?>

				</label>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		    	<input type='hidden' name='action_type' value='addProduct' />
		    	<input type='hidden' name='id' value=<?php echo $product['id']; ?>    />
		      <button type="submit" class="btn btn-default">Add new product</button>
		    </div>
		  </div>
		</form>
		<form style="display: none;" class="deleteform" action="manage_power_tools_action.php" method="POST"  >
			<input type='hidden' name='action_type' value='addProduct' />
			<input type='hidden' name='id' value=''/>
		</form>      
			
	</div>
	<div class="row">
		<?php
			if (is_array($products) || is_object($products))
			{
				echo "<table class='table table-bordered'>";
				echo "<tr><th>Image</th><th>Product Name</th><th>Short Description (EN)</th><th>New Product?</th><th>Type</th><th></th></tr>";
				foreach ($products as $result) {

					echo "<tr typeid='".$result['id']."'>";
					echo "<td><img src='".$result['admin_image_dir']."'/></td>";
					echo "<td class=''>".$result['product_name']."</td>";
					echo "<td class='nameth'>".$result['short_description_en']."</td>";
					if($result['is_new_product']) {
						echo "<td class=''>Yes</td>";	
					}else {
						echo "<td class=''>No</td>";	
					}
					$typeName = $a->getTypeById($result['power_tools_type_id']);

					echo "<td class=''>".$typeName["type_name_en"].": ".$typeName["type_name_th"]."</td>";
					echo "<td><a href='manage_power_tools.php?product_id=".$result["id"]."' class='btn btn-info update-btn' value=''>View & Update</a>&nbsp;&nbsp;&nbsp;";
					echo "<input type='hidden' name='product-id' value='".$result['id']."' />";
					echo "<input type='hidden' name='imagesrc' value='".$result['admin_image_dir']."' />";
					echo "<input type='button' class='btn btn-danger delete-btn' value='Delete'/>";

					echo "</td></tr>";
				}
				echo "</table>";
			}
		?>
		
	</div>

	</hr>
</div>
<script>
	window.onload = function() {
		var index = {
			init: function() {
				var image = document.getElementById("image-file");
				image.addEventListener("change", function(){
					document.getElementById("image-text").value = image.value;
				});

				var pdf = document.getElementById("pdf-file");
				pdf.addEventListener("change", function(){
					document.getElementById("pdf-text").value = pdf.value;
				});
				$(".myform").submit(function() {
				   // if(confirm("Are you sure you want to do delete?"){
				   //   return true;
				   // }
				   var self = this;
				   var isError = false;
				   
				   	if($("input[name='nameEnglish']").val() == "") {
				   		swal("Error!", "จำเป็นต้องมีชื่อภาษาอังกฤษ");
				   		isError = true;
				   		return false;
				   	}

				   	if($("input[name='nameThai']").val() == "") {
				   		swal("Error!", "จำเป็นต้องมีชื่อภาษาไทย");
				   		isError = true;
				   		return false;
				   	}
				   	if($("input[name='orderNumber']").val() != "" && $("input[name='orderNumber']").val().match(/\d+/) == null) {

					   swal("Error!", "ลำดับการแสดงต้องเป็นตัวเลขเท่านั้น");
					   		
					   isError = true;
					   return false;
				   	}

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
							$("input[name='action_type").val("Delete");
							$(".deleteform").submit();
				   	});
				});
			}
		}
		index.init();
	}
</script>
<?php include ('includes/footer.php'); ?>