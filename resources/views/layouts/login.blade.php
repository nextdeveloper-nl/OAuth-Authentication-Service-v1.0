<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>NextDeveloper OAuth Login Service</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href="favicon.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/perfect-scrollbar.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/style.css" />
        <link defer rel="stylesheet" type="text/css" media="screen" href="/assets/css/animate.css" />
        @vite(['resources/css/app.css', 'resources/js/login.js'])
    </head>
    <body class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased">

        <div class="main-container min-h-screen text-black dark:text-white-dark">
            <!-- start main content section -->
            <div class="flex min-h-screen">
                <div
                        class="hidden min-h-screen w-1/2 flex-col items-center justify-center bg-gradient-to-t from-[#ff1361bf] to-[#44107A] p-4 text-white dark:text-black lg:flex"
                >
                    <div class="mx-auto mb-5 w-full">
                        <img src="/assets/images/auth-cover.svg" alt="coming_soon" class="mx-auto lg:max-w-[370px] xl:max-w-[500px]" />
                    </div>
                    <h3 class="mb-4 text-center text-3xl font-bold">Here we talk about automation.</h3>
                    <p>We really whip the lamas' ass!</p>
                </div>

                <div id="login" class="relative flex w-full items-center justify-center lg:w-1/2">

                </div>

            </div>
            <!-- end main content section -->
        </div>


    </body>
</html>