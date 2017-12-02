
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- cdn for awesome fonts -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	
	<style type="text/css">
		.row{
	    margin-left:0px;
	    margin-right:0px;
	}

	#wrapper {
	    padding-left: 70px;
	    transition: all .4s ease 0s;
	    height: 100%
	}

	#sidebar-wrapper {
	    margin-left: -150px;
	    left: 70px;
	    width: 200px;
	    background: #222;
	    position: fixed;
	    height: 100%;
	    z-index: 10000;
	    transition: all .4s ease 0s;
	}

	.sidebar-nav {
	    display: block;
	    float: left;
	    width: 150px;
	    list-style: none;
	    margin: 0;
	    padding: 0;
	}
	#page-content-wrapper {
	    padding-left: 0;
	    margin-left: 0;
	    width: 100%;
	    height: auto;
	}
	#wrapper.active {
	    padding-left: 150px;
	}
	#wrapper.active #sidebar-wrapper {
	    left: 150px;
	}

	#page-content-wrapper {
	  width: 100%;
	}

	#sidebar_menu li a, .sidebar-nav li a {
	    color: #999;
	    display: block;
	    float: left;
	    text-decoration: none;
	    width: 200px;
	    background: #252525;
	    border-top: 1px solid #373737;
	    border-bottom: 1px solid #1A1A1A;
	    -webkit-transition: background .5s;
	    -moz-transition: background .5s;
	    -o-transition: background .5s;
	    -ms-transition: background .5s;
	    transition: background .5s;
	}
	.sidebar_name {
	    padding-top: 25px;
	    color: #fff;
	    opacity: .7;
	}

	.sidebar-nav li {
	  line-height: 40px;
	  text-indent: 20px;
	}

	.sidebar-nav li a {
	  color: #999999;
	  display: block;
	  text-decoration: none;
	}

	.sidebar-nav li a:hover {
	  color: #fff;
	  background: rgba(255,255,255,0.2);
	  text-decoration: none;
	}

	.sidebar-nav li a:active,
	.sidebar-nav li a:focus {
	  text-decoration: none;
	}

	.sidebar-nav > .sidebar-brand {
	  height: 65px;
	  line-height: 60px;
	  font-size: 18px;
	}

	.sidebar-nav > .sidebar-brand a {
	  color: #999999;
	}

	.sidebar-nav > .sidebar-brand a:hover {
	  color: #fff;
	  background: none;
	}

	#main_icon
	{
	    float:right;
	   padding-right: 65px;
	   padding-top:20px;
	}
	.sub_icon
	{
	    float:right;
	   padding-right: 65px;
	   padding-top:10px;
	}
	.content-header {
	  height: 65px;
	  line-height: 65px;
	}

	.content-header h1 {
	  margin: 0;
	  margin-left: 20px;
	  line-height: 65px;
	  display: inline-block;
	}

	@media (max-width:767px) {
	    #wrapper {
	    padding-left: 70px;
	    transition: all .4s ease 0s;
	}
	#sidebar-wrapper {
	    left: 70px;
	}
	#wrapper.active {
	    padding-left: 150px;
	}
	#wrapper.active #sidebar-wrapper {
	    left: 150px;
	    width: 200px;
	    transition: all .4s ease 0s;
	}
	}

	</style>

</head>
<body>
	<div id="wrapper" 
	@if (!isset($_COOKIE['menu']))
    class="active"
	@elseif($_COOKIE['menu'] == "on")
    class="active"
	@else
	class=""
	@endif >
	      <!-- Sidebar -->
	      <div id="sidebar-wrapper">
	      <ul id="sidebar_menu" class="sidebar-nav">
	           <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
	      </ul>
	        <ul class="sidebar-nav" id="sidebar">     
	          <li><a>Link1<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
	          <li><a>link2<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
	        </ul>
	      </div>
	    </div>
	    <!-- jquerycdn -->
	    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	    <!-- jquery cookie cdn -->
	   <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	    <!-- script -->
		<script type="text/javascript">
				$(document).ready(function(){
					/*when the <a> clicked*/
					$(document).on('click','#menu-toggle' , function(e){
					/*toggler*/
			        $("#wrapper").toggleClass("active");
			        	/*get the value of the cookie*/
			        	var myCookie =  Cookies.get('menu');
			        	/*create cookie if not exists*/
			        	if (myCookie == null) {
			        	    // set a new cookie
			        	      Cookies.set('menu', 'off', { expires: 365 });
			        	}

			          /*toggle the cookie value if exists*/
				         switch(myCookie) 
				         {
				             case "off":
				                 Cookies.set('menu', 'on', { expires: 365 });
				                 break;
				             case "on":
				                Cookies.set('menu', 'off', { expires: 365 });
				                 break;
				         } 
			   	   });   	
				});		
		</script>
</body>
</html>