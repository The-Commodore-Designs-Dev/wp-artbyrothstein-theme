    <?php
	get_header();
	?>
        <div id="art-header__hero" class="ct-header__hero" data-slider="">
            <div class="art-header__main-heading">
                <div class="container-fluid">
                    <div class="art-header__main-heading-title">
                        <h1><?php the_title(); ?></h1> 
                    </div>
                </div>
            </div>
        </div>
		<article class="content px-3 py-5 p-md-5">
	    
		<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					get_template_part('template-parts/content', 'archive');
				}
			}
		?>

        <?php
        the_posts_pagination();
        ?>
	    </article>
	<?php
	get_footer();
	?>