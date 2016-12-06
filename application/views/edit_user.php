<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1" ></meta>
            <title><?php
                if (!empty($title)) {
                    echo($title);
                }
                ?>
            </title>
            <script src="http://localhost/cbr/assets/js/jquery-1.12.3.js"></script>
            <script src="http://localhost/cbr/assets/js/bootstrap.min.js"></script>
            <link rel="stylesheet" type = "text/css" href="http://localhost/cbr/assets/css/bootstrap.min.css"></link>

    </head>
    <body>
        <div class="container container-fluid">
            <form method="post" action="/cbr/index.php/welcome/update" class="form-horizontal">

                <?php
                extract($user);
                ?>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="first_name">FirstName</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="surname">Surname:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="surname" value="<?php echo $surname; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="mobile">Phone Number:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="mobile" value="<?php echo $mobile_number; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="comment">Physical Address:</label>
                    <div class="col-sm-10">
                        <textarea name="address" class="form-control"><?php echo $physical_address; ?></textarea> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="username">User Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" value="<?php echo $user_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="password">Password:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="password">
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="hidden" name="id" value="<?php echo $user_id; ?>" />
                        <input type="submit" name="submit" value="Update Account" class="btn btn-primary active">
                    </div>
                </div>	
            </form>
        </div>
    </body>
</html>
