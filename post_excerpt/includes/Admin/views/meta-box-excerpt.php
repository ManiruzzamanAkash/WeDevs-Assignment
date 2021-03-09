<?php
    $wedevs_pemsc_post_excerpt = get_post_meta(get_the_ID(), 'wedevs_pemsc_post_excerpt', true);
?>

<textarea name="wedevs_pemsc_post_excerpt" placeholder="Type Post Excerpt" id="wedevs_pemsc_post_excerpt" class="postbox" rows="5" cols="90">
<?php _e($wedevs_pemsc_post_excerpt, '') ?>
</textarea>