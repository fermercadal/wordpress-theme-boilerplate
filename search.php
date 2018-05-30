<?php get_header(); ?>

<?php
	if(have_posts()):
		while (have_posts()):
			the_post(); ?>
				
			<?php 
				if ( has_post_thumbnail() ) {
					$post_thumbnail_id = get_post_thumbnail_id();
					$large_image = wp_get_attachment_image_src($post_thumbnail_id, 'full');
					$w = 218; $h = 179;
						
					$timthumb_url = getImg($large_image[0], $w, $h);
					echo "<img class='item_foto' src='$timthumb_url' width='$w' height='$h'/>";
					}
				else { ?>
					<img class="item_foto" src="<?php bloginfo('template_url'); ?>/img/foto_novedades.jpg" alt="foto" title="novedad">
				<?php }
			?>
		<?php
		endwhile;

	else: ?> 
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php
	endif;
?>	

<?php get_footer(); ?>