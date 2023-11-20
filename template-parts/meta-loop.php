<div class="ct-post__entry-meta h4">
	<?php

	ob_start();
	comments_number(  esc_html__( 'No Comments', 'arte' ), esc_html__( '1 Comment', 'arte' ), esc_html__( '% Comments', 'arte' ) );
	$arte_comments = ob_get_clean();

	if( comments_open() ){

		echo sprintf( '<span><i class="ti-calendar color-primary"></i> <em>%1$s</em></span><span><i class="ti-comments color-primary"></i> <em>%2$s</em></span>', '<a href="'.get_the_permalink().'">'.get_the_date().'</a>', $arte_comments );
	}

	else {

		echo sprintf( '<span><i class="ti-calendar color-primary"></i> <em>%1$s</em></span>', '<a href="'.get_the_permalink().'">'.get_the_date().'</a>' );

	}


	 ?>
</div>
