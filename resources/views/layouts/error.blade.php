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

                <div id="error" class="relative flex w-full items-center justify-center lg:w-1/2">
                    <div class="rounded-md border border-gray-500/20 p-6 shadow-[rgb(31_45_61_/_10%)_0px_2px_10px_1px] dark:shadow-[0_2px_11px_0_rgb(6_8_24_/_39%)]">
                        <div class="mb-5 text-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-12 w-12">
                                <path d="M15.5777 3.38197L17.5777 4.43152C19.7294 5.56066 20.8052 6.12523 21.4026 7.13974C22 8.15425 22 9.41667 22 11.9415V12.0585C22 14.5833 22 15.8458 21.4026 16.8603C20.8052 17.8748 19.7294 18.4393 17.5777 19.5685L15.5777 20.618C13.8221 21.5393 12.9443 22 12 22C11.0557 22 10.1779 21.5393 8.42229 20.618L6.42229 19.5685C4.27063 18.4393 3.19479 17.8748 2.5974 16.8603C2 15.8458 2 14.5833 2 12.0585V11.9415C2 9.41667 2 8.15425 2.5974 7.13974C3.19479 6.12523 4.27063 5.56066 6.42229 4.43152L8.42229 3.38197C10.1779 2.46066 11.0557 2 12 2C12.9443 2 13.8221 2.46066 15.5777 3.38197Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                <path opacity="0.5" d="M21 7.5L12 12M12 12L3 7.5M12 12V21.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                        </div>
                        <h5 class="mb-3.5 text-lg font-semibold dark:text-white-light">OAuth Error</h5>
                        <p class="mb-3.5 text-[15px] text-dark max-w-3xl">{{ $error }}</p>
                    </div>

                </div>

            </div>
            <!-- end main content section -->
        </div>


    </body>
</html>