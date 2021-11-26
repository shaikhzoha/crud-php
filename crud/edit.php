<?php 
include "connection.php";
  if ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
      $ename=$_GET['id'];
      $sql = "SELECT * FROM `employee1` where email = '$ename'";
      $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
    }
if (isset( $_POST['submit']))
{
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $sql = "UPDATE `employee1` SET `name` = '$name', `lastname` = '$lastname', `phone` = '$phone' WHERE `employee1`.`email` = '$email'";
    $result = mysqli_query($conn, $sql); 
      if($result)
      { 
          echo "update done";
          header("Location: http://localhost:8081/crud/form.php");
      }
      else
      {
          echo "The record was not updated successfully because of this error ---> ". mysqli_error($conn);
      } 
  }
  
?>
<!doctype html>
  <head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <form action = "/crud/edit.php" method = "POST">
      <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo  $row['name'];?>" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
                  <label for="lastname">Last Name</label>
              <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo  $row['lastname'];?>" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo  $row['email'];?>"aria-describedby="emailHelp">
      </div>
      <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" value="<?php echo  $row['phone'];?>"aria-describedby="emailHelp">
      </div>
      <div class="modal-footer d-block mr-auto">       
      <button type = 'submit'class='btn btn-info' id='submit' name='submit'>Submit</button>
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
                  echo "<tr>
                  <td>". $row['name'] . "</td>
                  <td>". $row['lastname'] . "</td>
                  <td>". $row['email'] . "</td>
                  <td>". $row['phone'] ."</td>
                  <td><a href= '/crud/edit.php' id='edit' name='edit'>Edit</a><a href = '/crud/delete.php' id='delete'>Delete</a></td>
                  </tr>";
               } 
            ?>
          </tbody>
          </table>
        </div>
        </form>
      </body>
</html>