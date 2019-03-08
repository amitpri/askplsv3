<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="AskPls" />
 
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:700,700i,900" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/style.css" type="text/css" />
    <link rel="stylesheet" href="/css/dark.css" type="text/css" />

    <!-- Home Demo Specific Stylesheet -->
    <link rel="stylesheet" href="/askpls.css" type="text/css" />

    <link rel="stylesheet" href="/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/css/magnific-popup.css" type="text/css" />

    <!-- Reader's Blog Demo Specific Fonts -->
    <link rel="stylesheet" href="/askplsfonts.css" type="text/css" />

    <link rel="stylesheet" href="/css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/css/colors.php?color=1c85e8" type="text/css" />

    <script async src="https://www.instagram.com/embed.js"></script>

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
 
		<divstyle=" margin-top:40px;     ">
			<div class="container">

				@foreach ($topics as $topic)
			 		<section  class="  center"  >
						<h1 class="font-secondary nott mb-3" style="color: black; font-size: 36px;">{{ $topic->topic_name }}</h1>
						<p style="font-weight: 300; opacity: .7; color: black;  ">Posted by 
								<a target="_blank" href="/p/{{ $topic->user_code }}/{{ $topic->name }}">{{ $topic->name }}</a> on {{ $topic->created_at }} </p> 

							 
						@if(isset($topic->instagram))	 

							<div class="container clearfix" style="max-width: 800px;">  

								<blockquote class="instagram-media" data-instgrm-permalink="{{ $topic->instagram }}" data-instgrm-version="9" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style="   display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> </div></blockquote>  

							</div>

						@endif
							
						@if(isset($topic->details))	  
		 				
		 					<p  style="color: black; font-size: 18px;">{!!html_entity_decode($topic->details)!!} </span></p>

		 				@endif

		 				@if(isset($topic->image))
 
							<img src="/storage/{{ $topic->image }}" max-width="400" alt="{{ $topic->name }}">
		 				
		 				@endif

		 				@if(isset($topic->video))
 
							<iframe  width="640" height="360" class="embed-responsive-item" 
						  		src="https://www.youtube.com/embed/{{ $topic->video }}" ></iframe> 
		 				
		 				@endif
						
					</section> 
				@endforeach

 			</div>

 			<div id="feedback">
 				
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

				<section   >

				<div class="content-wrap clearfix">

					<div class="container">

						<div v-if="showreview == -1" v-cloak > 

							<div class="center">Reviews are Loading.....</div>
						</div>

						<div v-else-if="showreview == 0" v-cloak > 

							<div class="center">Reviews are not publicly viewable</div>
						</div>

						<div v-else   >

							<div class="row clearfix" >

								<div class="col-md-12">
		                            <div id="widget-subscribe-form"  style="margin-bottom: 10px; "  v-for="feedback in feedbacks" v-cloak >
		    						    
	                                    <p>Posted on @{{ feedback.created_at }} </p>
	                                     <p><b style="font-size:16px;">@{{ feedback.review }}</b> </p>
		                                       
		                            </div>
									   
								</div> 

							</div>
							
						</div>
						
					</div>

						<div  v-if="showLoadMore > 0" class="center" v-cloak ><button class="btn btn-primary"  @click="moremessages">Load More</button></div>

				</div>
	
			</section><!-- #content end -->
 			</div>
			

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
 

					axios.get('/st/messages',{
						params: {

					      	id: this.inpId, 
					      	 
					    	}

						})
						.then(response => {

							if( response.data.error_code == 0){

							this.showreview = 0;

						}else{

							if( response.data.length < 10){
								this.showLoadMore = 0;
							}else{
								this.showLoadMore = 1;
							}

							this.feedbacks = response.data
							this.showreview = 1;
						}

					}); 

				},
				methods: { 
 
	                moremessages:function(){

	                    axios.get('/st/getmoremessages' ,{

	                            params: {
	                              row_count: this.row_count,
	                              id: this.inpId, 
	                            }

	                        }).then(response => {

	                        	if( response.data.length < 10){
									this.showLoadMore = 0;
								}else{
									this.showLoadMore = 1;
								}

	                            for (var i = 0;  i <= response.data.length - 1; i++ ) {

	                                this.feedbacks.push({

	                                        id : response.data[i].id, 
	                                        user_id : response.data[i].user_id, 
	                                        topic_name : response.data[i].topic_name, 
	                                        ImageTopic1 : response.data[i].ImageTopic1, 
	                                        review : response.data[i].review,  

	                                    });
	                            }                       

	                        });
	     

	                    this.row_count = this.row_count + 10;
	                    
	                },
					savefeedback:function(e){

						if( this.inpReview  === '' ){

							alert("Please write some review and submit!!");
							
						}else{
							
							this.flg_name = false;

							var c = confirm("Sure to Submit? Please recheck the content!!");

							if( c == true){

								axios.get('/st/postreview' ,{
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