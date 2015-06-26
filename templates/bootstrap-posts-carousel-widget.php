<div id="bootstrap-posts-carousel-widget" class="bootstrap-posts-carousel-widget bootstrap-widget">
	<div id="bootstrap-posts-carousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php for ( $p = 0; $p < count( $posts ); $p++ ): ?>
				<li data-target="#bootstrap-posts-carousel" data-slide-to="<?php echo $p; ?>" <?php if ( $p < 1 ) echo 'class="active"'; ?>></li>
			<?php endfor; ?>
		</ol>
	
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<?php foreach ( $posts as $p => $post ): ?>
				<div class="item <?php if ( $p < 1 ) echo 'active'; ?>">
					<a class="image-link" href="<?php echo get_permalink( $post->ID ); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?></a>
					<div class="carousel-caption" onclick="window.location = &quot;<?php echo esc_attr( get_permalink( $post->ID ) );?>&quot;">
						<?php $featured_title = get_post_meta( $post->ID, 'Featured Title', true ); ?>
						<?php if ( $featured_title ): ?>
							<h1><a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo $featured_title; ?></a></h1>
						<?php else: ?>
							<h1><a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo get_the_title( $post ); ?></a></h1>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	
		<!-- Controls -->
		<a class="left carousel-control" href="#bootstrap-posts-carousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> 
			<span class="sr-only">Previous</span>
		</a> 
		<a class="right carousel-control" href="#bootstrap-posts-carousel" role="button" data-slide="next"> 
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> 
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>