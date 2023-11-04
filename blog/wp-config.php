<?php
define( 'WP_CACHE', true );


/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vipmarri_wp691' );

/** Database username */
define( 'DB_USER', 'vipmarri_wp691' );

/** Database password */
define( 'DB_PASSWORD', 'n)62[Tp9Si' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'dklbvfjvfnzuthhritvsyyetpjsnicqaea5colco70tnff1alcy8lsz096wcbbl5' );
define( 'SECURE_AUTH_KEY',  'hhnurooathqcm99ogpidtdjqq5zz9mkep9btdukwwz5vmyp0pe4d1lxbnq9b9cnn' );
define( 'LOGGED_IN_KEY',    'mgjdlhxqo5ewta31judugs2rnjuugocahzawemfki0sdxutn48adqbpg6qxee0mi' );
define( 'NONCE_KEY',        'jz8n7lsrzpodiy540p4v61o277n4zlohgue4loethxcxjfnuruwypqy3kfcagbwz' );
define( 'AUTH_SALT',        'wm2f0p85by2pgmu7b0rsicl9sc0qgy04quntjcmb73ol6vqea3pqvwan9okxntmo' );
define( 'SECURE_AUTH_SALT', 'zw5blmggvfz81dh6pbj7n5blxpaazewrz6gnjr03ikdpsoyobmv6abhknykkxcg2' );
define( 'LOGGED_IN_SALT',   '9ob37wpuosbux02pqdhr9angbcgtlsqv4yh5enkliji6jmgga6aa7oxaaemhvc6p' );
define( 'NONCE_SALT',       'xckvnadobfczxsqskppdlm9bv1jyfb0ykqdakjua55ur1v8rkym3va1jwvnyuxmz' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp48_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
