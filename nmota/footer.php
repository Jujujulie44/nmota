</main>
	<footer>
		<div class="div-footer">
			<?php
				if( has_nav_menu( 'footer-menu' ) ) :
					wp_nav_menu( [
						'theme_location' => 'footer-menu'
					] );
				endif;
			?>
		</div>
	</footer>

<!-- Appeler ici la modale -->
<?php get_template_part('template-parts/modale/contact') ;?>

<?php wp_footer(); ?>

</body>
</html>