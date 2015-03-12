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
define('DB_NAME', 'test_db1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '2en]cavE9$Q%S9g`+k;(>B(jm,&42.Am u|1EpYo3qzUbKrlC>*NL Y`$a2)!,C|');
define('SECURE_AUTH_KEY',  '8Vjz@&A_mQ-v)w|+#:xmG-X;bI?e*Lq.V_Q81TztHeWgRe~k-e@SnQG)9S^fAl[;');
define('LOGGED_IN_KEY',    'BfpD|F+H1{yo_(nXmX-`(=JN-6rvhQ:L0~y(@$I4dlvbHjtR>KwhFB6H1{8x!WT/');
define('NONCE_KEY',        'aMQWl^G]8b%H:WKpT&xL+|Qe=sm26`AhW1_[zYlbdd_ZJSDd;#uuD. f|4hxBAk^');
define('AUTH_SALT',        ',wG 3|@bvLmT&gdmZpzD-d,F~|h7c{ x4B{n?Ad.%-t7weoxt4x*<}X6){Lu|]eI');
define('SECURE_AUTH_SALT', '*0c4jE}v_VgS3}@;Z$P<6kg+o).i?olfK%ruO!AN(pMiW-j_D;jMG.-Lgp7jd<S<');
define('LOGGED_IN_SALT',   'FWAR@MW7V|tNrr^6/)V:F/o|v:KZjy=o+^MJ.</QVgvTB$hR1]F2Q$W6?6~U]I]E');
define('NONCE_SALT',       'B=WP+y2GvDkhfY|^KHOiUF];03|T-xIR{P;PO5gRW*@Qj#g8H-xWGBi+PcJ2<aM%');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
