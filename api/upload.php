<?php

//this will show error if any error happens
error_reporting(E_ALL);
ini_set('display_errors', 1);

//enable cors
include "cors.php";

//check post request
if($_SERVER['REQUEST_METHOD']=="POST"){
    //from form data
    $tz=$_POST["ts"];
    //get the file
    $ori_fname=$_FILES['file']['name'];
    //get file extension
    $ext = pathinfo($ori_fname, PATHINFO_EXTENSION);
    //target folder
    $target_path = "uploads/";
    //replace special chars in the file name
    $actual_fname=$_FILES['file']['name'];
    $actual_fname = str_replace($ext, '', $actual_fname);
    $actual_fname=preg_replace('/[^A-Za-z0-9\-]/', '', $actual_fname);
    //set random unique name why because file name duplicate will replace
    //the existing files
    $modified_fname=rand(1,1000).'-'.$actual_fname;
    //set target file path
    $finalName =  basename($modified_fname).".".$ext;
    $target_path = $target_path . $finalName;
    $result=array();
    //move the file to target folder
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
        $result["status"]=1;
        $result["message"]="Uploaded file successfully.";
        $result["fileName"]=$finalName;
    }else{
        $result["status"]=0;
        $result["message"]="File upload failed. Please try again.";
    }

echo json_encode($result);

}// end of post request 

?>
