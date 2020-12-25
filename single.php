<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="blog_wrap relative bg-white">
		<div class="container w-full lg:w-9/12 mx-auto pt-32 pb-20 px-4 lg:px-0">
			<!-- Title -->
			<h1 class="text-2xl lg:text-4xl font-bold"><?php the_title(); ?></h1>

			<!-- Breadcrumbs -->
			<div class="breadcrumbs mb-12" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
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
	        <?php 
						$current_term = wp_get_post_terms(  get_the_ID() , 'category', array( 'parent' => 0 ) );
						foreach (array_slice($current_term, 0,1) as $myterm); {
						} ?>
						<?php if ($myterm): ?>
		        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="mb-2 lg:mb-0 px-3">
		          <a itemprop="item" href="<?php echo get_term_link($myterm->term_id, 'category') ?>"class="breadcrumbs_link">
								<span itemprop="name"><?php echo $myterm->name; ?></span>
							</a>                       
		          <meta itemprop="position" content="3">
		        </li>
		      <?php endif; ?>
	        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="mb-2 lg:mb-0 px-3">
	          <a itemprop="item" href="<?php the_permalink(); ?>" class="breadcrumbs_link">
	            <span itemprop="name"><?php the_title(); ?></span>
	          </a>
	          <meta itemprop="position" content="4">
	        </li>
	      </ul>
	    </div>
	    <!-- Content -->
	    <div class="blog_content bg-white pt-10 lg:pt-12 pb-10 px-6 lg:px-16 mb-12">
	    	<div class="blog_meta flex items-center mb-8">
		    	<!-- Author --> 
		    	<?php $show_blog_meta = get_theme_mod( 'show_blog_meta' );  
		    	if ($show_blog_meta): ?>
			    	<div class="blog_author">
			    		<?php _e('Author', 'itexpert') ?>: <?php echo get_the_author(); ?>	
			    	</div>
			    	<div class="blog_meta_dot mx-4"></div>
			    <?php endif; ?>
		    	<!-- Date -->
			    <div class="blog_date">
			    	<?php echo get_post_time('Y/n/j'); ?>
			    </div>	
	    	</div>
		    <article>
		    	<?php the_content(); ?>		
		    </article>
		    <!-- Social Share Btn -->
		    <div class="social-share pt-10 mt-12">
		    	<?php do_action('show_social_share_buttons'); ?>	
		    </div>
	    </div>

	    <!-- Popular Post -->
	    <div class="blog_popular bg-white pt-10 lg:pt-12 pb-10 px-6 lg:px-16 mb-12">
	    	<h2 class="text-3xl font-bold mb-6"><?php _e('Popular Post', 'itexpert'); ?></h2>
	    	<div class="flex flex-col lg:flex-row -mx-2">
			    <?php 
					$posts_popular_query = new WP_Query( array(
						'post_type' => 'post',
						'orderby' => 'comment_count',
						'posts_per_page' => 3,
					));
					if ($posts_popular_query->have_posts()) : while ($posts_popular_query->have_posts()) : $posts_popular_query->the_post(); ?>
						<a href="<?php the_permalink(); ?>" class="blog_item w-full lg:w-1/3 mb-8 px-2">
							<div class="h-full bg-white overflow-hidden">
								<?php if (get_the_post_thumbnail_url(get_the_ID(), 'large')): ?>
									<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>" alt="<?php the_title(); ?>" class="blog_item_img blog_item_img_popular overflow-hidden w-full mb-6">
								<?php endif; ?>
								<div class="text-sm color-grey-600 px-6 mb-2">
									<?php the_time('j F Y'); ?>
								</div>
								<div class="text-xl font-bold px-6 pb-8">
									<?php the_title(); ?>
								</div>
							</div>
						</a>
					<?php endwhile; endif; wp_reset_postdata(); ?>		
				</div>
			</div>

			<!-- Categories -->
			<div class="blog_сategories bg-white pt-10 lg:pt-12 pb-10 px-6 lg:px-16 mb-12">
	    	<h2 class="text-3xl font-bold mb-6"><?php _e('Popular Post', 'itexpert'); ?></h2>
				<?php 
	      $categories = get_terms( [
	        'taxonomy' => 'category',
	        'parent' => 0,
	        'hide_empty' => false,
	      ] );

	      foreach($categories as $cat): ?>
		    	<li>
			    	<a href="<?php echo get_category_link( $cat->term_id); ?>">
			    		<?php echo $cat->name; ?>	
			    	</a>	
		    	</li>
				<?php endforeach; ?>
			</div>

			<!-- Comments -->
			<div class="blog_comments">
				<?php comments_template(); ?>
			</div>
		</div>
	</div>
	
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>