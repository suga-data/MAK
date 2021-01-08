<?php 
$object = 37;

// Get the contents of the JSON file 
$strJsonFileContents = file_get_contents("/Users/arminarndt/Documents/1_EgoZen/git-websites/mak-website/mak/aussicht-pipeline/static/json/artist_list.json");

// Convert to array 
$array = json_decode($strJsonFileContents, true);

// count of the artist on top level (group members are not counted)- How long is the list
$amount_of_artist = count($array) - 1;
print_r ("amount of artist:" . $amount_of_artist . "\n");


// display the hole RAW database
//print_r ($array);

// display name
$artist_name = $array[$object]["name"];
print_r ($artist_name . "\n");


// display folder 
$folder = $array[$object]["folder"];
print_r ($folder . "\n");
//print_r ($array[$object]["members"]);

// count the elements of the MEMBERS array 
$amount_of_members = count($array[$object]["members"]);
print_r($amount_of_members . "\n");


for ($i = 0; $i < $amount_of_members; $i++) {    
    $name_of_member = $array[$object]["members"][$i]["membername"];
    print_r ($name_of_member . "\n");

    $member_folder = $array[$object]["members"][$i]["memberfolder"];
    print_r ($member_folder . "\n");
} 



?> 