<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background: url(data:image/jpeg;base64,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);
                background-repeat: no-repeat;
                background-size: auto;
                background-position: center;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/groups')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>
                        <a href="<?php echo e(route('register')); ?>">Register</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
                    Baltic Talents
                </div>


            </div>
        </div>
    </body>
</html>
