** What is it ?

It's a PHP script using ffmpeg and mediainfo auto rotate videos.

** Why ?

Because in mobile (iOS and others), the user can capture videos in 4 orientations but only one is the right one. This script get the video recorded, detect the orientation and rotate to "landscape_normal" which is the right orientation.

** How ?

This is a really simple function. It take the file, detect the orientation with mediainfo : 'mediainfo thefile.mp4 | grep Rotation' and if it's not "landscape_normal", it rotate it with ffmpeg.