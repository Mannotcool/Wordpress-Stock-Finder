<?php
require 'simple_html_dom.php';

$htmlTmp = file_get_html('https://www.stockwatch.com/Quote/Detail?C:EU.V');

foreach ($htmlTmp->find('div#body div.main div.content div.qtable div#MainContent_Quote1_pQuote div#MainContent_Quote1_Table1_TableDiv table#MainContent_Quote1_Table1_Table1 tbody tr.Upd.UpdCEU- td.UpdL') as $meta) {
    echo $meta;
}

?>
