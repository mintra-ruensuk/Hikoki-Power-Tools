<?php include ('includes/header.php'); ?>
<?php include_once ('includes/connection.php'); ?>
<?php 
	// Get all banners
	$a = new Catalog;
	$catalogs =  $a->getCatalogs();
	if (isset($_GET['catalog_id'])) {
		$catalog = $a->getCatalogById($_GET['catalog_id']);
	}
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>Catalog <small>Add / Remove catalogs</small></h1>
		</div>
	</div>
	</br>
	<div class="row">
		<form name="addCatalog" class="form-horizontal myform" action="manage_catalog_action.php" method="POST" enctype="multipart/form-data" >
		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">Preview Image</label>
		     <div class="col-sm-10">
		     	<?php 
		    		if($catalog['user_image'] != null){
		    			echo "<img style='max-height: 300px;' src=".$catalog['admin_image']. " />";
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
		    		if($product['admin_file_'] != null){
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
		    <div class="col-sm-offset-2 col-sm-10">
		    	<input type='hidden' name='action_type' value='addCatalog' />
		    	<input type='hidden' name='id' value=<?php echo $catalog['id']; ?>    />
		      <button type="submit" class="btn btn-default">Add new Catalog</button>
		    </div>
		  </div>
		</form>
		<form style="display: none;" class="deleteform" action="manage_catalog_action.php" method="POST"  >
			<input type='hidden' name='action_type' value='addCatalog' />
			<input type='hidden' name='id' value='' />
		</form>      
			
	</div>
	<div class="row">
		<?php
			if (is_array($catalogs) || is_object($catalogs))
			{
				echo "<table class='table table-bordered'>";
				echo "<tr><th>Image</th><th></th></tr>";
				foreach ($catalogs as $result) {

					echo "<tr typeid='".$result['id']."'>";
					echo "<td><img style='max-height: 300px;' src='".$result['admin_image']."'/></td>";
					echo "<td><a href='manage_catalog.php?catalog_id=".$result["id"]."' class='btn btn-info update-btn' value=''>View & Update</a>&nbsp;&nbsp;&nbsp;";
					echo "<input type='hidden' name='typeid' value='".$result['ID']."' />";
					echo "<input type='hidden' name='imagesrc' value='".$result['admin_image']."' />";
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

				$(".update-btn").click(function(item){
					var typeid=$(item.target).parent().parent().attr("typeid");
					var nameth = $(item.target).parent().parent().find(".nameth").text();
					var nameen = $(item.target).parent().parent().find(".nameen").text();
					var ordernum = $(item.target).parent().parent().find(".ordernum").text();

					$("input[name='nameEnglish']").val(nameen);
					$("input[name='nameThai']").val(nameth);
					$("input[name='orderNumber']").val(ordernum);
					$("input[name='id']").val(typeid);

					$('html, body').animate({
			       scrollTop: $('[name="addCatalog"]').offset().top
			    }, 500);

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