<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package justsaying
 */

?>

	</div><!-- #content -->
<div class="row">
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
                    <p>I AM A FOOTER</p>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'justsaying' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'justsaying' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'justsaying' ), 'justsaying', '<a href="http://underscores.me/" rel="designer">Justin Jones</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
        </div><!-- row -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
