<?php include ('includes/header.php'); ?>
<?php include_once ('includes/connection.php'); ?>

<script type="text/javascript" src="js/ckeditor.js"></script>
<?php 
	
	$a = new About;
	$about =  $a->getAbout();
	// print_r($about);
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>About Us <small>Edit about us information</small></h1>
		</div>
	</div>
	</br>
	<div class="row">
		<form name="addAbout" class="form-horizontal myform" action="manage_about_us_action.php" method="POST" enctype="multipart/form-data" >
		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Description (EN)</label>
		    <div class="col-sm-10">
		    	<textarea id="editorEN" name="editorEN" rows="10" cols="80">
            <?php 
            	if(isset($about['description_en']))
            		echo $about['description_en']; 
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
		    <label for="" class="col-sm-2 control-label">Description (TH)</label>
		    <div class="col-sm-10">
		    	<textarea id="editorTH" name="editorTH" rows="10" cols="80">
            <?php 
            	if(isset($about['description_th']))
            		echo $about['description_th']; 
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
		    <label for="" class="col-sm-2 control-label">Image</label>
		    <div class="col-sm-10">
		    	<?php 
		    		if(isset($about['user_image_dir']) && $about['user_image_dir'] != null){
		    			echo "<img src=".$about['admin_image_dir']. " />";
		    		} 

		    	?>
		    	<input type="text" class="form-control" id="image-text" disabled>
		      <label class="btn btn-default btn-file">
				  Browser <input type="file" name="imageFile" id="image-file" style="display: none;">
				</label>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		    	<input type='hidden' name='action_type' value='add' />
		    	<input type='hidden' name='id' value=<?php if(isset($about["id"]))echo $about['id']; ?>    />
		      <button type="submit" class="btn btn-default">Update Data</button>
		    </div>
		  </div>
		</form>    
			
	</div>
	
</div>
<script>
	window.onload = function() {
		var index = {
			init: function() {
				var image = document.getElementById("image-file");
				image.addEventListener("change", function(){
					document.getElementById("image-text").value = image.value;
				});

				
				$(".myform").submit(function() {
				   // if(confirm("Are you sure you want to do delete?"){
				   //   return true;
				   // }
				   var self = this;
				   var isError = false;
				   
				   	if($("input[name='editorEN']").val() == "") {
				   		swal("Error!", "จำเป็นต้องมี");
				   		isError = true;
				   		return false;
				   	}


				   	if(!isError) {
				   		self.submit();
				   	}
				   return false;
				});

			}
		}
		index.init();
	}
</script>
<?php include ('includes/footer.php'); ?>