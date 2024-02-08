<?php

add_action('wp_enqueue_scripts', 'arte_child_enqueue_front');

function arte_child_enqueue_front()
{
  wp_enqueue_style('arte-style-parent', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('arte-style');
}

add_action('rest_api_init', function () {
  register_rest_field(
    // if you need it to work with other (even custom post) types,
    // then you have to use an array:
    // array( 'page', 'post', 'custom_post_type', 'etc' )
    // this example only does the trick for 'page'
    // look at the link in the first EDIT section of this answer
    array('frontpage', 'page'),
    'content',
    array(
      'get_callback'    => 'artbyrothstein_do_shortcodes',
      'update_callback' => null,
      'schema'          => null,
    )
  );
});

function artbyrothstein_do_shortcodes($object, $field_name, $request)
{
  WPBMap::addAllMappedShortcodes(); // This does all the work

  global $post;
  $post = get_post($object['id']);
  $output['rendered'] = apply_filters('the_content', $post->post_content);

  return $output;
}
