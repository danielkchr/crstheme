<?php 
/*
* slider Section Theme Option.
*
* @Package  CentralRussianSchool
*/

function preschool_and_kindergarten_customize_register_slider( $wp_customize ) {
    
    global $preschool_and_kindergarten_option_categories;
    
    $wp_customize->add_section(
        'preschool_and_kindergarten_banner_settings',
        array(
            'title' => __( 'Slider Settings', 'preschool-and-kindergarten' ),
            'priority' => 30,
            'panel' => 'preschool_and_kindergarten_home_page_settings',
        )
    );
    
    /** Enable/Disable banner Section */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_ed_banners_section',
        array(
            'default' => '',
            'sanitize_callback' => 'preschool_and_kindergarten_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'preschool_and_kindergarten_ed_banners_section',
        array(
            'label' => __( 'Enable Slider Section', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_banner_settings',
            'type' => 'checkbox',
        )
    );
	
	/** Slider ID */
    $wp_customize->add_setting(
        'preschool_and_kindergarten_slider_id',
        array(
            'default' => '',
            'sanitize_callback' => 'preschool_and_kindergarten_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'preschool_and_kindergarten_slider_id',
        array(
            'label' => __( 'Slider ID', 'preschool-and-kindergarten' ),
            'section' => 'preschool_and_kindergarten_banner_settings',
            'type' => 'text',
        )
    );

}
add_action( 'customize_register', 'preschool_and_kindergarten_customize_register_slider' );
