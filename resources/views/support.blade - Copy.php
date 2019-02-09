<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="AskPls" /> 
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:700,700i,900" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/style.css" type="text/css" />
    <link rel="stylesheet" href="/css/dark.css" type="text/css" />
 
    <link rel="stylesheet" href="/askpls.css" type="text/css" />

    <link rel="stylesheet" href="/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/css/magnific-popup.css" type="text/css" />
 
    <link rel="stylesheet" href="/askplsfonts.css" type="text/css" />

    <link rel="stylesheet" href="/css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/css/colors.php?color=1c85e8" type="text/css" />
    @include('analytics') 

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
 
    <div id="wrapper" class="clearfix">
 
        <header id="header">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <div class="row justify-content-xl-between justify-content-lg-between clearfix">

                        <div class="col-lg-2 col-12 d-flex align-self-center">
                            <!-- Logo
                            ============================================= -->
                            <div id="logo">
                                <a href="/" class="standard-logo"><img src="/images/logo.png" alt="AskPls"></a>
                                <a href="/" class="retina-logo"><img src="/images/logo@2x.png" alt="AskPls"></a>
                            </div> 

                        </div>

                        <div class="col-lg-8 col-12 d-xl-flex d-lg-flex justify-content-xl-center justify-content-lg-center"> 
                            <nav id="primary-menu" class="with-arrows fnone clearfix">

                                <ul> 
                                    <li><a href="/t"><div>Home</div></a></li> 
                                    <li><a href="/about"><div>About AskPls</div></a></li> 
                                    <li><a href="/prices"><div>Prices</div></a></li> 
                                    <li><a href="/support"><div>Support</div></a></li>
                                </ul>
                            </nav> 
                        </div>

                        @if (Route::has('login'))
                            @if (Auth::check())
                                <div class="col-lg-2 d-none d-lg-inline-flex d-xl-inline-flex justify-content-end nomargin"> 
                                    <div id="side-panel-trigger"  > 
                                        
                                        <a href="/portal" class="d-none d-lg-block">Portal <i class="icon-line-arrow-right"></i></a>
                                    </div> 
                                </div> 
                            @else
                                <div class="col-lg-2 d-none d-lg-inline-flex d-xl-inline-flex justify-content-end nomargin">
                                    <div id="side-panel-trigger" class="side-panel-trigger">
                                        <a href="#" class="d-block d-lg-none"><i class="icon-line-lock"></i></a>
                                        
                                        <a href="#" class="d-none d-lg-block">Sign In <i class="icon-line-arrow-right"></i></a>
                                    </div> 
                                </div>                           
                            @endif
                        @endif
                        <a href="#" class="d-block d-lg-none mobile-side-panel side-panel-trigger"><i class="icon-line-arrow-right"></i></a>
                    </div>
                </div>

            </div>

        </header> 
        <section id="content">

            <div class="content-wrap clearfix">

                <div class="container clearfix">

                    <!-- Post Content
                    ============================================= -->
                    <div class="postcontent col_last nobottommargin clearfix">

                        <div id="faqs" class="faqs">

                            <div id="faqs-list" class="fancy-title title-bottom-border">
                                <h3>Some of your Questions:</h3>
                            </div>

                            <ul class="iconlist faqlist">
                                <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-1">What is AskPls?</a></strong></li>
                                <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-2">What is a Topic and how to create one?</a></strong></li>
                                <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-3">What is a Anonymous Review?</a></strong></li>
                                <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-4">What are Public and Private Topics?</a></strong></li>
                                <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-5">Pricing?</a></strong></li>
                                <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-6">How to Track Reviews?</a></strong></li> 
                            </ul>

                            <div class="divider"><i class="icon-circle"></i></div>

                            @foreach ($faqs as $faq)

                                <h3 id="{{ $faq->question}}"><strong>Q.</strong> {{ $faq->question}}</h3>
                                <p>{{ $faq->answer}}</p>

                            @endforeach

                            <h3 id="faq-1"><strong>Q.</strong> What is AskPls?</h3>
                            <p>AskPls helps you getting genuine reviews from people you know or from general public who sees your question posted. AskPls makes sure identity of the reviewer is never captured and hence allowing them to write a genuine review of any of your question</p>

                            <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                            <h3 id="faq-2"><strong>Q.</strong> What is a Topic and how to create one?</h3>
                            <p>Topic is the question which you will ask your friends and circle for review. You can register to the AskPls Portal and create one Topic. Give a name of the topic that will be displayed as title and provide other details like description, provide image link and youtube videos. Once a topic is created, you will be shared a link which you can share at your social platforms like Facebook, Twitter, Linkedin, Whatsapp etc.</p>

                            <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                            <h3 id="faq-3"><strong>Q.</strong> What is a Anonymous Review?</h3>
                            <p>Anonymous review is where identity of a reviewer is never captured even if he / she is logged in to the portal. You have to click on the Topic link and then enter your genuine review about the question asked.</p>

                            <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                            <h3 id="faq-4"><strong>Q.</strong> What are Public and Private Topics?</h3>
                            <p>Public topics are the ones which allows you use the link and share with your circle outside the AskPls. It also allows you to post the topic on the AskPls portal and is searchable by general public and can be reviewed by anyone. Private topics are generally used by organization where they can configure the profiles and groups within the organizations and topics are shared for review only to specified set of people and groups.</p> 

                            <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                            <h3 id="faq-5"><strong>Q.</strong> Pricing?</h3>
                            <p>Public based reviews are completely free of cost. However Private topics which can be shared to specific profiles and groups of the organization comes with a cost. Please contact us for the price.</p>

                            <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                            <h3 id="faq-6"><strong>Q.</strong> How to Track Reviews?</h3>
                            <p>Once you post a topic, you will start getting the reviews depending upon how well you market your links and how easily it is searchable on the AskPls portal. You can view all the reviews by logging into your account and check under review menu. You can even export the reviews in excel to analyze later.</p>

                            <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                             

                             

                        </div>

                    </div><!-- .postcontent end -->

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar nobottommargin clearfix">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget widget_links clearfix">

                                <h4>Help Topics</h4>
                                <ul>
                                    <li><a href="/support"><div>General</div></a></li>
                                    <li><a href="/support/topics"><div>Topics</div></a></li>
                                    <li><a href="/support/reviews"><div>Reviews</div></a></li>
                                    <li><a href="/support/login"><div>Login / Register</div></a></li>
                                     
                                </ul>
                                <br>

                                <h4><a href="/support" style="color:black;">Contact</a></h4>


                            </div>  

                        </div>
                    </div><!-- .sidebar end -->

                </div> 

            </div>

        </section> 
        <footer id="footer" class="topmargin noborder" style="background-color: #F5F5F5;">
 
            <div class="line nomargin"></div>
 
            <div id="copyrights" class="" style="background-color: #FFF">

                <div class="container clearfix">

                    <div class="col_full center nomargin">
                        <span>Copyrights &copy; 2019 All Rights Reserved by AskPls.</span>
                    </div>

                </div>

            </div> 

        </footer> 

    </div> 
 
    <div id="gotoTop" class="icon-angle-up"></div>

    <script src="/js/jquery.js"></script>
    <script src="/js/plugins.js"></script>
 
    <script src="/js/functions.js"></script>

</body>
</html>