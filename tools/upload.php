<?php

// echo json_encode("pepito");
// exit;

function upload_files(){
  //echo json_encode("I'm in upload_files");
  //exit;

  $error="";
  $copiarFichero=false;
  $extensiones=array('jpg','jpeg','gif','png','bmp');

  if(!isset($_FILES)){
    $error .= '$_FILES don\'t exist<br>';
  }
  if(!isset($_FILES['file'])){
    $error .='$_FILES[file] don\'t exist<br>';

  }

  $imagen = $_FILES['file']['tmp_name'];
  $nom_fitxer= $_FILES['file']['name'];
  $mida_fitxer=$_FILES['file']['size'];
  $tipus_fitxer=$_FILES['file']['type'];
  $error_fitxer=$_FILES['file']['error'];

  if ($error_fitxer>0) { // El error 0 quiere decir que se subió el archivo correctamente
      switch ($error_fitxer){
          case 1: $error .=  'File is greater than upload_max_filesize <br>'; break;
          case 2: $error .=  'File is greater than max_file_size <br>';break;
          case 3: $error .=  'File uploaded partially <br>';break;
          //case 4: $error .=  'No has pujat cap fitxer <br>';break; //assignarem a l'us default-avatar
      }//end of switch
    }//end if error type

    ////////////////////////////////////////////////////////////////////////////
    //if($_FILES['avatar']['error'] !== 0) { //Assignarem a l'us default-avatar
        //$error .=  'Archivo no subido correctamente <br>';
    //}

    ////////////////////////////////////////////////////////////////////////////
    if ($_FILES['file']['size'] > 55000 ){
        $error .=  "Large File Size <br>";
    }

    ////////////////////////////////////////////////////////////////////////////
    //if ($_FILES['avatar']['name'] === "") { //Assignarem a l'us default-avatar
        //$error .= "No ha seleccionado ninguna imagen. Te proporcionamos un default-avatar<br>";
    //}

    if ($_FILES['file']['name'] !== "") {
        ////////////////////////////////////////////////////////////////////////////
        @$extension = strtolower(end(explode('.', $_FILES['file']['name']))); // Obtenemos la extensión, en minúsculas para poder comparar
        if( ! in_array($extension, $extensiones)) {
            $error .=  'Sólo se permite subir archivos con estas extensiones: ' . implode(', ', $extensiones).' <br>';
        }
        ////////////////////////////////////////////////////////////////////////////
        //getimagesize falla si $_FILES['avatar']['name'] === ""
        if (!@getimagesize($_FILES['file']['tmp_name'])){
            $error .=  "Invalid Image File... <br>";
        }
        ////////////////////////////////////////////////////////////////////////////
        list($width, $height, $type, $attr) = @getimagesize($_FILES['file']['tmp_name']);
        if ($width > 150 || $height > 150){
            $error .=   "Maximum width and height exceeded. Please upload images below 100x100 px size <br>";
        }
    }//End of $_FILES['file']['name']

        /*
            $image_size_info    = getimagesize($imagen); //get image size
            if($image_size_info){
                $image_width        = $image_size_info[0]; //image width
                $image_height       = $image_size_info[1]; //image height
                $image_type         = $image_size_info['mime']; //image type
            }else{
                die("Make sure image file is valid!");
            }
        */

        ////////////////////////////////////////////////////////////////////////////
    $upfile = $_SERVER['DOCUMENT_ROOT'].'/whoplaystonight/media/'.$_FILES['file']['name'];
    if (is_uploaded_file($_FILES['file']['tmp_name'])){
        if (is_file($_FILES['file']['tmp_name'])) {
            $idUnico = rand();
            $nombreFichero = $idUnico."-".$_FILES['file']['name'];
            $_SESSION['nombreFichero']=$nombreFichero;
            $copiarFichero = true;
            // I use absolute route to move_uploaded_file because this happens when i run ajax
            $upfile = $_SERVER['DOCUMENT_ROOT'].'/whoplaystonight/media/'.$nombreFichero;
        }else{
                $error .=   "Invalid File...";
        }
    }

    $i=0;
    if ($error == "") {
        if ($copiarFichero) {
            if (!move_uploaded_file($_FILES['file']['tmp_name'],$upfile)) {
                $error .= "<p>Error al subir la imagen.</p>";
                return $return=array('resultado'=>false,'error'=>$error,'datos'=>"");
            }
            //We need edit $upfile because now i don't need absolute route.
            $upfile ='/whoplaystonight/media/'.$nombreFichero;
            return $return=array('resultado'=>true , 'error'=>$error,'datos'=>$upfile);
        }
        if($_FILES['file']['error'] !== 0) { //Assignarem a l'us default-avatar
            $upfile = '/whoplaystonight/media/default-avatar.png';
            return $return=array('resultado'=>true,'error'=>$error,'datos'=>$upfile);
        }
    }else{
        return $return=array('resultado'=>false,'error'=>$error,'datos'=>"");

    }

}////////////***********************end of upload files*************************/////////////////////////

function remove_files(){

  $name=$_POST["filename"];

  if(file_exists($_SERVER['DOCUMENT_ROOT'].'/whoplaystonight/media/'.$_SESSION['nombreFichero'])){
    unlink($_SERVER['DOCUMENT_ROOT'].'/whoplaystonight/media/'.$_SESSION['nombreFichero']);
    return true;
  }else{
    return false;
  }
}//End of remove_files function
