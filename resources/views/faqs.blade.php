<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:700,700i,900" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />

    <!-- Home Demo Specific Stylesheet -->
    <link rel="stylesheet" href="demos/interior-design/interior-design.css" type="text/css" />

    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <!-- Reader's Blog Demo Specific Fonts -->
    <link rel="stylesheet" href="demos/interior-design/css/fonts.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/colors.php?color=1c85e8" type="text/css" />

    <!-- Document Title
    ============================================= -->
    <title>AskPls | Anonymous Review System</title>

</head>

<body class="stretched side-push-panel">

    <div id="side-panel">

        <div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon-line-cross"></i></a></div>

        <div class="side-panel-wrap">

            <div class="widget clearfix">

                <h4 class="t400">Login</h4>

                
                <div class="line line-sm"></div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="col_full"> 
                        <label for="email" class="t400">{{ __('E-Mail Address') }}</label> 
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col_full">
                        <label for="login-form-password" class="t400">Password:</label>  
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col_full nobottommargin">
                        <button class="button button-rounded t400 nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                        <br>   <br> 
                        <a href="/register" class=" ">Register</a> |       <a href="/password/reset" class=" ">Forgot Password?</a>
                    </div>

                </form>


            </div>

        </div>

    </div>

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        <header id="header">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <div class="row justify-content-xl-between justify-content-lg-between clearfix">

                        <div class="col-lg-2 col-12 d-flex align-self-center">
                            <!-- Logo
                            ============================================= -->
                            <div id="logo">
                                <a href="/" class="standard-logo"><img src="images/logo.png" alt="Canvas Logo"></a>
                                <a href="/" class="retina-logo"><img src="images/logo@2x.png" alt="Canvas Logo"></a>
                            </div><!-- #logo end -->

                        </div>

                        <div class="col-lg-8 col-12 d-xl-flex d-lg-flex justify-content-xl-center justify-content-lg-center">
                            <!-- Primary Navigation
                            ============================================= -->
                            <nav id="primary-menu" class="with-arrows fnone clearfix">

                                <ul> 
                                    <li><a href="/about"><div>About AskPls</div></a></li>
                                    <li><a href="/topics"><div>Topics</div></a></li> 
                                    <li><a href="/prices"><div>Prices</div></a></li>
                                    <li><a href="/faqs"><div>FAQs</div></a></li>
                                    <li><a href="/contact"><div>Contact</div></a></li>
                                </ul>
                            </nav><!-- #primary-menu end -->
                        </div>

                        <div class="col-lg-2 d-none d-lg-inline-flex d-xl-inline-flex justify-content-end nomargin">
                            <!-- Top Search
                            ============================================= -->
                            <div id="side-panel-trigger" class="side-panel-trigger">
                                <a href="#" class="d-block d-lg-none"><i class="icon-line-lock"></i></a>
                                
                                <a href="#" class="d-none d-lg-block">Sign In <i class="icon-line-arrow-right"></i></a>
                            </div><!-- #top-search end -->
                        </div>
                        <a href="#" class="d-block d-lg-none mobile-side-panel side-panel-trigger"><i class="icon-line-arrow-right"></i></a>
                    </div>
                </div>

            </div>

        </header><!-- #header end -->

        <!-- Slider
        ============================================= -->
      

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap clearfix">

                <div class="container">

                    <div class="row clearfix">

                        <div class="col-md-8">
                            <div class="toggle toggle-bg" data-animate="fadeIn">
                                <div class="togglet rounded-top t400"><strong class="mr-1">Q.</strong>What is AskPls?<i class="toggle-icon icon-line-circle-plus"></i></div>
                                <div class="togglec rounded-bottom">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe, aperiam, nam unde quas beatae vero vitae nulla.</div>
                            </div>

                            <div class="toggle toggle-bg" data-animate="fadeIn" data-delay="200">
                                <div class="togglet t400 rounded-top"><strong class="mr-1">Q.</strong>How can I create a topic for anonymous reviews?<i class="toggle-icon icon-line-circle-plus"></i></div>
                                <div class="togglec rounded-bottom">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad odio ab quis architecto recusandae doloremque incidunt! Eius, quidem, pariatur necessitatibus commodi aliquid deleniti repudiandae accusantium tempora soluta vel nesciunt est quibusdam iure adipisci aspernatur maiores saepe ea eaque quo harum reprehenderit similique nemo voluptate ullam natus illum magnam alias nobis doloremque delectus ipsa dicta repellat maxime dignissimos eveniet quae debitis ratione assumenda tempore officiis fugiat dolor. Saepe iusto praesentium ullam aliquam impedit.</div>
                            </div>

                            <div class="toggle toggle-bg" data-animate="fadeIn" data-delay="400">
                                <div class="togglet t400 rounded-top"><strong class="mr-1">Q.</strong>How to Load Profiles?<i class="toggle-icon icon-line-circle-plus"></i></div>
                                <div class="togglec rounded-bottom">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, fugiat iste nisi tempore nesciunt nemo fuga? Nesciunt, delectus laboriosam nisi repudiandae nam fuga saepe animi recusandae. Asperiores, provident, esse, doloremque, adipisci eaque alias dolore molestias assumenda quasi saepe nisi ab illo ex nesciunt nobis laboriosam iusto quia nulla ad voluptatibus iste beatae voluptas corrupti facilis accusamus recusandae sequi debitis reprehenderit quibusdam. Facilis eligendi a exercitationem nisi et placeat excepturi velit!</div>
                            </div>

                            <div class="toggle toggle-bg" data-animate="fadeIn" data-delay="600">
                                <div class="togglet t400 rounded-top"><strong class="mr-1">Q.</strong>How to create groups and link with Profiles?<i class="toggle-icon icon-line-circle-plus"></i></div>
                                <div class="togglec rounded-bottom">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, fugiat iste nisi tempore nesciunt nemo fuga? Nesciunt, delectus laboriosam nisi repudiandae nam fuga saepe animi recusandae. Asperiores, provident, esse, doloremque, adipisci eaque alias dolore molestias assumenda quasi saepe nisi ab illo ex nesciunt nobis laboriosam iusto quia nulla ad voluptatibus iste beatae voluptas corrupti facilis accusamus recusandae sequi debitis reprehenderit quibusdam. Facilis eligendi a exercitationem nisi et placeat excepturi velit!</div>
                            </div>

                            <div class="toggle toggle-bg" data-animate="fadeIn" data-delay="800">
                                <div class="togglet t400 rounded-top"><strong class="mr-1">Q.</strong>How to Track Reviews<i class="toggle-icon icon-line-circle-plus"></i></div>
                                <div class="togglec rounded-bottom">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, quisquam atque vero delectus corrupti! Quo, maiores, dolorem, hic commodi nulla ratione accusamus doloribus fuga magnam id temporibus dignissimos deleniti quidem ipsam corporis sapiente nam expedita saepe quas ab? Vero, assumenda.</div>
                            </div>

                            <div class="toggle toggle-bg" data-animate="fadeIn" data-delay="1000">
                                <div class="togglet t400 rounded-top"><strong class="mr-1">Q.</strong>How can I use it for my work environment<i class="toggle-icon icon-line-circle-plus"></i></div>
                                <div class="togglec rounded-bottom">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti laudantium eius, numquam mollitia delectus non illo error ea cumque minus eveniet soluta. Omnis atque necessitatibus consequatur voluptatum vitae iure, maxime, cumque minus, ipsa nemo, qui architecto officia unde ullam impedit.</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <a href="images/single/2.jpg" data-lightbox="image"><img src="images/single/thumbs/1.jpg" alt=""></a>
                            <div class="clear"></div>
                            <a href="images/single/6.jpg" data-lightbox="image"><img class="mt-5" src="images/single/thumbs/4.jpg" alt=""></a>
                        </div>

                    </div>

                </div>

            </div>

        </section><!-- #content end -->

        <!-- Footer
        ============================================= -->
        <footer id="footer" class="topmargin noborder" style="background-color: #F5F5F5;">

          

            <div class="line nomargin"></div>

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights" class="" style="background-color: #FFF">

                <div class="container clearfix">

                    <div class="col_full center nomargin">
                        <span>Copyrights &copy; 2018 All Rights Reserved by AskPls.</span>
                    </div>

                </div>

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- External JavaScripts
    ============================================= -->
    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>

    <!-- Footer Scripts
    ============================================= -->
    <script src="js/functions.js"></script>

</body>
</html>