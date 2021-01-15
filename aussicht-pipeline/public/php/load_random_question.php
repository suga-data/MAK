 <!-- ------------ READ QUESTIONS VIA PHP ------------ -->
 
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

<style>
    
    .lp-title {
        color: white;
        position: static;
        font-family: '2070';
        font-weight: 300;
        font-size: 100pt;
        display: grid;
        margin: 20px;
        grid-template-columns: auto;
        grid-template-rows: auto;
        line-height: 1;
        margin-bottom: 300px;
    }

    .typewriter {
        background-color: white;
        color: black;
        padding-right: 20px;
        border-style: solid;
        border-color: white;
        font-family:'Courier New', Courier, monospace;
    }

    .lp-title p {
        font-family: '2070';
    }

</style>



<!-- ------------ html load igpt images ------------  -->

<div class="lp-title" id="top">

    <p>
    <span class="typewriter" id="type-questions" ></span> Aus heutiger Sicht. Diskurse <br> über Zukunft.<br>
    12.03.-16.03
    </p>

</div>


 <!-- ------------ create type effect and project it to the mark tag above  ------------  -->

<script class="typewriter">

    document.addEventListener('DOMContentLoaded',function(event){
        
        var dataText = [
            <?php echo $one_item["question"]; ?>
            // "Aber was wäre, wenn wir die Uhr zurückdrehen könnten?",
            // "Wie sollten Sie ein Produkt und eine darauf basierende Dienstleistung entwerfen?",
            // "Wie können wir uns von den Glaubenssystemen der herrschenden Klassen zu denen der Mittelschichten bewegen?",
            // "Welcher Zweck und welche Funktion hat ein Farbstoff?",
            // "Wie können wir diesen Abgrund an Verschwendung vermeiden?",
            // "Wie sollten Sie es schreiben?",
            // "Warum schaffen wir ein neues Ideal?",
            // "Sollten wir alle so töricht sein?",
            // "Warum sollen wir glauben, dass die Bedingungen, die große Pandemie von 1918 verursachten?"
        ];

        // types one text in the typewriter
        // keeps calling itself until the text is finished
        function typeWriter(text, i, fnCallback) { 
            
            // checks if the text isn't finished yet, and add next character
            if (i < (text.length)) {
                
                // document.querySelector("span").innerHTML = text.substring(0, i+1) +'<span aria-hidden="true"></span>';
                document.getElementById("type-questions").innerHTML = text.substring(0, i+1) +'<span aria-hidden="true"></span>';

                // wait for a while and call this function again for the next character
                setTimeout(function() {
                    typeWriter(text, i + 1, fnCallback)
                }, 100);
            }
            
            // when text is finished, call the callback function again
            else if (typeof fnCallback == 'function') {    
                
                // call callback after timeout
                setTimeout(fnCallback, 10000);
            }
        }
        
        // start animation for the text in the dataText array
        function StartTextAnimation(i) {
            if (typeof dataText[i] == 'undefined'){
                setTimeout(function() {
                    StartTextAnimation(0);
                }, 2000);
            }
            
            // if dataText[i] exists, start animation
            if (i < dataText[i].length) {
                
                typeWriter(dataText[i], 0, function(){
                    
                    // after callback (and whole text has been animated), start next text
                    StartTextAnimation(i + 1);
                });
            }
        }
        StartTextAnimation(0);
    });
        
</script>
