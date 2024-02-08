<?php

/** Limit Products Listing */
add_filter('loop_shop_per_page', array($this, 'default_loop_limit'), 20);

add_filter('loop_shop_per_page', function ($nr) {
    if (is_single()) return 4;
    return 100;
}, 20);
