<?php get_header(); ?>
<main>
    <section>
        <div class="columns">
        <?php if (have_posts()) : while (have_posts()) : the_post(); $count = 0; ?>

            <div class="column is-half">
                <article>
                    <h1 class="inhale-top inhale-sides-double">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h1>
                    <p class="smallprint inhale-reset inhale-sides-double background-white">
                    <?php printf('<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>'); ?>
                    </p>
                    <div class="content"><?php the_excerpt(); ?></div>
                </article>
            </div>

        <?php endwhile; else : ?>
            <article id="post-not-found" class="hentry cf">
                    <header class="article-header">
                        <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                </header>
                    <section class="entry-content">
                        <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                </section>
                <footer class="article-footer">
                        <p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
                </footer>
            </article>
        <?php endif; ?>
        </div>

    </section>
</main>

<?php get_footer(); ?>
