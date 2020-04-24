<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>SCP Subject</title>
</head>
<body class="container">
    <?php include "connection.php"?>

    <header>
        <h1>SCP Subject</h1>
    </header>

    <!-- Menu -->
    <div class="row">
        <div class="col">
            <ul class="nav">
            <li class="nav-item">
                <a href="http://10012392.2020.labnet.nz/">Create</a>
                <?php foreach($result as $menu_item): ?>
                <li class="nav-item">
                    <a class="nav_link active" href="index.php?subject=<?php echo $menu_item['item_no']; ?>">
                    <?php echo $menu_item['item_no']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
                
            </ul>

        </div>
    </div>

    <!-- Display Record in Div Tag Bellow -->
    <div class="row">
        <div class="col">
            
            <?php
            if(isset($_GET['subject']))
            {
                //Remove Single Quotes From Subject Value 
                $item_number = trim($_GET['subject'], "'");

                //Run SQL Command To Select Record Based on Get Value 
                $record = $connection->query("select * from subject where item_no='$item_number'") or die ($mysqli_error($connection));

                $row = $record->fetch_assoc();

                $item = $row['item_no'];
                $object_class = $row['object_class'];
                $subject_image= $row['subject_image'];
                $special_containment_procedures = $row['special_containment_procedures'];
                $procedures = $row['procedures'];
                $description = $row['description'];
                $reference = $row['reference'];
                $extra_1 = $row['extra_1'];
                $extra_2 = $row['extra_2'];


                //Strip Out \n and Replace it With Linebreaks
                $procedures = str_replace('\n', '<br></br>', $procedures);
                $description = str_replace('\n', '<br></br>', $description);
                $special_containment_procedures = str_replace('\n', '<br></br>', $special_containment_procedures);
                $extra_1 = str_replace('\n', '<br></br>', $extra_1);
                $extra_2 = str_replace('\n', '<br></br>', $extra_2);
                
                //Strip Out \h3 /h3 and replace it with heading 3 (<h3></h3> Tags)
                $procedures = str_replace('\h3', '<h3>', $procedures);
                $procedures = str_replace('/h3', '</h3>', $procedures);
                $description = str_replace('\h3', '<h3>', $description);
                $description = str_replace('/h3', '</h3>', $description);
                $special_containment_procedures = str_replace('\h3', '<h3>', $special_containment_procedures);
                $special_containment_procedures = str_replace('/h3', '</h3>', $special_containment_procedures);
                $extra_1 = str_replace('\h3', '<h3>', $extra_1);
                $extra_1 = str_replace('/h3', '</h3>', $extra_1);
                $extra_2 = str_replace('\h3', '<h3>', $extra_2);
                $extra_2 = str_replace('/h3', '</h3>', $extra_2);
                
                //Display do Subject Record to Screen
                echo "<h2>Item_#{$item}</h2>
                      <h3>{$object_class}</h3>
                      <img src='images/{$subject_image}' alt='{$subject_image}'>
                      <h3>Special Containment Procedures</h3>
                      <p>{$special_containment_procedures}</p>
                      <h3>Procedures</h3>
                      <p>{$procedures}</p>
                      <h3>Description</h3>
                      <p>{$description}</p>
                      <p>{$extra_1}</p>
                      <p>{$extra_2}</p>";
                      
            }
            else {
                
                echo "<div class='form-group'>
                <form action='#' method='POST'>
                <label>Item Number:</label>
                <br>
                <input type='text' name='item_no' placeholder='Enter The Item Number Here:' required class='form-control'>
                <label>Object Class</label>
                <br>
                <input type='text' name='object_class' placeholder='Enter The Object Class Here:' required class='form-control'>
                <label>Subject Image</label>
                <br>
                <input type='file' name='subject_image' placeholder='Enter The Subject Image Here:' class='form-control'>
                <label>Special Containment Procedures</label>
                <br>
                <input type='text' name='special_containment_procedures' placeholder='Enter The Special Containment Procedures Here:' required class='form-control'>
                <label>Procedures</label>
                <br>
                <input type='text' name='procedures' placeholder='Enter The Procedures Here:' required class='form-control'>
                <label>Description</label>
                <br>
                <input type='text' name='description' placeholder='Enter The Description Here:' required class='form-control'>
                <label>References</label>
                <br>
                <input type='text' name='reference' placeholder='Enter References Here:' class='form-control'>
                <label>Additional Notes</label>
                <br>
                <input type='text' name='extra_1' placeholder='Enter Any Additional Notes Here:' class='form-control'>
                <label>Extra Notes</label>
                <br>
                <input type='text' name='extra_2' placeholder='Enter Any Extra Notes Here:' class='form-control'>
                <br>
                <input type='submit' class='btn btn-success'>
                </form>
                </div>";
                

            }
            ?>

        </div>
    </div>

<?php while($row = $result->fetch_assoc()):?>
<div class="alert alert-danger" role="alert">
<?php  echo "<p>{$row['item_no']}</p>"; ?>

<?php echo "<p>{$row['object_class']}</p>"; ?>

<?php echo "<p>{$row['subject_image']}</p>"; ?>

<?php echo "<p>{$row['special_containment_procedures']}</p>"; ?>

<?php echo "<p>{$row['procedures']}</p>"; ?>

<?php echo "<p>{$row['description']}</p>"; ?>

<?php echo "<p>{$row['reference']}</p>"; ?>

<?php echo "<p>{$row['extra_1']}</p>"; ?>

<?php echo "<p>{$row['extra_2']}</p>"; ?>
</div>

<?php endwhile; ?>






<!--Bootstrap-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 



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

.nav-item {
    margin:10px;
    color: black;
    font-size:20px;
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