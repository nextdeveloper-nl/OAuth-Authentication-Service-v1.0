<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <title>NextDeveloper Authentication Service</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" type="image/x-icon" href="favicon.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/perfect-scrollbar.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/style.css" />
        <link defer rel="stylesheet" type="text/css" media="screen" href="/assets/css/animate.css" />
    </head>
    <body>
        <div class="main-container min-h-screen text-black dark:text-white-dark">
            <div class="flex min-h-screen items-center justify-center bg-cover bg-center" style="background-image: url(/assets/images/map-dark.svg)" >
                <div class="panel m-6 w-full max-w-lg sm:w-[480px]">
                    <img src="/assets/images/multi-factor.png">

                    <h2 class="mb-3 text-2xl font-bold">{!! I18n::t('Are you lost?');  !!} </h2>
                    <p class="mb-7">
                        {!! I18n::t('You are here because somehow you landed in the main page of our authenticatin service. You should have been going to a login page from a partner page.'); !!}
                    </p>
                    <p>
                        {!! I18n::t('Unfortunately there is not much you can do here. We are assuming that the page you are looking for may be one of the below;'); !!}
                    </p>
                    <br />
                    <a href="https://leo4.plusclouds.com" class="underline">{!! I18n::t('Leo4 Business & Cloud Orchestration Service'); !!}</a><br />
                    <a href="https://plusclouds.com" class="underline">{!! I18n::t('PlusClouds Website'); !!}</a>
                </div>
            </div>
        </div>
    </body>
</html>