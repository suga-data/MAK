function hover_arist_name(id_blue_div, id_empty_spacing_div, id_parent, id_child){
    var loading_speed = 100;
    var deloading_speed = 100;
    var kids = [].reverse.call($(id_child).children());
    //$('#' + id_blue_div).css('display', 'block');


    startLoadingImages();

    function stopLoadingImages(){
        $.each(kids, function (i, kid) {
            setTimeout(function () {
                $(kid).css('display', 'none');
                
                //$('#' + id_empty_spacing_div).css('width', '0px');
                //$('#' + id_blue_div).css('display', 'none');

            }, i * deloading_speed);
        })

    }

    function startLoadingImages(){
            $.each(kids, function (i, kid) {
                setTimeout(function () {
                    var isHovered = $(id_parent).is(':hover'); // returns true or false
                    if (isHovered == true) {
                        console.log('display i:' + i );
                        //console.log('continue mouseenter function');
                        $(kid).css('display', 'inline-block');
                        if ( i = kids.length ) {
                            setTimeout(function () {

                                console.log('display kids length:' + kids.length );

                                $('#' + id_empty_spacing_div).css('display', 'inline');
                                $('#' + id_empty_spacing_div).css('width', '100%');

                                console.log('change spacing div ');
                            }, loading_speed * kids.length);
                        } else { 
                        }
                    } else {
                        stopLoadingImages();
                    }
                }, i * loading_speed);
            })
    }
}