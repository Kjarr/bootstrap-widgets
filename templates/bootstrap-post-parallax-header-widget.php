<div id="bootstrap-post-parallax-header-widget" class="bootstrap-post-parallax-header-widget bootstrap-widget">
	<?php $post_thumbnail_id = get_post_thumbnail_id( $post->ID ); ?>
	<?php $image_info = wp_get_attachment_image_src( $post_thumbnail_id, 'large' ); ?>
	<div class="parallax-bg" style="background-image:url('<?php echo $image_info[0]; ?>');"></div>
	<div class="container header-nav">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-1">
				<h1 class="title"><?php the_title(); ?></h1>
			</div>
			<div class="col-xs-6 col-md-4 col-md-offset-1 col-nav">
				<a href="#" class="toggle-post toggle-post-content">
					<?php echo get_avatar( $post->post_author, 'thumb' ); ?> 
					<span class="hidden-xs">Posted On </span>April 18, 2015
				</a>
			</div>
			<div class="col-xs-6 col-md-4 col-nav">
				<a href="#" onclick="window.location.hash = &quot;&quot;; window.location.hash = &quot;#disqus_thread&quot;; return false;" class="toggle-post toggle-post-comments">
					<img class="comments-icon" src="<?php echo get_stylesheet_directory_uri() . '/images/comments-white.svg'; ?>" width="30" height="30" />
					<?php $comments_count = wp_count_comments( $post->ID ); ?>
					<?php if ( $comments_count->approved > 0 ): ?>
						<?php echo $comments_count->approved; ?>
					<?php endif; ?>
					<span class="hidden-xs">Comments</span></span>
				</a>
			</div>
		</div>
	</div>
</div>