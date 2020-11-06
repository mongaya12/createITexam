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
define( 'DB_NAME', 'social_exams' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '9t3eA4EDS%CiyS[9w<qJMh1-4EeW]Fx{y`Ua}|-?D#Y&}%&i=OWrkq-fX~tgT6AN' );
define( 'SECURE_AUTH_KEY',  'BR0oV4E/mTd[ki>5ENJhkn_d/eE?Ir[FU3_&Lk%vR;:?u!)cpT#|<ZvOz0&~sXnI' );
define( 'LOGGED_IN_KEY',    '1q&v#&eID50k6igOE`d1G/3[2uFy1>HQ)3S,&0XHLmb(tmdhOQBwm`agp/P&hf>]' );
define( 'NONCE_KEY',        'pzj{6bz3n|zKoG>=by>P3O& E{H3#MO1QTov@<_e]Fu+,(]do(c# ec|cMr#be6*' );
define( 'AUTH_SALT',        ' aWHW6#3%ik]W[-7IJ$01^<( bD[Zsg,s-PfdQT?BsI_F#Gp!1t6bysGy&Odt(cR' );
define( 'SECURE_AUTH_SALT', 'WLM0,sHCA`}8pKkei-Y8N|m6jlxi&0~ aqZh2x_?en_}2*!t$x]r{MiHb@B|87Ya' );
define( 'LOGGED_IN_SALT',   '`6LG.BPZKtNU%iQ%`a?X,}%NE)TEfnY>F8fP~cL#W^P.->:kyG0)o*mn3</ h:Ne' );
define( 'NONCE_SALT',       'Cu0piRk6&u]Mp._t{$]bBd&P`Ro>smY>|[3L:0W_#t!l%@/nF@M71.C+KH~B]K=r' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
