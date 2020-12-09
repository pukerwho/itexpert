<div class="post-item bg-white shadow-md rounded-md mb-4">
	<!-- IMG -->
	<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>	" class="post-item__img w-full mb-2">
	
	<div class="p-3">
		<!-- AUTHOR -->
		<div class="post-author flex items-center mb-2">
			<?php 
				$avatar = get_avatar(get_the_author_meta('ID'));
			?>
			<div class="post-author__avatar mr-2">
				<?php if ($avatar): ?>
			    <?php echo $avatar; ?>
			  <?php else: ?>
			    <img src="<?php bloginfo('template_part'); ?>/img/user.svg">
			  <?php endif; ?>
			</div>	
			<div class="post-author__info">
				<div class="post-author__name">
					<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" class="color-link"><?php echo get_the_author(); ?></a>
				</div>
				<div class="post-item__date text-sm">
					<?php echo get_the_modified_time('j/n/Y') ?>
				</div>
			</div>
		</div>
		
	  <!-- TITLE -->
	  <div class="post-item__content">
			<div class="post-item__title text-xl lg:text-2xl mb-5">
				<a href="<?php the_permalink(); ?>" class="hover:text-blue-900"><?php the_title(); ?>	</a>
			</div>

			<!-- Хештеги -->
			<div class="post-categories -mx-1 mb-5">
				<?php 
		    $post_tags = wp_get_post_terms(  get_the_ID() , 'hashtags', array( 'parent' => 0 ) );
		    foreach($post_tags as $post_tag): ?>
		    	<?php if ($post_tag): ?>
						<a href="<?php echo get_term_link( $post_tag->term_id ); ?>" class="post-categories__link mx-1 p-2 rounded-md">
					 		<?php echo $post_tag->name; ?>
					 	</a>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>

			<!-- COMMENTS -->
			<div class="post-item__comments flex items-center text-sm">
				<img src="<?php bloginfo('template_url'); ?>/img/icons/comments.svg" class="mr-2">
				<span class="mr-2"><?php _e('Комментариев','totop'); ?>:</span>
				<span><?php echo get_comments_number(); ?></span>
			</div>
		</div>
	</div>
</div>