<?php 
include "connection.php";

  if (isset($_GET['id']))
  {
      $ename = $_GET['id'];
      
      echo '<script>alert("do you want to delete a record???")</script>';
    $sql = "DELETE FROM `employee1` WHERE `employee1`.`email` = '$ename' ";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      } 
      //header("Location: http://localhost:8081/crud/delete.php/");    
  }
?>
<!doctype html>
  <head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <form action = "/crud/form.php" method = "POST">
      <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
                  <label for="lastname">Last Name</label>
              <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
      </div>
      <div class="modal-footer d-block mr-auto">
            
            <button type="submit" formaction="/crud/delete.php/" class="btn btn-primary">Submit</button>
       </div>
        <div>
          <table class="table" id="myTable">
          <thead>
            <tr>
              <th>Name</th>
              <th>Last name</th>
              <th>Email</th>
              <th>phone</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $sql = "SELECT * FROM `employee1`";
              $result = mysqli_query($conn, $sql);
               while($row = mysqli_fetch_assoc($result))
               {
                  $ename= $row['email'];
                  echo "<tr>
                  <td>". $row['name'] . "</td>
                  <td>". $row['lastname'] . "</td>
                  <td>". $row['email'] . "</td>
                  <td>". $row['phone'] ."</td>
                  <td><a class='btn btn-info' href= '/crud/edit.php?id=$ename' id='edit' name='edit'>Edit</a><a class='btn btn-info' href = '/crud/delete.php?id=$ename' id='delete' name='delete'>Delete</a></td>
                  </tr>";
               } 
            ?>
          </tbody>
          </table>
        </div>
        </form>
      </body>
</html>