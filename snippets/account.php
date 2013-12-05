<?php
/** --- B A S E F U N C T I O N S ---

    This 1 file sets up project-wide things like authentication -
    DO NOT REMOVE
**/
include('core/protostrap.php');

?><!DOCTYPE html>
<html lang="en">
  <head>

    <title>Account</title>
    <meta name="description" content="">
    <meta name="author" content="">

<?php
// this includes all the markup that loads css files and similar stuff,
// if you have to add more css, that's the place to do it.
include('./headTag.php');?>

  </head>

  <body>
<?php
        // *** STATIC TOP NAVBAR ***
        // This defines which navigation item is active. each pair of quotes corressponds to an item
        // DO NOT REMOVE
        $navbarClasses = Array('','','','','active','','','','');
        // this includes the markup for a static top navbar. Remove the // to include.
        include('./navBarStaticTop.php');


        // *** iOS TAB-BAR ***
        // This defines which tab is active. each pair of quotes corressponds to a tab
        // DO NOT REMOVE
        $tabClasses = Array('active','','','','');
        // this includes the markup for iOS a styled tab-bar. Remove the // to include
        //include('./iosTabbar.php');
?>

    <div class="container">

<?php // this includes the header
// include('./header.php');?>

<?php
if($loggedIn){ ?>
    <div class="row">
        <span class="span12">
            <br><br>
            <h3>Profile</h3>
            <table class="table table-condensed">
                    <tr>
                        <td>Name</td>
                        <td><?= $username; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $usermail; ?></td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td><?= $userrole; ?></td>
                    </tr>
                </table>
            <br><br>
            <a class="btn" href="?logout=true">Logout</a>
        </span>
    </div>

<?php } else { ?>
    <div class="row">
        <span class="span3">
            <h3>Sign in</h3>

            <form action='' method='post'>
                <input name='login' class='input-block-level' type='text' placeholder='Username'><br>
                <input name='pass' class='input-block-level' type='password' placeholder='Password'>
                <br>
                <label class='checkbox'>
                    <input type='checkbox' name='check' id='ckeck' value='1'>
                    Remember me
                </label>
                <button type='submit' class='btn-block btn btn-primary'>Sign in</button>
                <br>
                            <a >I forgot my password</a>

            </form>


            No Account?<br>
            <a href='register.php'class='btn btn-block'>Sign up</a>

            <?php if(!empty($showLoginError)){ ?>
                <div class='alert alert-error'>
                    <button class='close' data-dismiss='alert' type='button'>×</button>
                    <strong>Wrong Username or password</strong><br>
                    Please re-enter your data, make sure Caps Lock is not pressed unintentionally.
                </div>
            <?php } ?>

        </span>
        <span class="span4 offset2">
            <br><br><br>
            <div class="alert alert-info alert-multiline">
                Type the following into the Email field:
              <ul>
                  <li>anything or <strong>user</strong> to sign in as John Doe</li>
                  <li><strong>admin</strong> to sign in as Tommy Two</li>
                  <li><strong>fail</strong> to simulate auth-error</li>
              </ul>
              You can change / add users and roles in the file data.php
            </div>
        </span>
    </div>


<?php } ?>






      <hr>

<?php // this includes the footer
include('./footer.php');?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
<?php include ('protostrap_javascripts.php');?>
  </body>
</html>