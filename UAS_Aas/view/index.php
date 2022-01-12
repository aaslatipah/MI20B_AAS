<?php

include '../controller/Auth.php';
$ctrl = new Auth();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>          
    <section class="login-dark" style="background: url(&quot;assets/img/white-cloud-blue-sky.jpg&quot;);height: 900px;">
    <form method="post" action="<?php echo $ctrl->login(); ?>">
    
            <?php 
                if(isset($_GET['pesan']) =='success' && isset($_GET['frm']) =='logout'){
                
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!!!</strong>  Anda Berhasil Keluar.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
            <?php 
                }
            ?>
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="user" placeholder="Username"></div>
            <div class="form-group"><input class="form-control" type="password" name="pass" placeholder="Password"></div>
           
            <!-- tentukan letak script generate gambar -->
            <td><img src="captcha.php" alt="gambar" /> </td>
            </tr>
            <td><input name="code" value="" maxlength="5" placeholder="isikan Captcha"/></td>
            <tr>
            <div class="form-group"><button class="btn btn-primary btn-block" name="login" type="submit">Log In</button></div><a class="forgot" href="#">Forgot your email or password?</a>
            
        

        </form>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>