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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp4376675' );

/** Database username */
define( 'DB_USER', 'wpuser32499' );

/** Database password */
define( 'DB_PASSWORD', 'j8ZqXqb50GgmShX' );

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
define( 'AUTH_KEY',          'FJZ}]n{b3Nu>K=P$!J2n1xsGSM,y{bbn*Q}z)5KBZQ[8^dv4m3-Z+A-4!!pLqHU%' );
define( 'SECURE_AUTH_KEY',   '+Ae*/<7]^~L1{%->yx%(2Sx-Oq$~x.SGTfprmAlz:*>Z2qO[#LN:R~ABozS&Z%:!' );
define( 'LOGGED_IN_KEY',     'oI2*T},F Nl1x@kbB_W2N11JQ9MIYvn@S)!4]n~]E`_JsiGz|[).RP>l[AcY;;+7' );
define( 'NONCE_KEY',         'gPjn<T>Pq<oq+IBuJ)05d3(,Nb5dI`gOoS04F#jAKCC`J7}]a]:FZL_10]tKL<pO' );
define( 'AUTH_SALT',         'E!5_<jfhci-j{CL~JJ$AJ=g|#9+x8VkUhYF+%M;LeAH&|pl2CGm:5#u~yt+xMrS%' );
define( 'SECURE_AUTH_SALT',  '<>MR]a8-eO0CZ;B8i$ea%has6t5 8%oF_-hd4oY4b1-;e1IoL?-&~q6]}t9yyoo#' );
define( 'LOGGED_IN_SALT',    '5]0)~Rk>?!zQ6#:.dE>`|]MC^:%|ngOsdAvIHNht!KU`T&s0983tv@7n[4&^~8{,' );
define( 'NONCE_SALT',        'S~XOAkj I!m:w?f# QA6sg7} .6?BAEjK|`$!}pm)xqkjxJb:NwWj*38~s$k@LXS' );
define( 'WP_CACHE_KEY_SALT', '!3}!XP+^UR[9k!CXGpF{<8VB&Gk&u[O?q(f)x=lr,Ne7SLZN;Q3/XT%Uuxd=]!Kh' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */

define( 'FORCE_SSL_ADMIN', false );
define( 'FS_METHOD' , 'direct' );
if (! defined('WFWAF_STORAGE_ENGINE')) { define('WFWAF_STORAGE_ENGINE', 'mysqli'); }


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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
