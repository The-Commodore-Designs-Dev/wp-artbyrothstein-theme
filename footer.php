</div>    
	<footer class="art-footer">
		<div class="container-fluid">
			<nav id="footer-navigation">
				<?php
					wp_nav_menu(
						array(
							'menu' => 'footer',
							'container' => '',
							'theme_location' => 'footer',
							'items_wrap' => '<ul id="menu-menu-1" class="menu">%3$s</ul>'
						)
					);
				?>
			<a href="#top" class="art-smooth-scroll" id="art-scroll-top"><em class="ti-angle-up"></em> Back to top of the page</a>
			</nav>
			<div id="absolute-footer">
				<div class="row">
					<aside id="text-1" class="col-12 col-md-2  text-center text-md-left  sidebar-widget widget_text"> 
						<?php
							dynamic_sidebar('footer-1');
						?>
					</aside>
					<aside id="text-2" class="col-12 col-md-4  text-center text-md-left  sidebar-widget widget_text"> 
						<?php
							dynamic_sidebar('footer-2');
						?>
					</aside>
					<aside id="text-3" class="col-6 col-md-2  offset-md-2 text-center text-md-left ml-auto sidebar-widget widget_text"> 
						<?php
							dynamic_sidebar('footer-3');
						?>
					</aside>
					<aside id="text-4" class="col-6 col-md-2  offset-md-1 text-center text-md-left  sidebar-widget widget_text"> 
						<?php
							dynamic_sidebar('footer-4');
						?>
					</aside> 
				</div>
			</div>
		</div>
	</footer>
   
   
    <!-- Javascript Injection -->          
	<?php
	wp_footer();
	?>
</body>
</html> 