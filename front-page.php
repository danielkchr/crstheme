<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CentralRussianSchool
 */

$ed_section = preschool_and_kindergarten_ed_section();
$preschool_and_kindergarten_page_sections = array( 'smartslider', 'content', 'about', 'lessons', 'services', 'promotional', 'program', 'testimonials', 'staff', 'news');    

get_header(); 

if (get_option('show_on_front') == 'posts') 
{
	include(get_home_template());
}
elseif ($ed_section)
{
	foreach( $preschool_and_kindergarten_page_sections as $section )
	{ 
		if( get_theme_mod( 'preschool_and_kindergarten_ed_' . $section . '_section' ) == 1 )
		{
			get_template_part( 'sections/' . esc_attr( $section ) );
		} 
	}	
}
else
{
	include( get_page_template() );

}
			  
get_footer();