<?php
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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'portfolio_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'u#sicwci5RqsVv)L/MhuuYnxH]hhrRP*e@9b-v]$k?g:6:zupEelQsl=lE^{o,a0' );
define( 'SECURE_AUTH_KEY',  'FFD$B}2PB6X9IVe=0NZ;8Xv(OaN?vCSW<S9.8~(5Xw(zG2JjG<<:4ra|eR3C^}N;' );
define( 'LOGGED_IN_KEY',    '=`hxh2+8nk2=YEz(`w:<h8:t?>8m^| L0~W3V$n,*h{0dpm15p{JOS12GT2E%lL@' );
define( 'NONCE_KEY',        'dja&Be.mH!0w75rl=[ie$XSE40OC^}{YYLe2l1#&]iPxjLHn,}-ts^ Ihf*:;xu{' );
define( 'AUTH_SALT',        'nLbC?i;~af88VB^k -W{~i-NqiyC[p<v8FxYD2*3_`GVv_UH8N9QhD-y P(o:q@1' );
define( 'SECURE_AUTH_SALT', 'WJ,ux28c}[;3=NUB_sG3XojQ4X[c6Qg_pIue=t(=y,hVClC`kog00js(U|cfGSbG' );
define( 'LOGGED_IN_SALT',   'F96xBbmJVF3eg>3 wP:5VG#wga(Km?{6&`)AzK>zn|;e;d3c q;0w%`:/jOrsj(a' );
define( 'NONCE_SALT',       '(BkM?e1vfCjj+~Go<Iq:)S9(`px=-xp~0RUzv,71Yg)L:jh}rBgv$/lVe,EE^OT]' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
// define( 'WP_DEBUG', false );
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

