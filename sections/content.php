<?php   
/**
 * Content Section
 * 
 * @package CentralRussianSchool
*/ 
    $content_page = get_theme_mod('preschool_and_kindergarten_content_page');
        
	if($content_page)
	{
		$content_query = new WP_Query( array( 
			
			'p' => $content_page,
			'post_type' => 'page'

			));
	
			if($content_query->have_posts())
			{ 
				$content_query->the_post();
				?>
					<section class="home-content">
						<div class="container">
							<?php the_content(); ?>
						</div>
					</section>	
				<?php 
			}
			wp_reset_postdata(); 
	} 
?>