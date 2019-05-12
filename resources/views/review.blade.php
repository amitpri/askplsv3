<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:700,700i,900" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/style.css" type="text/css" />
    <link rel="stylesheet" href="/css/dark.css" type="text/css" />

    <!-- Home Demo Specific Stylesheet -->
    <link rel="stylesheet" href="/demos/interior-design/interior-design.css" type="text/css" />

    <link rel="stylesheet" href="/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/css/magnific-popup.css" type="text/css" />

    <!-- Reader's Blog Demo Specific Fonts -->
    <link rel="stylesheet" href="/demos/interior-design/css/fonts.css" type="text/css" />

    <link rel="stylesheet" href="/css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/css/colors.php?color=1c85e8" type="text/css" />

	<script src="/vue/vue.min.js"></script>
	<script src="/axios/axios.min.js"></script>
	<script src="/toastr/toastr.min.js"></script> 
    <link href="/toastr/toastr.min.css" rel="stylesheet" type="text/css"> 
    @include('analytics')

    <!-- Document Title
    ============================================= -->
    <title>AskPls | Anonymous Review System</title>

</head>

<body class="stretched side-push-panel">

 

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
                                <a href="/" class="standard-logo"><img src="/images/logo.png" alt="Canvas Logo"></a>
                                <a href="/" class="retina-logo"><img src="/images/logo@2x.png" alt="Canvas Logo"></a>
                            </div><!-- #logo end -->

                        </div> 
                        <a href="/#" class="d-block d-lg-none mobile-side-panel side-panel-trigger"><i class="icon-line-arrow-right"></i></a>
                    </div>
                </div>

            </div>

        </header><!-- #header end -->

        <!-- Slider
        ============================================= -->
        <section  style="height: 500px; margin-top:-50px;    " id="review">
            <div class="vertical-middle">
                <div class="container clearfix">

                    <div class="clearfix center divcenter" style="max-width: 800px;">
                        <div class="emphasis-title">
                            <h1 class="font-secondary" style="color: black; font-size: 24px; font-weight: 400; text-shadow: 0 7px 10px rgba(0,0,0,0.07), 0 4px 4px rgba(0,0,0,0.2);">{{ $topic->topic_name }} </h1>
                            <p style="font-weight: 300; opacity: .7; color: black; text-shadow: 0 -4px 20px rgba(0, 0, 0, .25);">{!!html_entity_decode($topic->details)!!}</p>
                        </div>
       
                        <form id="widget-subscribe-form" action="/register" role="form" method="get" class="nobottommargin" data-animate="fadeInUp">
                            <div class="input-group divcenter"> 

                                <textarea name="details" v-model="inpReview" class="form-control" rows="5" id="comment" class="form-control form-control-lg not-dark" style="border: 0; box-shadow: none;  "  placeholder="Your comments" ></textarea> 

                            </div>
                            <div v-if="published" >

                            	<button type="submit" class="button " style="border-radius: 3px;" @click="draftfeedback">Save Draft</button>  
                            	<button type="submit" class="button " style="border-radius: 3px;" @click="savefeedback">Submit</button>

                            </div>
                        </form>
                      
                    </div>

                </div>
            </div>
        </section>

      
    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- External JavaScripts
    ============================================= -->
    <script src="/js/jquery.js"></script>
    <script src="/js/plugins.js"></script>

    <!-- Footer Scripts
    ============================================= -->
    <script src="/js/functions.js"></script>
		<script>
	
			new Vue({

				el : '#review',

				data : {
					id:"", 
					inpId: "{!! $topicmail->id !!}", 
					inpReview: "",
					inpKey:"", 
					inpUser_id : "{!! $topic->user_id !!}", 
					inpProfile_id : "{!! $topicmail->profile_id !!}", 
					inpTopic_id : "{!! $topicmail->topic_id !!}", 
					inpTopic : "{!! $topic->topic_name !!}", 
					inpMailkey : "{!! $topicmail->mailkey !!}", 
					published : true,
					},

				mounted:function(){

					axios.get('/review/default',{
						params: {

					      		user_id : this.inpUser_id, 
					      		profile_id : this.inpProfile_id, 
					      		topic_id : this.inpTopic_id, 
					      		id : this.inpId, 
					      		mailkey : this.inpMailkey,
					      	 
					    	}
					})
					.then(response => {

						this.inpReview = response.data.review;

						if( response.data.published == 1 ){

							this.published =  false;

						}

					}); 

				},
				methods:{

					draftfeedback:function(e){ 

						e.preventDefault();

						axios.get('/review/draft' ,{
						params: {

					      		review: this.inpReview, 
					      		user_id : this.inpUser_id, 
					      		profile_id : this.inpProfile_id, 
					      		topic_id : this.inpTopic_id, 
					      		topic : this.inpTopic,
					      		id : this.inpId, 
					      		mailkey : this.inpMailkey,
					      	 
					    	}
						}).then(function(response){
								 
								toastr.options = {
						            
						            "timeOut": "1000",
						        };

								toastr.success('Message is Saved as Draft!!',{ fadeAway: 1 });

						});

					},
					savefeedback:function(e){

						e.preventDefault();

						var c = confirm("Sure to Publish? You will not be able to modify it later");				 

						if( c == true){
 
							axios.get('/review/save' ,{
							params: {

						      		review: this.inpReview, 
						      		user_id : this.inpUser_id, 
						      		profile_id : this.inpProfile_id, 
						      		topic_id : this.inpTopic_id, 
						      		topic : this.inpTopic,
						      		id : this.inpId, 
						      		mailkey : this.inpMailkey, 
						      	 
						    	}
							}).then(function(response){
									 
									this.published =  false;

									toastr.options = {
							            
							            "timeOut": "1000",
							        };

									toastr.success('Message is Published!!',{ fadeAway: 1 });

							});
						}
					}
				}

			})


		</script>
</body>
</html>