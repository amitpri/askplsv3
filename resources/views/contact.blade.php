<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="AskPls" />
 
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:700,700i,900" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
 
    <link rel="stylesheet" href="askpls.css" type="text/css" />

    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" /> 
    <link rel="stylesheet" href="askplsfonts.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/colors.php?color=1c85e8" type="text/css" />

    <script src="/vue/vue.min.js"></script>
        <script src="/axios/axios.min.js"></script> 

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
                             
                            <div id="logo">
                                <a href="/" class="standard-logo"><img src="images/logo.png" alt="AskPls"></a>
                                <a href="/" class="retina-logo"><img src="images/logo@2x.png" alt="AskPls"></a>
                            </div> 

                        </div>

                        <div class="col-lg-8 col-12 d-xl-flex d-lg-flex justify-content-xl-center justify-content-lg-center"> 
                            <nav id="primary-menu" class="with-arrows fnone clearfix">

                                <ul> 
                                    <li><a href="/"><div>Home</div></a></li> 
                                    <li><a href="/topics"><div>Topics</div></a></li> 
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
        <section id="contactform">

            <div class="content-wrap clearfix">

                <div class="container">

                    <div class="contact-widget mt-5 divcenter" style="max-width: 750px">

                            <div>
                                <p v-show="shownameerrors > 0" class="text text-danger">Please enter your name</p>
                                <p v-show="showemailiderrors > 0" class="text text-danger">Please enter Email Id</p>
                                <p v-show="showmessageerrors > 0" class="text text-danger">Please enter the message</
                            </div>
  
                            <div class="col_half">
                                <label class="nott" for="template-contactform-name">Name <small>*</small></label>
                                <input v-model="name"  type="text"  class="sm-form-control required" />
                            </div>

                            <div class="col_half col_last">
                                <label class="nott" for="template-contactform-email">Email <small>*</small></label>
                                <input v-model="email" type="email"  class="required email sm-form-control" />
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                <label class="nott" for="template-contactform-phone">Phone</label>
                                <input v-model="phone" type="text"  class="sm-form-control" />
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                <label class="nott" for="template-contactform-message">Message <small>*</small></label>
                                <textarea v-model="message" class="required sm-form-control"    rows="6" cols="30"></textarea>
                            </div>

                            <div class="col_full hidden">
                                <input type="text"  name="template-contactform-botcheck"  class="sm-form-control" />
                            </div>

                            <div class="col_full">
                                <a @click="sendmessage" class="button button-rounded button-large nomargin" href="">Send Message</a>
                                 
                            </div>
 
                    </div>

                </div>

            </div>

        </section><!-- #content end -->

        <!-- Footer
        ============================================= -->
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
 
    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
 
    <script src="js/functions.js"></script>
    <script>
    
        new Vue({

            el : '#contactform',
            data : {
                name:"", 
                email: "", 
                phone: "",
                message:  "", 
                validation: 1,
                showmessageerrors: 0,
                showemailiderrors: 0,
                shownameerrors: 0,
            }, 
            methods:{

                sendmessage:function(event){

                    event.preventDefault();  
                    this.validation = 1;
                    this.shownameerrors = 0;
                    this.showemailiderrors = 0;
                    this.showmessageerrors = 0;

                    if( this.name == ""){

                        this.validation = 0;

                        this.shownameerrors = 1; 
                    }

                    if( this.email == ""){

                        this.validation = 0;

                        this.showemailiderrors = 1;
 
                    }
                    if( this.message == ""){

                        this.validation = 0;

                        this.showmessageerrors = 1; 
                    }

                    if( this.validation == 1){

                        axios.get('/contactform' ,{

                            params: {

                                name : this.name, 
                                email : this.email,
                                phone : this.phone, 
                                message : this.message,

                                }

                            })
                        .then(response => {

                            this.name = "";
                            this.email = "";
                            this.message = "";
                            
                            toastr.options = {
                                    
                                            "timeOut": "1000",
                                            "positionClass": "toast-top-center",
                                        };

                                        toastr.info('Thank You!!Your mail is sent!!',{ fadeAway: 1 });    

                        }); 
                    }

                    
                },  
            }

        })


    </script>
</body>
</html>