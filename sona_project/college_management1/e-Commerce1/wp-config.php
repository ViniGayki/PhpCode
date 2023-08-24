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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'E-Commerce' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'r8LYmyGFS7|+a37?^O6stvrm/L([$PyhCps%j0*%UM2k+,j-(xDN@]uc2_1S{zy[' );
define( 'SECURE_AUTH_KEY',  '=>RZOcBlhgkWYgKn_W&`r>?p:d4^wc)%}bQ*wj)CD X2:G&&ekHhj1$B:i^^$1IA' );
define( 'LOGGED_IN_KEY',    'vlNa7l~hPU(R*iSgSE6pn=I(fH6fR_5+d/H_KtdDW.|f_413wX&_uFbJ62H~1(|b' );
define( 'NONCE_KEY',        'ix nBk?2 fT%vZ2D%Wt31VE&0C3YX,wvEGIiOTds` Xz23YgpXJW.hY#lQkL>qY4' );
define( 'AUTH_SALT',        '*]~#lQ/hG?-&#Zm^Z+gyS(6j{zd>i+{A!X?c`=%17z(sdNTtzk~@OXBpBU7LTCw-' );
define( 'SECURE_AUTH_SALT', 'IFo3*e>lWaL+YuFr}_J7q=/q3NG-TXtQ>0= eb=Y5=]!Ul^qAR@,v.z.^Si[3b/N' );
define( 'LOGGED_IN_SALT',   'Po:G4Oa_q<+*]xif<FIvh&bOa]asHWtovS)IT%DPGLB+nTxsm#WB`>zkF,PJ/JkA' );
define( 'NONCE_SALT',       'IF/wsUCF]yQ?k~)%wztVO)D?E0Cb+V+K.UB&WU9Gz?778cG#!FtXUuu8<>%@Fw@^' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
