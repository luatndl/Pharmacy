<?php

App::import('Core', 'Helper');
class AppHelper extends Helper 
{
    // Get image path (file type)
    function getFileTypeIcon($ext)
    {
        $image = "";
        $isImage = false;
        switch($ext)
        {
            case 'jpg': case 'png': case 'gif': case 'bmp': case 'jpeg': $isImage = true; break;
            case 'pdf': $image = "pdf.png"; break;
            case 'txt': $image = "txt.png"; break;
            case 'zip': case 'rar': $image = "zip.png"; break;
            case 'mp3': case 'wav': $image = "wave.png"; break;
            case 'swf': case 'flv': $image = "swf.png"; break;
        }
        
        if($isImage)
        {
            return "";
        }
        else
        {
            if(!empty($image))
            {
                return "system/files/".$image;
            }
            else
            {
                return "system/files/unknown.png";
            }            
        }        
    }
}
?>