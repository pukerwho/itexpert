<div class="sidebar sidebar-left">
	<div>
		<div class="flex items-center mb-4">
			<img src="<?php bloginfo('template_url'); ?>/img/icons/categories.svg" width="25px" class="mr-3">
			<div class="text-xl">
				<?php _e('Категории', 'totop'); ?>
			</div>
		</div>
		<ul class="mb-10">
			<?php 
      $categories = get_terms( [
        'taxonomy' => 'category',
        'parent' => 0,
        'hide_empty' => false,
      ] );

      foreach($categories as $cat): ?>
	    	<li class="mb-2">
		    	<a href="<?php echo get_category_link( $cat->term_id); ?>">
		    		<?php echo $cat->name; ?>	
		    	</a>	
	    	</li>
			<?php endforeach; ?>	
		</ul>
		<div>
			<div class="flex items-center mb-4">
				<img src="<?php bloginfo('template_url'); ?>/img/icons/lists.svg" width="25px" class="mr-3">
				<div class="text-xl">
					<?php _e('Хештеги', 'totop'); ?>
				</div>
			</div>
			<ul class="mb-10">
				<?php 
		    $tags = get_terms( [
		      'taxonomy' => 'hashtags',
		      'parent' => 0,
		      'hide_empty' => false,
		    ] );

		    foreach($tags as $tag): ?>
					<li class="mb-2">
			    	<a href="<?php echo get_tag_link( $tag->term_id ); ?>">
			    		# <?php echo $tag->name; ?>
			    	</a>	
		    	</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>