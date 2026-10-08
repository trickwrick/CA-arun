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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u894712264_OdPBc' );

/** Database username */
define( 'DB_USER', 'u894712264_G7PdG' );

/** Database password */
define( 'DB_PASSWORD', 'LnXZRXqYcL' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          'qvGn5/2|)s^fo[oEF[c{O.KD%nA:ReXJi{&.363&1[0j*D&qnpH [7uK-Me(V4Bp' );
define( 'SECURE_AUTH_KEY',   '1 ]7R5`_/|/`or,-7.B*#k1{lWR L:@|eeRmKuOJ:jGS*}Mv 3e}iV+r4N(1;.aR' );
define( 'LOGGED_IN_KEY',     '373!aYgap-Vmt#)HUM0q0+JSJe2%NslY0htO A&jIaF>CHX:0-Cso$ep:ToMh VU' );
define( 'NONCE_KEY',         '3c5Y?Fl3l3mA^8OIb2g@l/Xmy;)vL|ze3!4):.2&vf/*/]aJ*|*HhrJJVvQ26s ?' );
define( 'AUTH_SALT',         '/2.Zil@6_9NzP2XM&k>h`f_Yijq9;LuQx1>296<F8`=/=gDn Np_nOc`:~1V-?q,' );
define( 'SECURE_AUTH_SALT',  'P~AA4FyWUjUd|XU%xkZ3G28%*BAoCfD%x5Ob9,viB{PA&~9Gd]m/-F0H=*c8=FSv' );
define( 'LOGGED_IN_SALT',    'k92$hOUI+nFEu$1{D0DFa&@_ G&K(ta4=jum86BmG&MIK$!cCpKfdmuL*e&/Ud S' );
define( 'NONCE_SALT',        '>$O}/tJI $NU[0cJ}a$#U%-wf.2@~G@(j!!K[5l~tig9r_11n~;1*_kC59I/!hr1' );
define( 'WP_CACHE_KEY_SALT', 'qOl36,F 8,Y9V,hQ<A5~^rIS//`2f[B{N/d1^`m<Qx[ B>:ODGwgqa[]vtge0mZl' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', 'd04da34349b086e9c864dd719a52dfe3' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
