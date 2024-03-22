<?php
   function fileUpload($picture){

       if($picture["error"] == 4){  
           $pictureName = "picture.jpg";  
           $message = "No picture has been chosen";
       }else{
           $checkIfImage = getimagesize($picture["tmp_name"]);   
           $message = $checkIfImage ? "Ok" : "Not an image";
       }

       if($message == "Ok"){
           $ext = strtolower(pathinfo($picture["name"],PATHINFO_EXTENSION));  
           $pictureName = uniqid(""). "." . $ext;  
           $destination = "picture/{$pictureName}";  
           move_uploaded_file($picture["tmp_name"], $destination);  
       }

       return [$pictureName, $message];  
   }

?>