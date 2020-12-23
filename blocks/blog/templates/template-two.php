<a href="<?php the_permalink(); ?>" class="blog_item w-full mb-6 px-2">
	<div class="bg-white overflow-hidden">
		<div class="flex flex-col lg:flex-row lg:items-center">
			<?php if (get_the_post_thumbnail_url(get_the_ID(), 'large')): ?>
				<div class="w-full lg:w-4/12">
					<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>" alt="<?php the_title(); ?>" class="blog_item_img overflow-hidden w-full h-full object-cover">
				</div>
			<?php endif; ?>
			<div class="w-full lg:w-8/12 py-6">
				<div class="text-sm color-grey-600 px-4 lg:px-10 mb-2">
					<?php the_time('j F Y'); ?>
				</div>
				<div class="text-xl font-bold mb-4 px-4 lg:px-10">
					<?php the_title(); ?>
				</div>	
				<div class="px-4 lg:px-10">
					<?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>	
				</div>
			</div>
		</div>
	</div>
</a>