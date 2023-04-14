<?php
if(is_uploaded_file($_FILES['zw']['tmp_name'])){
    $max = 1024*1500;
    if($_FILES['zw']['size']>$max){
        $_SESSION['zdp'] = '<span style="color:red;">Za duży plik</span>';
    }else {
        $target_dir = "./floder/";
        $target_file = $target_dir.basename($_FILES["zw"]["name"]);
        move_uploaded_file($_FILES['zw']['tmp_name'],$target_file);
        }
    }
else {
    $nazwaw = $_POST['nw'];
    $tw = $_POST['tw'];
    $id_pd = $_POST['pd'];
    $zw = "INSERT INTO `wpis`(`tytul`, `tresc`, `polubienia`, `id_pd`, `data`) VALUES ('$nazwaw','$tw',0,$id_pd,CURRENT_TIMESTAMP)";
    mysqli_query($id,$zw);
    $_SESSION['wp'] = '<span>Wpis dodany</span>';

}
?>