<?php 
class CommonComponent
{
    function uploadfile($dirPath,$data)
    {
        $name = $data['name'];
        $tmp = $data['tmp_name'];            
        $size = $data['size'];        
        
        $ext = substr($name, strrpos($name, '.') + 1);
        $ext = strtolower($ext);
                
        $allow = array
        (
            //'jpg','png','gif','bmp',
            'flv','swf','mp3','wav',
            'pdf','doc','docx','xls','xlsx','ppt','pptx','txt',
            'xml','sql',
            'rar','zip','gz'
        );
                
        if(!is_dir($dirPath))
        {
            mkdir($dirPath, 0777);
            chmod($dirPath, 0777);
        }
        
        $has = false;
        foreach($allow as $item)
        {
            if($ext == $item)
            {
                $has = true;
                break;
            }
        }
        
        if($has == true)
        {
            move_uploaded_file($tmp, $dirPath.'/'.$name);
            chmod($dirPath.'/'.$name, 0777);
            return true;
        }
        else
        {
            return false;
        }        
    }
    
    function delDir($dirname)
     {
        if (is_dir($dirname))
        $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while($file = readdir($dir_handle)) 
        {
            if ($file != "." && $file != "..") 
            {
                if (!is_dir($dirname."/".$file))
                unlink($dirname."/".$file);
                else
                {
                    $a=$dirname.'/'.$file;
                    $this->delDir($a);
                }
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
     }
     
     function fieldValidation($arrayList)
     {
        /*
            $arrayList = array
            (
                array($field,$value,$type),
                array($field,$value,$type),
                array($field,$value,$type),
            );
            if error -  return Error Message
            else - return true
        */
        
        $msgError = array();        
        foreach($arrayList as $item)
        {
            $field = $item[0];
            $value = $item[1];
            $type = $item[2];
            
            switch ($type)
            {
                case "empty":
                {
                    if(empty($value))                    
                        $msgError[$field] = __("MsgNotEmpty",true);
                } break;
                case "number":
                {
                    if(!is_numeric($value))
                        $msgError[$field] = __("MsgNumeric",true);
                } break;
                case "password":
                {
                    if(empty($value))
                        $msgError[$field] = __("MsgNotEmpty",true);                        
                    else
                    {
                        if(strlen($value) < 6)
                            $msgError[$field] = __("MsgLength",true);                            
                    }                
                } break;
                case "email":
                {
                    if(empty($value))
                        $msgError[$field] = __("MsgNotEmpty",true);
                    else
                    {
                        if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $value))
                            $msgError[$field] = __("MsgEmailInvalid",true);
                    }
                    
                } break;
                case "username":
                {
                    if(empty($value))
                        $msgError[$field] = __("MsgNotEmpty",true);
                    else
                    {
                        // Check exist                        
                        $arrUser = $this->User->find('all',array('conditions'=>array('User.username'=>$value)));
                        if(count($arrUser) >0)
                            $msgError[$field] = __("MsgUserExist",true);
                    }
                    
                } break;
            }
        }
        return $msgError;
     }
     
     // Encrypt
     
    function myEncrypt($input,$key)
    {
        $arrOrder = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $arrUnOrder=array('m','n','b','v','c','x','z','l','k','j','h','g','f','d','s','a','p','o','i','u','y','t','r','e','w','q','Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M');
        $input = base64_encode($input);
        
        // Encrypt
        $output = "";
        $inputlen = strlen($input);
        for($i=0;$i<strlen($input);$i++)
        {
            $charInput = substr($input,$i,1);            
            $hasChar = false;
            for($j=0;$j<count($arrOrder);$j++)
            {
                if($charInput == $arrOrder[$j])
                {
                    $hasChar = true;
                    $output .= $arrUnOrder[$j];
                    break;
                }
            }
            if($hasChar == false)
                $output .= $charInput;
        }        
        $output = base64_encode($output);
        $output = $key.$output;
        return $output;
    }
    
    function myDecrypt($input,$key)
    {        
        $arrOrder = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $arrUnOrder = array('m','n','b','v','c','x','z','l','k','j','h','g','f','d','s','a','p','o','i','u','y','t','r','e','w','q','Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M');
        $input = substr($input,strlen($key),strlen($input)-strlen($key));
        $input = base64_decode($input);
        
        // Decrypt
        $output = "";
        $inputlen = strlen($input);
        for($i=0;$i<strlen($input);$i++)
        {
            $charInput = substr($input,$i,1);
            $hasChar = false;
            for($j=0;$j<count($arrUnOrder);$j++)
            {
                if($charInput == $arrUnOrder[$j])
                {
                    $hasChar = true;
                    $output .= $arrOrder[$j];
                    break;
                }
            }
            if($hasChar == false)
                $output .= $charInput;
        }
        $output = base64_decode($output);        
        return $output;
    }
    
         
}
?>