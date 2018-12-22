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
                                    <li><a href="/topics"><div>Topics</div></a></li>
                                    <li><a href="/solutions"><div>Solutions</div></a></li>
                                    <li><a href="/why"><div>Why AskPls</div></a></li>
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

		<!-- Page Title
		============================================= -->
 

		<!-- Content
		============================================= -->
		<section  id="topicsdetails">

			<div class="content-wrap clearfix">

				<div class="container">

					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="search-control-wrapper">
								<form action="#">
									<div class="form-group">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Search Topics" v-model="searchquery"  @keyup="filteredtopics" >
 											<button class="btn btn-primary" type="button">Search</button>
											 
										</div>
									</div>
								</form>
							</div> 
						</div>
					</div>

					<div class="row clearfix" >

						<div class="col-md-12">
                            <div v-for="topic in topics" v-cloak>
    							<div  class="toggle toggle-bg" data-animate="fadeIn" >
    								<div class="togglet rounded-top t400"><strong class="mr-1">Q.</strong>@{{ topic.topic_name }}
                                        <i class="toggle-icon icon-line-circle-plus"></i>
                                    </div>
    								<div class="togglec rounded-bottom">
                                        <p>Posted by 
                                                <a target="_blank" :href="'/viewprofile/' + topic.user_id">@{{ topic.name }}</a> on 12 Dec 2018 || 
                                                <a target="_blank" class="btn btn-default" :href="'/topics/' + topic.id "> Comments</a> </p>
                                         @{{ topic.details }}
                                         
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