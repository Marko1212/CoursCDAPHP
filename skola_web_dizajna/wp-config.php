<?php
/**
 * Основне поставке Вордпреса.
 *
 * Ова датотека се користи од стране скрипте за прављење wp-config.php током
 * инсталирања. Не морате да користите веб место, само умножите ову датотеку
 * у "wp-config.php" и попуните вредности.
 *
 * Ова датотека садржи следеће поставке:
 * * MySQL подешавања
 * * тајне кључеве
 * * префикс табеле
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL подешавања - Можете добити ове податке од свог домаћина ** //
/** Име базе података за Вордпрес */
define( 'DB_NAME', 'skola_veb_dizajna' );

/** Корисничко име MySQL базе */
define( 'DB_USER', 'root' );

/** Лозинка MySQL базе */
define( 'DB_PASSWORD', '' );

/** MySQL домаћин */
define( 'DB_HOST', 'localhost' );

/** Скуп знакова за коришћење у прављењу табела базе. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Не мењајте ово ако сте у сумњи. */
define( 'DB_COLLATE', '' );

/**#@+
 * Јединствени кључеви за аутентификацију.
 *
 * Промените ово у различите јединствене изразе!
 * Можете направити ово користећи {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org услугу тајних кључева}
 * Ово можете променити у сваком тренутку да бисте поништили све постојеће колачиће.
 * Ово ће натерати кориснике да се поново пријаве.
 *
 * @since 2.6.0
 */
	define('AUTH_KEY',         'T?-R,Ia=9{55Zo_:1-$kq eS^^,- >Mu5/PD1/YU}D||&jMuq1BI6]W9{K`V|M;8');
	define('SECURE_AUTH_KEY',  'E2hc[zv<<9.Wy;To ,Y#yhtez>Cr.Ar9{[(_I(: 3:|@QxhoA.wCe$yA6Pq2S$#2');
	define('LOGGED_IN_KEY',    'PMFl~)G<||C}el++e~S<5zKMjA.wq<GqDD&H+(*0}L[}{(eGSIInr4kLN++2-#&0');
	define('NONCE_KEY',        '-a+z<7FF<*|?]t22;`9_i4hz|k!AoDMu:uMYRHLU,T!%?~`+ }64+;9s9GYkS+[T');
	define('AUTH_SALT',        '+.ck-x?<F-=l$m((UR%&f9(]A -=Ju<dWil:sdEGs``[sJy_6nTV6ulgF2ae/[lA');
	define('SECURE_AUTH_SALT', '<[Wv|k-+Fh:Lk<hAEfC[+vJ(YZ?HqCSK]w:Rp{tzKdWXN=4 6S;r0lKZwvjlqOk(');
	define('LOGGED_IN_SALT',   'xAS9A:ev1bFz!CL^ BpLZ~7cV;0#q{g4q8OoEz+ar#2|]wq9PEneaQ_AX=%ZK05:');
	define('NONCE_SALT',       '>!8,RUGp:m:NdL]}8Q,=|1+-h`t,-2MK-}-!jG>;W935]pLsZn1Lsl/{B}NJtM`!');

/**#@-*/

/**
 * Префикс табеле Вордпресове базе података.
 *
 * Можете имати више инсталација Вордпреса у једној бази уколико
 * свакој дате јединствени префикс. Само бројеви, слова и доње цртице!
 */
$table_prefix = 'svd_';

/**
 * За градитеље: исправљање грешака у Вордпресу ("WordPress debugging mode").
 *
 * Промените ово у true да бисте омогућили приказ напомена током градње.
 * Веома се препоручује да градитељи тема и додатака користе WP_DEBUG
 * у својим градитељским окружењима.
 *
 * За више података о осталим константама које могу да се
 * користе током отклањања грешака, посетите Документацију.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );

/* То је све, престаните са уређивањем! Срећно објављивање. */

/** Апсолутна путања ка Вордпресовом директоријуму. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Поставља Вордпресове променљиве и укључене датотеке. */
require_once( ABSPATH . 'wp-settings.php' );
