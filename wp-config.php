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
define('DB_NAME', 'hdsllc');

/** MySQL database username */
define('DB_USER', 'hdsllc_user');

/** MySQL database password */
define('DB_PASSWORD', '---');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'HGoG6B[_F~j^*89~jz&pv[y0oS9[k/cBooQ*yH;%r&>.9t$~v#AiNps**A|-*/ju');
define('SECURE_AUTH_KEY',  ';!d^5KNlaKrg0Bz>:_~R}p4F`^-2|d`D98~Trq]mQT,icc|/+ <_kiP=~D4{(U!(');
define('LOGGED_IN_KEY',    'S.]kFUaSTj~d%OptQ4kTm]b2IXpsVe9-X-^}Sgf^@xNJmPSd!kN_n-F%i+9%|sJ*');
define('NONCE_KEY',        'O-S9*eaX{+vJTzjQr(:7yC7yX7OkSV->g<_+y%mr1|IADcl^0Wr[l%pPy0r_I#$_');
define('AUTH_SALT',        '7gd5}u_tC]G}j15SsF]U,81<r/j=|ea{UM6Qjk$eZ0xMU3z@3E1qwCkL1U|yuq@A');
define('SECURE_AUTH_SALT', '&^g*gqzCS%5q(WoL+a$NB2jU@kPMU@gIARL3#V^Fa?sTsgi`#UPPiodagu3*u$V*');
define('LOGGED_IN_SALT',   'tJx18]AlI13F~U2tX%*!JPuJ%./wP)O6bxV*$iMyFE8f|P(>-nb?8sW[G::[-$(]');
define('NONCE_SALT',       '8Cq,2?7kKr]icp-k.fxw5P_ZUbaK_|cSFHY+]85XILo%QHnK?&QH)KdzuxR|2!OT');

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
