
<?php
/**
 
 */

?>

	<footer>

		<div class="div-footer">
		<?php
			if( has_nav_menu( 'nmota-footer' ) ) :

				wp_nav_menu( [
					'menu' => 'nmota-footer'
				] );
				
			endif;
		?>
		</div>

	</footer>

<?php wp_footer(); ?>

</body>
</html>