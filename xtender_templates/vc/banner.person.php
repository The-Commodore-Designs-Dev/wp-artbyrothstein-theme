<?php
$img = ! is_null( $image ) && ! empty( $image  ) ? wp_get_attachment_image( $image, 'large' ) : '';
$person_name = esc_attr( $person_name );
$person_title = ! is_null( $person_title ) && ! empty( $person_title  ) ? "<small>" . esc_attr( $person_title ) . "</small>" : '';
$person_position = ! is_null( $person_position ) && ! empty( $person_position  ) ? "<span class='h4 color-primary'>" . esc_attr( $person_position ) . "</span>" : '';


if( isset( $link['url'] ) && ! empty( $link['url'] ) ){
  $img = ! empty( $img ) ? "<a href='{$link['url']}' title='{$link['title']}'>{$img}</a>" : $img;
  $title = "<a href='{$link['url']}' title='{$link['title']}'>{$person_title}{$person_name}{$person_position}</a>";
} else {
  $title = "{$person_title}{$person_name}{$person_position}";
}

if( ! empty( $img ) ){

  $img = "<div class='xtd-person__image color-primary xtd-shadow--normal-light'>{$img}</div>";
}

$html = "<div class='xtd-person {$el_css}'>$img<div class='xtd-person__info'><div class='xtd-person__title h2'>{$title}</div><div class='xtd-person__content'>" . do_shortcode( $content ) . "</div></div></div>";

?>
