<?php



function enqueue_parent_styles() 
{
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

/* Add SmartSlider setting section */
function preschool_and_kindergarten_customize_register_smartslider( $wp_customize ) 
{
    global $preschool_and_kindergarten_option_categories;
    
    $wp_customize->add_section(
        'preschool_and_kindergarten_smartslider_settings',
        array(
            'title' => __( 'Smart Slider Settings', 'preschool-and-kindergarten' ),
            'priority' => 30,
            'panel' => 'preschool_and_kindergarten_home_page_settings',
        )
    );
    
    /** Enable/Disable banner Section */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_ed_smartslider_section',
        array(
            'default' => '',
            'sanitize_callback' => 'preschool_and_kindergarten_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'preschool_and_kindergarten_ed_smartslider_section',
        array(
            'label' => __( 'Enable Slider Section', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_smartslider_settings',
            'type' => 'checkbox',
        )
    );
	
	/** Slider ID */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_smartslider_id',
        array(
            'default' => '',
            'sanitize_callback' => 'preschool_and_kindergarten_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'preschool_and_kindergarten_smartslider_id',
        array(
            'label' => __( 'Slider ID', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_smartslider_settings',
            'type' => 'text',
        )
    );

}
add_action( 'customize_register', 'preschool_and_kindergarten_customize_register_smartslider');

/* Remove defualt banners setting section */
function preschool_and_kindergarten_customize_remove_banners_section($wp_customize)
{
	$wp_customize->remove_section( 'preschool_and_kindergarten_banner_settings');
}
add_action( 'customize_register', 'preschool_and_kindergarten_customize_remove_banners_section', 50);

/* Add content setting section */
function preschool_and_kindergarten_customize_register_content( $wp_customize ) 
{
	global $preschool_and_kindergarten_options_pages;
	
     /** content Section */
    $wp_customize->add_section(
        'preschool_and_kindergarten_content_settings',
        array(
            'title' => __( 'Content Section', 'preschool-and-kindergarten' ),
            'priority' => 30,
            'panel' => 'preschool_and_kindergarten_home_page_settings',
        )
    );
    
    /** Enable/Disable promotional Section */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_ed_content_section',
        array(
            'default' => '1',
            'sanitize_callback' => 'preschool_and_kindergarten_sanitize_checkbox',
        )
    );
	
	$wp_customize->add_control(
        'preschool_and_kindergarten_ed_content_section',
        array(
            'label' => __( 'Enable Content Section', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_content_settings',
            'type' => 'checkbox',
        )
    );
	
	/** Content Page */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_content_page',
        array(
            'default' => '',
            'sanitize_callback' => 'preschool_and_kindergarten_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'preschool_and_kindergarten_content_page',
        array(
            'label' => __( 'Select Page', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_content_settings',
            'type' => 'select',
            'choices' => $preschool_and_kindergarten_options_pages,
        )
    );
}
add_action( 'customize_register', 'preschool_and_kindergarten_customize_register_content' );

/* Register required plugins in addition to required by the parent theme */
function crs_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
            'name'     => 'Smart Slider 3', 
            'slug'     => 'smart-slider-3',
            'required' => true,
        ) 
   
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'preschool-and-kindergarten',    	// Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      			// Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', 			// Menu slug.
        'parent_slug'  => 'themes.php',            			// Parent menu slug.
        'capability'   => 'edit_theme_options',    			// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    			// Show admin notices or not.
        'dismissable'  => true,                    			// If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      			// If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   			// Automatically activate plugins after installation or not.
        'message'      => '',                      			// Message to output right before the plugins table.

    );

    tgmpa( $plugins, $config);
}
add_action( 'tgmpa_register', 'crs_register_required_plugins', 15 );


function preschool_and_kindergarten_ed_section()
{
	$preschool_and_kindergarten_page_sections = array('smartslider', 'content', 'about', 'lessons', 'services', 'promotional', 'program', 'testimonials', 'staff', 'news');
	$en_sec = false;
	foreach( $preschool_and_kindergarten_page_sections as $section ){ 
		if( get_theme_mod( 'preschool_and_kindergarten_ed_' . $section . '_section' ) == 1 ){
			$en_sec = true;
		}
	}
	return $en_sec;
}

?>