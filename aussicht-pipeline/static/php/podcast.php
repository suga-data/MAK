<?php
// load external xml file
$url = "/Users/arminarndt/Documents/1_EgoZen/git-websites/mak-website/mak/aussicht-pipeline/static/js/anchor_podcast_rss.xml";
$author = "Off_line";
//$url = "https://anchor.fm/s/3b4cd0ac/podcast/rss";
$xml_file = simplexml_load_file($url);
//print_r($xml_file);


// address the item array
$item_array = $xml_file->channel->item;


// read length of item array
$length_of_item_array = count($item_array)-1;
//print_r($length_of_item_array."\n");

for($i = 0; $i <= $length_of_item_array; $i++){

    $raw_title = $xml_file->channel->item[$i]->title;
    $podcast_number = strtok($raw_title, " ");
    $title = substr(strstr($raw_title," "), 1);
    // print_r($raw_title."\n");
    //print_r($podcast_number."\n");
    //print_r($title."\n");

    $raw_date = $xml_file->channel->item[$i]->pubDate;
    $date = substr(strstr($raw_date," "), 1, -13);
    // print_r($raw_date."\n");
    //print_r($date."\n");

    $mp3_url = $xml_file->channel->item[$i]->enclosure->attributes()->url;
    //print_r($mp3_url."\n");

    $mp3_length = $xml_file->channel->item[$i]->enclosure->attributes()->length;
    //print_r($mp3_length."\n\n\n");




    // create AUDIO FILE LIST

    // if ($i == 0){
    //     echo "<div id='audio_files'>\n";
    // }else{}

    // echo "<audio id='" . $podcast_number . "' class='podcast_audio_files' controls='controls' preload='none'>";
    // echo "<source src='" . $mp3_url  . "' type='audio/mpeg' /></audio>\n";

    // if ($i == $length_of_item_array){
    //     echo "</div>\n";
    // }else{}





    // create TRACK LIST
    if ($i == 0){
        echo "<ul id='podcast_track_list'>\n";
    }else{}

    // echo "<div class='player-controls play' id='podcast_list_object_" . $podcast_number . "'>\n";
    // echo "<span class='track_name podcast_play_pause_icon'>►</span>\n";
    // echo "<span class='track_name track_number' id='track_name_number_" . $i ."'>" . $podcast_number . "</span>\n";
    // echo "<span class='track_name'>Off_line</span>\n";
    // echo "<span class='track_name track_name_title' id='track_name_" . $i . "'>" . $title . "</span>\n";
    // echo "<span class='track_name podcast_date'>" . $date . "</span>\n</div>";
            
    if ($i == $length_of_item_array){
        echo "</ul>\n";
    }else{}

}
?>