<?php
require($_SERVER['DOCUMENT_ROOT'] . '/wordpress/wp-load.php'); //replace 'wordpress' with your wp installed directory
$args = array(
'cat' => 4, // source posts from a specific category
'posts_per_page' => 2 // Specify how many posts you'd like to display
);
$latest_posts = new WP_Query( $args );
if ( $latest_posts->have_posts() ) {
while ( $latest_posts->have_posts() ) {
$latest_posts->the_post(); ?>
<li>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
<?php if ( has_post_thumbnail() ) { ?>
<span class="post_thumbnail"><?php the_post_thumbnail(); ?></span>
<?php } ?>
<span class="post_title"><?php the_title(); ?></span>
</a>
<span class="post_time">Posted on <?php the_time('l jS F, Y') ?></span>
<?php the_excerpt(); ?>
</li>
<? }
} else {
echo '<p>There are no posts available</p>';
}
wp_reset_postdata();
?>
