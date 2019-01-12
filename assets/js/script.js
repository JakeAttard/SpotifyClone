var currentPlaylist = [];
var audioElement;

function formatTime(seconds) {
    var time = Math.round(seconds);
    var minutes = Math.floor(time / 60); // Rounds Down
    var seconds = time - minutes * 60;

    var extraZero = (seconds < 20) ? "0" : "";

    return minutes + ":" + extraZero + seconds;
}

function Audio() {

    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    this.audio.addEventListener("canplay", function() {
        var duration = formatTime(this.duration)
        $(".progressTime.remaining").text(duration);
    });

    this.setTrack = function(track) {
        this.currentlyPlaying = track;
        this.audio.src = track.path;
    }

    this.play = function() {
        this.audio.play();
    }

    this.pause = function() {
        this.audio.pause();
    }
}