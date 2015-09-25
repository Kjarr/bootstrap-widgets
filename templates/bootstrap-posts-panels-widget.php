<div id="bootstrap-posts-panels-widget" class="bootstrap-posts-panels-widget bootstrap-widget">
	<div class="row infinite-scroll-container grid">
		<?php foreach ( $posts as $p => $post ): ?>
			<article class="col-xs-12 col-sm-12 col-md-6 grid-item">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="image-link" href="<?php echo get_permalink( $post->ID ); ?>">
							<?php $panel_image_id = get_post_meta( $post->ID, 'panel_image', true ); ?>
							<?php if ( ! empty( $panel_image_id ) ): ?>
								<?php echo wp_get_attachment_image( $panel_image_id, 'large' ); ?>
							<?php else: ?>
								<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
							<?php endif; ?>
						</a>
						<div class="panel-caption">
							<?php $featured_title = get_post_meta( $post->ID, 'Featured Title', true ); ?>
							<?php if ( $featured_title ): ?>
								<h1><a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo $featured_title; ?></a></h1>
							<?php else: ?>
								<h1><a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo get_the_title( $post ); ?></a></h1>
							<?php endif; ?>
						</div>
						<?php $comments_count = wp_count_comments( $post->ID ); ?>
						<?php if ( $comments_count->approved > 0 ): ?>
							<div class="comments-count">
								<a href="<?php echo get_permalink( $post->ID ); ?>" onclick="window.location = &quot;<?php echo get_permalink( $post->ID ); ?>#disqus_thread&quot;; return false;"><?php echo $comments_count->approved; ?></a>
							</div>
						<?php endif; ?>
					</div>
					<div class="panel-body">
						<div class="lead">
							<?php echo bootstrap_widgets_get_post_excerpt( $post->ID, 160 ); ?>
						</div>
					</div>
					<div class="panel-footer">
						<?php $tags = wp_get_post_tags( $post->ID ); ?>
						<ul class="hashtag-list">
							<?php foreach ( $tags as $tag ): ?>
								<li class="tag"><a href="<?php echo get_tag_link( $tag->term_id ); ?>">#<?php echo esc_html( $tag->name ); ?></a></li>  
							<?php endforeach; ?>
						</ul>
					</div>
					<span class="hashtag">#</span>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</div>