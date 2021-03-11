<?php

namespace WeDevs\LatestPostWidget;

use WeDevs\LatestPostWidget\Admin\Dashboard_Widget;

/**
 * Admin Class
 */
class Admin {

    public function __construct () {
       new Dashboard_Widget();
    }
}
