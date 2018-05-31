
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vikn | Login</title>

    <link href="<?php echo base_url ?>assets/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url ?>assets/template/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url ?>assets/template/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url ?>assets/template/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">Vk+</h1>

        </div>
        <h3>Welcome to Vikn</h3>
        <p>Login in. To see it in action.</p>
        <p><?php echo $this->session->userdata("msg") ?></p>
        <form class="m-t" method="post" action="<?php echo base_url; ?>login_action">
            <div class="form-group">
                <input type="email" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

        </form>
        <p class="m-t"> <small>Vikn Software &copy; 2017</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo base_url ?>assets/template/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url ?>assets/template/js/bootstrap.min.js"></script>

</body>

</html>
