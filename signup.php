<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/js/bootstrap.js">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-6 mx-auto px-4 shadow mt-5">
            <h4 class="text-info text-center">Sign up Here!</h4>
          <form action="signup2.php" method="post">
            <input type="text" class="form-control my-2" placeholder="Firstname" name="firstname" required />
            <input type="text" class="form-control my-2" placeholder="Email" name="email" required />
            <input type="text" class="form-control my-2" placeholder="Address" name="address" required />
            <input type="text" class="form-control my-2" placeholder="Age" name="age" required/>
            <input type="text" class="form-control my-2" placeholder="Password" name="password" required/>
            <button class="btn btn-primary w-100 my-4 text-white fw-bold" name="submit" type="submit">SUBMIT</button>
          </form>
        </div>
        <?php
          session_start();
          if(isset($_SESSION['message'])){
            echo '<div class="alert alert-danger text-center text-danger">'.$_SESSION['message'].'</div>';
          };
          session_unset()
        ?>
      </div>
    </div>
  </body>
</html>
