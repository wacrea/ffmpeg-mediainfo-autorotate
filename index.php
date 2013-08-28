<?php
	function rightOrientationVideo($video_path, $hash) {
    	
    	// Get current video orientation
    	$cmd_getOrientation =  'mediainfo '.$video_path.' | grep Rotation';
    	$currentOrientation = exec($cmd_getOrientation);
    	$currentOrientation = filter_var($currentOrientation, FILTER_SANITIZE_NUMBER_INT);
    	
    	switch ($currentOrientation) {
		    case 90:
		    	
		    	$cmd_rotate = 'ffmpeg -i '.$video_path.' -vf transpose=1 '.$hash.'_rotate.MOV';
		        exec($cmd_rotate);
		        
		        $final_file = $hash.'_rotate.MOV';

		        break;
		    case 180:
		        
		        $cmd_rotate = 'ffmpeg -i '.$video_path.' -vf transpose=1,transpose=1 '.$hash.'_rotate.MOV';
		        exec($cmd_rotate);
		        
		        $final_file = $hash.'_rotate.MOV';
		        
		        break;
		    case 270:
		    
		    	$cmd_rotate = 'ffmpeg -i '.$video_path.' -vf transpose=1,transpose=1,transpose=1 '.$hash.'_rotate.MOV';
		        exec($cmd_rotate);
		        
		        $final_file = $hash.'_rotate.MOV';

		        break;
		    default:
		    	
		    	$final_file = $hash.'.MOV';
		}
		
		return $final_file;
    }
    
    var_dump(rightOrientationVideo('landscape_normal.MOV','landscape_normal'));
    //var_dump(rightOrientationVideo('landscape_inverse.MOV', 'landscape_inverse'));
    //var_dump(rightOrientationVideo('portrait_normal.MOV', 'portrait_normal'));
    //var_dump(rightOrientationVideo('portrait_inverse.MOV','portrait_inverse'));
?>