<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();

    }

    public function index()
    {

    }

    public function doUpload(){
        $sourcePath = $_FILES['file']['tmp_name'];       // Storing source path of the file in a variable
        $targetPath = $_SERVER['DOCUMENT_ROOT']  ."/market/assets/app_images/".$_FILES['file']['name']; // Target path where file is to be stored
        $moved = move_uploaded_file($sourcePath,$targetPath) ;    // Moving
        if( $moved ) {
          $data = array(
                      'status' => true,
                      'msg'=> $targetPath,
                      'fileName' => $_FILES['file']['name']
                          );
        } else {
          $data = array(
                      'status' => false,
                      'error'=> $_FILES["file"]["error"]
                          );
        }

        echo json_encode($data);
    }


    public function doUploadAvatar(){
        $sourcePath = $_FILES['file']['tmp_name'];       // Storing source path of the file in a variable
        $targetPath = $_SERVER['DOCUMENT_ROOT']  ."/images/avatar/".$_FILES['file']['name']; // Target path where file is to be stored
        $targetURL = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/images/avatar/' .$_FILES['file']['name'];
        $moved = move_uploaded_file($sourcePath,$targetPath) ;    // Moving

        if( $moved ) {
          $data = array(
                      'status' => true,
                      'msg'=> $targetPath,
                      'url' => $targetURL,
                      'fileName' => $_FILES['file']['name']
                          );
        } else {
          $data = array(
                      'status' => false,
                      'error'=> $_FILES["file"]["error"]
                          );
        }

        echo json_encode($data);
    }

    public function doUploadLogo(){
        $sourcePath = $_FILES['file']['tmp_name'];       // Storing source path of the file in a variable
        // $targetPath = $_SERVER['DOCUMENT_ROOT']  ."/charity/assets/banner/".$_FILES['file']['name']; // Target path where file is to be stored
        $targetPath = $_SERVER['DOCUMENT_ROOT']  ."/images/event_logo/".$_FILES['file']['name']; // Target path where file is to be stored
        $targetURL = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/images/event_logo/' .$_FILES['file']['name'];
        $moved = move_uploaded_file($sourcePath,$targetPath) ;    // Moving

        if( $moved ) {
          $data = array(
                      'status' => true,
                      'msg'=> $targetPath,
                      'url' => $targetURL,
                      'fileName' => $_FILES['file']['name']
                          );
        } else {
          $data = array(
                      'status' => false,
                      'error'=> $_FILES["file"]["error"]
                          );
        }
        echo json_encode($data);
    }

}
