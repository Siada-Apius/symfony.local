<div class="navbar nav-tabs alert-info">
    <?php $view->extend('::base.html.php') ?>
</div>


<?php if ($error): ?>
    <div><?php echo $error->getMessage() ?></div>
<?php endif; ?>
<div class="navbar nav-tabs">
    <div class="container border">
        <a class="brand" href="<?php echo $view['router']->generate('acme_index_homepage') ?>">Index Symfony2</a>
    </div>
</div>

<div class="well span3">
    <form action="<?php echo $view['router']->generate('login_check') ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="_username" value="<?php echo $last_username ?>" />

        <label for="password">Password:</label>
        <input type="password" id="password" name="_password" />

        <!--
            Если вы хотите контролировать URL, на который перенаправить пользователя:
            <input type="hidden" name="_target_path" value="/account" />
        -->

        <input type="submit" value="Login" name="login" class="btn btn-info"/>
    </form>
</div>

