<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<?php
// Start the loop.
while (have_posts()) : the_post();
    $image = get_field('image');

    ?>
    <section class="posts-home text-center banner">
        <div class="main-container">
            <section class="blog-posts">
                <section class="blog-post">
                    <div class="cards">
                        <div class="card">
                            <div class="card-header">
                                <h1><?php the_title() ?></h1>
                                <span><?php The_time('F j, Y'); ?> | <?php the_category(','); ?></span>
                            </div>

                            <div class="card-image-full">
                                <img src="<?php echo $image['url']; ?>" alt="">
                            </div>
                            <div class="card-copy">

                                <?php get_template_part('content', get_post_format()); ?>
                                <br>
                                <hr>
                                <?php
                                // Previous/next post navigation.
                                the_post_navigation(array(
                                    'next_text' => '<span class="screen-reader-text">' . 'Siguiente:' . '</span> ' .
                                        '<span class="post-title">%title</span>',
                                    'prev_text' => '<span class="screen-reader-text">' . 'Anterior:' . '</span> ' .
                                        '<span class="post-title">%title</span>',
                                ));

                                ?>


                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </div>
    </section>

    <?php
// If comments are open or we have at least one comment, load up the comment template.
//							if ( comments_open() || get_comments_number() ) :
//								comments_template();
//							endif;
    ?>


<?php endwhile; ?>
<?php get_footer() ?> 