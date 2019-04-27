<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('FS_METHOD', 'direct');

define( 'DB_NAME', 'portal' );

/** MySQL database username */
define( 'DB_USER', 'oleg' );

/** MySQL database password */
define( 'DB_PASSWORD', '555' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '<XZQ$!A#TgP +0r*-;,kM8Q{nqOT0tOT3Zc3Fa#$WAJdF2JSX,~^zPi;k8P>i:T1');
define('SECURE_AUTH_KEY',  '&[sCwGDC^|Lb=9j=u2<Ei063fno)aJvk+]%9w_<g~UKqYVSG9E|w6QQ(.h0`#6gq');
define('LOGGED_IN_KEY',    '|$MPI,j2w5n_$<M2I7no_W#6(4sR= vnT#Gx&_e;{ ,&o7}T>Dm~vg`[?`s6||<a');
define('NONCE_KEY',        '<+5jIWI0KPLcCY+eI^}z|2e!>,yF`Mnb7aSztl@{Sb{]l2J%-<]a=v,n6|wjurPb');
define('AUTH_SALT',        'q[5Q__Gc0ztE~-;&j0ihBB5t&BRt;zJ^oKYYyp%]nMJoF3.5T~3sn%~-[R=cy@I{');
define('SECURE_AUTH_SALT', 's<5wIK%#W!2@<tkdI]`Pn0~y]S`e/3(fJ-yK~}a>=bnOly!@4+FI/Ple&1|7?:h|');
define('LOGGED_IN_SALT',   'DNP.1-CKE%o1dH@|d|3SZg=nU|_}EyBR{U-:Y+!p]5zge sDa2FBWXpafiY$W TW');
define('NONCE_SALT',       'P=|UyZ6#+%OC&|K9WPg?,.zfJo@5{xotS!wMAPfhS;06-0.g,~/D-M&q0M1M;$fY');

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
