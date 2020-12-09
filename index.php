<?php get_header(); ?>

<div class="container mx-auto py-4 px-2 lg:px-0">
	<div class="flex py-2">
		<aside class="sidebar sidebar__left hidden lg:block w-2/12">
			<?php get_template_part('blocks/sidebar/sidebar-left', 'timeto'); ?>
		</aside>
		<main class="w-full lg:w-7/12 px-0 lg:px-4">
			<div class="posts-list">
				<?php 
					$posts_query = new WP_Query( array(
						'post_type' => 'post',
						'orderby' => 'date',
						'post_per_page' => 10,
					));
					if ($posts_query->have_posts()) : while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
					<?php get_template_part('blocks/posts/post-item', 'timeto'); ?>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</main>
		<aside class="sidebar sidebar__right hidden lg:block w-3/12">
			<?php get_template_part('blocks/sidebar/sidebar-right', 'timeto'); ?>
		</aside>	
	</div>
</div>


<?php get_footer(); ?>