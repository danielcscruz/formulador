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
define( 'DB_NAME', 'wp_meu_site' );

/** MySQL database username */
define( 'DB_USER', 'superadmin' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

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
define( 'AUTH_KEY',         'UcFS|njN:3W4Tuz *NfL;lZQ$--YZ=%[}|Sf^#jJo)T?+QAQxG{<oc_MV:v++q+d' );
define( 'SECURE_AUTH_KEY',  'aBZTmzdJ7WL{r /;A>s _z,Y_^q_6W9O_Eguf6WB-hJ*PYZ3iTE,j!ob(`<y*=tR' );
define( 'LOGGED_IN_KEY',    '71kq1^hl3i)zL]@HkV~tr=Z:;%Gc]VsBfV_88WBU}5ofV1:-|7Jf=Hy~RELf {Et' );
define( 'NONCE_KEY',        '.GdiTct3~_wc1AdEqL*Tc!xM#A:ZEGa#<|@hwm4LCVWT+jTkx}}*{w7rYb&SN^D?' );
define( 'AUTH_SALT',        '2k{g_toA9$ExGPb($M_3e0{otSS5FCvvLws_vf4hykp:7Mzb0&j1nP@<=5^s@9N1' );
define( 'SECURE_AUTH_SALT', '2bBR6)%7THv4R5zYI9y?VBAy{)o2)B{,/U((GO@sDQ!3l&qLi{pJ:!*#Mv;{gYDx' );
define( 'LOGGED_IN_SALT',   'uC=<DJO(fp(RzsiI:Odr] o4saivq|r?z~P>CNLV3q1Yx9uL &+gM^R0 Uo>tp_,' );
define( 'NONCE_SALT',       'yu;;^V ^x:zN1bJD|gRT3-l<q6Z0|()d8C_Yu=*a2_OaLe<:9J61~65?pL?1wVw3' );

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
