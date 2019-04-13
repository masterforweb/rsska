<?php

/**
 * RSSka: rss generated content: yandex news, yandex zen
 *
 * @copyright Copyright (c) 2010-19 Andrey Delfin (@masterforweb)
 *
 * A copy of the Apache License, Version 2.0, is provided with this distribution
 *
 */


/**

 *
 * A copy of the Apache License, Version 2.0, is provided with this
 * distribution
 *
 * @param tempale (yandex, zen)
 *
 * @param source (array)
 * @return array
 *
 */

function rsska_kuri($template, $source = null){


    $currdir =  dirname( __FILE__ );


    if ($source == null) {
        if (isset($_POST['data']))
            $source = json_decode($_POST['data']);
        else {
            return array('data' => 'no data');
        }
    }


    if (!defined(RSSKA)) {
        $currdir = dirname(__FILE__).'/';
    }
    else {
        $currdir = RSSKA;
    }



    require $currdir.'libs/filter.php';
    require $currdir.'libs/utf8_ents.php';
    require $currdir.'libs/U2RFC822_modifier.php';
    require $currdir.'libs/CDATA_modifier.php';
    require $currdir.'libs/htmllite.php';
    require $currdir.'libs/date_W3C.php';
    require $currdir.'libs/date_ISO_8601.php';

    $fview = $currdir.'views/'.$view.'.phtml';


    if (file_exists($fview)) {
        $result = view($fview, array('main' => $main, 'items' => $items));
        return $result;
    }


}