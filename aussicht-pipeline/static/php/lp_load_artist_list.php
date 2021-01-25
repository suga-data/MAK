<?php
// Ö Ä Ü ß --> Oe Ae Ue ss
//
// http://www.marcokrings.de/arrays-sortieren-mit-umlauten/
//
// function ArraySort($tArray) {
//     $aOriginal = $tArray;
//     if (count($aOriginal) == 0) { return $aOriginal; }
//     $aModified = array();
//     $aReturn   = array();
//     $aSearch   = array("Ä","ä","Ö","ö","Ü","ü","ß","-");
//     $aReplace  = array("Ae","ae","Oe","oe","Ue","ue","ss"," ");
//     foreach($aOriginal as $key => $val) {
//         $aModified[$key] = str_replace($aSearch, $aReplace, $val);
//     }
//     natcasesort($aModified);
//     foreach($aModified as $key => $val) {
//         $aReturn[$key] = $aOriginal[$key];
//     }
//     //print_r ($artist_surname . "\n");
//     return $aReturn;
// }


// JSON DATABASE CALL 
// JSON DATABASE CALL
// JSON DATABASE CALL 
// JSON DATABASE CALL
// JSON DATABASE CALL 

$image_gpt_directory = "/Users/arminarndt/Documents/1_EgoZen/git-websites/mak-website/mak/aussicht-pipeline/static/imgs/image_gpt/";
$subfolder_generated_directory = "/generated/64x64";

// Get the contents of the JSON file 
$url = "/Users/arminarndt/Documents/1_EgoZen/git-websites/mak-website/mak/aussicht-pipeline/static/json/artist_list.json";
$strJsonFileContents = file_get_contents($url);
// Convert to array 
$array = json_decode($strJsonFileContents, true);
// Sort by alphabet
sort($array);
// count of the artist on top level (group members are not counted)- How long is the list
$amount_of_artist = count($array) - 1;
//print_r ("amount of artist:" . $amount_of_artist . "\n");

for ($i = 0; $i <= $amount_of_artist; $i++) {
    $object = $i;
    //TestCall($object);
    CreateHTML($object, $array, $amount_of_artist);
}


function CreateHTML($object, $array, $amount_of_artist) {
    // Get the contents of the JSON file 
        //$strJsonFileContents = file_get_contents("/Users/arminarndt/Documents/1_EgoZen/git-websites/mak-website/mak/aussicht-pipeline/static/json/artist_list.json");

    // Convert to array 
        //$array = json_decode($strJsonFileContents, true);
        //$amount_of_artist = count($array) - 1;
    // Sort by alphabet
        //sort($array);
    
    // display forename
    $artist_forename = $array[$object]["forename"];
    //print_r ($artist_forename . " ");
    // display name
    $artist_surname = $array[$object]["name"];
    $artist_name = $artist_forename . " " . $artist_surname;
    //print_r ($artist_name . "\n");

    // display folder 
    $folder = $array[$object]["folder"];
    //print_r ($folder . "\n");
    //print_r ($array[$object]["members"]);

    // count the elements of the MEMBERS array 
    $amount_of_members = count($array[$object]["members"]);
    //print_r($amount_of_members . "\n");


    // call MEMBERS of a GROUP
    // for ($i = 0; $i < $amount_of_members; $i++) {    
    //     $name_of_member = $array[$object]["members"][$i]["membername"];
    //     //print_r ($name_of_member . "\n");

    //     $member_folder = $array[$object]["members"][$i]["memberfolder"];
    //     //print_r ($member_folder . "\n");
    // } 




    // loading IMAGES FILES
    // loading IMAGES FILES
    // loading IMAGES FILES
    // loading IMAGES FILES
    // loading IMAGES FILES

    // Define length of artist name
    $name_length = strlen($artist_name);
    // print_r ($name_length . "\n");

    // devide length of artist name by 2.5 
    $amount_of_images_needed = round($name_length/2);
    // print_r ($amount_of_images_needed . "\n");


    // create array from artist folder
    // $ignoreList = array('cgi-bin', '.', '..', '._');
    // $artist_array = array();
    // if ($directory = opendir('imgs/image_gpt')) {
    //     while (false !== ($arti_names = readdir($directory))) {
    //         if (!in_array($arti_names, $ignoreList) and substr($arti_names, 0, 1) != '.') {
    //             array_push($artist_array, $arti_names);
    //         }
    //     }
    // }
    //$one_artist = $artist_array[rand(0, count($artist_array) - 1)];
    //echo $one_item;

    // create array from image-gpt files
    



    // IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT
    // IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT
    // IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT
    // IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT
    // IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT IMPORTANT 

    // turn off error reporting
    error_reporting(0);
    // replace link if uploading to server: " imgs/image_gpt/ " 

    $image_array = array();
    if ($directory = opendir("/Users/arminarndt/Documents/1_EgoZen/git-websites/mak-website/mak/aussicht-pipeline/static/imgs/image_gpt/" . $folder . "/generated/64x64" )) {
        while (false !== ($filenames = readdir($directory))) {
            if (!in_array($filenames, $ignoreList) and substr($filenames, 0, 1) != '.') {
                array_push($image_array, $filenames);
            }
        }
    } else{
        // print_r ("No images found. no Folder yet?". "\n");
    }
    //print_r ($image_array);
    $random_images = array_rand ( $image_array , $num = $amount_of_images_needed );
    //print_r ($random_images);
    



    // HTML HTML HTML HTML HTML 
    // HTML HTML HTML HTML HTML 
    // HTML HTML HTML HTML HTML 
    // HTML HTML HTML HTML HTML
    // HTML HTML HTML HTML HTML 

    // prepareing ID names without QUOTATION
    $parent_artist_names = "parent_artist_names_" . $folder; 
    $child_artist_list_images_spans = "child_artist_list_images_spans_" . $folder;
    $artist_list_images_imgs = "artist_list_images_imgs_" . $folder;
    //$blank_span_simulating_loading = "blank_span_simulating_loading_" . $folder;
    //$artist_list_empty_span_pushing_the_name = "artist_list_empty_span_pushing_the_name_" . $folder;
    $child_artist_list_name = "child_artist_list_name_" . $folder;
    $child_artist_list_hovers = "child_artist_list_hovers_" . $folder;

    // prepareing ID names with QUOTATION
    $parent_artist_names_QUOTAION = "'" . $parent_artist_names . "'"; 
    $child_artist_list_images_spans_QUOTAION = "'" . $child_artist_list_images_spans . "'";
    $artist_list_images_imgs_QUOTAION = "'" . $artist_list_images_imgs . "'";
    //$blank_span_simulating_loading_QUOTAION = "'" . $blank_span_simulating_loading . "'";
    //$artist_list_empty_span_pushing_the_name_QUOTAION = "'" . $artist_list_empty_span_pushing_the_name . "'";
    $child_artist_list_name_QUOTAION = "'" . $child_artist_list_name . "'";
    $child_artist_list_hovers_QUOTAION = "'" . $child_artist_list_hovers . "'";

    // prepare onmouseenter and onmouseleave 
    //$onmouseevents = "'#" . $blank_span_simulating_loading . "', '#" . $artist_list_empty_span_pushing_the_name  . "', '#" . $parent_artist_names  . "', '#" . $child_artist_list_images_spans . "'";
    $onmouseevents = "'#" . $parent_artist_names  . "', '#" . $child_artist_list_images_spans . "'";

    //echo $onmouseevents;

    // prepare IMAGE ROOT DIRECTORY
    $basicROOT ="'imgs/image_gpt/" . $folder . "/generated/64x64/64_" . $folder . "_0.png'";
    //echo $basicROOT;

    // 0. div above each objebt -- list_object --
    echo "<div class='list_object'>";
    echo "\n\n";

    // 1. span -- parent_artist_names --
    echo "<div id=";
    echo $parent_artist_names_QUOTAION;
    echo "class='parent_artist_names'";
    echo 'onmouseenter="hover_arist_name(';
    echo $onmouseevents;
    echo ')" onmouseleave="hover_arist_name(';
    echo $onmouseevents;
    echo ')">';

    echo "\n\n";

    // 2. span -- child_artist_list_images_spans --
    echo "<span id=";
    echo $child_artist_list_images_spans_QUOTAION;
    echo "class='child_artist_list_images_spans'>";

    echo "\n";

    $check_existance_of_folder = scandir('/Users/arminarndt/Documents/1_EgoZen/git-websites/mak-website/mak/aussicht-pipeline/static/imgs/image_gpt/' . $folder );
    // 3. add Images or if no image-folder found retourn a blue div square 
    if ( empty($check_existance_of_folder) ){
        // 3.1 add blue divs instead of images -- artist_list_images_imgs --
        for ($i = 0; $i < $amount_of_images_needed; $i++) {
            echo '<div id="' . $folder .'_thumbnail' . $i . '" class= "artist_list_colored_div" ';
            echo 'style="display: none;"></div>';
            echo "\n";
        } 
    } else {
        // 3.2 add images -- artist_list_images_imgs --
        for ($i = 0; $i < $amount_of_images_needed; $i++) {
            echo '<img id="' . $folder .'_thumbnail' . $i . '" class= "artist_list_images_imgs" src="imgs/image_gpt/';
            echo $folder;
            echo '/generated/64x64/';
            echo $image_array[$random_images[$i]];
            echo '" style="width:64px; height: 64px; display: none">';
            echo "\n";
        } 
    }

    // echo "<img class='artist_list_images_imgs' src=";
    // echo $basicROOT;
    // echo "style='width:64px; height: 64px; display: none'>";

    echo "\n";

    // 4. span -- blank_span_simulating_loading --
    // echo "<span id=";
    // echo $blank_span_simulating_loading_QUOTAION;
    // echo "class='blank_span_simulating_loading' ";
    // echo "style='left: 0px; width:64px; height: 64px; display: none; background-color: blue";
    // echo "'></span>";

    // echo "\n";

    // 5. span -- artist_list_empty_span_pushing_the_name --
    // echo "<span id=";
    // echo $artist_list_empty_span_pushing_the_name_QUOTAION ;
    // echo "class='artist_list_empty'";
    // echo "style='width:0px; height: 64px; display: none'";
    // echo "></span>";

    // echo "\n";

    // 6. span -- span for better timing --
    echo "<span style='width:0px; height: 0px; display: none'></span>";
    echo "\n";
    echo "<span style='width:0px; height: 0px; display: none'></span>";

    echo "\n";

    // 7. no span just ARTIST NAME 1
    echo $artist_name;
    echo "</span>";

    echo "\n\n";

    // 8. span -- artist_list_empty_span_pushing_the_name --
    echo "<span id=";
    echo $child_artist_list_name_QUOTAION;
    echo "class='child_artist_list_names'>";
    echo $artist_name;
    echo "</span>";

    echo "\n";

    // 9. span -- child_artist_list_hovers --
    echo "<span id=";
    echo $child_artist_list_hovers_QUOTAION;
    echo "class='child_artist_list_hovers'></span>";

    echo "\n\n";

    // 10. CLOSING div
    echo "</div>";

    // 11. add KOMMA
    if ($object < $amount_of_artist){
        echo "<div class='artist_list_komma'>,</div>";
    }else{
    }
    
    // 12. CLOSING div above each objebt -- class: list_object --
    echo "</div>";

    echo "\n\n";
    echo "\n\n";
    echo "\n\n";
}
?> 



