
<!DOCTYPE html>
<html class="bg-white">
    <head>
        <meta charset="UTF-8">
        <title>Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url();?>assets/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url();?>assets/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            var ADMIN_SITE = "<?php echo site_url('');?>";
        </script>
    </head>
    <body class="bg-white">

        <div class="form-box" id="login-box">
            <div class='login-logo'>
                <img src="<?php echo base_url();?>assets/admin/img/u-logo3.png" alt="logo" />
            </div>
            <div class="header bg-red">Sign In
            </div>
            <form action="" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="userid"  class="form-control userid" placeholder="User ID"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control password" placeholder="Password"/>
                    </div>

                </div>

                <div class="footer bg-gray">
                    <button type="submit" class="btn bg-red btn-block submit logo-submit">Sign me in
                    </button>

                    <div class="form-group has-error margin text-center">
                        <label class="control-label" for="inputError" id="login-error"> </label>
                    </div></div>
            </form>


        </div>


        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url();?>assets/admin/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- My JS -->
        <script src="<?php echo base_url();?>assets/admin/js/pages/login.js" type="text/javascript"></script>

    </body>
</html>