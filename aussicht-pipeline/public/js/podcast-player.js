//credits to Alex Katz, for details visit http://alexkatz.me/posts/building-a-custom-html5-audio-player-with-javascript/
var podcast_audio_files = document.getElementsByClassName("podcast_audio_files");

var playhead = document.getElementById('playhead'); // playhead
var timeline = document.getElementById('timeline'); // timeline

var sounds = document.getElementsByTagName('audio');

function playAudio(sourceID, pButton){

    var music = document.getElementById(sourceID); // id for audio element
    // console.log(sourceID);
    var duration = music.duration; // Duration of audio clip, calculated here for embedding purposes
    console.log(duration);
    var pButton = document.getElementById(pButton); // play button


    // timeline width adjusted for playhead
    var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;

    // play button event listenter
    play();
    //pButton.addEventListener("click", play);

    // timeupdate event listener
    music.addEventListener("timeupdate", timeUpdate, false);

    // makes timeline clickable
    timeline.addEventListener("click", function(event) {
        moveplayhead(event);
        music.currentTime = duration * clickPercent(event);
        console.log("listening to timeline events");
    }, false);

    // returns click as decimal (.77) of the total timelineWidth
    function clickPercent(event) {
        return (event.clientX - getPosition(timeline)) / timelineWidth;
    }

    // makes playhead draggable
    playhead.addEventListener('mousedown', mouseDown, false);
    window.addEventListener('mouseup', mouseUp, false);

    // Boolean value so that audio position is updated only when the playhead is released
    var onplayhead = false;

    // mouseDown EventListener
    function mouseDown() {
        onplayhead = true;
        window.addEventListener('mousemove', moveplayhead, true);
        music.removeEventListener('timeupdate', timeUpdate, false);
    }

    // mouseUp EventListener
    // getting input from all mouse clicks
    function mouseUp(event) {
        if (onplayhead == true) {
            moveplayhead(event);
            window.removeEventListener('mousemove', moveplayhead, true);
            // change current time
            music.currentTime = duration * clickPercent(event);
            music.addEventListener('timeupdate', timeUpdate, false);
        }
        onplayhead = false;
    }
    // mousemove EventListener
    // Moves playhead as user drags
    function moveplayhead(event) {
        var newMargLeft = event.clientX - getPosition(timeline);

        if (newMargLeft >= 0 && newMargLeft <= timelineWidth) {
            playhead.style.marginLeft = newMargLeft + "px";
        }
        if (newMargLeft < 0) {
            playhead.style.marginLeft = "0px";
        }
        if (newMargLeft > timelineWidth) {
            playhead.style.marginLeft = timelineWidth + "px";
        }
    }

    // timeUpdate
    // Synchronizes playhead position with current point in audio
    function timeUpdate() {
        var playPercent = timelineWidth * (music.currentTime / duration);
        playhead.style.marginLeft = playPercent + "px";
        if (music.currentTime == duration) {
            pButton.className = "";
            pButton.className = "play";
        }
    }

    //Play and Pause
    function play() {
    //function playAudio(){
        // start music
        if (music.paused) {

            var allPauses = document.getElementsByClassName("pause");
            for (var i = 0; i < allPauses.length; i++) {
                // allPauses.item(i).className = "";
                allPauses.item(i).className = "play";
            }

            //StopAllAudioTags();
            for(i=0; i<sounds.length; i++){
                sounds[i].pause();
            }
            music.play();
            // remove play, add pause
            pButton.className = "";
            pButton.className = "pause";
        } else { // pause music
            music.pause();
            // remove pause, add play
            pButton.className = "";
            pButton.className = "play";
        }
    }

    // Gets audio file duration
    music.addEventListener("canplaythrough", function() {
        duration = music.duration;
    }, false);

    // getPosition
    // Returns elements left position relative to top-left of viewport
    function getPosition(el) {
        return el.getBoundingClientRect().left;
    }



    // Countdown/up Audio Track Length

    // Countdown
    var audio = document.getElementById(sourceID);

    audio.addEventListener("timeupdate", function() {
        var timeleft = document.getElementById('timeleft'),
            duration = parseInt( audio.duration ),
            currentTime = parseInt( audio.currentTime ),
            timeLeft = duration - currentTime,
            s, m;
        
        s = timeLeft % 60;
        m = Math.floor( timeLeft / 60 ) % 60;
        
        s = s < 10 ? "0"+s : s;
        m = m < 10 ? "0"+m : m;
        
        timeleft.innerHTML = m+":"+s;
        
    }, false);

    // Countup
    audio.addEventListener("timeupdate", function() {
        var timeline = document.getElementById('duration');
        var s = parseInt(audio.currentTime % 60);
        var m = parseInt((audio.currentTime / 60) % 60);
        if (s < 10) {
            timeline.innerHTML = m + ':0' + s;
        }
        else {
            timeline.innerHTML = m + ':' + s;
        }
    }, false);


}



// show  Podcast list
function ShowPodcastList(){
    //alert('Sie sollten doch nicht drücken!');
    document.getElementById('podcast_track_list').style.visibility = 'visible';
    document.getElementById('podcast_track_list').style.height = 'auto';
}
// colapse  Podcast list
function CollapsePodcastList(){
    // document.getElementById('podcast_track_list').style.height = '50px';
    document.getElementById('podcast_track_list').style.visibility = 'collapse';
    document.getElementById('podcast_track_list').style.height = '0';
}