<?php
include "connection.php";
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $sql = "INSERT INTO `employee1` (`name`, `lastname`, `email`, `phone`) VALUES ('$name', '$lastname', '$email', '$phone');";
    $result = mysqli_query($conn, $sql); 
      if($result)
      { 
        echo "<script type='text/javascript'>alert('inserted successfully!')</script>";
      }
      else
      {
          echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
      } 
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
      <button type="submit" class="btn btn-primary">Submit</button>
           
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