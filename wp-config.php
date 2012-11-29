<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'of');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'k+%}k8H!NdWSwq$#WHVa~sC3ZvH9V!I=qWLfB-lAMmmaoeB_3Ss>ywBeE1},=c=)');
define('SECURE_AUTH_KEY',  'lahWz&c>4XUkx^D[rDqhqkJADuZgtP}0)^Q v#cqICODjY^zf1#iXrp+ tL|~i}$');
define('LOGGED_IN_KEY',    'k.Kbe1&:x4}Co@u.8]$B:y[MrmCsDk}]X&/Ia~3>..AgU;HDh?~pjz#]k(2d+R`]');
define('NONCE_KEY',        'I=^7K3qa~6^Gg~1s>1Y)+m[,LA@h/C+Up$Mz)I6h&x<-*I5bXTfV,30r5}NtBojb');
define('AUTH_SALT',        '0<HooOL%J,,<*~c6AUZ+gUG.XQsM;1v)oEJ`S=d=q+Dg)!LzEBWae~&POZiuA!IP');
define('SECURE_AUTH_SALT', 'n)F3OBRO(;$$bjggJMV;&7dAaFfC_bT,2Q}7f=!l=:1%X2@)[ l?WeLs~I2ZA9M*');
define('LOGGED_IN_SALT',   'F5.Pf%_y`U5L~aw 9,/uxH_J6ygn>Z28.&4Yg&<}9.;{,E?4@gGvr{*&!@.d}hzb');
define('NONCE_SALT',       'L5V$=0~@oLU7N0JiRnykP3rp17O4Z)k&v,-j)p>/FvD)+X8qp(PL W]FN7&1BU:t');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
