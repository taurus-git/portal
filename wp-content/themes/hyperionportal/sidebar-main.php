<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar-main' ) ) {
    return;
} else { ?>
    <aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'portal' ); ?>">
        <?php dynamic_sidebar( 'sidebar-main' ); ?>
    </aside><!-- #secondary -->
<?php  } ?>


