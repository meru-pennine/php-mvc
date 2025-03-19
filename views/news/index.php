
<?php ob_start(); 

?>

<div class="row">

	<?php 

	if( !empty($news) ){ 
		foreach ($news as $key => $value) {
			
			?>
			<div class="col-sm-4 mt-5">
			    <div class="card">
			      <div class="card-body">
			      	<div class="thumb">
			      		<img class="img-thumbnail" src="<?php echo $value->urlToImage ?>">
			        	<h3 class="card-title"><?php echo $value->title ?></h3>
			      	</div>
			        <div class="news-content">
			        	<p class="card-text"><?php echo $value->description ?></p>
			        	<a href="<?php echo $value->url ?>" class="btn btn-primary">Go somewhere</a>
			        </div>
			      </div>
			    </div>
			  </div>
			<?php 
		}
	}
	?>
  
 

</div>

<?php 

$content = ob_get_clean(); ?>
<?php require 'views/layout.php'; ?>

