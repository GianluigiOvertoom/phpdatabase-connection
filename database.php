<!DOCTYPE html>
<html lang="en">
<head>
  <title>Database connection</title>
</head>
<body>
  <form action="" method="post">
    <label>Name</label>
    <input type="text" name="naam" id= "naam" required="required" placeholder = "Please enter your name">
    <label>Email</label>
    <input type="email" name="email" id= "email" required="required" placeholder= "Please enter your Email">
    <input type="submit" value="submit" name="submit"/>
  </form>

  <?php
    if(isset($_POST["submit"])){
      $hostname='localhost';
      $username='root';
      $password='';

      try {
        $dbh = new PDO("mysql:host=$hostname;dbname=phpdatabase",$username,$password);

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO leerling (naam, email) VALUES (' . $_POST["naam"] . ',' . $_POST["email"] . ');';
          if ($dbh->query($sql)) {
            echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
          }
          else {
            echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
          }
          $dbh = null;
      }

      catch(PDOException $e) {
        echo $e->getMessage();
      }
    }
  ?>
</body>
</html>
