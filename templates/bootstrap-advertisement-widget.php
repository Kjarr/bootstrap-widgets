<div class="bootstrap-advertisement-widget bootstrap-widget">
	<a class="advertisement-link" href="<?php echo esc_attr( $link_url ); ?>">
		<img class="advertisement-image" src="<?php echo esc_attr( $image_url ); ?>" alt="<?php esc_attr( $title ); ?>" />
	</a>
	<?php if ( $title ): ?>
		<div class="title"><a href="<?php echo esc_attr( $link_url ); ?>"><?php echo $title; ?></a></div>
	<?php endif; ?>
</div>