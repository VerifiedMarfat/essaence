<div class="column">
    <article class="columns" role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
        <h1 class="inhale" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
        <small><?php printf('<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>'); ?></small>

        <?php
            the_content();

            /*
            * Link Pages is used in case you have posts that are set to break into
            * multiple pages. You can remove this if you don't plan on doing that.
            *
            * Also, breaking content up into multiple pages is a horrible experience,
            * so don't do it. While there are SOME edge cases where this is useful, it's
            * mostly used for people to get more ad views. It's up to you but if you want
            * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
            *
            * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
            *
            */
            wp_link_pages([
                'before'      => '<div class="exhale-top"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ]);
        ?>
    </article>
</div>