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
						<?php if ($myterm && ($myterm->slug != 'без-категории') && ($myterm->slug != 'без-рубрики') && ($myterm->slug != 'bez-kategorii') ): ?>
		        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="mb-2 lg:mb-0 px-3">
		          <a itemprop="item" href="<?php echo get_term_link($myterm->term_id, 'category') ?>"class="breadcrumbs_link">
								<span itemprop="name"><?php echo $myterm->name; ?> - $myterm->slug</span>
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

	    <?php dynamic_sidebar( 'after_post' ); ?>

			<!-- Categories -->
			<div class="blog_сategories bg-white pt-10 lg:pt-12 pb-10 px-6 lg:px-16 mb-12">
	    	<h2 class="text-3xl font-bold mb-6"><?php _e('Other Links', 'itexpert'); ?></h2>
				<?php wp_nav_menu([
          'theme_location' => 'after_post',
        ]); ?>
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