<?php
/**
 * @author : Jegtheme
 */
//Licensed by plugintheme.net
update_option( 'jnews_license', [ 'validated' => true, 'token' => 'jnews' ] );

defined( 'JNEWS_THEME_URL' )        or define( 'JNEWS_THEME_URL', get_parent_theme_file_uri() );
defined( 'JNEWS_THEME_FILE' )       or define( 'JNEWS_THEME_FILE', __FILE__ );
defined( 'JNEWS_THEME_DIR' )        or define( 'JNEWS_THEME_DIR', plugin_dir_path( __FILE__ ) );
defined( 'JNEWS_THEME_NAMESPACE' )  or define( 'JNEWS_THEME_NAMESPACE', 'JNews_' );
defined( 'JNEWS_THEME_CLASSPATH' )  or define( 'JNEWS_THEME_CLASSPATH', JNEWS_THEME_DIR . 'class/' );
defined( 'JNEWS_THEME_CLASS' )      or define( 'JNEWS_THEME_CLASS', 'class/' );
defined( 'JNEWS_THEME_ID' )         or define( 'JNEWS_THEME_ID', 20566392 );
defined( 'JNEWS_THEME_TEXTDOMAIN' ) or define( 'JNEWS_THEME_TEXTDOMAIN', 'jnews' );

// TGM
if ( is_admin() ) {
	require get_parent_theme_file_path( 'tgm/plugin-list.php' );
}

// Theme Class
require get_parent_theme_file_path( 'class/autoload.php' );

JNews\Init::getInstance();
