<?php
// load external xml file
// $url = "/Users/arminarndt/Documents/1_EgoZen/git-websites/mak-website/mak/aussicht-pipeline/static/js/anchor_podcast_rss.xml";
$author = "Off_line";
$url = "https://anchor.fm/s/3b4cd0ac/podcast/rss";
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
    print_r($podcast_number."\n");
    print_r($author."\n");
    print_r($title."\n");

    $raw_date = $xml_file->channel->item[$i]->pubDate;
    $date = substr(strstr($raw_date," "), 1, -13);
    // print_r($raw_date."\n");
    print_r($date."\n");

    $mp3_url = $xml_file->channel->item[$i]->enclosure->attributes()->url;
    print_r($mp3_url."\n\n\n");

}
?>