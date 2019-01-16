<?php
include("includes/includedFiles.php");

if(isset($_GET['id'])) {
    $playlistId = $_GET['id'];
} else {
    header("Location: index.php");
}

$playlist = new Playlist($con, $playlistId);
$owner = new User($con, $playlist->getOwner());
?>

<div class="entityInfo">
    <div class="leftSection">
        <img src="assets/images/icons/playlist.png">
    </div>

    <div class="rightSection">
        <h2><?php echo $playlist->getName(); ?></h2>
        <p>By <?php echo $playlist->getOwner(); ?></p>
        <p><?php echo $playlist->getNumberOfSongs(); ?> songs</p>
        <button class="button">DELETE PLAYLIST</button>
    </div>
</div>

<div class="trackListContainer">
    <ul class="trackList">
        <?php
        $songIdArray = array(); //$album->getSongIds();
        $i = 1;

        foreach($songIdArray as $songId) {
            $albumSong = new Song($con, $songId);

            $albumArtist = $albumSong->getArtistId();

            echo "<li class='trackListRow'>
                    <div class='trackCount'>
                        <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"". $albumSong->getId() ."\", tempPlaylist, true)'>
                        <span class='trackNumber'>$i</span>
                    </div>
                    
                    <div class='trackInfo'>
                        <span class='trackName'>" . $albumSong->getTitle() . "</span>
                        <span class='artistName'>" . $albumArtist->getName() . "</span>
                    </div>
                    
                    <div class='trackOptions'>
                        <img class='optionsButton' src='assets/images/icons/more.png'>
                    </div>
                    
                    <div class='trackDuration'>
                        <span class='duration'>" . $albumSong->getDuration() . "</span>
                    </div>
                    
                  </li>";

            $i++;
        }

        ?>

        <script>
            var tempSongIds = '<?php echo json_encode($songIdArray)?>';
            tempPlaylist = JSON.parse(tempSongIds);
        </script>

    </ul>
</div>