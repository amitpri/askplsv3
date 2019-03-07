<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head> 

    <!-- Stylesheets
    ============================================= -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="AskPls" />

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:700,700i,900" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />  
    <link rel="stylesheet" href="askpls.css" type="text/css" />

    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" /> 
 
    <link rel="stylesheet" href="askplsfonts.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/colors.php?color=1c85e8" type="text/css" />

    <script src="/vue/vue.min.js"></script>
    <script src="/axios/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/places.js@1.15.4"></script>
 
    <link rel="stylesheet" href="seo/css/fonts.css" type="text/css" />
    <link rel="stylesheet" href="seo/seo.css" type="text/css" />

    <!-- Document Title
    ============================================= -->
    <title>AskPls | Anonymous Review System Prices</title>

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
 

                    <div class="row justify-content-xl-between justify-content-lg-between clearfix">

                        <div class="col-lg-2 col-12 d-flex align-self-center">
                            <!-- Logo
                            ============================================= -->
                            <div id="logo">
                                <a href="/" class="standard-logo"><img src="images/logo.png" alt="AskPls"></a>
                                <a href="/" class="retina-logo"><img src="images/logo@2x.png" alt="AskPls"></a>
                            </div><!-- #logo end -->

                        </div>

                        <div class="col-lg-8 col-12 d-xl-flex d-lg-flex justify-content-xl-center justify-content-lg-center">
                            <!-- Primary Navigation
                            ============================================= -->
                            <nav id="primary-menu" class="with-arrows fnone clearfix">

                                <ul> 
                                    <li><a href="/"><div>Home</div></a></li> 
                                    <li><a href="/topics"><div>Topics</div></a></li> 
                                    <li><a href="/about"><div>About AskPls</div></a></li> 
                                    <li><a href="/prices"><div>Prices</div></a></li> 
                                    <li><a href="/support"><div>Support</div></a></li>
                                </ul>
                            </nav><!-- #primary-menu end -->
                        </div>

                        @if (Route::has('login'))
                            @if (Auth::check())
                                <div class="col-lg-2 d-none d-lg-inline-flex d-xl-inline-flex justify-content-end nomargin">
                                    <!-- Top Search
                                    ============================================= -->
                                    <div id="side-panel-trigger"  > 
                                        
                                        <a href="/portal" class="d-none d-lg-block">Portal <i class="icon-line-arrow-right"></i></a>
                                    </div><!-- #top-search end -->
                                </div> 
                            @else
                                <div class="col-lg-2 d-none d-lg-inline-flex d-xl-inline-flex justify-content-end nomargin">
                                    <!-- Top Search
                                    ============================================= -->
                                    <div id="side-panel-trigger" class="side-panel-trigger">
                                        <a href="#" class="d-block d-lg-none"><i class="icon-line-lock"></i></a>
                                        
                                        <a href="#" class="d-none d-lg-block">Sign In <i class="icon-line-arrow-right"></i></a>
                                    </div><!-- #top-search end -->
                                </div>                           
                            @endif
                        @endif
                        <a href="#" class="d-block d-lg-none mobile-side-panel side-panel-trigger"><i class="icon-line-arrow-right"></i></a>
                    </div>
                </div>

            </div>

        </header><!-- #header end -->

        <!-- Slider
        ============================================= -->
      

        <!-- Content
        ============================================= -->
        <section id="content" style="margin-top:-50px;">

            <div class="section m-0" style="background: url('seo/images/sections/4.png') no-repeat center top; background-size: cover; padding: 140px 0 0;">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-md-4 mt-4">
                                <div class="heading-block nobottomborder bottommargin-sm">
                                    <div class="badge badge-pill badge-primary">Pricing Table</div>
                                     
                                </div> 
                                <div class="pricing-tenure-switcher" data-container="#pricing-switch">
                                    <span class="pts-left">Monthly</span>
                                    <div class="pts-switcher">
                                        <div class="switch">
                                            <input id="switch-toggle-pricing-tenure" class="switch-toggle switch-toggle-round" type="checkbox">
                                            <label for="switch-toggle-pricing-tenure"></label>
                                        </div>
                                    </div>
                                    <span class="pts-right">Yearly</span>
                                    <div class="price-discount"></div>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-8" >
                                <div id="section-pricing" class="page-section nopadding nomargin">

                                    <div id="pricing-switch" class="pricing row align-items-end bottommargin-lg clearfix">

                                        <div class="col-md-6">

                                            <div class="pricing-box">
                                                <div class="pricing-title"> 
                                                    <h3>Free</h3>
                                                </div> 
                                                <div class="pricing-features border-bottom-0">
                                                    <ul>
                                                        <li><i class="icon-check-circle color mr-2"></i><strong>No</strong> Support</li>
                                                        <li><i class="icon-check-circle color mr-2"></i><strong>Public</strong> Topics Only</li> 
                                                    </ul>
                                                </div>
                                                <div class="pricing-action">
                                                    <div class="pts-switch-content-left"><a href="/register" class="button button-rounded button-large  text-dark bg-white border btn-block nott m-0 ls0">Get Started</a></div>
                                                    <div class="pts-switch-content-right"><a href="/register" class="button button-rounded button-large button-light text-dark bg-white border btn-block nott m-0 ls0">Get Started</a></div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="pricing-box">
                                                <div class="pricing-title"> 
                                                    <h3>Paid Plan</h3>  
                                                </div>
                                                <div class="pricing-price">
                                                    <div class="pts-switch-content-left"><span class="price-unit">&dollar;</span>10<span class="price-tenure">Per Month per user</span></div>
                                                    <div class="pts-switch-content-right"><span class="price-unit">&dollar;</span>75<span class="price-tenure">Per Year per user</span></div>
                                                </div>
                                                <div class="pricing-features border-bottom-0">
                                                    <ul>
                                                        <li><i class="icon-check-circle color mr-2"></i><strong>24*7</strong> Support</li>
                                                        <li><i class="icon-check-circle color mr-2"></i><strong>Public</strong> Topics</li> 
                                                        <li><i class="icon-check-circle color mr-2"></i><strong>Private</strong> Topics</li> 
                                                    </ul>
                                                </div>
                                                <div class="pricing-action">
                                                    <div class="pts-switch-content-left"><a href="/portal/payments" class="button button-large button-rounded btn-block capitalize m-0 ls0 button">Get Started</a></div>
                                                    <div class="pts-switch-content-right"><a href="/portal/payments" class="button button-large button-rounded btn-block capitalize m-0 ls0">Get Started</a></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
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

    <script>
        //Pricing Table Script
        jQuery(document).ready( function($){
            function pricingSwitcher( elementCheck, elementParent, elementPricing ) {
                elementParent.find('.pts-left,.pts-right').removeClass('pts-switch-active');
                elementPricing.find('.pts-switch-content-left,.pts-switch-content-right').addClass('hidden');

                if( elementCheck.filter(':checked').length > 0 ) {
                    elementParent.find('.pts-right').addClass('pts-switch-active');
                    elementPricing.find('.pts-switch-content-right').removeClass('hidden');
                } else {
                    elementParent.find('.pts-left').addClass('pts-switch-active');
                    elementPricing.find('.pts-switch-content-left').removeClass('hidden');
                }
            }

            $('.pts-switcher').each( function(){
                var element = $(this),
                    elementCheck = element.find(':checkbox'),
                    elementParent = $(this).parents('.pricing-tenure-switcher'),
                    elementPricing = $( elementParent.attr('data-container') );

                pricingSwitcher( elementCheck, elementParent, elementPricing );

                elementCheck.on( 'change', function(){
                    pricingSwitcher( elementCheck, elementParent, elementPricing );
                });
            });
        });

    </script>

</body>
</html>