<script>
    function hover_arist_name(id_blue_div, id_empty_spacing_div, id_parent, id_child){
        var loading_speed = 100;
        var deloading_speed = 50;
        var timer_spacing_div = null;
        var kids = [].reverse.call($(id_child).children());
        var kids_array_length = kids.length - 1;

        //$(id_blue_div).css('visibility', 'visible');
        console.log('display kids length:' + kids.length );
        console.log('display kids length ----1111:' + kids_array_length );
        var isHovered = $(id_parent).is(':hover'); // returns true or false
        
        if (isHovered == true) {
            startLoadingImages();
        } else { 
            stopLoadingImages();
        }

        function stopLoadingImages(){
            $.each(kids, function (i, kid) {
                setTimeout(function () {
                    clearTimeout(timer_spacing_div);

                    $(id_blue_div).css('visibility', 'hidden');
                    $(id_blue_div).css('display', 'none');
                    $(kid).css('display', 'none');
                    
                    $(id_empty_spacing_div).css('display', 'none');
                    $(id_empty_spacing_div).css('width', '0px');
                    

                }, i * deloading_speed);
            })
            
        }

        function startLoadingImages(){
                $.each(kids, function (i, kid) {
                    setTimeout(function () {
                        var isHovered_now = $(id_parent).is(':hover'); // returns true or false
                        if (isHovered_now == true) {
                            console.log('display i:' + i );
                            //console.log('continue mouseenter function');
                            $(kid).css('display', 'inline');
                            if ( i = kids_array_length ) {
                                SetTimerForSpacingDiv();
                                function SetTimerForSpacingDiv() {
                                    console.log('welcome to the finel loop' + i );
                                    timer_spacing_div = window.setTimeout(function () {
                                        console.log('inside the final loop' + i );
                                        console.log(kids_array_length);
                                        $(id_empty_spacing_div).css('display', 'inline-block');
                                        $(id_empty_spacing_div).css('width', '100%');
                                        $(id_blue_div).css('visibility', 'hidden');
                                    }, loading_speed * kids_array_length);
                                }
                            } else { }
                        } else { stopLoadingImages();}
                    }, i * loading_speed);
                })
        }
    }
</script>