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

    <script src="/vue/vue.min.js"></script>
        <script src="/axios/axios.min.js"></script>

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

		<!-- Page Title
		============================================= -->
 

		<!-- Content
		============================================= -->
		<section  id="topicsdetails">

			<div class="content-wrap clearfix">

				<div class="container">
                    <form id="widget-subscribe-form"   class="nobottommargin col-md-9 offset-md-2" style="margin-top:-60px; " >
                        <div class="input-group divcenter">
                            <input   type="text" id="workspace" name="workspace" class="form-control form-control-lg not-dark" placeholder="Search Topics." style="border: 0; box-shadow: none; overflow: hidden;" v-model="searchquery"  @keyup="filteredtopics" >
                            <button type="submit" class="button " style="border-radius: 3px;">Search</button>  
                             
                        </div>
                    </form> 

					<div class="row clearfix" style="margin-top:30px; "  >

						<div class="col-md-2">
                            <div class="t400" style="background-color:  ">
                                <ul class="nav flex-column">
                                  <li class="nav-item">
                                    <a class="nav-link" href="/topics?category=personal">Personal</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="/topics?category=hr">HR</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="/topics?category=sales">Sales</a>
                                  </li> 
                                  <li class="nav-item">
                                    <a class="nav-link" href="/topics?category=marketing">Marketing</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="/topics?category=operation">Operation</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="/topics?category=technology">Technology</a>
                                  </li>
                                </ul>
                            </div>
                        </div>  
                        <div class="col-lg-10 ">
                            <div class="row" v-for="topic in topics" style="margin-bottom: 10px; min-height: 120px; border: 1px solid #F2E7E5;border-radius: 5px;" class="border border-danger" v-cloak >
                                <div class="col-12 col-md-3">
                                    <div class="review-company"><a target="_blank" :href="'/viewprofile/' + topic.user_code">@{{ topic.name }}</a> </div>
                                    <div class="review-id"><a target="_blank" :href="'/topics?category=' + topic.category">@{{ topic.category }}</a></div>
                                    
                                    <div class="review-date">
                                        @{{ topic.updated_at }}<br> 
                                    </div>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="review-title">
                                        <h4><a target="_blank" :href="'/topics/' + topic.url" style="">@{{ topic.topic_name }}</a></h4>
                                    </div>
                                    <div class="review-content">
                                        <h6 v-html="topic.details">  </h6>
                                    </div>
                                </div>
                            </div> 
                        </div> 

					</div>

				</div>

			</div>

            <div class="center"><button class="btn btn-primary" @click="morerows">Load More</button></div>

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
	<script src="../../js/jquery.js"></script>
	<script src="../../js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="../../js/functions.js"></script>

    <script>
    
        const topicsdetails = new Vue({

            el : '#topicsdetails',
            data : {
                id:"", 
                inpId: "", 
                topic: "",
                topics: [],
                inpKey:"", 
                searchquery : "",
                row_count : 10,
            },
            mounted:function(){ 

                axios.get('/topics/default')
                .then(response => {

                    this.topics = response.data; 

                }); 

            },
            methods:{

                filteredtopics:function(){

                    axios.get('/showtopics/filtered' ,{

                            params: {

                                topics : this.searchquery, 

                                }

                            })
                        .then(response => {this.topics = response.data});
                
         
                },
                morerows:function(){

                    axios.get('/showtopics/getmore' ,{

                            params: {
                              row_count: this.row_count,
                            }

                        }).then(response => {

                            for (var i = 0;  i <= response.data.length - 1; i++ ) {

                                this.topics.push({

                                        id : response.data[i].id, 
                                        user_id : response.data[i].user_id, 
                                        topic : response.data[i].topic, 
                                        name : response.data[i].name,  

                                    });
                            }                       

                        });
     

                    this.row_count = this.row_count + 10;
                    
                }
            }

        })


    </script>

</body>
</html>