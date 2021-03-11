<?php

namespace WeDevs\FeaturedPost\Admin;


class Featured_Post_Setting {

    public function __construct () {
        add_action( 'admin_menu', [ $this, 'initialization_settings' ] );
    }

    public function initialization_settings () {
        $featured_post      = __( 'Featured Post', 'wedevs-fp' );
        $featured_post_slug = 'featured-post';
        $capability         = 'manage_options';
        
        add_submenu_page('general', $featured_post, $featured_post, $capability, $featured_post_slug, [$this, 'featured_post_page'], 'dashicons-admin-home');

        // add_options_page( $featured_post, $featured_post, $capability, $featured_post_slug, [ $this, 'featured_post_page' ] );
        register_setting( 'settings_featured', 'wedevs_fp_setting_name' );
        
        // register_setting( 'dbi_example_plugin_options', 'dbi_example_plugin_options', 'dbi_example_plugin_options_validate' );
        
 
        // register a new section in the "general" page
        add_settings_section(
            'wedevs_fp_settings_section',
            $featured_post, [ $this, 'get_settings_section' ],
            $featured_post_slug
        );
    
        add_settings_field(
            'wedevs_fp_settings_field_no_post',
            'No. of Posts', 
            [ $this, 'get_field_no_of_posts' ],
            $featured_post_slug,
            'wedevs_fp_settings_section'
        );
    
        // add_settings_field(
        //     'wedevs_fp_settings_field_post_order',
        //     'Post Order',  [ $this, 'get_field_post_order' ],
        //     $featured_post_slug,
        //     'wedevs_fp_settings_section'
        // );
        // add_settings_field(
        //     'wedevs_fp_settings_field_post_categories',
        //     'Categories',  [ $this, 'get_field_post_categories' ],
        //     $featured_post_slug,
        //     'wedevs_fp_settings_section'
        // );
    }

    public function featured_post_page () {
        ?>
        <h2><?php _e( 'Featured Post', 'wedevs-fp' ); ?></h2>

        <form method="post">
            <?php 
            settings_fields( 'settings_featured' );
            // do_settings_sections( 'dbi_example_plugin' ); 
            ?>
            <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e( 'Save' ); ?>" />
        </form>
        <?php
    }

    /**
     * Get Filed - No of Posts
     *
     * @return void
     */
    public function get_field_no_of_posts () {
        $limit = get_option('wedevs_fp_settings_field_no_post');
        ?>
        <input type='number' name='limit' value="<?php _e( $limit, 'wedevs-fp' ) ?> "/>
    <?php }

    /**
     * Get Post Order Field
     *
     * @return void
     */
    public function get_field_post_order () { ?>
        <select name="orderby" >
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
            <option value="rand">Random</option>
        </select>
    <?php }

    /**
     * Get Post Categories 
     *
     * @return void
     */
    public function get_field_post_categories () { ?>
        <select name="categories[]" multiple={true} class="select2">
            <option value="asc">Category 1</option>
            <option value="desc">Category 2</option>
        </select>
    <?php }

}
