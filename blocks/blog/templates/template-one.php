<a href="<?php the_permalink(); ?>" class="blog_item w-full lg:w-1/3 mb-8 px-2">
	<div class="h-full bg-white overflow-hidden">
		<?php if (get_the_post_thumbnail_url(get_the_ID(), 'large')): ?>
			<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>" alt="<?php the_title(); ?>" class="blog_item_img overflow-hidden w-full mb-6">
		<?php endif; ?>
		<div class="text-sm color-grey-600 px-6 mb-2">
			<?php the_time('j F Y'); ?>
		</div>
		<div class="text-xl font-bold px-6 pb-8">
			<?php the_title(); ?>
		</div>
	</div>
</a>