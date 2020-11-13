<?php
 // database crendenticals
    $db = "a3003619_scp_make";
    $user = "a3003619_SCPmaker";
    $pwd = "anju2001316";
    
    // database connection objects(adress, user,password,database)
    $connection = new mysqli('localhost', $user, $pwd, $db);
    
    $record = $connection->query("select * from subjects ") or die($connection->error());
    
    if(isset($_POST['submit']))
    {
        $item = $_POST['item'];
        $class = $_POST['class'];
        $containment = $_POST['containment'];
        $description = $_POST['description'];
        $extra1 = $_POST['extra1'];
        $extra2 = $_POST['extra2'];
        $extra3 = $_POST['extra3'];
        $image = $_POST['image'];
        
        $sql = "insert into subjects(item, class, containment, description, extra1, extra2,extra3, image)
        values('$item', '$class', '$containment', '$description', '$extra1', '$extra2','$extra3', '$image')";
        
        if($connection->query($sql) === TRUE)
        {
            echo "<h1>Record added</h1>";
            echo "<p><a href='index.php'>Home</a></p>";
        }
        else
        {
            echo "<h1>Error: Record not added</h1>";
            echo "<p>{$connection->error}</p>";
            echo "<p><a href='index.php>Home</a></p>";
        }
    }
    
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $item = $_POST['item'];
        $class = $_POST['class'];
        $containment = $_POST['containment'];
        $description = $_POST['description'];
        $extra1 = $_POST['extra1'];
        $extra2 = $_POST['extra2'];
        $extra3 = $_POST['extra3'];
        
        $image = $_POST['image'];
        
        $update = "update subjects set item='$item', class='$class', containment='$containment', description='$description', extra1='$extra1', extra2='$extra2', extra3='$extra3' ,image='$image'
        where id='$id'";
        
        if($connection->query($update) === TRUE)
        {
            echo "<h1>Record Updated</h1>";
            echo "<p><a href='index.php' class='btn btn-success'>Home</a></p>";
        }
        else
        {
            echo "<h1>Error: Record not updated</h1>";
            echo "<p>{$connection->error}</p>";
            echo "<p><a href='index.php' class='btn btn-danger'>Home</a></p>";
        }
    }
    if (isset($_GET['delete']))
    {
        $id=$_GET['delete'];
        
        // create delete sql command 
        $del ="delete from subjects where id=$id";
        
        // Run the command and then display approprite sucess or error messages
        if ($connection->query($del)==TRUE)
        {
            echo "<p> Record was deleted. <a href='index.php'>Return to Index page</a></p>";
        }
        
        else 
        {
           echo "
           <p> There was an error deleting this record.</p>
           <p> {$connection-> error}></p>
           <p> <a href ='/index.php'>Back to index page </a></p>
           "; 
        }
    }
    if(isset($_GET['delete'])) 
    {
        $id = $_GET['delete'];
        
        // create delete sql command 
        $sql ="delete from subjects where id='$id'";
        
        //Run the command and then ddisplay the appropriate success or error messages
        
        if($connection->query($sql)=== TRUE)
        {
            echo "<p> Record was deleted <a href='index.php'> Return to Index subjects</a></p>
            ";
        }
        else 
        {
            echo "
            <p>There was an error deleting this record</p>
            <p> {$connection-> error()}</p>
            <p><a href ='index.php'>Back to Index page </a></p>
            ";
        }
    }

?>