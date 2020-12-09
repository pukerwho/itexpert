<?php 
	$current_term = wp_get_post_terms(  get_the_ID() , 'category', array( 'parent' => 0 ) );
	foreach (array_slice($current_term, 0,1) as $myterm); {
		$current_term_slug = $myterm->slug;
		$current_term_name = $myterm->name;
		$current_term_id = $myterm->term_id;
	} 
?>

<div class="post-category__block rounded-md shadow-sm mb-6">
	<div class="post-category__color" style="background: <?php echo carbon_get_term_meta($current_term_id, 'crb_category_color'); ?>"></div>
	<div class="flex items-end mb-2 px-4 py-2 -mt-6">
		<div class="post-category__icon mr-4">
			<?php if (carbon_get_term_meta($current_term_id, 'crb_category_icon')): ?>
				<img src="<?php echo carbon_get_term_meta($current_term_id, 'crb_category_icon'); ?>" width="50px">
			<?php else: ?>
				<img src="<?php bloginfo('template_url'); ?>/img/icons/file.svg" width="50px">
			<?php endif; ?>
		</div>
		<div class="text-2xl font-bold"><?php echo $current_term_name; ?></div>	
	</div>
	
	<div class="text-sm px-4 py-2 mb-4"><?php echo carbon_get_term_meta($current_term_id, 'crb_category_description'); ?></div>
	<div class="px-4 mb-4">
		<a href="<?php echo get_term_link($current_term_id, 'category'); ?>" class="block w-full text-white text-center text-md bg-custom-blue rounded-md py-2"><?php _e('Подробнее', 'totop'); ?></a>	
	</div>
</div>

<?php get_template_part('blocks/posts/posts-popular'); ?>
<?php get_template_part('blocks/sidebar/sidebar-telegram'); ?>