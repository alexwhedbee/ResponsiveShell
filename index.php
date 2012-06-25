<?php
/**
 * @package WordPress
 * @subpackage Very_Basic_Theme
 */


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>
<body>
<div id="page">


<div id="header">
    <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
    <div class="description"><?php bloginfo('description'); ?></div>
</div>


	<div id="content">
	
    <!-- The loop starts Here -->
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        <p><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></p>
        
        <div class="entry">
       		<?php the_content('Read the rest of this entry &raquo;'); ?>
        </div>
        
        <p class="postmetadata">
			<?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
        </p>
    </div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?><!-- The loop ends here -->

	</div><!-- end Content -->

<div id="sidebar">

    <ul>
    	<!-- if widgets are being used, display them -->
        <?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
    </ul>
    
    <!-- if widgets are not being used, display this instead -->
	<h2>Here is a subtitle</h2>
    <p>Here is some content for the sidebar</p>
    
    <h2>Archives</h2>
    <ul>
    	<?php wp_get_archives('type=monthly'); ?>
    </ul>
    <?php endif; ?><!-- this ends the if on line 73 -->
</div>

    <div id="footer">
        <p>
            <?php bloginfo('name'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress</a><br />
            <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> and 
            <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
        </p>
    </div><!-- end Footer -->
</div><!-- end Page -->
		<?php wp_footer(); ?>
</body>
</html>

