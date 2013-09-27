<!-- app/Resources/views/base.html.php -->
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8"/>

    <title></title>

    <link rel="stylesheet" href="/css/main.css"/>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

</head>

<body>

    <div class="container">

        <div class="header">

            <div id=logo>
                <a href="/"><img src="/images/logo.png"></a>

            </div>

            <div class="navigation-div">

                <?php

                if($user != 'anon.'){

                    $items = array('All Tracks'=> '/tracks',
                    'All Category'=> '/category',
                    'All Artist'=> '/artists',
                    'All Albums'=> '/discs',
                    'Create playlist'=> '/playlist/new',
                    'Admin'=> '/admin',
                    'Logout'=> '/logout');

                 }else {

                    $items = array( 'All Tracks'=> '/tracks',
                    'Login'=> '/login',
                    'Registration'=> '/registration',);
                }




                foreach($items  as $key => $link){

                    echo '<span class="navigation-link"><a style="text-decoration: none;color: #605462;font:  80% Arial;" href='.$link.'>'.$key.'</a></span>';

                }

                ?>
            </div>


        </div>

    </div>

        <?php $view['slots']->output('_content') ?>


    <div class="footer">



    </div>

        <div style="height: 50px;background-color: #e8e4e6;">

    </div

</body>
</html>
