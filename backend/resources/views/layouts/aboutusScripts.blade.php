<script>
    document.addEventListener("DOMContentLoaded", function () {
      const video = document.getElementById("heroVideo");
      const playButton = document.getElementById("playButton");

      playButton.addEventListener("click", function () {
        if (video.paused) {
          video.play();
          playButton.style.opacity = 0; // Hide play button when video plays
        } else {
          video.pause();
          playButton.style.opacity = 1;
        }
      });

      // Shows play button again when video ends
      video.addEventListener("ended", function () {
        playButton.style.opacity = 1;
      });
    });
  </script>