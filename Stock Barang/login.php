<?php
include('function.php');
session_start();

// If user is already logged in, redirect to index.php
if(isset($_SESSION['log']) && $_SESSION['log'] === 'True') {
    header('location:index.php');
    exit();
}

// If login form is submitted
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Query database to check login credentials
    $cekdatabase = mysqli_query($conn,"SELECT * FROM login where email='$email' and password= '$password'");
    // Count the number of rows returned
    $hitung = mysqli_num_rows($cekdatabase);

    if($hitung > 0){
        $_SESSION['log'] = 'True';
        header('location:index.php');
        exit();
    } else {
        // Redirect back to login.php with error message
        header('location:login.php?error=1');
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control"name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
    <input class="form-control"name="password" id="inputPassword" type="password" placeholder="Password" />
    <label for="inputPassword">Password</label>
</div>
<div class="form-floating mb-3">
    <button class="btn btn-primary"name="login">Login</button>
</div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    

</html>
