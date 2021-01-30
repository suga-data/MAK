<?php
// load external xml file
// $url = "/Users/arminarndt/Documents/1_EgoZen/git-websites/mak-website/mak/aussicht-pipeline/static/js/anchor_podcast_rss.xml";
$url = "https://anchor.fm/s/3b4cd0ac/podcast/rss";
$xml_file = simplexml_load_file($url);
// print_r($xml_file);




// address the item array
$item_array = $xml_file->channel->item;


// read length of item array
$length_of_item_array = count($item_array)-1;
print_r($length_of_item_array."\n");


for($i = 0; $i <= $length_of_item_array; $i++){
    // tracking number
    $tracking_number = $i;
    print_r("tracking_number:".$tracking_number."\n");

    $title = $single_item = $xml_file->channel->item[$i]->title;
    print_r($title."\n");
    $mp3_url = $single_item = $xml_file->channel->item[$i]->enclosure->attributes()->url;
    print_r($mp3_url."\n\n\n");
    
}
?>