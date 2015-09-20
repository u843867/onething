<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package oneThing
 */

// the following checks TRUE for the siderbat-1 not being active, if it is (not active)
// if this is True then return to calling script.
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
