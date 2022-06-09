<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet">
<div class="login-body">
    <div class="login_body"><br /><br />
        <div class="container">

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="background:rgba(0,255,0,0.2);padding:20px;border:1px solid rgba(255,255,255,0.5);border-radius:5px;">
                    <h3 style="color:#fff;">EVENT ATTENDANCE MANAGEMENT SYSTEM OF ROMBLON STATE UNIVERSITY</h3>
                    <hr style="color:#fff;">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">USER LOGIN</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">ADMIN LOGIN</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <form action="_login.php" method="post">
                                <div class="container">

                                    <!--div class="row">
                                    <div class="col-md-4">
                                        <img src="img/rsu.png" width="100%">
                                    </div>
                                    <div class="col-md-8">

                                    </div>
                                </div-->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <br />
                                            <?php
                                            if (isset($_GET['error'])) {
                                                if ($_GET['error'] == 'email_empty') {
                                                    echo '<span style="color:red;">Email is Required</span>';
                                                }
                                                if ($_GET['error'] == 'email_pass') {
                                                    echo "<span style='color:red;'>Password is Required</span>";
                                                }

                                                if ($_GET['error'] == 'both_wrong') {
                                                    echo "<span style='color:red;'>Password or Username is Wrong</span>";
                                                }
                                            }
                                            ?>
                                            <div class="mb-2">
                                                <label for="exampleInputEmail1" class="form-label">User Email</label>
                                                <input type="email" name="uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                                <div id="emailHelp" class="form-text">Forgot User Name or Password?</div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <div class="form-text" style="font-size:12px;color:#fff;"><a href="register.php">No Account? Register Here.</a></div>
                                        </div>
                                    </div>

                                </div>
                                <!--container-->
                            </form>
                        </div>

                        <!--Admin Login Start Here-->
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <form action="admin/_login.php" method="post">
                                <div class="container">

                                    <!--div class="row">
                                    <div class="col-md-4">
                                        <img src="img/rsu.png" width="100%">
                                    </div>
                                    <div class="col-md-8">

                                    </div>
                                </div-->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <br />
                                            <?php
                                            if (isset($_GET['error'])) {
                                                if ($_GET['error'] == 'email_empty') {
                                                    echo '<span style="color:red;">Email is Required</span>';
                                                }
                                                if ($_GET['error'] == 'email_pass') {
                                                    echo "<span style='color:red;'>Password is Required</span>";
                                                }

                                                if ($_GET['error'] == 'both_wrong') {
                                                    echo "<span style='color:red;'>Password or Username is Wrong</span>";
                                                }
                                            }
                                            ?>
                                            <div class="mb-2">
                                                <label for="exampleInputEmail1" class="form-label">Admin Email</label>
                                                <input type="text" name="uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                                <div id="emailHelp" class="form-text">Forgot User Name or Password?</div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>

                                        </div>
                                    </div>

                                </div>
                                <!--container-->
                            </form>

                        </div>
                    </div>
                    <!--tab-content-->

                </div>
                <!--col-md-4-->
                <div class="col-md-4"></div>
            </div>
            <!--row-->
        </div>
        <!--container-->
    </div>
</div>
<style>
    .login-body {
        background: url(img/back2.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        width: 100%;
        height: 100vh;
    }

    .login_body {
        background: rgba(0, 0, 0, 0.8);
        height: 100vh;
        width: 100%;
    }

    .login_body .nav-link {
        color: #fff;
    }

    .login_body .form-label {
        color: #fff;
    }

    .login_body .form-control {
        background: none;
        color: #fff;
    }

    .login_body .form-text {
        color: gray;
    }

    .form-text a {
        color: #fff;
    }

    .form-text a:hover {
        color: yellow;
    }
</style>
<script src="js/jquery-3.6.0.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>