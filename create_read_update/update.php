<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Update record</title>
  </head>
  <body class="container">
      
    <h1>Update record</h1>
    <p><a href="index.php" class="btn btn-primary">Back to Index subjects </a></p>
    
    <?php
    
        include 'db.php';
        
        $id = $_GET['update'];
        
        $record = $connection->query("select * from subjects where id='$id'") or die($connection->error());
        $row = $record->fetch_assoc();
    
    ?>
    
    
    <form class="form-group" action="db.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <label>Update item name:</label>
        <br>
        
        <input type="text" class="form-control" name="item" value="<?php echo $row['item']; ?>">
        <br>
        
        <label>Update Class Heading:</label>
        <br>
        <textarea class="form-control" name="Class"  rows "5" placeholder="<?php echo $row['class']; ?>"><?php echo $row['class']; ?></textarea>
        <br><br>
        
        <label>Update Containment:</label>
        <br>
        
        <input type="text" name="Containment" placeholder="Containment here" class="form-control" value="<?php echo $row['Containment']; ?>">
        <br>
        
        <label> Enter a Description:</label>
        <br>
        
        <input type="text" name="Description" placeholder="Write description here" class="form-control" value="<?php echo $row['Description']; ?>">
        <br>
        
        <label>Extra 1:</label>
        <br>
        
        <input type="text" name="Extra 1" placeholder="If anything extra to add here" class="form-control" value="<?php echo $row['Extra 1']; ?>">
        <br>
        
        <label> Extra 2:</label>
        <br>
        
        <input type="text" name="Extra 2" placeholder="If anything extra to add here" class="form-control" value="<?php echo $row['Extra 2']; ?>">
        <br>
        
        <label> Extra 3:</label>
        <br>
        
        <input type="text" name="Extra 3" placeholder="If anything extra to add here" class="form-control" value="<?php echo $row['Extra 3']; ?>">
        <br>
        
        <label>Update image address:</label>
        <br>
        
        <input type="text" name="image" placeholder="e.g image/pic.jpg" class="form-control" value="<?php echo $row['image']; ?>">
        <br>
        
        <input type="submit" name="update" class="btn btn-warning" value="Update Page Data">
        
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>