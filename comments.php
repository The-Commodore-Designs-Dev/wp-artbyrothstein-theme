<?php if (post_password_required()) return; ?>
<div id="comments" class="comments">
    <h3 class="comments-title h4">
        <?php
        printf(
            _n('One comment for &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'arte'),
            number_format_i18n(get_comments_number()),
            '<strong>' . get_the_title() . '</strong>'
        );
        ?>
    </h3>

    <?php wp_list_comments(array('walker' => new ArteComments())); ?>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
        <nav id="comment-nav-below" class="navigation">
            <h5 class="assistive-text section-heading color-primary"><?php esc_html_e('Comment navigation', 'arte'); ?></h5>
            <div class="nav-previous"><?php previous_comments_link(esc_html__('&larr; Older Comments', 'arte')); ?></div>
            <div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments &rarr;', 'arte')); ?></div>
        </nav>
    <?php endif;

    if (!comments_open()) : ?>
        <p class="nocomments lead xtd-responsive-margin--top-5"><?php esc_html_e('Comments are closed.', 'arte'); ?></p>

    <?php endif;

    $arte_req = get_option('require_name_email');

    $arte_comments_args = array(
        /*:: Title*/
        'title_reply' => esc_html__('Leave Comment', 'arte'),
        /*:: After Notes*/
        'comment_notes_after'  => '',
        /*:: Before Notes*/
        'comment_notes_before' => '',
        /*:: Submit*/
        'label_submit' => esc_html__('Submit Comment', 'arte'),
        /*:: Logged In*/
        'logged_in_as' => '<p>' . sprintf(esc_html__('You are logged in as %1$s. %2$sLog out &raquo;%3$s', 'arte'), '<a href="' . get_option('siteurl') . '/wp-admin/profile.php">' . $user_identity . '</a>', '<a href="' . (function_exists('wp_logout_url') ? wp_logout_url(get_permalink()) : get_option('siteurl') . '/wp-login.php?action=logout" title="') . '" title="' . esc_html__('Log Out', 'arte') . '">', '</a>') . '</p>',
        /*:: Comment Field*/
        'comment_field' => '<div class="comment-form-content form-group"><label for="comment" class="input-textarea sr-only">' . esc_html__('<b>Comment</b> ( * )', 'arte') . '</label>
		<textarea class="required form-control" name="comment" id="comment" rows="4" placeholder="' . esc_html__('Comment', 'arte') . '"></textarea></div>',

        'fields' => apply_filters(
            'comment_form_default_fields',
            array(

                'author' =>
                '<div class="form-group row">' .
                    '<div class="comment-form-author col-lg-6" ' . ($arte_req ? "data-required" : null) . '>' .
                    '<label for="author" class="sr-only">' . esc_html__('Name', 'arte') . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" placeholder="' . esc_html__('Name', 'arte') . '" value="' . esc_attr($commenter['comment_author']) . '" size="30" /></div>',

                'email' =>
                '<div class="comment-form-email col-lg-6" ' . ($arte_req ? "data-required" : null) . '><label for="email" class="sr-only">' . esc_html__('Email', 'arte') . '</label> ' .
                    '<input class="form-control" id="email" name="email" type="text" placeholder="' . esc_html__('Email', 'arte') . '" value="' . esc_attr($commenter['comment_author_email']) .
                    '" size="30" /></div></div>',

                'url' =>
                '<div class="form-group"><div class="comment-form-url"><label for="url" class="sr-only"><strong>' .
                    esc_html__('Website', 'arte') . '</strong></label>' .
                    '<input class="form-control" id="url" name="url" type="text" placeholder="' . esc_html__('Website', 'arte') . '"  value="' . esc_attr($commenter['comment_author_url']) .
                    '" size="30" /></div></div>'
            )
        ),
    );

    comment_form($arte_comments_args);

    ?>
</div>