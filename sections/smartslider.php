<?php
/**
 * Banner Section
 * 
 * @package Preschool_and_Kindergarten
*/   

	$slider_id = get_theme_mod('preschool_and_kindergarten_smartslider_id');
	
	if (isset($slider_id) && is_int($slider_id))
	{
		echo do_shortcode('[smartslider3 slider=' . $slider_id . ']');
	}
?>