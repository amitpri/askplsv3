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
    <meta charset="UTF-8">
    <meta name="viewport"   content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Confirmation</title>
</head>
<body class="stretched side-push-panel">
	<div id="payment">
		<h2>Thank for placing your order</h2>
		<h2>Redirecting.....</h2>
	</div>

    <div id="gotoTop" class="icon-angle-up"></div> 
    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
 
    <script src="js/functions.js"></script>
    <script>
    
        new Vue({

            el : '#payment',
            data : { 
            }, 
            mounted:function(){

					axios.get('/payment/redirect'); 

				},

        })


    </script>
</body>
</html>