<!DOCTYPE  html>

	<head>
		<title> Ethan Joachim Eldridge's Webspace</title>
		<meta name="description" content="Ethan Eldridges personal website, projects, resume, and contact information for Ethan Eldridge.">
		<meta name="keywords" content="Ethan Eldridge,Ethan,Eldridge,UVM,ejeldrid,Computer Science,Cluster,CS,Computer">
		<link rel="stylesheet" href="css/style.css" type="text/css">

		<script type="text/javascript">
			/*
  			var _gaq = _gaq || [];
  			_gaq.push(['_setAccount', 'UA-32336195-1']);
  			_gaq.push(['_trackPageview']);

  			(function() {
    			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  			})();
  			*/
		</script>
	</head>

	<body>

		<div class="header left clearBoth">
			<h1>Welcome to Ethan Eldridge's Personal Website</h1>
		</div>

		<div class="navigation clearBoth left">
			<ul>
				<li><a href="" >About</a></li>
				<li><a href="" >Projects</a></li>
				<li><a href="" >Resume</a></li>
				<li><a href="" >Contact me</a></li>
				
			</ul>
		</div>

		<div class="main clearBoth left">
			<div class="left" id="leftContent">
				<h2>About me...</h2>
				<p>

				</p>
			</div>
			<div class="right" id="rightContent"> 
				<h2>Recent Activity</h2>
				<dl class="social">
					<dt class="social icon"><a href="http://ethaneldridgecs.blogspot.com/"><img src="images/blogger.png" /></a></dt>
					<dd id="#blogRSS"><img class="loader" src="images/ajax-loader.gif" /></dd>
					<dt class="social icon"><a href="https://github.com/EJEHardenberg"><img src="images/github.png"></a></dt>
					<dd id="#githubRSS"><img class="loader" src="images/ajax-loader.gif" /></dd>
					<dt class="social icon"><a href="http://www.linkedin.com/profile/view?id=151414806"><img src="images/LinkedIn_logo.png" ></a></dt>
					<dd id="#linkedInRSS"><img class="loader" src="images/ajax-loader.gif" /></dd>
					<dt class="social icon"><a href="https://twitter.com/EthanJEldridge"><img src="images/twitter-bird-light-bgs.png" /></a></dt>	
					<dd id="#twitterRSS"><img class="loader" src="images/ajax-loader.gif" /></dd>
				</dl>
			</div>
		</div>

	<script type="text/javascript">
		//Blogger RSS
		var blog = 'http://ethaneldridgecs.blogspot.com/feeds/posts/default';
		//Linked in RSS
		var linked = 'http://www.linkedin.com/rss/nus?key=t4rHAZ4ZAdKlwX4OUS8ca-4c3fnoKuV8ZHMG5Ma2-BoVAC1xvFF0GYgwuQa8s4LrIcr';
		//Github RSS
		var github = 'https://github.com/EJEHardenberg.atom';
		//Twitter RSS
		var twitter = 'http://www.twitter-rss.com/user_timeline.php?screen_name=ethanjeldridge';
		

		//Helper function to fetch URL contents
		function httpGet(theUrl,feedName){
    		var xmlHttp = null;
    		xmlHttp = new XMLHttpRequest();
    		xmlHttp.onreadystatechange = function(){processGET(xmlHttp,feedName)};
    		xmlHttp.open( "GET", 'scripts/proxy.php?url='+theUrl, true );
    		xmlHttp.send( null );
		}
		function processGET(xmlHttp,feedName){
			//Process page only if ready
			if ( xmlHttp.readyState == 4 && xmlHttp.status == 200 ){
				var page = xmlHttp.responseText;
				switch(feedName){
					case 'blog':
						blogRead(page);
						break;
					case 'linked':
						break;
					case 'github':
						break;
					case 'twitter':
						break;
				}
			}
		}
		function blogRead(page){
			
		}

		httpGet('http://ethaneldridgecs.blogspot.com/feeds/posts/default','blog');

	</script>
	</body>

</html>