<?php 
interface FileUploader{
    public static function checkFileType($fieldname);
    public static function movefile($filename,$filetmpname );
       // check the file type 
       // check if the field is set and returns an error message
    
}

class file implements FileUploader{
    

    public static function checkFileType($fieldname){
        $filetype=$fieldname;
        $finfo=new finfo(FILEINFO_MIME_TYPE);
        $fmime=$finfo->file($filetype);
        $allowedFile=["image/png","image/jpeg"];
        if(!in_array($fmime,$allowedFile)){
            $_SESSION["wrong_file_Type"]="incorrect file format";
            exit();
        }
    }
    public static function movefile($filename,$filetmpname){
        $fname=uniqid()."_".$filename;
        $destination="C:/xampp/htdocs/MVC FRAMEWORK/storage/".$fname;
        if(move_uploaded_file($filetmpname,$destination)){
          $_SESSION["reponse_message"]="file added sucessfully";
        }else{
            $_SESSION["reponse_message"]="file not uplaoded";
        }
    }
}