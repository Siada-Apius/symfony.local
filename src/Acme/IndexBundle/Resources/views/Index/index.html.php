<div class="well span4">
    <ul>
        <li><a href="">Index</a></li>
        <li><a href="playlist">All playlist</a></li>

        <?php if (!isset($session)): ?>
            <li><a href="registration">Registration</a></li>
            <li><a href="login">Login</a></li>
        <?php endif; ?>

        <?php if (isset($session)): ?>
            <li><a href="playlist/new">Create playlist</a></li>
            <li><a href="logout">Logout</a></li>
            <li><a href="admin">Admin</a></li>
            <li><a href="search">Search</a></li>
        <?php endif; ?>
    </ul>
</div>

<div class="well span6 navbar nav-tabs alert-info">
    <?php

    $view->extend('::base.html.php');

    echo 'Hello ' . $name . '!';

    if(isset($ses))print_r($ses);

    ?>

</div>