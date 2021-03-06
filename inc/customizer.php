<?php
/**
 * business-plus Theme Customizer
 *
 * @package business-plus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_plus_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->add_setting('phone', array( 'default'=> '0000000'));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phone', array(
        'label'      => __( 'Phone number', '_' ),
        'section'    => 'title_tagline',
        'settings'   => 'phone',
    )));
}
add_action( 'customize_register', 'business_plus_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_plus_customize_preview_js() {
	wp_enqueue_script( 'business_plus_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'business_plus_customize_preview_js' );
