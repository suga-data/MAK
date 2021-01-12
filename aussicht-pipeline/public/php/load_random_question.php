<?php 

// Get the contents of the JSON file 
$strJsonFileContents = file_get_contents("json/question_german.json");

// Convert to array 
$array = json_decode($strJsonFileContents, true);

// Then, pick a random index:
$one_item = $array[rand(0, count($array) - 1)];

// and finally convert back to JSON:
$one_item_string = json_encode($one_item);

// echo $one_item["question"];


?> 






 <!-- ------------ Style only for the question ------------ -->

<!-- <style>
    div.question {
        position:fixed;
        width: 60%;
        height: auto;
        background-color: none;
        top: 30%;
        right: 0px;
    }
    div.above_question {
        background-color: white;
        height: 70px;
        width: 100%;
        float: right;
        position: absolute;
        top: 0;
        z-index: -1;
    }
    mark#question{
        background-color: white;
        font-family: '2070';
        font-size: 40pt;
        font-weight: 600; 
        height: 0.95em;
        line-height: 0.95em; 
        padding: 0 0.15em;  
    } 
    div.white_div_0 {
        position: fixed;
        top: 0;
        right: 0;
        height: 30%;
        width: 10%;
        vertical-align: bottom;
    }
    div.white_div_1 {
        background-color: white;
        float: right;
        height: 100%;
        width: 50%;
    }
    div.white_div_2 {
        background-color: white;
        float: right;
        height: 50%;
        width: 50%;
        bottom: 0;
    }
</style> -->

<style>
    .lp-exhibitiontext {
        color: white;
        position: static;
        font-family: '2070';
        font-weight: 300;
        font-size: 150pt;
        display: grid;
        margin: 20px;
        grid-template-columns: auto;
        grid-template-rows: auto;
        line-height: 1;
    }

    span {
        background-color: white;
        color: black;
        animation: caret 1s steps(1) infinite;
    }

</style>


 <!-- ------------ 2 white divs for layout ------------  -->

<!-- <div class="white_div_0">
    <div class="white_div_1"></div>
    <div class="white_div_2"></div>
</div> -->
 

 <!-- ------------ Load question database and choose 1 random question ------------  -->

    <!-- <div class="question">
        <div class="above_question"></div>
        <h1><mark id="question">

        
        </mark></h1>
    </div> -->



<!-- ------------ html load igpt images ------------  -->

<div class="lp-exhibitiontext" id="jump2top">
    <p>
    <span id="type-questions"></span> Aus heutiger Sicht. Diskurse über Zukunft.
    12.03.-16.03
    </p>
</div>


 <!-- ------------ create type effect and project it to the mark tag above  ------------  -->

<script class="typewriter">
        document.addEventListener('DOMContentLoaded',function(event){
            
            var dataText = [
                "<?php echo $one_item["question"]; ?>"
            ];

            function typeWriter(text, i, fnCallback) {
                
                if (i < (text.length)) {
                    
                    // document.querySelector("span").innerHTML = text.substring(0, i+1) +'<span aria-hidden="true"></span>';
                    document.getElementById("type-questions").innerHTML = text.substring(0, i+1) +'<span aria-hidden="true"></span>';

                    
                    setTimeout(function() {
                        typeWriter(text, i + 1, fnCallback)
                    }, 50);
                }
                
                else if (typeof fnCallback == 'function') {
                    
                    setTimeout(fnCallback, 700);
                }
            }
            
            function StartTextAnimation(i) {
                if (typeof dataText[i] == 'undefined'){
                    setTimeout(function() {
                        StartTextAnimation(0);
                    }, 200000);
                }
                
                if (i < dataText[i].length) {
                    
                    typeWriter(dataText[i], 0, function(){
                        
                        StartTextAnimation(i + 1);
                    });
                }
            }
            StartTextAnimation(0);
        });
    </script>
