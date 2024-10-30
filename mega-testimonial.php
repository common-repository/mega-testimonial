<?php
/**
 *
 * Plugin Name: Mega Testimonial
 * Description: Mega Testimonials is the perfect tool for arranging and expressing the testimonials/reviews from your people you want to show off.
 * Version:     1.0.0
 * Author:      tosagor, aihimel
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version: 1.0.0
 *
 **/
// Security Check
if (!defined('ABSPATH'))
    die();

// OS independent directory seperator shortning
if (!defined('DS'))
    define('DS', DIRECTORY_SEPARATOR);

// Signature Macro for the plugin
define('MEGA_TESTIMONIALS', true);

/**
 *
 * @class WordPressPluginBoilerplage
 * @description Main class of the plugin
 *
 * */
class GBMegaTestimonial{

    /**
     *
     * @var string $name
     * @description Name of the plugin
     *
     * */

    public $name;

    /**
     *
     * @var string $prefix
     * @description Unique Identifier of the plugin
     *
     * */
    public $prefix;

    /**
     *
     * @var string $version
     * @description Version number of the plugin
     *
     * */
    public $version;

    /**
     *
     * @var string $path
     * @description Root path of this plugin
     *
     * */
    public $path;

    /**
     *
     * @var string $url
     * @description Root URL of the plugin
     *
     * */
    public $url;

    /**
     *
     * @var string $upload_path
     * @description Upload directory path of the plugin
     *
     * */
    public $upload_path; // Use this if you need upload directory

    /**
     *
     * @var string $upload_url
     * @description Upload directory URL of the plugin
     *
     * */
    public $upload_url; // Use this if you need upload directory

    /**
     *
     * @var mixed $options
     * @description Options store for the plugin
     *
     * */
    public $options;

    /**
     *
     * @var array $shortcode_data
     * @description Shortcode Data to be stored.
     *
     * */
    public $shortcode_data;

    /**
     *
     * @var string $shortcode_html
     * @description Shortcode return html data storage.
     *
     * */
    public $shortcode_html;

    /**
     *
     * @var string $website
     * @description Website of the plugin
     *
     * */
    public $website;

    /**
     *
     * @var string $support
     * @description Support page URL
     *
     * */
    public $support;

    /**
     *
     * @var string $feedback
     * @description Feedback/Review Page URL
     *
     * */
    public $feedback;

    /**
     *
     * @var string $logo_url
     * @description URL of the logo
     *
     * */
    public $logo_url;

    /**
     *
     * @function __construct
     * @description Main constructor function of the plugin
     * @param string $name Name of the plugin
     * @return void
     *
     * */
    public function __construct($name) {

        // Plugin data initialization
        $this->name = trim($name);
        $this->prefix = 'gb_' . str_replace(' ', '-', strtolower($this->name));
        $this->path = plugin_dir_path(__FILE__);
        $this->url = plugin_dir_url(__FILE__);

        // URLS and extras
        $this->version = '1.0.0';
        $this->website = '';
        $this->support = '';
        $this->feedback = '';
        $this->logo_url = '';

        // Options
        $this->options = get_option($this->prefix);
        if (empty($this->options))
            $this->options = array();
        register_shutdown_function(array(&$this, 'gb_save_options')); // Works as destructor for the object
        
        // Working with upload directory
        $upload = wp_upload_dir(); // Upload Directory
        $this->upload_path = $upload['basedir'] . DS . $this->prefix; // Path
        $this->upload_url = $upload['baseurl'] . '/' . $this->prefix; // URL
        if (!is_dir($this->upload_path))
            mkdir($this->upload_path, 0755); // Creates the upload directory if it is not their

        // Frontend assets Registration
        add_action('wp_enqueue_scripts', array(&$this, 'assets'));

        // Admin assets Registration
        add_action('admin_enqueue_scripts', array(&$this, 'admin_assets'));

        // Custom post
        add_action('init', array(&$this, 'testimonial_custom_posts'));

        // Adding menu
        add_action('admin_menu', array(&$this, 'menu'));

        // Adding Shortcode
        add_shortcode('gb_testimonial', array(&$this, 'gb_testimonial')); // Mega Testimonial Shortcode
        
        // Save Testimonial post
        add_action('save_post', array(&$this, 'save_meta_boxes'));

        // Testimonial custom colum in CTP
        add_filter('manage_custom_posts_posts_columns', array(&$this, 'custom_tm_columns_head'));
        add_action('manage_custom_posts_posts_custom_column', array(&$this, 'custom_tm_columns_content'), 10, 2);
        add_action('the_content', array(&$this, 'limit_the_content'));

        // Custom Post Taxenomy
        add_action('init', array(&$this, 'create_gb_tm_taxonomies'));
        
        // Create an extra column in custom post taxenomy
        add_filter('manage_edit-group_columns', array(&$this, 'add_group_tax_columns'));
        add_filter('manage_group_custom_column', array(&$this, 'add_group_tax_column_content'),10,3);
                
        // Testimonial Plugin call to action link 
        add_action('plugin_action_links_' . plugin_basename(__FILE__), array(&$this, 'testimonials_action_links'), 10, 2);

    }

    /**
     *
     * @function assets
     * @description Registers assets to be loaded later where needed.
     * @param void
     * @return null
     *
     * */
    public function assets() {

        // Style Sheets
        wp_register_style('wpb-bootstrap-main-style', $this->url . 'external/bootstrap-3.3.7/css/bootstrap.min.css', array(), '3.3.7'); // Bootstrap Main File.
        wp_register_style('wpb-frontend-style', $this->url . 'assets/css/frontend-style.css'); // Custom style for the frontend.
        wp_register_style('wpb-starter-style', $this->url . 'views/templates/starter/css/starter.css'); // Custom style Testimonial Starter Design.
        wp_register_style('wpb-transitional-style', $this->url . 'views/templates/basic_slide/css/basic_slide.css'); // Custom style for Testimonial Basic Transitional Sliding Design.
        wp_register_style('wpb-fade-style', $this->url . 'views/templates/fade_slide/css/fade_slide.css'); // Custom style for Testimonial Fade Design.
        // Javascript
        wp_register_script('wpb-bootstrap-main-script', $this->url . 'external/bootstrap-3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.7'); // Custom script for the frontend.
        wp_register_script('wpb-frontend-script', $this->url . 'assets/js/frontend-script.js', array('jquery')); // Custom script for the frontend.
        wp_register_script('wpb-starter-script', $this->url . 'views/templates/starter/js/starter.js', array('jquery')); // Custom script for Testimonial Starter Design.
        wp_register_script('wpb-transitional-script', $this->url . 'views/templates/basic_slide/js/basic_slide.js', array('jquery')); // Custom script for Testimonial Transitional Slide Design.
        wp_register_script('wpb-fade-script', $this->url . 'views/templates/fade_slide/js/fade_slide.js', array('jquery')); // Custom script for Testimonial Fade Design
        wp_localize_script('wpb-frontend-script', 'GB_AJAXURL', array(admin_url('admin-ajax.php'))); // Assigning GB_AJAXURL on the frontend
        wp_localize_script('wpb-frontend-script', '_GB_SECURITY', array(wp_create_nonce("gb-ajax-nonce"))); // Assigning GB_AJAXURL on the frontend
    }

    /**
     *
     * @function admin_assets
     * @description Loads admin assets
     * @param void
     * @return void
     *
     * */
    public function admin_assets() {

        // Style Sheets
        wp_register_style('wpb-bootstrap-main-style', $this->url . 'external/bootstrap-3.3.7/css/bootstrap.min.css', array(), '3.3.7'); // Bootstrap Main File.
        wp_register_style('wpb-bootstrap-material-theme-style', $this->url . 'external/bootstrap-3.3.7/css/bootstrap-theme.min.css', array('wpb-bootstrap-main-style'), '4.0.2'); // Bootstrap Material Theme.
        wp_register_style('wpb-bootstrap-material-theme-ripples-style', $this->url . 'external/bootstrap-3.3.7/css/ripples.min.css', array('wpb-bootstrap-material-theme-style'), '4.0.2'); // Bootstrap Material Theme.
        wp_register_style('wpb-admin-style', $this->url . 'assets/css/admin-style.css', array('wpb-bootstrap-material-theme-ripples-style')); // Custom style for the frontend.
        // Javascript
        wp_register_script('wpb-bootstrap-main-script', $this->url . 'external/bootstrap-3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.7'); // Custom script for the frontend.
        wp_register_script('wpb-mbd-main-script', $this->url . 'external/bootstrap-3.3.7/js/mdb.min.js', array('jquery'), '4.3.0'); // Custom script for the frontend.
        wp_register_script('wpb-tether-main-script', $this->url . 'external/bootstrap-3.3.7/js/tether.min.js', array('jquery'), '3.6.1'); // Custom script for the frontend.
        wp_register_script('wpb-admin-script', $this->url . 'assets/js/admin-script.js', array('wpb-bootstrap-main-script')); // Custom script for the frontend.
    }

    /**
     *
     * @function save_options
     * @description Saves the option when the object closes
     * @param void
     * @return void
     *
     * */
    public function gb_save_options() {
        update_option($this->prefix, $this->options);
    }

    /**
     *
     * @function testimonial_custom_posts
     * @description Adds a custom post type to wordpress
     * @param void
     * @return void
     *
     * */
    public function testimonial_custom_posts() {

        register_post_type(
                'custom_posts', array(
            'labels' => array(
                'name' => __('GB Testimonials'),
                'singular_name' => __('GB Testimonial'),
                'add_new' => __('Add New'),
                'add_new_item' => __('Add new Testimonial'),
                'all_items' => __('All Testimonials'),
            ),
            'description' => 'Detail Testimonial ...',
            'public' => true,
            'hierarchical' => true,
            'exclude_from_search' => false,
            'capability_type' => 'post', // Adding capability for custom post
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menu' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-testimonial',
            'taxonomies' => array('group'),
            'has_archive' => true,
            'featured_image' => true,
            'supports' => array('title', 'editor', 'author', 'thumbnail'),
            'register_meta_box_cb' => array(&$this, 'add_testimonial_metaboxes'),
            )
        );
    }

    /**
     *
     * @function menu
     * @description Adding admin menu to the WordPress admin dashboard
     *
     * */
    public function menu() {

        // Adding Setting submenu
        add_submenu_page(
                'edit.php?post_type=custom_posts', // Parent Slug
                'Testimonials Settings', // Page title
                'Settings', // Submenu title
                'administrator', // User capabilities
                'tm-submenu', // Menu Slug
                create_function('', 'require_once( plugin_dir_path( __FILE__ ) . "views" . DS . "admin" . DS . "settings.php" );')
        );
    }

    /**
     *
     * @function gb_testimonial
     * @description Shortcode example for the plugin
     * @param array $data
     * @return html
     *
     * */
    public function gb_testimonial($data) {
        $this->shortcode_data = $data;
        // Including file for shortcode
        include $this->path . 'views' . DS . 'shortcodes' . DS . 'gb_testimonial_shortcode.php';
        return $this->shortcode_html;
    }

    /**
     *
     * @function custom_metabox_testimonial
     * @description adds custom metabox for testimonial options
     * @param array $post
     * @return void
     *
     * */
    public function add_testimonial_metaboxes($post) {
        add_meta_box(
                'testimonial_metabox', __('Reviewer Information', 'testimonial_plugin'), array(&$this, 'render_meta_boxes'), 'custom_posts', 'normal', 'high'
        );
    }

    /**
     *
     * @function render_meta_boxes
     * @description render metabox for testimonial provider options
     * @param array $post
     * @return void
     *
     * */
    public function render_meta_boxes($post) {

        $meta = get_post_custom($post->ID);
        $name = !isset($meta['profile_name'][0]) ? '' : $meta['profile_name'][0];
        $job_desc = !isset($meta['profile_job_desc'][0]) ? '' : $meta['profile_job_desc'][0];
        $location = !isset($meta['profile_location'][0]) ? '' : $meta['profile_location'][0];
        $company = !isset($meta['profile_company'][0]) ? '' : $meta['profile_company'][0];
        $email = !isset($meta['profile_email'][0]) ? '' : $meta['profile_email'][0];
        $url = !isset($meta['profile_url'][0]) ? '' : $meta['profile_url'][0];

        wp_nonce_field(basename(__FILE__), 'profile_fields');
        ?>

        <table class="form-table">

            <tr>
                <td class="team_meta_box_td" colspan="2">
                    <label for="profile_name"><strong><?php _e('Name', 'team-post-type'); ?></strong></label>
                </td>
                <td colspan="4">
                    <input type="text" name="profile_name" class="regular-text" value="<?php echo $name; ?>">
                    <p class="description"><?php _e('Save testimonial author name', 'team-post-type'); ?></p>
                </td>
            </tr>

            <tr>
                <td class="team_meta_box_td" colspan="2">
                    <label for="profile_job_desc"><strong><?php _e('Job Description', 'team-post-type'); ?></strong></label>
                </td>
                <td colspan="4">
                    <input type="text" name="profile_job_desc" class="regular-text" value="<?php echo $job_desc; ?>">
                    <p class="description"><?php _e('Save testimonial author job description', 'team-post-type'); ?></p>
                </td>
            </tr>

            <tr>
                <td class="team_meta_box_td" colspan="2">
                    <label for="profile_location"><strong><?php _e('Location', 'team-post-type'); ?></strong></label>
                </td>
                <td colspan="4">
                    <input type="text" name="profile_location" class="regular-text" value="<?php echo $location; ?>">
                    <p class="description"><?php _e('Save testimonial author location', 'team-post-type'); ?></p>
                </td>
            </tr>

            <tr>
                <td class="team_meta_box_td" colspan="2">
                    <label for="profile_company"><strong><?php _e('Company', 'team-post-type'); ?></strong></label>
                </td>
                <td colspan="4">
                    <input type="text" name="profile_company" class="regular-text" value="<?php echo $company; ?>">
                    <p class="description"><?php _e('Save testimonial author\'s current company', 'team-post-type'); ?></p>
                </td>
            </tr>

            <tr>
                <td class="team_meta_box_td" colspan="2">
                    <label for="profile_email"><strong><?php _e('Email ID', 'team-post-type'); ?></strong></label>
                </td>
                <td colspan="4">
                    <input type="text" name="profile_email" class="regular-text" value="<?php echo $email; ?>">
                    <p class="description"><?php _e('Save testimonial author\'s email', 'team-post-type'); ?></p>
                </td>
            </tr>

            <tr>
                <td class="team_meta_box_td" colspan="2">
                    <label for="profile_url"><strong><?php _e('Link URL', 'team-post-type'); ?></strong></label>
                </td>
                <td colspan="4">
                    <input type="text" name="profile_url" class="regular-text" value="<?php echo $url; ?>">
                    <p class="description"><?php _e('Save testimonial author\'s link url', 'team-post-type'); ?></p>
                </td>
            </tr>

        </table>

        <?php
    }

    /**
     *
     * @function custom_metabox_testimonial
     * @description adds custom metabox for testimonial options
     * @param array $post
     * @return void
     *
     * */
    public function save_meta_boxes($post_id) {

        global $post;

        // Verify nonce
        if (!isset($_POST['profile_fields']) || !wp_verify_nonce($_POST['profile_fields'], basename(__FILE__))) {
            return $post_id;
        }

        // Check Autosave
        if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || ( defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit'])) {
            return $post_id;
        }

        // Don't save if only a revision
        if (isset($post->post_type) && $post->post_type == 'revision') {
            return $post_id;
        }

        // Check permissions
        if (!current_user_can('edit_post', $post->ID)) {
            return $post_id;
        }

        $meta['profile_name'] = ( isset($_POST['profile_name']) ? esc_textarea($_POST['profile_name']) : '' );

        $meta['profile_location'] = ( isset($_POST['profile_location']) ? esc_textarea($_POST['profile_location']) : '' );

        $meta['profile_job_desc'] = ( isset($_POST['profile_job_desc']) ? esc_textarea($_POST['profile_job_desc']) : '' );

        $meta['profile_company'] = ( isset($_POST['profile_company']) ? esc_textarea($_POST['profile_company']) : '' );

        $meta['profile_email'] = ( isset($_POST['profile_email']) ? esc_textarea($_POST['profile_email']) : '' );

        $meta['profile_url'] = ( isset($_POST['profile_url']) ? esc_textarea($_POST['profile_url']) : '' );

        foreach ($meta as $key => $value) {
            update_post_meta($post->ID, $key, $value);
        }
    }

    /**
     *
     * @function custom_tm_get_featured_image
     * @description adds custom testimonial featured image
     * @param array $post
     * @return $thumbnail post id
     *
     * */
    public function custom_tm_get_featured_image($post_ID) {
        $post_thumbnail_id = get_post_thumbnail_id($post_ID);
        if ($post_thumbnail_id) {
            $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
            return $post_thumbnail_img[0];
        }
    }

    /**
     *
     * @function custom_tm_columns_head
     * @description adds custom post colums
     * @param array $post
     * @return $defaults
     *
     * */
    public function custom_tm_columns_head($defaults) {
        $defaults = array();
        $defaults['cb'] = '<input type="checkbox" />';
        $defaults['thumbnail'] = 'Avatar';
        $defaults['title'] = 'Title';
        $defaults['testimonial'] = 'Testimonial';
        $defaults['group'] = 'Groups';
        $defaults['author'] = 'Author';
        $defaults['date'] = 'Date';
        $defaults['short_code'] = 'Shortcode';
        return $defaults;
    }

    /**
     *
     * @function custom_tm_columns_content
     * @description get the contents for the cuatom colums
     * @param array $colum_name , $post_ID
     * @return $defaults
     *
     * */
    public function custom_tm_columns_content($column_name, $post_ID) {

        switch ($column_name) {
            case 'thumbnail':
                the_post_thumbnail(array('100px', '100px'));
                break;

            case 'testimonial':
                the_excerpt();
                break;

            case 'group':
                the_terms($post_ID, 'group');
                break;

            case 'short_code':
                echo "[gb_testimonial id='{$post_ID}']";
                break;

            default:
                # Something ...
                break;
        }
    }

    /**
     *
     * @function create_gb_tm_taxonomies
     * @description a taxenomy for the Mega Testimonial custom post type
     * @param array none
     * @return void
     *
     * */
    function create_gb_tm_taxonomies() {
        // Add new taxonomy, make it hierarchical (like categories)
        $labels = array(
            'name' => _x('Testimonial Groups', 'taxonomy general name', 'textdomain'),
            'singular_name' => _x('Group', 'taxonomy singular name', 'textdomain'),
            'search_items' => __('Search Groups', 'textdomain'),
            'all_items' => __('All Group', 'textdomain'),
            'parent_item' => __('Parent Group', 'textdomain'),
            'parent_item_colon' => __('Parent Group:', 'textdomain'),
            'edit_item' => __('Edit Group', 'textdomain'),
            'update_item' => __('Update Group', 'textdomain'),
            'add_new_item' => __('Add New Group', 'textdomain'),
            'new_item_name' => __('New Group Name', 'textdomain'),
            'menu_name' => __('Groups', 'textdomain'),
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'group'),
        );

        register_taxonomy('group', array('custom_posts'), $args);
    }
    
    /**
     *
     * @function add_group_tax_columns
     * @description add a extra shortcode colum in group taxenomy
     * @param array $columns
     * @return $columns
     *
     * */
    function add_group_tax_columns($columns){
        $columns['group_short_code'] = 'Shortcode';
        return $columns;
    }
    
    /**
     *
     * @function add_group_tax_column_content
     * @description add shortcode content at shortcode colum in group taxenomy
     * @param array none
     * @return void
     *
     * */
    function add_group_tax_column_content($content,$column_name,$term_id){
        
        switch ($column_name) {
           
            case 'group_short_code':
                echo "[gb_testimonial group_id='{$term_id}']";
                break;

            default:
                # Something ...
                break;
        }
    }
    
    /**
     *
     * @function testimonials_action_links
     * @description Testimonials Plugin Call to Action function.
     * @param array link
     * @return link
     *
     * */
    function testimonials_action_links( $links ) {
	$links = array_merge( array(
		'<a href="' . admin_url( 'edit.php?post_type=custom_posts&page=tm-submenu' ) . '">' . __( 'Settings', 'textdomain' ) . '</a>',
                '<a href="' . admin_url( 'edit-tags.php?taxonomy=group&post_type=custom_posts' ) . '">' . __( 'Groups', 'textdomain' ). '</a>'
	), $links );
	return $links;
    }    
    
    /**
     *
     * @function limit_the_content
     * @description View limited range of post detail for the contents
     * @param array $content
     * @return $string
     *
     * */
    public function limit_the_content($content) {
        $word_limit = 15;
        $words = explode(' ', $content);
        return implode(' ', array_slice($words, 0, $word_limit)) . ' ...';
    }

}

/**
 *
 * @function pr
 * @description Formatted output of print_r function
 * @param mixed $obj
 * @return void
 *
 * */
if (!function_exists('pr')):

    function pr($obj) {
        echo "<pre>";
        print_r($obj);
        echo "</pre>";
    }

endif;

// Declaring the global variable for this plugin
global $gb_mega_testimonial;
$gb_mega_testimonial = new GBMegaTestimonial('Mega Testimonial');
