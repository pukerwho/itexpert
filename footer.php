    </section>
    <footer id="footer" class="footer text-white">
			<!-- Welcome BG -->
			<?php 
			$cat_src_medium = wp_get_attachment_image_src(get_theme_mod( 'footer_bg' ), 'medium'); 
			$cat_src_large = wp_get_attachment_image_src(get_theme_mod( 'footer_bg' ), 'large'); 
			$cat_src_full = wp_get_attachment_image_src(get_theme_mod( 'footer_bg' ), 'full'); 
			?>
			<img srcset="<?php echo $cat_src_medium[0] ?> 767w, 
			<?php echo $cat_src_large[0] ?> 1280w,
			<?php echo $cat_src_full[0] ?> 1440w"
			sizes="(max-width: 767px) 767px,
			(max-width: 1280px) 1280px,
			1440px"
			src="<?php echo $cat_src_full[0] ?>" alt="Background" loading="lazy" class="footer_bg">
    	<div class="container relative mx-auto">
    		<div class="py-24">
    			<img src="<?php echo get_theme_mod( 'footer_logo' ); ?>" alt="Logo" class="footer_logo mx-auto mb-8">
	    		<div>
	    			<!-- Social Btn -->
	    			<ul class="footer_social flex justify-center -mx-2">

	    				<?php if(get_theme_mod( 'footer_facebook' )): ?>
		    				<li class="px-2"><a href="<?php echo get_theme_mod( 'footer_facebook' ); ?>" target="_blank">
		    					<svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg"><path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"/></svg>
		    				</a></li>
		    			<?php endif; ?>

		    			<?php if(get_theme_mod( 'footer_instagram' )): ?>
		    				<li class="px-2"><a href="<?php echo get_theme_mod( 'footer_instagram' ); ?>" target="_blank">
		    					<svg enable-background="new 0 0 24 24"  viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg"><path d="m12.004 5.838c-3.403 0-6.158 2.758-6.158 6.158 0 3.403 2.758 6.158 6.158 6.158 3.403 0 6.158-2.758 6.158-6.158 0-3.403-2.758-6.158-6.158-6.158zm0 10.155c-2.209 0-3.997-1.789-3.997-3.997s1.789-3.997 3.997-3.997 3.997 1.789 3.997 3.997c.001 2.208-1.788 3.997-3.997 3.997z"/><path d="m16.948.076c-2.208-.103-7.677-.098-9.887 0-1.942.091-3.655.56-5.036 1.941-2.308 2.308-2.013 5.418-2.013 9.979 0 4.668-.26 7.706 2.013 9.979 2.317 2.316 5.472 2.013 9.979 2.013 4.624 0 6.22.003 7.855-.63 2.223-.863 3.901-2.85 4.065-6.419.104-2.209.098-7.677 0-9.887-.198-4.213-2.459-6.768-6.976-6.976zm3.495 20.372c-1.513 1.513-3.612 1.378-8.468 1.378-5 0-7.005.074-8.468-1.393-1.685-1.677-1.38-4.37-1.38-8.453 0-5.525-.567-9.504 4.978-9.788 1.274-.045 1.649-.06 4.856-.06l.045.03c5.329 0 9.51-.558 9.761 4.986.057 1.265.07 1.645.07 4.847-.001 4.942.093 6.959-1.394 8.453z"/><circle cx="18.406" cy="5.595" r="1.439"/></svg>
		    				</a></li>
		    			<?php endif; ?>

		    			<?php if(get_theme_mod( 'footer_telegram' )): ?>
		    				<li class="px-2"><a href="<?php echo get_theme_mod( 'footer_telegram' ); ?>" target="_blank">
		    					<svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="m12 24c6.629 0 12-5.371 12-12s-5.371-12-12-12-12 5.371-12 12 5.371 12 12 12zm-6.509-12.26 11.57-4.461c.537-.194 1.006.131.832.943l.001-.001-1.97 9.281c-.146.658-.537.818-1.084.508l-3-2.211-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.121l-6.871 4.326-2.962-.924c-.643-.204-.657-.643.136-.953z"/></svg>
		    				</a></li>
		    			<?php endif; ?>

		    			<?php if(get_theme_mod( 'footer_linkedin' )): ?>
		    				<li class="px-2"><a href="<?php echo get_theme_mod( 'footer_linkedin' ); ?>" target="_blank">
		    					<svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg"><path d="m23.994 24v-.001h.006v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07v-2.185h-4.773v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243v7.801z"/><path d="m.396 7.977h4.976v16.023h-4.976z"/><path d="m2.882 0c-1.591 0-2.882 1.291-2.882 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909c-.001-1.591-1.292-2.882-2.882-2.882z"/></svg>
		    				</a></li>
		    			<?php endif; ?>

		    			<?php if(get_theme_mod( 'footer_youtube' )): ?>
		    				<li class="px-2"><a href="<?php echo get_theme_mod( 'footer_youtube' ); ?>" target="_blank">
		    					<svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg"><path d="m23.469 5.929.03.196c-.29-1.029-1.073-1.823-2.068-2.112l-.021-.005c-1.871-.508-9.4-.508-9.4-.508s-7.51-.01-9.4.508c-1.014.294-1.798 1.088-2.083 2.096l-.005.021c-.699 3.651-.704 8.038.031 11.947l-.031-.198c.29 1.029 1.073 1.823 2.068 2.112l.021.005c1.869.509 9.4.509 9.4.509s7.509 0 9.4-.509c1.015-.294 1.799-1.088 2.084-2.096l.005-.021c.318-1.698.5-3.652.5-5.648 0-.073 0-.147-.001-.221.001-.068.001-.149.001-.23 0-1.997-.182-3.951-.531-5.846zm-13.861 9.722v-7.293l6.266 3.652z"/></svg>
		    				</a></li>
		    			<?php endif; ?>

		    			<?php if(get_theme_mod( 'footer_pinterest' )): ?>
		    				<li class="px-2"><a href="<?php echo get_theme_mod( 'footer_pinterest' ); ?>" target="_blank">
		    					<svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg"><path d="m12.326 0c-6.579.001-10.076 4.216-10.076 8.812 0 2.131 1.191 4.79 3.098 5.633.544.245.472-.054.94-1.844.037-.149.018-.278-.102-.417-2.726-3.153-.532-9.635 5.751-9.635 9.093 0 7.394 12.582 1.582 12.582-1.498 0-2.614-1.176-2.261-2.631.428-1.733 1.266-3.596 1.266-4.845 0-3.148-4.69-2.681-4.69 1.49 0 1.289.456 2.159.456 2.159s-1.509 6.096-1.789 7.235c-.474 1.928.064 5.049.111 5.318.029.148.195.195.288.073.149-.195 1.973-2.797 2.484-4.678.186-.685.949-3.465.949-3.465.503.908 1.953 1.668 3.498 1.668 4.596 0 7.918-4.04 7.918-9.053-.016-4.806-4.129-8.402-9.423-8.402z"/></svg>
		    				</a></li>
		    			<?php endif; ?>

		    			<?php if(get_theme_mod( 'footer_twitter' )): ?>
		    				<li class="px-2"><a href="<?php echo get_theme_mod( 'footer_twitter' ); ?>" target="_blank">
		    					<svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg"><path d="m21.534 7.113c.976-.693 1.797-1.558 2.466-2.554v-.001c-.893.391-1.843.651-2.835.777 1.02-.609 1.799-1.566 2.165-2.719-.951.567-2.001.967-3.12 1.191-.903-.962-2.19-1.557-3.594-1.557-2.724 0-4.917 2.211-4.917 4.921 0 .39.033.765.114 1.122-4.09-.2-7.71-2.16-10.142-5.147-.424.737-.674 1.58-.674 2.487 0 1.704.877 3.214 2.186 4.089-.791-.015-1.566-.245-2.223-.606v.054c0 2.391 1.705 4.377 3.942 4.835-.401.11-.837.162-1.29.162-.315 0-.633-.018-.931-.084.637 1.948 2.447 3.381 4.597 3.428-1.674 1.309-3.8 2.098-6.101 2.098-.403 0-.79-.018-1.177-.067 2.18 1.405 4.762 2.208 7.548 2.208 8.683 0 14.342-7.244 13.986-14.637z"/></svg>
		    				</a></li>
		    			<?php endif; ?>
	    			</ul>
	    		</div>	
    		</div>
    		<div class="footer_bottom py-6 lg:py-3">
	  			<div class="flex flex-col-reverse lg:flex-row items-center justify-between">
	  				<div>
		  				<?php echo get_theme_mod( 'footer_copyright' ); ?>
		  			</div>
		  			<div class="mb-6 lg:mb-0">
		  				<?php wp_nav_menu([
		            'theme_location' => 'footer_menu',
		            'menu_class' => 'footer_menu flex-col lg:flex-row'
		          ]); ?>
		  			</div>
	  			</div>
	  		</div>
    	</div>
    </footer>

    <div class="scroll-up" style="background-color: <?php echo get_theme_mod( 'scroll_up_bg' ); ?>;">
    	<img src="<?php echo get_theme_mod( 'scroll_up_arrow' ); ?>" alt="Scroll Up" width="25">
    </div>
    <?php wp_footer(); ?>
</body>
</html>