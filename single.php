<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="post py-4">
		<div class="container mx-auto px-2 lg:px-0">
			<div class="flex flex-col lg:flex-row">
				<aside class="w-1/12 hidden lg:flex justify-center mt-6">
					<div>
						<?php do_action('show_social_share_buttons'); ?>	
					</div>
				</aside>
				<main class="w-full lg:w-8/12 mx-0 lg:mx-4">
					<article class="bg-white shadow-md rounded-md mb-6">
						<!-- Заглавное фото -->
						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>" alt="" loading="lazy" itemprop="image" class="w-full post-thumb object-cover">
						<div class="px-6 lg:px-10 py-5">
							<!-- Хлебные крошки -->
							<div class="mb-5">
							<?php 
								$current_term = wp_get_post_terms(  get_the_ID() , 'category', array( 'parent' => 0 ) );
								foreach (array_slice($current_term, 0,1) as $myterm); {
								} ?>
								<?php if ($myterm): ?>
									<div class="breadcrumbs" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
							      <ul class="flex">
											<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs-item">
												<a itemprop="item" href="<?php echo home_url(); ?>" class="breadcrumbs-link text-sm">
													<span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
												</a>                        
												<meta itemprop="position" content="1">
											</li>
											<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs-item">
												<a itemprop="item" href="<?php get_post_type_archive_link('post'); ?>" class="breadcrumbs-link text-sm">
													<span itemprop="name"><?php _e('Публикации', 'totop'); ?></span>
												</a>                        
												<meta itemprop="position" content="2">
											</li>
							        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs-item">
							          <a itemprop="item" href="<?php echo get_term_link($myterm->term_id, 'category') ?>" class="breadcrumbs-link text-sm">
													<span itemprop="name"><?php echo $myterm->name; ?></span>
												</a>                       
												<meta itemprop="position" content="3">
							        </li>
							      </ul>
							    </div>
								<?php endif;?>
							</div>

							<!-- Тайтл -->
							<h1 itemprop="headline" class="text-3xl font-bold mb-5"><?php the_title(); ?></h1>

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

							<!-- Автор -->
							<div class="post-author flex flex-col lg:flex-row justify-start lg:justify-between items-start lg:items-center mb-8">
								<?php 
									$avatar = get_avatar(get_the_author_meta('ID'));
								?>
								<div class="flex items-center mb-2 lg:mb-0">
									<div class="post-author__avatar mr-2">
										<?php if ($avatar): ?>
									    <?php echo $avatar; ?>
									  <?php else: ?>
									    <img src="<?php bloginfo('template_part'); ?>/img/user.svg">
									  <?php endif; ?>
									</div>	
									<div class="post-author__info">
										<div class="post-author__name">
											<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php echo get_the_author(); ?></a>
										</div>
										<div class="flex">
											<?php if(!empty(carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_facebook' ))) { ?>
											<div class="mr-2">
												<a href="<?php echo carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_facebook' ); ?>" class="text-sm text-blue-800 hover:text-gray-900">Facebook</a>
											</div class="mr-2">
											<?php } ?>
											<?php if(!empty(carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_instagram' ))) { ?>
											<div class="mr-2">
												<a href="<?php echo carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_instagram' ); ?>" class="text-sm text-blue-800 hover:text-gray-900">Instagram</a>
											</div>
											<?php } ?>
											<?php if(!empty(carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_twitter' ))) { ?>
											<div class="mr-2">
												<a href="<?php echo carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_twitter' ); ?>" class="text-sm text-blue-800 hover:text-gray-900">Twitter</a>
											</div>
											<?php } ?>
											<?php if(!empty(carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_linkedin' ))) { ?>
											<div class="mr-2">
												<a href="<?php echo carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_linkedin' ); ?>" class="text-sm text-blue-800 hover:text-gray-900">Linkedin</a>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="post-item__date text-sm">
									<?php _e('Добавлено', 'totop'); ?>: <?php echo get_the_modified_time('F j, Y') ?>
								</div>
							</div>

							<!-- Основной контент -->
							<div itemprop="articleBody">
								<?php the_content(); ?>	
							</div>
						</div>
						
					</article>

					<!-- Похожие записи -->
					<div class="post-related shadow-md rounded-md px-6 lg:px-10 py-5 mb-6">
						<div class="text-3xl mb-6"><?php _e('Похожие записи', 'totop'); ?></div>
						<div>
							<?php 
							$current_id = get_the_ID();
							$custom_query = new WP_Query( array( 
							'post_type' => 'post', 
							'posts_per_page' => 3,
							'post__not_in' => array($current_id),
							'tax_query' => array(
						    array(
					        'taxonomy' => 'category',
							    'terms' => $myterm->term_id,
					        'field' => 'term_id',
					        'include_children' => true,
					        'operator' => 'IN'
						    )
							),
						) );
						if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
							<a href="<?php the_permalink(); ?>" class="block mb-8 lg:mb-6">
								<div class="flex items-start lg:items-center">
									<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') ?>" alt="<?php the_title(); ?>	" loading="lazy" class="rounded-full object-cover mr-4" width="80px" height="80px">
									<div>
										<div class="text-xl">
											<?php the_title(); ?>	
										</div>
										<div class="post-author__name text-sm">
											<?php _e('Автор', 'totop'); ?>: <?php echo get_the_author(); ?>
										</div>
									</div>
								</div>
							</a>
						<?php endwhile; endif; wp_reset_postdata(); ?>
						</div>
					</div>

					<!-- Комментарии -->
					<div class="post-comments shadow-md rounded-md px-6 lg:px-10 py-5 mb-6">
						<div class="text-3xl mb-6"><?php _e('Обсуждение', 'totop'); ?></div>
						<?php get_template_part('blocks/posts/post-comments'); ?>
					</div>
				</main>
				
				<aside class="w-full lg:w-3/12 sidebar sidebar-right">
					<?php get_template_part('blocks/sidebar/sidebar-post', 'timeto'); ?>
				</aside>

			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>