<?php include ('includes/header.php'); ?>
<?php include_once ('includes/connection.php'); ?>

<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css">
<script type="text/javascript" src="js/ckeditor.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
<?php 
	
	$a = new News;
	if(isset($_GET["news_id"])){
		$news =  $a->getNewsById($_GET["news_id"]);
		// print_r($news);
	}
	$allNews = $a->getNews();
	// print_r($news);
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>News <small>Add/Edit news</small></h1>
		</div>
	</div>
	</br>
	<div class="row">
		<form name="addNew" class="form-horizontal myform" action="manage_news_action.php" method="POST" enctype="multipart/form-data" >
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Date</label>

		    <div class="col-sm-10 input-group date datepicker" data-provide="datepicker">
				    <input type="text" class="form-control" name="newsDate" value="<?php if(isset($news['news_date']))echo $news['news_date']; ?>" />
				    <div class="input-group-addon">
				        <span class="glyphicon glyphicon-th"></span>
				    </div>
				</div>
			</div>
		  <div class="form-group">
		    <label for="" class="col-sm-2 control-label">News (EN)</label>
		    <div class="col-sm-10">
		    	<textarea id="editorEN" name="editorEN" rows="10" cols="80">
            <?php 
            	if(isset($news['news_en']))
            		echo $news['news_en']; 
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
		    <label for="" class="col-sm-2 control-label">News (TH)</label>
		    <div class="col-sm-10">
		    	<textarea id="editorTH" name="editorTH" rows="10" cols="80">
            <?php 
            	if(isset($news['news_th']))
            		echo $news['news_th']; 
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
		    		if(isset($news['user_image_dir']) && $news['user_image_dir'] != null){
		    			echo "<img src=".$news['admin_image_dir']. " />";
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
		    	<input type='hidden' name='id' value=<?php if(isset($news["id"]))echo $news['id']; ?>    />
		      <button type="submit" class="btn btn-default">Save Data</button>
		    </div>
		  </div>
		</form>    
		
		<form style="display: none;" class="deleteform" action="manage_news_action.php" method="POST"  >
			<input type='hidden' name='action_type' value='' />
			<input type='hidden' name='id' value='' />
		</form> 	
	</div>
	

	<div class="row">
		<?php
			if (is_array($allNews) || is_object($allNews))
			{
				echo "<table class='table table-bordered'>";
				echo "<tr><th>Image</th><th>Date</th><th>News(TH)</th><th></th></tr>";
				foreach ($allNews as $result) {

					echo "<tr typeid='".$result['id']."'>";
					echo "<td><img src='".$result['admin_image_dir']."'/></td>";
					echo "<td class=''>".$result['news_date']."</td>";
					echo "<td class=''>".$result['news_th']."</td>";

					
					echo "<td><a href='manage_news.php?news_id=".$result["id"]."' class='btn btn-info update-btn' value=''>View & Update</a>&nbsp;&nbsp;&nbsp;";
					echo "<input type='hidden' name='product-id' value='".$result['id']."' />";
					echo "<input type='hidden' name='imagesrc' value='".$result['admin_image_dir']."' />";
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

				$('.datepicker').datepicker({
				    format: 'yyyy-mm-dd',
				    startDate: '-3d'
				});


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