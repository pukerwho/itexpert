<?php get_header(); ?>

<?php $custom_blog_background = get_theme_mod( 'custom_blog_bg' ); ?>

<div class="blog_wrap" style="background: <?php echo $custom_blog_background; ?>">
	<div class="container px-4 lg:px-0 mx-auto pt-32 pb-20">
			
		<!-- Отображать Тайтл? -->
		<?php $custom_blog_title = get_theme_mod( 'custom_blog_title' );  
		if ($custom_blog_title): ?>
			<h1 class="text-3xl lg:text-5xl text-center font-bold mb-4"><?php single_cat_title(); ?></h1>
		<?php endif; ?>

		<!-- Breadcrumbs -->
		<div class="flex justify-center">
			<div class="breadcrumbs mb-8" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
	      <ul class="flex items-center flex-wrap -mx-3">
					<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="mb-2 lg:mb-0 px-3">
						<a itemprop="item" href="<?php echo home_url(); ?>" class="breadcrumbs_link">
							<span itemprop="name"><?php _e( 'Home', 'restx' ); ?></span>
						</a>                        
						<meta itemprop="position" content="1">
					</li>
	        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="mb-2 lg:mb-0 px-3">
	          <a itemprop="item" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="breadcrumbs_link">
	            <span itemprop="name"><?php _e( 'Blog', 'restx' ); ?></span>
	          </a>                        
	          <meta itemprop="position" content="2">
	        </li>
	        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="mb-2 lg:mb-0 px-3">
	          <a itemprop="item" href="<?php echo get_category_link(get_queried_object_id()); ?>" class="breadcrumbs_link">
	            <span itemprop="name"><?php single_cat_title(); ?></span>
	          </a>
	          <meta itemprop="position" content="3">
	        </li>
	      </ul>
	    </div>
	  </div>

		<!-- Отображать категории, как навигацию? -->
		<?php $custom_blog_cat_navi = get_theme_mod( 'custom_blog_cat_navi' );  
		if ($custom_blog_cat_navi): ?>
			<div class="mb-4">
				<?php get_template_part('blocks/blog/blog-menu', 'itexpert'); ?>	
			</div>
		<?php endif; ?>

		<main class="w-full px-0 lg:px-4 mb-12">
			<?php $custom_blog_template = get_theme_mod( 'custom_blog_template' );  ?>
			<div class="blog_items flex flex-wrap -mx-2 <?php echo $custom_blog_template;  ?>">
				<?php if($custom_blog_template === 'blog_template_masonry'): ?>
				<div class="blog-masonry-size"></div>
				<?php endif; ?>

				<?php while ( have_posts() ) : the_post(); ?>
          <?php
				    switch ($custom_blog_template) {
				      case 'blog_template_one':
				        get_template_part('blocks/blog/templates/template-one', 'itexpert');
				        break;
				      case 'blog_template_two':
				        get_template_part('blocks/blog/templates/template-two', 'itexpert');
				        break;
				      case 'blog_template_masonry':
				        get_template_part('blocks/blog/templates/template-masonry', 'itexpert');
				        break;
				      default: 
				        get_template_part('blocks/blog/templates/template-one', 'itexpert');
				    }
					?>
        <?php endwhile; // end of the loop. ?>
			</div>
			<!-- Pagination -->
			<div class="pagination">
				<?php the_posts_pagination( array(
			    'prev_text' => false,
			    'next_text' => false,
				) ); ?>
			</div>
		</main>
		<div class="w-full px-0 lg:px-4">
			<div class="content">
				<?php echo apply_filters( 'the_content', carbon_get_term_meta(get_queried_object_id(), 'crb_category_text') ); ?>	
			</div>
		</div>
	</div>
</div>



<?php get_footer(); ?>