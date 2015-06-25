<div class="container-fluid">

	<?php
	$my_query = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 4, 'paged' => get_query_var('paged') ) );


	if( $my_query->have_posts() ) {

		$i = 0;
		while ($my_query->have_posts()) : $my_query->the_post();
		if($i % 2 == 0) { ?> 

		<div class="row">

			<?php
		}
		?>
		<div class="col-md-6">
			<div class="work_image">
				<?php
				$image=get_field('work_image');
				?>
				<img src="/wp-content/uploads/<?php the_field('_wp_attached_file', $image); ?>">      
			</div>
			<div class="work_title">
				<?php the_field('work_title')?>
			</div>
			<div class="work_description">
				<?php the_field('work_description')?>
			</div>
		</div>  
		<?php $i++; 
		if($i != 0 && $i % 2 == 0) { ?>
	</div>
	<div class="clearfix"></div>
	<?php } ?>
<?php endwhile; } ?>