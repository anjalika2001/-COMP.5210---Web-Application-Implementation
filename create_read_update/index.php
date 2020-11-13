<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>SCP_app</title>
  </head>
  <body class="container">
      <?php include 'db.php'; ?>
      
      <div class="row">
          <div class="col">
              <ul class="nav navbar-light bg-light">
                  <li><a href="index.php" class="nav-link">Home</a></li>
                  
                  <!--loop thru table to retrieve subjects names that will serve as our menu-->
                   <?php foreach($record as $subjects): ?>
                  
                  <li class="nav-item active">
                      
                      <a href="index.php?subjects='<?php echo $subjects['item']; ?>'" class="nav-link"><?php echo $subjects['item']; ?></a>
                      
                  </li>
                  
                  <?php endforeach; ?>
                 
                   <li><a href="create.php? subjects='<?php echo $item[item];?>'" class="nav-link">Create new record</a></li>
              </ul>
          </div>
      </div>
      
      <div class="row">
          
          <div class="col">
              
              <?php 
                    
                    if(isset($_GET['subjects']))
                    {
                        $item = trim($_GET['subjects'], "'");
                        
                        // run sql query based on our $pg value
                        $record = $connection->query("select * from subjects where item='$item'") or die($connection->error);
                        
                        $single = $record->fetch_assoc();
                        
                        $item = $single['item'];
                        $class = $single['class'];
                        $containment = $single['containment'];
                        
                        $description= $single['description'];
                        $extra1 = $single['extra1'];
                        $exrra2 = $single['extra2'];
                        
                        $image = $single['image'];
                        
                        // Variables to hod our update and delete url string 
                        
                        
                        $id = $single['id'];
                        $update = "update.php?update=" . $id;
                        $delete = "db.php?delete=".$id;
                        
                        // Display the information in the screen 
                        
                        echo "
                        <p> <img src ='{$image}'></p>
                        <h1>{$class}</h1>
                        <h2>{$item}</h2>
                        
                        <p>{$containment}</p>
                        <p>{$description}</p>
                        
                        <p>{$extra1}</p>
                        <p>{$extra2}</p>
                         ";
                         
                         // Display update and delete buttons
                         echo"
                        <p>
                        <a href='{$update}' class='btn btn-warning'>Update</a>
                        <a href='{$delete}' class='btn btn-danger'>Delete</a>
                        <p>
                         ";
                        
                        
                        
                        
                    }
                    else
                    {
                        // default view of index.php
                        
                        echo "
                        
                        <h1>SCP_app</h1>
                        <p class= 'text-center'>This is an example application of using PHP and MySQL to create a SCP_app.</p>
                        <p class='text- center'><img src= 'image/logo.jpg'></p>
                        
                        ";
                    }
              
              ?>
              
          </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>