function hover_arist_name(id_parent, id_child){
    var loading_speed = 100;
    var deloading_speed = 100;
    var kids = [].reverse.call($(id_child).children());
    
    var isHovered = $(id_parent).is(':hover');
    if (isHovered == true) {
        //console.log('load');
        startLoadingImages();
    } else {
        //console.log('delete');
        stopLoadingImages();
    }

    function stopLoadingImages(){
        $.each(kids, function (i, kid) {
            setTimeout(function () {
                $(kid).css('display', 'none');
            }, i * deloading_speed);
        })
    }

    function startLoadingImages(){
        $.each(kids, function (i, kid) {
            setTimeout(function () {
                var isHovered = $(id_parent).is(':hover'); // returns true or false
                if (isHovered == true) {
                    //console.log('display i:' + i );
                    $(kid).css('display', 'inline-block');
                } else {
                    //stopLoadingImages();
                    //console.log('stop loading:' + i );
                }
            }, i * loading_speed);
        })
    }
}