<?php
    include 'templates/table.php';

    $host = "localhost:3308";
    $user = "root";
    $pass = "Gehan020621!!";
    $db = "distributed";

    $conn = mysqli_connect($host,$user,$pass,$db);
    if(!$conn) {
        echo "Error connecting " . mysqli_connect_error();
    }

    $query = "SELECT * FROM tbl_user";
    $result = mysqli_query($conn,$query);
    if($result){
        $jsonResult = json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
    } else { echo json_encode(array('error' => mysqli_error($conn))); } 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Dynamic Framework</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center mt-3">CodeGehan Framework</h1>
    <?php
        echo Table::Build($jsonResult, 'table table-success w-50 m-auto', 'text-uppercase text-success', 'text-capitalize');
    ?>
</body>
</html>