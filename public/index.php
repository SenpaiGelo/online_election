<?php
    session_start();
    if(isset($_SESSION['students'])){
        header("location: dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="./css/custom_style.css">
        <script src="./js/jquery.js"></script>
        <script src="./js/bootstrap/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/c91a97da7b.js"></script>
        <script src="./js/custom_style.js" ></script>
        <script src="../app/configuration/server.js" ></script>
        <title>Online Election</title>
    </head>
    <body>
        <div id="root">
            <div class="box-center">
                <div class="logo-pane">
                    <center>
                        <img src="images/logo.jpg"  height="200px" width="200px" alt="logo image">
                        <h6 class="font-weight-bolder" >Zaragoza National High School.</h5>
                        <p class="font-weight-lighter" >Online Election</p>
                    </center>
                </div>
                <div class="form-pane">
                    <div class="mode-swich text-end">
                        <button class="sign-in-switch-btn mode-btn" >
                            <i class="fa fa-toggle-off" ></i>
                            <b>Sign Up</b>
                        </button>
                    </div>
                    <div class="mode-pane-switcher" >
                        <div class="sign-in-pane">
                            <center>
                                <img class="rounded-circle shadow" src="./images/logo.jpg" width="120px" height="120px" alt="">
                            </center>
                            <h4 class="text-center mb-2" >Welcome Back</h4>
                            <div id="sign-in-messages" class="alert alert-danger text-center text-danger fw-bold d-none"></div>
                            <form id="form-sign-in" >
                                <div class="form-group mt-3">
                                    <label class="fw-bold" for="">Email</label>
                                    <input type="text" placeholder="Email" name="sign-in-email" id="sign-in-email" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="fw-bold" for="">Password</label>
                                    <input type="password" placeholder="Password" name="sign-in-password" id="sign-in-password" class="form-control">
                                </div>
                                <div class="form-group mt-3 text-center">
                                    <button id="sign-in-btn" type="submit" class="btn btn-success fw-bold w-100" >SIGN IN</button>
                                </div>
                            </form>
                        </div>
                        <div class="sign-up-pane d-none">
                            <div id="sign-up-messages" class="alert alert-danger text-center text-danger fw-bold d-none"></div>
                            <form id="form-sign-up" method="POST" enctype="multipart/form-data" >
                                <div class="form-group mt-3">
                                    <label class="fw-bold" for="">Email</label>
                                    <input type="text" placeholder="Email" id="sign-up-email" name="sign-up-email" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="fw-bold" for="">Student ID</label>
                                    <input type="text" placeholder="Student ID" id="sign-up-sid" name="sign-up-sid" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="fw-bold" for="">FirstName</label>
                                    <input type="text" placeholder="FirstName" id="sign-up-firstname" name="sign-up-firstname" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="fw-bold" for="">LastName</label>
                                    <input type="text" placeholder="LastName" id="sign-up-lastname" name="sign-up-lastname" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="fw-bold" for="">Password</label>
                                    <input type="password" placeholder="Password" id="sign-up-password" name="sign-up-password" class="form-control">
                                </div>
                                <div class="mt-3 text-center">
                                    <button id="sign-up-btn" class="btn btn-danger w-100 fw-bold" >Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>