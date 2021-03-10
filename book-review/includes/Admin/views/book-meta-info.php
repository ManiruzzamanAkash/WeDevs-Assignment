<?php
    $wedevs_brp_authors = get_post_meta(get_the_ID(), 'wedevs_brp_authors', true);
    $wedevs_brp_price = get_post_meta(get_the_ID(), 'wedevs_brp_price', true);
    $wedevs_brp_rating = get_post_meta(get_the_ID(), 'wedevs_brp_rating', true);
?>
<?php wp_nonce_field( WD_BOOK_REVIEW_FILE, 'wedevs_brp_meta_info' ); ?>
<div>
    <label>Book Authors:</label>
    <br>
    <input name="wedevs_brp_authors" placeholder="ex; Jhon Doe, X. Man" type="text" class="postbox" value="<?php esc_html_e($wedevs_brp_authors, 'wedevs-brp') ?>" />
</div>

<div>
    <label>Book Price:</label>
    <br>
    <input name="wedevs_brp_price" placeholder="ex; 200" type="number" class="postbox" value="<?php esc_html_e($wedevs_brp_price, 'wedevs-brp') ?>" />
</div>
<div>
    <label>Book Rating:</label>
    <br>
    <input name="wedevs_brp_rating" placeholder="ex; 5" type="number" class="postbox" value="<?php esc_html_e($wedevs_brp_rating, 'wedevs-brp') ?>" />
</div>