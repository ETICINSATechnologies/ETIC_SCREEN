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
define( 'DB_NAME', 'ETIC_SCREEN' );

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
define( 'AUTH_KEY',         'aMi(L@,$ v7EM5/!_GHDxwfu|V,V?$COeLyjq=A*0<~ZMU/ms0IHujjkB7,savMO' );
define( 'SECURE_AUTH_KEY',  '<o{dT9!Q:o)hiP3Zi]9=PR3L-#Pa3S*X~pt${OHsG/;6sOe~hoU{=W)cO.7_L&Bj' );
define( 'LOGGED_IN_KEY',    '%=+./}ukj-(d46_X%J/IBp`x4-+vU::<W+eu]2O9vtQ.^z~1$^D:wSyv*(nC&Xci' );
define( 'NONCE_KEY',        'wW)~rV^,)#WW>e-{[{;v6CEuu1f72*-.n3t4A]TL!VAUy3eZY(=_=Q@S%;Q%eSpL' );
define( 'AUTH_SALT',        'zj+<KJbGR_uv2(X`TC,5ea5*5+/hEsU],nT)^f0qj9<3A@A[{sN)ZQA,XkOB=ei!' );
define( 'SECURE_AUTH_SALT', '5HHr]x!u//f#b@7tn=Tnt-R%uI:n|@9Xz?S>)$.p_LmK8?-,#7Z+k|Tb) owS]um' );
define( 'LOGGED_IN_SALT',   '8qDQS(Uw{e~Q4&+~O2a.`acCI?/dmfP);wuJq1;ah.%0k9yNh4:7[w))KV:g[6]C' );
define( 'NONCE_SALT',       ';Z,]4E!h=o>HZCoX7X5*EmZN27A NZLJ;iF=o}Gi.mxo!,enKOaGh+2q!^t$sF6w' );

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
