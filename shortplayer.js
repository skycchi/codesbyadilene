
        // initiate variables
        let track_name = document.querySelector(".songtitle");
 
        let playpause_btn = document.querySelector(".playpause-track");
        let next_btn = document.querySelector(".next-track");
        let prev_btn = document.querySelector(".prev-track");
 
 
        let track_index = 0;
        let isPlaying = false;
        let updateTimer;
        
        // create new audio element
        let curr_track = document.getElementById("music");
        
 
        function loadTrack(track_index) {
            // load a new track
            curr_track.src = track_list[track_index].path;
            curr_track.load();
            
            // update details of the track
            track_name.textContent = "playing " + (track_index + 1) + " of " + track_list.length + ": " + track_list[track_index].name;
            
            // move to the next track if the current one finishes playing 
            curr_track.addEventListener("ended", nextTrack);
        }
 
        // checks if song is playing
        function playpauseTrack() {
            if (!isPlaying) playTrack();
            else pauseTrack();
        }
 
        // plays track when play button is pressed
        function playTrack() {
            curr_track.play();
            isPlaying = true;
            
            // replace icon with the pause icon
            playpause_btn.innerHTML = '<i class="fas fa-pause"></i>';
        }
 
        // pauses track when pause button is pressed
        function pauseTrack() {
            curr_track.pause();
            isPlaying = false;
            
            // replace icon with the play icon
            playpause_btn.innerHTML = '<i class="fas fa-play"></i>';
        }
 
        // moves to the next track
        function nextTrack() {
            if (track_index < track_list.length - 1)
                track_index += 1;
            else track_index = 0;
            loadTrack(track_index);
            playTrack();
        }
 
        // moves to the previous track
        function prevTrack() {
            if (track_index > 0)
                track_index -= 1;
            else track_index = track_list.length;
            loadTrack(track_index);
            playTrack();
        }
        
        // load the first track in the tracklist
        loadTrack(track_index);