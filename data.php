<html>
<body>
<?php
//for photo

$photo_dir = "photos/";
$photo = $photo_dir.time()."-".basename($_FILES["photo"]["name"]);
$ok = 1;
$imageFileType = strtolower(pathinfo($photo,PATHINFO_EXTENSION));


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" ) {
    echo "We can only accept the jpg, jpeg, png, gif photos.";
    $ok = 0;
}

if ($ok == 0) {
    echo "image not uploaded.";

} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $photo)) {
        // write what ever you want
    } else {
        echo "error in uploading image.";
    }
}



//for cv

$cv_dir = "cvs/";
$cv = $cv_dir.time()."-".basename($_FILES["cv"]["name"]);
$ok1 = 1;
$cvType = strtolower(pathinfo($cv,PATHINFO_EXTENSION));


if($cvType != "pdf") {
    echo "We can only accept the pdf only.";
    $ok1 = 0;
}

if ($ok1 == 0) {
    echo "cv not uploaded.";

} else {
    if (move_uploaded_file($_FILES["cv"]["tmp_name"], $cv)) {
        // write what ever you want
    } else {
        echo "error in uploading cv.";
    }
}
echo "<br/>Thank you for your application. Here is the information we received from you. Please Verify.<br/><br/>";
echo "
    <form action='data.php' method='post' enctype='multipart/form-data'>
         <table border=1>
            <tr>
               <td align=right>Name:</td>
               <td>".$_POST['name']."</td>
            </tr>
            <tr>
               <td align=right>Email:</td>
               <td>".$_POST['email']."</td>
            </tr>
            <tr>
               <td align=right>Highest Education Degree:</td>
               <td>".$_POST['education']."</td>
            </tr>
            <tr>
               <td align=right>Position Applied:</td>
               <td>".$_POST['position']."</td>
            </tr>
            <tr>
               <td align=right>CV (PDF only):</td>
               <td>Upload Successful! View your CV <a href='".$cv."' target='_blank'>here</a></td>
            </tr>
            <tr>
               <td align=right>Photo (PNG/JPG/GIF):</td>
               <td><img src='".$photo."' height='300px' width='300px'/></td>
            </tr>
         </table>
      </form>
";
?>
</body>
</html>
