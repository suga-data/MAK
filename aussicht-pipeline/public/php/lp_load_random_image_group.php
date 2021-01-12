<?php
    $amount_of_images = 3;
    // create array from artist folder
    $ignoreList = array('cgi-bin', '.', '..', '._');
    $artist_array = array();
    if ($directory = opendir('imgs/image_gpt')) {
        while (false !== ($arti_names = readdir($directory))) {
            if (!in_array($arti_names, $ignoreList) and substr($arti_names, 0, 1) != '.') {
                array_push($artist_array, $arti_names);
            }
        }
    }
    $one_artist = $artist_array[rand(0, count($artist_array) - 1)];
    //echo $one_item;

    // create array from image-gpt files
    $image_array = array();
    if ($directory = opendir('imgs/image_gpt/' . $one_artist . '/generated/128x128')) {
        while (false !== ($filenames = readdir($directory))) {
            if (!in_array($filenames, $ignoreList) and substr($filenames, 0, 1) != '.') {
                array_push($image_array, $filenames);
            }
        }
    }
    //print_r ($image_array);
    $random_images = array_rand ( $image_array , $num = $amount_of_images );
    //print_r ($random_images);
    
    // create html code
    for ($i = 0; $i < $amount_of_images; $i++) {
        echo '<img id="thumbnail' . $i . '" src="imgs/image_gpt/';
        echo $one_artist;
        echo '/generated/128x128/';
        echo $image_array[$random_images[$i]];
        echo '" style="width:128px; height: 128px; display: none">';
        echo "\n";
    } 
?>