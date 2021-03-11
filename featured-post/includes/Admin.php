<?php

namespace WeDevs\FeaturedPost;

use WeDevs\FeaturedPost\Admin\Featured_Post_Setting;

/**
 * Admin Class
 */
class Admin {

    public function __construct () {
       new Featured_Post_Setting();
    }
}
