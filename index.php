<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Document</title>
</head>

<body>

    <form action="" method="post">
        <label for="name">Vardas</label>
        <input type="text" name="name" class="form-control input" placeholder="Vardas">
        <label for="name">Pavardė</label>
        <input type="text" name="surname" class="form-control input" placeholder="Pavardė">
        <label for="name">e-paštas</label>
        <input type="email" name="email" class="form-control input" placeholder="e-paštas">
        <label for="name">Telefono numeris</label>
        <input type="text" name="phoNo" class="form-control input" placeholder="Telefono numeris">
        <button type="submit" class="btn btn-primary">Save</button>
    </form>


    <?php
    include "../p15/models/User.php";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "vcs_p15";
    $conn = new mysqli($servername, $username, $password, $db);
    ?>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        User::save($conn);
    }
    ?>

    <?php
    $sql = "SELECT * FROM `users`";
    $result = $conn->query($sql);
    // print_r($result);
?>
<table class="table table-info table-stripped w-500">
<thead>
    <tr class="table table-info">
       
        <th lass="table table-info ">Vardas</th>
        <th class="table table-info">Pavardė</th>
        <th class="table table-info">e-paštas</th>
        <th class="table table-info">Telefono numeris</th>
    </tr>
</thead>

<?php

$conn->close();
// print_r($users);
?>
    
    <tbody>
        <?php
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = new User($row["id"], $row["name"], $row["surname"], $row["email"], $row["phone_number"]);
        }
    foreach ($users as $user) {
        ?>
        <!-- // echo '<h1>' . $user->name . ' ' . $user->surname . '</h1>'; -->
<tr class="table table-info">
    
<?php
   echo '<td class="table table-info">' . $user->name . '</td>' . '<td class="table table-info">' . $user->surname . '</td>' . '<td class="table table-info">' . $user->email . '</td>' . '<td class="table table-info">' . $user->phone_number . '</td>'

   ?>
</tr>

    <?php } ?>
    </tbody>
    </table>
</body>

</html>