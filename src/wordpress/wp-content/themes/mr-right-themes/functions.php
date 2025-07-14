<?php 

    define('TEMPLATE_ASSETS_PATH', get_stylesheet_directory_uri().'/assets');
    define('IMG_PATH', TEMPLATE_ASSETS_PATH .'/images');
    define('CSS_PATH', TEMPLATE_ASSETS_PATH .'/css');
    define('JS_PATH', TEMPLATE_ASSETS_PATH .'/js');
    function mr_right_themes_support() {

        if (is_user_logged_in()) {
            add_filter('show_admin_bar', '__return_true');
        }
    
        add_theme_support( 'post-thumbnails' );
    }
    
    add_action( 'after_setup_theme', 'mr_right_themes_support' );

    function mr_right_themes_menus() {
    
        $locations = array(
            'main'  => __( 'Main Menu', 'mrright' ),
            'footer_left'   => __( 'Footer Left Menu ', 'mrright' ),
            'footer_right'   => __( 'Footer Right Menu ', 'mrright' ),
        );
    
        register_nav_menus( $locations );
    }
    
    add_action( 'init', 'mr_right_themes_menus' );

    function mr_right_themes_register_styles() {
         
        wp_register_style('mr_right_themes-style', TEMPLATE_ASSETS_PATH . '/css/style.css', false, null);
        wp_enqueue_style('mr_right_themes-style');

        wp_register_style('mr_right_themes-style-default', get_stylesheet_directory_uri() . '/style.css', false, null);
        wp_enqueue_style('mr_right_themes-style-default');
        
    }
    
    add_action( 'wp_enqueue_scripts', 'mr_right_themes_register_styles' );


    function load_custom_admin_styles() {
        wp_enqueue_style('boostrap_admin_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    }
    //add_action('admin_enqueue_scripts', 'load_custom_admin_styles');


    function mr_right_themes_register_scripts() {

        wp_register_script('mr_right_themes-js', TEMPLATE_ASSETS_PATH . '/js/script.js' , array('jquery'));
        wp_enqueue_script('mr_right_themes-js');

    }

    add_action( 'wp_enqueue_scripts', 'mr_right_themes_register_scripts' );

    function gender_footer_menu($name) {
        $menuLocations = get_nav_menu_locations();
        $navbar_items = [];

        if(($menuLocations)) {
            $navbar_items = wp_get_nav_menu_items($menuLocations[$name]);
        }

        $child_items = [];

        if(!empty($navbar_items)):
            foreach ($navbar_items as $key => $item) {
                if ($item->menu_item_parent) {
                    array_push($child_items, $item);
                    unset($navbar_items[$key]);
                }
            }
        endif;
        
        if(!empty($navbar_items)):
            foreach ($navbar_items as $item) {
                foreach ($child_items as $key => $child) {
                    if ($child->menu_item_parent == $item->ID) {
                        if (!$item->child_items) {
                            $item->child_items = [];
                        }

                        array_push($item->child_items, $child);

                        unset($child_items[$key]);
                    }
                }
            }
        endif;

        return $navbar_items;
    }

    function gender_main_menu($name) {
        $menuLocations = get_nav_menu_locations();
        $navbar_items = [];
    
        if ($menuLocations && isset($menuLocations[$name])) {
            $navbar_items = wp_get_nav_menu_items($menuLocations[$name]);
        }
    
        $child_items = [];
        $current_url = home_url(add_query_arg([], $GLOBALS['wp']->request));
        $current_url = trailingslashit($current_url);
    
        if (!empty($navbar_items)) {
            foreach ($navbar_items as $key => $item) {
                $item->classes = $item->classes ?? [];
    
                $item_url = trailingslashit($item->url);
                if ($item_url === $current_url) {
                    $item->classes[] = 'active';
                }
    
                if ($item->menu_item_parent) {
                    $child_items[] = $item;
                    unset($navbar_items[$key]);
                }
            }
        }
    
        if (!empty($navbar_items)) {
            foreach ($navbar_items as $item) {
                $item->classes = $item->classes ?? [];
    
                foreach ($child_items as $key => $child) {
                    if ($child->menu_item_parent == $item->ID) {
                        if (!isset($item->child_items)) {
                            $item->child_items = [];
                        }
    
                        $child->classes = $child->classes ?? [];
                        $child_url = trailingslashit($child->url);
    
                        if ($child_url === $current_url) {
                            $child->classes[] = 'active';
                            $item->classes[] = 'active';
                        }
    
                        $item->child_items[] = $child;
                        unset($child_items[$key]);
                    }
                }
            }
        }
    
        return $navbar_items;
    }
    
    function mr_right_themes_custom_pagination($query = null) {
        if ($query === null) {
            global $wp_query;
            $query = $wp_query;
        }
    
        $big = 999999999; 
    
        $pagination_links = paginate_links(array(
            'base'         => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'       => '?paged=%#%',
            'current'      => max(1, get_query_var('paged')),
            'total'        => $query->max_num_pages,
            'prev_text'    => __('&laquo; Prev'),
            'next_text'    => __('Next &raquo;'),
            'type'         => 'array',
        ));
    
        if (is_array($pagination_links)) {
            echo '<nav class="pagination"><ul>';
    
            foreach ($pagination_links as $link) {
                if (strpos($link, 'current') !== false) {
                    echo '<li class="active"><span>' . strip_tags($link) . '</span></li>';
                }
                elseif (strpos($link, 'disabled') !== false) {
                    echo '<li class="disabled"><span>' . strip_tags($link) . '</span></li>';
                }
                else {
                    echo '<li>' . $link . '</li>';
                }
            }
            echo '</ul></nav>';
        }
    }

    function register_custom_post_type_product() {
        $labels = array(
            'name'               => 'Products',
            'singular_name'      => 'Product',
            'menu_name'          => 'Products',
            'name_admin_bar'     => 'Product',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Product',
            'new_item'           => 'New Product',
            'edit_item'          => 'Edit Product',
            'view_item'          => 'View Product',
            'all_items'          => 'All Products',
            'search_items'       => 'Search Products',
            'parent_item_colon'  => 'Parent Products:',
            'not_found'          => 'No products found.',
            'not_found_in_trash' => 'No products found in Trash.'
        );
    
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'has_archive'        => true,
            'rewrite'            => array('slug' => 'products'),
            'menu_icon'          => 'dashicons-cart',
            'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'show_in_rest'       => true,
        );
    
        register_post_type('product', $args);
    }
    add_action('init', 'register_custom_post_type_product');
    
    add_action('admin_menu', 'mr_right_url_settings_menu');
function mr_right_url_settings_menu() {
    add_menu_page(
        'URL Setting',
        'URL Setting',
        'manage_options',
        'mr-right-url-settings',
        'mr_right_url_settings_page',
        'dashicons-admin-generic',
        100
    );
}

function mr_right_url_settings_page() {
    ?>
    <div class="wrap">
        <h1>URL Setting</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('mr_right_url_group');
            do_settings_sections('mr-right-url-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

add_action('admin_init', 'mr_right_url_settings_init');
function mr_right_url_settings_init() {
    add_settings_section(
        'mr_right_url_section',
        '',
        null,
        'mr-right-url-settings'
    );

    add_settings_field(
        'mr_instagram_url',
        'Instagram URL',
        'mr_right_url_field_callback',
        'mr-right-url-settings',
        'mr_right_url_section',
        ['id' => 'mr_instagram_url']
    );
    register_setting('mr_right_url_group', 'mr_instagram_url');

    add_settings_field(
        'mr_contact_url',
        'Contact URL',
        'mr_right_url_field_callback',
        'mr-right-url-settings',
        'mr_right_url_section',
        ['id' => 'mr_contact_url']
    );
    register_setting('mr_right_url_group', 'mr_contact_url');
}

function mr_right_url_field_callback($args) {
    $id = $args['id'];
    $value = esc_url(get_option($id));
    echo '<input type="url" id="' . esc_attr($id) . '" name="' . esc_attr($id) . '" value="' . esc_attr($value) . '" class="regular-text" />';
}
?>