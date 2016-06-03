<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ab_wp_v1');

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
define('AUTH_KEY',         '|dLRRj]t%#<C$4Y=ocd:(Ja+$za 80@;qAlUWV9A)@(GU!?SKo(MKM-rlDLG+|L(');
define('SECURE_AUTH_KEY',  'FZbA(,dz{1bzFS/%Fgl=M~`V-957JeEv{cGi/z1FJhLlcZ-@*>,MzW3K?rpy*sY5');
define('LOGGED_IN_KEY',    'Y^D )rz+ SVDr&P]WUQIQl/X6T~}+5#)q+V+;j4/=+oZ@h*?kA+cr/5>YL/!B_Ua');
define('NONCE_KEY',        'hm`]L<QM1%z!}!0WBh#?4lT6y+@hh2#S>j>Ntjj4X68E@fNX<N.Y-pf/k%u)`{bp');
define('AUTH_SALT',        '<eOYp =90D$H8IEQ!?]9h.,.B;WYwUCsw+7cAwU!z[Uc)e deEw[y)!cQB+:||I`');
define('SECURE_AUTH_SALT', '{~%ULO=ru>|mVQ>V950Dj3E]`B$S>x_M2k_V-m~Ry+F|vKxV+ccxX?>jpL wZ[]I');
define('LOGGED_IN_SALT',   'I-WE[;vKC+=F1Hr#o+-&Zp|`eH6,,YxwAan%j~1W7n5%a|9t&S<My,IUeR~}S5e}');
define('NONCE_SALT',       '|8Ut}nxHP7nn/xdoC:%3L(aI|DFlf^3Pn^V}2;{JB.f}tOW:FgS=JUl:No|`y|8o');

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
