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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sursaanjh' );

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
define( 'AUTH_KEY',         'XJEeL{8k3}J|:b;`xSg|5[q-?IRm!oq,j!JnU]<IUc/*ujsaT<y&=n?rt%TeTQR/' );
define( 'SECURE_AUTH_KEY',  'isy{dQAQ%tJta6qm2x; zz:q6_3.Z@Jb(U%_tSI2S3]od~+g{=:fSY}R^0 O76pa' );
define( 'LOGGED_IN_KEY',    '3$MJ-jqWC6aFfj+]1GCWBrxRcl[=hW327&Mb=R(u.eJt/+fVfyV?OX`v]0Vsv:+O' );
define( 'NONCE_KEY',        's>e&)b/GmCRoM]7<5n_+T*)Y8o3S1ds,cv>]d>uiD*6-rhjJ-+740?d_wdpC>pN>' );
define( 'AUTH_SALT',        'VW/R*RvyDM5LZ6?(%lQFh_;Lx|~.#^{a2?quz=&s]}[PlP9l|54TWw(.Mn3@cJ+J' );
define( 'SECURE_AUTH_SALT', 'ZB9?&5P1KnC.c79Y. ]d0EgyfeZEzO|:#t{|?41M&_On[^ st+wqDC5oey|&GI?a' );
define( 'LOGGED_IN_SALT',   'KXoz2:L#6CK{QqV-5QJ/g(0*48oD0j<imtf4`&w@)Jtuzex/)dSp&B9~eV8v~^~B' );
define( 'NONCE_SALT',       '^.@c9c>zn}Ma8;xQ:(V{?2mqw:g<e}<y_U!C~F6Jj*X2kx=,J@39zc5G1Td_& v.' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */


define( 'FS_METHOD', 'direct' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
