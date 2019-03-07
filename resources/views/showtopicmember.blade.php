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

    <script src="/vue/vue.min.js"></script>
        <script src="/axios/axios.min.js"></script>
        @include('analytics')
 
    <title>{{ $topic_name }}</title>

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
                                <a href="/" class="standard-logo"><img src="/images/logo.png" alt="AskPls Logo"></a>
                                <a href="/" class="retina-logo"><img src="/images/logo@2x.png" alt="AskPls Logo"></a>
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

		<!-- Page Title
		============================================= -->

		<div id="feedback" style=" margin-top:40px;     ">
			<div class="container">
		 		<section  class="  center" v-for="topic in topics">
					<h1 class="font-secondary nott mb-3" style="color: black; font-size: 36px;    ">@{{ topic.topic_name }}</h1>
					<p style="font-weight: 300; opacity: .7; color: black;  ">
							Review topic for <a :href="'/c/' +  categorytype + '/' + topic.category_code + '/' + topic.name.replace(/ /g,'_')">@{{ topic.name }}</a>  </p> 
							<span>Posted on @{{ topic.created_at }} <span v-if="topic.user_name"> by <a target="_blank" :href="'/p/' + topic.user_code + '/' + topic.user_name.replace(/ /g,'_')">@{{topic.user_name}}</a></span></span>
					<p>&nbsp;</p>
	 				
	 				<p  style="color: black; font-size: 18px;    "><span v-html="topic.details"> </span></p>

					<img v-if="topic.image" :src="'/storage/' + topic.image" max-width="400">
	 

					<iframe v-if="topic.video" width="640" height="360" class="embed-responsive-item" 
					  		:src="'https://www.youtube.com/embed/' + topic.video" ></iframe> 
	 
					<div class="container clearfix"> 
						<div class="clearfix center divcenter" style="max-width: 800px; margin-top:40px;">
							<div id="widget-subscribe-form">
	                            <div class="  divcenter">
	                                <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="5" cols="30" v-model="inpReview" style="border: none;" placeholder="Enter Anonymous Review"></textarea>   
	                                <button @click="savefeedback" type="submit" class="button " style="border-radius: 3px;">Submit Review</button>                   
	                            </div>
	                        </div>
	                    </div>
	 
					</div> 
				</section><!-- #page-title end -->
 			</div
		 
		 

 		</div>

		<!-- Footer
		============================================= -->
		<footer id="footer" class="topmargin noborder" style="background-color: #F5F5F5;">          

            <div class="line nomargin"></div>

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights" class="" style="background-color: #FFF">

                <div class="container clearfix">

                    <div class="col_full center nomargin">
                        <span>Copyrights &copy; 2019 All Rights Reserved by AskPls.</span>
                    </div>

                </div>

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>
 
	<script src="../../js/jquery.js"></script>
	<script src="../../js/plugins.js"></script>
 
	<script src="../../js/functions.js"></script>

    <script>
	
			new Vue({

				el : '#feedback',
				data : {
					id:"", 
					inpId: "{!! $id !!}",
					url:"", 
					inpUrl: "{!! $url !!}", 
					inpTopicName:  @json($topic_name) ,
					categorytype: "{!! $categorytype !!}",
					inpName: "",
					inpTopic: "",
					inpDetail: "", 
					inpCreated_at: "",
					feedback: "",
					feedbacks: [],
					inpKey:"", 
					shownewfeedback: false,
					inpReview : "",
					flg_name : false,
					row_count : 10,
					topics : [],
					topic : "",
					showreview : -1,
					showLoadMore : 0,
				},
				mounted:function(){

					axios.get('/st/pd/showdetails',{
					params: {

				      	url: this.inpUrl, 
				      	categorytype: this.categorytype,
				      	 
				    	}

					})
					.then(response => {

						this.topics = response.data
						

					}); 

				},
				methods: { 
  
					savefeedback:function(e){

						if( this.inpReview  === '' ){

							alert("Please write some review and submit!!");
							
						}else{
							
							this.flg_name = false;

							var c = confirm("Sure to Submit? Please recheck the content!!");

							if( c == true){

								axios.get('/st/pd/postreview' ,{
									params: {

								      		review: this.inpReview,
								      		topicid : this.inpId,
								      		topicname : this.inpTopicName, 
								      	 
								    	}
									}).then(response => { 

										this.feedbacks.unshift({
	 
											review : response.data.review, 
											created_at : response.data.created_at, 

										})

										this.feedback = "";
										this.shownewfeedback = false; 

										this.inpReview = "";


										toastr.options = {
						            
								            "timeOut": "1000",
								            "positionClass": "toast-top-center",
								        };

										toastr.info('Thank You!!Your Feedback is Posted!!',{ fadeAway: 1 });	
				 
								});

							}

						}
 
					}
				},

			})

		</script>

</body>
</html>