<?php
define( 'WP_CACHE', true ); // Added by WP Rocket
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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "phukien_db" );

/** MySQL database username */
define( 'DB_USER', "root" );

/** MySQL database password */
define( 'DB_PASSWORD', "" );

/** MySQL hostname */
define( 'DB_HOST', "localhost" );

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
define( 'AUTH_KEY',         'B{/-yohf<qIUuN:t;zgxKOg|BHtIQ)m%fAqV{Q6.E.yhA.K_#l*+Kr`Vi_k:|W~`' );
define( 'SECURE_AUTH_KEY',  'o&vj<kE}~zr<y^/;x5lvAK}!Ah,cG02|H(c#zQGSEvNG&;^A20n,~VvGy}`-*cZf' );
define( 'LOGGED_IN_KEY',    ':SWX#<|;<;SnGrmQes~(A,$}#5 May#d*]?[^ilyC@=DoYq=Lc]tj6492cN0n387' );
define( 'NONCE_KEY',        'z3rJZql_JQd4R&yXU{igmhEIr&OzNh3aW~H$qqIluB59?4|yL/]Cqn]F=hys9azk' );
define( 'AUTH_SALT',        '8AG3RMH{Zqy{RbBqG;N ZM(You~{r#k5C!xCm&uQW#4Y2,S4 cW(qAuYnteeg.xf' );
define( 'SECURE_AUTH_SALT', ' 9st3eNQ{fb.C?T?/g17D)__*_clX]SP~@,I&qc Li;#<n4l0`{];*G0(^5&uEO ' );
define( 'LOGGED_IN_SALT',   'NqnH8JZD)HBZ=+k?C m`B[3t9iLQH?wP?t>rij8Fd`?Dg7TJ&_g1$|B)G*8gf|Qi' );
define( 'NONCE_SALT',       'BVTh ||{Bu.8K`[]0NtWx!h**dc=TcrB9lY,ie6QN~ppQU%oUDH|gXwE]H1wd-M`' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
