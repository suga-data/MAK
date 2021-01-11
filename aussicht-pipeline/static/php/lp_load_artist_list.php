<?php
// JSON DATABASE CALL 
// JSON DATABASE CALL
// JSON DATABASE CALL 
// JSON DATABASE CALL
// JSON DATABASE CALL 

// Get the contents of the JSON file 
$strJsonFileContents = file_get_contents("/Users/arminarndt/Documents/1_EgoZen/git-websites/mak-website/mak/aussicht-pipeline/static/json/artist_list.json");
// Convert to array 
$array = json_decode($strJsonFileContents, true);
// count of the artist on top level (group members are not counted)- How long is the list
$amount_of_artist = count($array) - 1;
//print_r ("amount of artist:" . $amount_of_artist . "\n");


for ($i = 0; $i <= $amount_of_artist; $i++) {
    $object = $i;
    CreateHTML($object);
}

function CreateHTML($object) {
    // JSON DATABASE CALL 
    // JSON DATABASE CALL
    // JSON DATABASE CALL 
    // JSON DATABASE CALL
    // JSON DATABASE CALL 

    // Get the contents of the JSON file 
    $strJsonFileContents = file_get_contents("/Users/arminarndt/Documents/1_EgoZen/git-websites/mak-website/mak/aussicht-pipeline/static/json/artist_list.json");

    // Convert to array 
    $array = json_decode($strJsonFileContents, true);

    // count of the artist on top level (group members are not counted)- How long is the list
    //$amount_of_artist = count($array) - 1;
    //print_r ("amount of artist:" . $amount_of_artist . "\n");

    // display the hole RAW database
    //print_r ($array);




    // LOOP though the ARTIST LIST and receive single NAME
    // LOOP though the ARTIST LIST and receive single NAME
    // LOOP though the ARTIST LIST and receive single NAME
    // LOOP though the ARTIST LIST and receive single NAME
    // LOOP though the ARTIST LIST and receive single NAME

    // receive DATA from ARTIST or GROUP
    // receive DATA from ARTIST or GROUP
    // receive DATA from ARTIST or GROUP
    // receive DATA from ARTIST or GROUP
    // receive DATA from ARTIST or GROUP

    // display name
    $artist_name = $array[$object]["name"];
    //print_r ($artist_name . "\n");

    // display folder 
    $folder = $array[$object]["folder"];
    //print_r ($folder . "\n");
    //print_r ($array[$object]["members"]);

    // count the elements of the MEMBERS array 
    $amount_of_members = count($array[$object]["members"]);
    //print_r($amount_of_members . "\n");


    // call MEMBERS of a GROUP
    // call MEMBERS of a GROUP
    // call MEMBERS of a GROUP
    // call MEMBERS of a GROUP
    // call MEMBERS of a GROUP
    for ($i = 0; $i < $amount_of_members; $i++) {    
        $name_of_member = $array[$object]["members"][$i]["membername"];
        //print_r ($name_of_member . "\n");

        $member_folder = $array[$object]["members"][$i]["memberfolder"];
        //print_r ($member_folder . "\n");
    } 








    // HTML HTML HTML HTML HTML 
    // HTML HTML HTML HTML HTML 
    // HTML HTML HTML HTML HTML 
    // HTML HTML HTML HTML HTML
    // HTML HTML HTML HTML HTML 

    // prepareing ID names without QUOTATION
    $parent_artist_names = "parent_artist_names_" . $folder; 
    $child_artist_list_images_divs = "child_artist_list_images_divs_" . $folder;
    $artist_list_images_imgs = "artist_list_images_imgs_" . $folder;
    $blank_div_simulating_loading = "blank_div_simulating_loading_" . $folder;
    $artist_list_empty_div_pushing_the_name = "artist_list_empty_div_pushing_the_name_" . $folder;
    $child_artist_list_name = "child_artist_list_name_" . $folder;
    $child_artist_list_hovers = "child_artist_list_hovers_" . $folder;

    // prepareing ID names with QUOTATION
    $parent_artist_names_QUOTAION = "'" . $parent_artist_names . "'"; 
    $child_artist_list_images_divs_QUOTAION = "'" . $child_artist_list_images_divs . "'";
    $artist_list_images_imgs_QUOTAION = "'" . $artist_list_images_imgs . "'";
    $blank_div_simulating_loading_QUOTAION = "'" . $blank_div_simulating_loading . "'";
    $artist_list_empty_div_pushing_the_name_QUOTAION = "'" . $artist_list_empty_div_pushing_the_name . "'";
    $child_artist_list_name_QUOTAION = "'" . $child_artist_list_name . "'";
    $child_artist_list_hovers_QUOTAION = "'" . $child_artist_list_hovers . "'";

    // prepare onmouseenter and onmouseleave 
    $onmouseevents = "'#" . $blank_div_simulating_loading . "', '#" . $artist_list_empty_div_pushing_the_name  . "', '#" . $parent_artist_names  . "', '#" . $child_artist_list_images_divs . "'";
    //echo $onmouseevents;

    // prepare IMAGE ROOT DIRECTORY
    $basicROOT ="'imgs/image_gpt/" . $folder . "/generated/32x32/32_" . $folder . "_0.png'";
    //echo $basicROOT;


    // 1. DIV -- parent_artist_names --
    echo "<div id=";
    echo $parent_artist_names_QUOTAION;
    echo "class='parent_artist_names'";
    echo 'onmouseenter="hover_arist_name(';
    echo $onmouseevents;
    echo ')" onmouseleave="hover_arist_name(';
    echo $onmouseevents;
    echo ')">';

    echo "\n\n";

    // 2. DIV -- child_artist_list_images_divs --
    echo "<div id=";
    echo $child_artist_list_images_divs_QUOTAION;
    echo "class='child_artist_list_images_divs'>";

    echo "\n\n";

    // 3. DIV -- artist_list_images_imgs --
    echo "<img class='artist_list_images_imgs' src=";
    echo $basicROOT;
    echo "style='width:32px; height: 32px; display: none'>";

    echo "\n\n";

    // 4. DIV -- blank_div_simulating_loading --
    echo "<div id=";
    echo $blank_div_simulating_loading_QUOTAION;
    echo "style='visibility: hidden; position: fixed; left: 0px; width:32px; height: 32px; display: none; background-color: blue";
    echo "'></div>";

    echo "\n\n";

    // 5. DIV -- artist_list_empty_div_pushing_the_name --
    echo "<div id=";
    echo $artist_list_empty_div_pushing_the_name_QUOTAION ;
    echo "class='artist_list_empty_div'";
    echo "style='width:0px; height: 32px; display: none'";
    echo "></div>";

    echo "\n\n";

    // 5. DIV -- artist_list_empty_div_pushing_the_name --
    echo "<div style='width:0px; height: 0px; display: none'></div>";
    echo "\n";
    echo "<div style='width:0px; height: 0px; display: none'></div>";

    echo "\n\n";

    // 6. no DIV just ARTIST NAME 1
    echo $artist_name;
    echo "</div>";

    echo "\n\n";

    // 7. DIV -- artist_list_empty_div_pushing_the_name --
    echo "<div id=";
    echo $child_artist_list_name_QUOTAION;
    echo "class='child_artist_list_names'>";
    echo $artist_name;
    echo "</div>";

    echo "\n\n";

    // 8. DIV -- child_artist_list_hovers --
    echo "<div id=";
    echo $child_artist_list_hovers_QUOTAION;
    echo "class='child_artist_list_hovers'></div>";

    echo "\n\n";

    // 9 CLOSING DIV
    echo "</div>";
}
?> 