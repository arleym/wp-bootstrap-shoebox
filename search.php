<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Mycool_Theme
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<header class="page-header">
	<?php if ( have_posts() ) : ?>
		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'mycooltheme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	<?php else : ?>
		<h1 class="page-title"><?php _e( 'Nothing Found', 'mycooltheme' ); ?></h1>
	<?php endif; ?>
</header><!-- .page-header -->

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/post/content', 'excerpt' );
		endwhile; // End of the loop.

	else :
	?>

		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mycooltheme' ); ?></p>
		<?php
			get_search_form();

	endif;
	?>

<?php
get_footer();
