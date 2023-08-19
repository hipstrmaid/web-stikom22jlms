// var player;
//     var slider = document.getElementById('slider');
//     var tooltip = document.getElementById('seek-slider-tooltip');
//     var pauseButton = document.getElementById('pause-button');
//     var volumeButton = document.getElementById('volume-button');
//     var subtitleButton = document.getElementById('subtitle-button');
//     var videoId = document.getElementById('player').getAttribute('data-video-id');

//     function onYouTubePlayerAPIReady() {
//       player = new YT.Player('player', {
//         videoId: videoId,
//         playerVars: {
//           disablekb: 1, // Disable keyboard controls
//           rel: 0, // Disable related videos
//           showinfo: 0, // Hide video title and uploader information
//           controls: 0, // Hide the player controls
//           modestbranding: 1 // Hide YouTube logo in the control bar
//         },
//         events: {
//           'onReady': onPlayerReady,
//           'onStateChange': onPlayerStateChange
//         }
//       });
//     }

//     function onPlayerReady(event) {
//       var duration = player.getDuration();

//       // Set the maximum value of the slider to the video duration
//       slider.max = duration;

//       // Add event listeners to the slider
//       slider.addEventListener('input', handleSliderInput);
//       slider.addEventListener('mousemove', handleSliderMouseMove);
//       slider.addEventListener('mouseleave', hideSliderTooltip);

//       // Add event listeners to the control buttons
//       pauseButton.addEventListener('click', handlePauseButtonClick);
//       volumeButton.addEventListener('click', handleVolumeButtonClick);
//       subtitleButton.addEventListener('click', handleSubtitleButtonClick);
//     }

//     function onPlayerStateChange(event) {
//       if (event.data === YT.PlayerState.PLAYING) {
//         setInterval(updateSliderPosition, 1000);
//       } else {
//         clearInterval(updateSliderPosition);
//       }
//     }

//     function handleSliderInput() {
//       var seekTime = slider.value;
//       player.seekTo(seekTime, true);
//     }

//     function handleSliderMouseMove(event) {
//       var sliderRect = slider.getBoundingClientRect();
//       var offsetX = event.clientX - sliderRect.left;
//       var percentage = offsetX / sliderRect.width;
//       var seekTime = player.getDuration() * percentage;

//       tooltip.textContent = formatTime(seekTime);
//       tooltip.style.left = offsetX + 'px';
//     }

//     function hideSliderTooltip() {
//       tooltip.textContent = '';
//     }

//     function updateSliderPosition() {
//       var currentTime = player.getCurrentTime();
//       slider.value = currentTime;
//     }

//     function handlePauseButtonClick() {
//       if (player.getPlayerState() === YT.PlayerState.PLAYING) {
//         player.pauseVideo();
//         pauseButton.textContent = 'Play';
//       } else {
//         player.playVideo();
//         pauseButton.textContent = 'Pause';
//       }
//     }

//     function handleVolumeButtonClick() {
//       if (player.isMuted()) {
//         player.unMute();
//         volumeButton.textContent = 'Mute';
//       } else {
//         player.mute();
//         volumeButton.textContent = 'Unmute';
//       }
//     }

//     function handleSubtitleButtonClick() {
//       // Code to toggle subtitles goes here
//       // This function can be customized based on your specific requirements
//     }

//     function formatTime(time) {
//       var minutes = Math.floor(time / 60);
//       var seconds = Math.floor(time % 60);
//       return minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
//     }

//     document.getElementById("jam").addEventListener("input", function(e) {
//         var input = e.target;
//         var value = input.value;

//         // Remove any non-digit characters
//         var digitsOnly = value.replace(/\D/g, "");

//         // Format as HH:MM
//         if (digitsOnly.length > 2) {
//             digitsOnly = digitsOnly.slice(0, 2) + ":" + digitsOnly.slice(2);
//         }

//         // Update the input value
//         input.value = digitsOnly;
//     });
