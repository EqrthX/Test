<?php

    require 'connection.php';

    if(isset($_POST["pattern"])) {

        $P_name = $_POST["pattern_name"];
        $category_id = $_POST["category_id"];
        $type = $_POST["type"];
        $P_media = $_FILES["media"]["name"];
        $P_media_size = $_FILES["media"]["size"];
        $P_media_tmp_name = $_FILES["media"]["tmp_name"];

        $uploaded_folder = "upload_media_design/" . $P_media;

        $sql = "INSERT INTO pattern(pattern_name, pattern_media, category_id, type_id) VALUES('$P_name', '$P_media', '$category_id', '$type');";

        $result = mysqli_query($conn, $sql);

        if($result) {

            echo "Add pattern complete";
            move_uploaded_file($P_media_tmp_name, $uploaded_folder);
            header("location:adminProduct.php");

        } else {

            echo "Not complete";

        }

    }


?>