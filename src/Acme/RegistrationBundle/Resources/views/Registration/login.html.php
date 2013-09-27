    <div class="navbar nav-tabs alert-info">
        <?php $view->extend('::base.html.php') ?>
    </div>


<?php if ($error): ?>

    <div>
        <?php echo $error->getMessage() ?>
    </div>

<?php endif; ?>
    <div id="content">

        <div class="login-form-div">

            <form action="<?php echo $view['router']->generate('login_check') ?>" method="post">

                <div style="margin: 5px 0 5px 60px">

                    <label for="username">Username:</label>

                    <input height="20px" type="text" id="username" name="_username" value="<?php echo $last_username ?>" />

                </div>

                <div style="margin: 5px 0 5px 64px;">

                    <label for="password">Password:</label>

                    <input height="20px;" type="password" id="password" name="_password" />

                </div>

                <div>
                    <input type="submit" value="Login" name="login" class="login-button"/>
                </div>

            </form>

        </div>

    </div>

