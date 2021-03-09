<?php

namespace WeDevs\PostExcerpt;

/**
 * Admin Class
 */
class Admin {

    public function __construct () {
        new Admin\Meta_Box_Handler();
    }

}
