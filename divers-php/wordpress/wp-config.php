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
define( 'DB_NAME', 'wordpress' );

/** Корисничко име MySQL базе */
define( 'DB_USER', 'root' );

/** Лозинка MySQL базе */
define( 'DB_PASSWORD', '' );

/** MySQL домаћин */
define( 'DB_HOST', 'localhost' );

/** Скуп знакова за коришћење у прављењу табела базе. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '];Ijh|L)jIOE_I-]iuP,,y*ixv,7y(gedmR=)7}P EBVz-4@8:p9GU@xv@Nd3uSI' );
define( 'SECURE_AUTH_KEY',  '/C-X>|cSr{MzpI};C dNS9V ;lg^sq|ZS{?|&WLO3`m#!kW,0uYvlFHuEr${b$1t' );
define( 'LOGGED_IN_KEY',    '}FjXP58I][,E>2z]sj)5QO){`L@S^6,7Tc#FDY~iduhawj}XSFTrY1*#V1wLgqR<' );
define( 'NONCE_KEY',        '-5yFSF{l%SRf[?N[2YLGfYJp;`DC)laQCax,74G.@Yo FS%5z0?^^qyMTFCawg^z' );
define( 'AUTH_SALT',        '..Z|BXfg%^y+8lOvzOV8%4ERbQvg)Z!6isw]a(=dK4WuX/cx+jQtpADmAT/GgGOh' );
define( 'SECURE_AUTH_SALT', '7&MHG}Xr^yEBG(J<(Es@}AypiXt@qQjJ5K4/FB+OZd^r-1]Av/bi;+wqh[!=t]gE' );
define( 'LOGGED_IN_SALT',   'TrKs) (PcMR$V_yfIAl0,Vb]yUhIFy;$JKb6gl=OL5I>Hv(nkWBND8}mHO>seoN)' );
define( 'NONCE_SALT',       'U9]R-[VMxIK=6+Gd]k-Kx-2Ywd 5cxY?[TeHSTRn[~^G.yL5AN}]d)V2dCwC[=>A' );

/**#@-*/

/**
 * Префикс табеле Вордпресове базе података.
 *
 * Можете имати више инсталација Вордпреса у једној бази уколико
 * свакој дате јединствени префикс. Само бројеви, слова и доње цртице!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* То је све, престаните са уређивањем! Срећно објављивање. */

/** Апсолутна путања ка Вордпресовом директоријуму. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Поставља Вордпресове променљиве и укључене датотеке. */
require_once( ABSPATH . 'wp-settings.php' );
