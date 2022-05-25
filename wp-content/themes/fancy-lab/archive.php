<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fancy Lab
 */

get_header(); ?>
    <div class="content-area">
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-12">
                        <?php

                        the_archive_title( '<h1 class="archive-title">', '</h1>' );

                        if( have_posts() ):
                            while( have_posts() ): the_post();

                                get_template_part( 'template-parts/content', 'archive' );

                            endwhile;
                            the_posts_pagination( array(
                                'prev_text'		=> esc_html__( 'Previous', 'fancy-lab' ),
                                'next_text'		=> esc_html__( 'Next', 'fancy-lab' ),
                            ));
                        else:
                            ?>
                            <p><?php esc_html_e( 'Nothing to display.', 'fancy-lab' ); ?></p>
                        <?php
                        endif;
                        ?>
                    </div>
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </main>
    </div>
<?php get_footer(); ?>