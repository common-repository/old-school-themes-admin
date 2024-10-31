<?php
 /**
  * Plugin Name: Old-School Themes Admin
  * Plugin URI:  http://wpmulti.org/old-school-themes-admin
  * Description: Display links to the old custom-header and custom-background admin pages in both the dashboard and the front-end toolbar.
  * Version:     0.1.3
  * Author:      Martin Robbins
  * Author URI:  http://wpmulti.org
  * License:     GPL2 or later
  * License URI: https://www.gnu.org/licenses/gpl-2.0.html
  */

// Add Dashboard Old School items for Header, Background
add_action ( '_admin_menu', 'osta_add_old_school_submenus', 999 );
function osta_add_old_school_submenus() {

	global $submenu;

	// Add a Custom Header menu items
	if ( current_theme_supports( 'custom-header' ) && current_user_can( 'edit_theme_options') ) {
		$submenu['themes.php']['21.4'] = array( __( 'Old-School Custom Header' ), 'edit_theme_options', admin_url( 'themes.php?page=custom-header' ), '', '' );
	}

	// Add a Custom Background menu item 
	if ( current_theme_supports( 'custom-background' ) && current_user_can( 'edit_theme_options') ) {
		$submenu['themes.php']['21.5'] = array( __( 'Old-School Custom Background' ), 'edit_theme_options', admin_url( 'themes.php?page=custom-background' ), '', '' );
	}
}


// Add Toolbar Old School items
add_action( 'admin_bar_menu', 'osta_add_old_school_nodes', 999 );
function osta_add_old_school_nodes( $wp_admin_bar ) {

	if ( current_theme_supports( 'custom-header' ) && current_user_can( 'edit_theme_options') ) {
		$args = array(
			'parent'=> 'appearance',
			'id'    => 'osta-header',
			'title' => 'Header',
			'href'  => admin_url( 'themes.php?page=custom-header' ),
			'meta'  => array( 'class' => 'osta-header' )
		);		
		$wp_admin_bar->add_node( $args );
	}

	if ( current_theme_supports( 'custom-background' ) && current_user_can( 'edit_theme_options') ) {
		$args = array(
			'parent'=> 'appearance',
			'id'    => 'osta-background',
			'title' => 'Background',
			'href'  => admin_url( 'themes.php?page=custom-background' ),
			'meta'  => array( 'class' => 'osta-background' )
		);		
		$wp_admin_bar->add_node( $args );
	}

}

?>