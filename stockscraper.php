<?php
/**
* @package StockScrapper
*/
/*
Plugin Name: Stock Scraper
Plugin URI: https://github.com/Mannotcool/Wordpress-Stock-InfoFinder
Description: A custom-coded plugin using shortcodes to provide dynamicly updating stock prices.
Version: 1.1.0
Author: Mannotcool
Author URI: https://github.com/Mannotcool/Wordpress-Stock-InfoFinder
License: GPLv3 or later
Text Domain: StockScrapper
*/
require 'simple_html_dom.php';


//Last Stock Price
function stockwatch_last( $atts ){
$laststockname = ( $atts['stock'] );
$htmllast = file_get_html('https://www.stockwatch.com/Quote/Detail?C:' . $laststockname);
foreach ($htmllast->find('div#body div.main div.content div.qtable div#MainContent_Quote1_pQuote div#MainContent_Quote1_Table1_TableDiv table#MainContent_Quote1_Table1_Table1 tbody tr td.UpdL') as $laststock) {
    return $laststock;
   }
  }

add_shortcode( 'stockwatchlast', 'stockwatch_last' );



//Stock Change
function stockwatch_change( $atts ){
$changestockname = ( $atts['stock'] );
$htmlchange = file_get_html('https://www.stockwatch.com/Quote/Detail?C:' . $changestockname);

foreach ($htmlchange->find('div#body div.main div.content div.qtable div#MainContent_Quote1_pQuote div#MainContent_Quote1_Table1_TableDiv table#MainContent_Quote1_Table1_Table1 tbody tr td.xgreen.UpdC') as $changestock) {
    return $changestock;
   }
  }
 
add_shortcode( 'stockwatchchange', 'stockwatch_change' );




//Change Percentage
function stockwatch_changepercent( $atts ){
$perstockname = ( $atts['stock'] );
$htmlchangepercent = file_get_html('https://www.stockwatch.com/Quote/Detail?C:' . $perstockname);

foreach ($htmlchangepercent->find('div#body div.main div.content div.qtable div#MainContent_Quote1_pQuote div#MainContent_Quote1_Table1_TableDiv table#MainContent_Quote1_Table1_Table1 tbody tr. td.xsmall.UpdCP.xgreen') as $changestockpercent) {
    return $changestockpercent;
   }
  }
 
add_shortcode( 'stockwatchchangepercent', 'stockwatch_changepercent' );


//Volume
function stockwatch_vol( $atts ){
$volstockname = ( $atts['stock'] );
$htmlvol = file_get_html('https://www.stockwatch.com/Quote/Detail?C:' . $volstockname);

foreach ($htmlvol->find('div#body div.main div.content div.qtable div#MainContent_Quote1_pQuote div#MainContent_Quote1_Table1_TableDiv table#MainContent_Quote1_Table1_Table1 tbody tr. td.q-regright.UpdV') as $lastvol) {
    return $lastvol;
   }
  }
 
add_shortcode( 'stockwatchvol', 'stockwatch_vol' );



?>