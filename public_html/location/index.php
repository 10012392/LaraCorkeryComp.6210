<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Location App</title>
</head>

<body class="container">
<header>
    <h1>Location App</h1>
</header>
    <?php include "data.php" ?>
    <div class="form-group">
        <form action="data.php" method="POST">
            <label>Name:</label>
            <br>
            <input type="text" name="Name" placeholder="Your Name Here:" required class="form-control">
            <label>Location:</label>
            <br>
            <input type="text" name="Location" placeholder="You Location Here:" required class="form-control">
            <br><br>
            <input type="submit" class="btn btn-success">


        </form>
    </div>

    <hr width="75%">
        <h2>Location of User </h2>
    
    <table class="table">
    <thread><tr><th>User</th><th>Location</th><th colspan="2">Action</th></tr></thread>

        <?php while($row = $result->fetch_assoc()): ?>

        <tr>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Location']; ?></td>
            <td>
                <a href="data.php?delete=<?php echo $row["ID"];?>" class="btn btn-info">Delete</a>
            </td>
        </tr>

<?php endwhile; ?> 

    </table>


<style>
    body {
    background-image:url(iz2oju.jpg);
    background-repeat:none;
    background-size: cover;
}
header {
    border:4px solid black;
    margin:5%;
    text-align:center;
    padding:2%;
}
nav {
    margin-top:0px;
    margin-left:10px;
    margin-right:10px;
    margin-bottom:20px;
    border:4px solid black;
}
ul {
    list-style-type:none;
    margin:0;
    padding:0;
    overflow:hidden;
}
li a {
    display:inline;
    text-decoration:none;
}
</style>


</body>
</html>