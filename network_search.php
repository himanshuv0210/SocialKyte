<?php 
include_once("header.php"); 
require_once ("connect.php");

$sql_services = mysqli_query($db, "SELECT * FROM user order by id");

//subjects
$subjects_result = mysqli_query($db,'SELECT * FROM category');
$categories = mysqli_fetch_all($subjects_result, MYSQLI_ASSOC);

//locations
$loc_result = mysqli_query($db,'SELECT * FROM location');
$location = mysqli_fetch_all($loc_result, MYSQLI_ASSOC);

//platform
$pf_result = mysqli_query($db,'SELECT * FROM platform');
$platforms = mysqli_fetch_all($pf_result, MYSQLI_ASSOC);

$category_name=((isset($_POST['subject_search']) && $_POST['subject_search']!='')?sanitize($_POST['subject_search']):'');

$loc_name=((isset($_POST['locations']) && $_POST['locations']!='')?sanitize($_POST['locations']):'');

$pf_name=((isset($_POST['platforms']) && $_POST['platforms']!='')?sanitize($_POST['platforms']):'');

?>

<section class="users_list mt-3 ">
	<div class="conatiner">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 mx-5">
				<i class="fas fa-user-circle mb-3 mx-5" style="font-size: 100px;"></i>
				<form class="form-inline">
	      			<input class="form-control mr-sm-2" type="text" placeholder="Search" style="border-radius: 50px;">
	      			<button class="btn btn-secondary my-2 my-sm-0" type="submit"><i class="fas fa-sliders-h"></i></button>
	    		</form>
	    		<h3 class="mt-2">Search by filter</h3>
	    		<div class="row">
	    			<div class="form-group col-lg-12 search-box2">
			        <form class="form-inline" style="padding:0;">
			           <select name="subject_search" id="subject_search" class="form-control mt-2 mx-4">
				     		<option value=""<?=(($category_name=='')?' selected':''); ?>>Categories</option>
				     		<?php foreach($categories as $category) : 
				     			$show_sub=$category['categories'];
				     			?>
				        		<option value="<?=$category['categories']; ?>"<?=(($category_name=='$show_sub')?'':'');?>><?=$show_sub; ?></option>
				        	<?php endforeach; ?>
				      	</select>
			            <br>
			        </form>
			    	</div>

			    	<div class="form-group col-lg-12 search-box2">
			        <form class="form-inline" style="padding:0;">
			           <select name="locations" id="locations" class="form-control mt-2 mx-4">
				     		<option value=""<?=(($loc_name=='')?' selected':''); ?>>Location</option>
				     		<?php foreach($location as $locations) : 
				     			$show_sub=$locations['locations'];
				     			?>
				        		<option value="<?=$locations['locations']; ?>"<?=(($loc_name=='$show_sub')?'':'');?>><?=$show_sub; ?></option>
				        	<?php endforeach; ?>
				      	</select>
			            <br>
			        </form>
			    	</div>

			    	<div class="form-group col-lg-12 search-box2">
			        <form class="form-inline" style="padding:0;">
			           <select name="platforms" id="platforms" class="form-control mt-2 mx-4">
				     		<option value=""<?=(($pf_name=='')?' selected':''); ?>>Platform</option>
				     		<?php foreach($platforms as $pf) : 
				     			$show_sub=$pf['platform'];
				     			echo $show_sub;
				     			?>
				        		<option value="<?=$pf['platform']; ?>"<?=(($pf_name=='$show_sub')?'':'');?>><?=$show_sub; ?></option>
				        	<?php endforeach; ?>
				      	</select>
			            <br>
			        </form>
			    	</div>

			    	<div class="col-lg-3 mt-4" id="results" style="cursor: pointer; "></div>
			    	<div></div>

	    		</div>
			</div>
		<div class="col-lg-2"></div>	
		</div>			
	</div>
</section>
<script>
    jQuery('document').ready(function(){
        get_results('<?=$category_name; ?>','<?=$loc_name; ?>','<?=$pf_name;?>');
    });
</script>

<?php include_once("footer.php"); ?>
