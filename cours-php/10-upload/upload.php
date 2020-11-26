<?php

function imageResize($image, $w, $h)
{
    $oldw = imagesx($image);
    $oldh = imagesy($image);
    $temp = imagecreatetruecolor($w, $h);
    imagecopyresampled($temp, $image, 0, 0, 0, 0, $w, $h, $oldw, $oldh);
    return $temp;
}


if (isset($_POST['submit'])) {

    if ($_FILES['file']['size'] === 0 || $_FILES['image']['size'] === 0) {
        echo "Veuillez sélectionner votre CV au format PDF et une image au format JPEG!";
    }
    
    else {

    $file = $_FILES['file'];

    $prenom = $_POST['prenom'];

    $image = $_FILES['image'];

    //print_r($file);

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    //$formatsAutorises = array('jpg', 'jpeg', 'png', 'pdf');

    //in_array($fileActualExt, $formatsAutorises)
    if ($fileActualExt === "pdf") {
        if ($fileError === 0) {
            if ($fileSize <= 0.1*1024*1024) {
                $fileNameNew = $prenom.'-'.uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location:index.php?uploadsuccess");
            } else {
                echo "Votre fichier (CV) est trop gros!<br>";
            }
    } else {
             echo "Il y a eu une erreur avec l'upload de votre fichier!";
            }   
}
    else {
            echo "Vous ne pouvez pas uploader des fichiers de ce type!";
         }


        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];
        $imageError = $_FILES['image']['error'];
        $imageType = $_FILES['image']['type'];
    
        $imageExt = explode('.', $imageName);
        $imageActualExt = strtolower(end($imageExt));

        if ($imageActualExt === "jpg" || $imageActualExt === "jpeg") {
            if ($imageError === 0) {
                if ($imageSize <= 0.1*1024*1024) {
                    $imageNameNew = uniqid('', true).".".$imageActualExt;
                    $imageDestination = 'uploads/'.$imageNameNew;
                    move_uploaded_file($imageTmpName, $imageDestination);
                    

                    $uploadedImage = imagecreatefromjpeg($imageDestination);

                    $resizedImage = imageResize($uploadedImage,300,300);
                    $imageNameNew = '300x300-'.$imageNameNew;
                    $imageDestinationNew = 'uploads/'.$imageNameNew;
                            
                    // enregistrer l'image sur le disque
                    imagejpeg($resizedImage, $imageDestinationNew);
        
                         





                    header("Location:index.php?uploadsuccess");


                }
                
                else {
                    echo "Votre fichier (image) est trop gros!<br>";
                    }
          }  
          
                else {
                 echo "Il y a eu une erreur avec l'upload de votre fichier!";
                     }   
    }
        else {
                echo "Vous ne pouvez pas uploader des fichiers de ce type!";
             }
    
        
            }

    }



?>