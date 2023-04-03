<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>List of All User Name </h1>
    
    <table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            
        </tr>
    </thead>
    <tbody>
    
    <?php
    include('database.php');
    $sqlSelect = "SELECT * FROM users";
    $result = mysqli_query($conn,$sqlSelect);
    while($data = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['full_name']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
                <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    </table>

        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</body>
</html>