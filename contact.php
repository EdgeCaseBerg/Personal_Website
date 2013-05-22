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
				<li><a href="index.html" >About</a></li>
				<li><a href="projects.html" >Projects</a></li>
				<li><a href="resume.html" >Resume</a></li>
				<li><a href="contact.php" >Contact me</a></li>
				
			</ul>
		</div>

		<div class="main clearBoth left">
			<div class="left" id="leftContent">
				<h2>Contact Me</h2>
				<?php
					//Validation
					$errorEmail = true;
					$errorMessage = true;
					$isRobot = true;
					if($_POST['submit']){
						if($_POST['email']){
							//Check for an @ sign in the email.
							if(stripos($_POST['email'], "@")) {
								$errorEmail = false;
							}
						}
					}
					if($_POST['message']){
						if($_POST['message'] != ""){
							$errorMessage = false;		
						}
					}
					if($_POST['honeyPot']){
						if($_POST['honeyPot'] == "HumansLeaveBlank"){
							$isRobot = false;
						}
					}
					//Can we send?
					if(!($errorMessage || $errorEmail || $isRobot)){
						mail('e.jay.eldridge@gmail.com'.'Contact Page Person Site from ' . $_POST['email'],$_POST['message']);
					}else{
						echo 'no';
					}
					
				?>
				<form method="POST" action="contact.php" class="contact">
					<label for="email" class="left">Your Email*</label><input class="left" type="text" id="email" name="email" value="<?php echo $_POST['email'] ?>"/>
					<label class="left clearBoth" for="message">Message*</label>
					<textarea class="left clearBoth" id="message" name="message"><?php echo $_POST['message']; ?></textarea>
					<input type="text" style="display:none" id="honeyPot" name="honeyPot" value="HumansLeaveBlank">
					<input class="clearBoth left" type="submit" name="submit" value="Send Message"> 
				</form>	
				<p>
				
				</p>
			</div>


			<div class="right" id="rightContent"> 
				<h2>Recent Activity</h2>
				<dl class="social">
					<dt class="social icon"><a href="http://ethaneldridgecs.blogspot.com/"><img src="images/blogger.png" /></a></dt>
					<dd id="blogRSS"><img class="loader" src="images/ajax-loader.gif" /></dd>
					<dt class="social icon"><a href="https://github.com/EJEHardenberg"><img src="images/github.png"></a></dt>
					<dd id="githubRSS"><img class="loader" src="images/ajax-loader.gif" /></dd>
					<dt class="social icon"><a href="http://www.linkedin.com/profile/view?id=151414806"><img src="images/LinkedIn_logo.png" ></a></dt>
					<dd id="linkedInRSS"><img class="loader" src="images/ajax-loader.gif" /></dd>
					<dt class="social icon"><a href="https://twitter.com/EthanJEldridge"><img src="images/twitter-bird-light-bgs.png" /></a></dt>	
					<dd id="twitterRSS"><img class="loader" src="images/ajax-loader.gif" /></dd>
				</dl>
			</div>
		</div>

		<script type="text/javascript">
			//Blogger RSS
			var blog = 'http://ethaneldridgecs.blogspot.com/feeds/posts/default';
			//Linked in RSS
			var linked = 'http://www.linkedin.com/rss/nus?key=t4rHAZ4ZAdKlwX4OUS8ca-4c3fnoKuV8ZHMG5Ma2-BoVAC1xvFF0GYgwuQa8s4LrIcr';
			//Github RSS
			var github = 'http://github.com/EJEHardenberg.atom';
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
					var parser = new DOMParser();
					var doc = parser.parseFromString(page, "text/xml");
					switch(feedName){
						case 'blog':
							blogRead(doc);
							break;
						case 'linked':
							linkedInRead(doc);
							break;
						case 'github':
							githubRead(doc);
							break;
						case 'twitter':
							twitterRead(doc);
							break;
					}
				}
			}
			function twitterRead(page){
				console.log(page);
				var item = page.getElementsByTagName("item")[0];
				var title = document.createTextNode(item.getElementsByTagName("title")[0].textContent);
				var link = item.getElementsByTagName("link")[0].textContent;

				var twitterLink = document.createElement("a");
				twitterLink.href = link;
				twitterLink.appendChild(title);

				var toReplace = document.getElementById("twitterRSS");
				toReplace.innerHTML = "";
				toReplace.appendChild(twitterLink);
					
			}
			function githubRead(page){
				var entry = page.getElementsByTagName("entry")[0];
				var title = document.createTextNode(entry.getElementsByTagName("title")[0].textContent);
				var link = entry.childNodes[7].getAttribute('href');

				var githubLink = document.createElement("a");
				githubLink.href = link;
				githubLink.appendChild(title);

				var toReplace = document.getElementById('githubRSS');
				toReplace.innerHTML="";  //remove ajax loader
				toReplace.appendChild(githubLink);

			}
			function linkedInRead(page){
				
				var item = page.getElementsByTagName("item")[0];
				var title = document.createTextNode(item.getElementsByTagName("title")[0].textContent);
				var link = item.getElementsByTagName("link")[0].textContent;

				var linkedLink = document.createElement("a");
				linkedLink.appendChild(title);
				linkedLink.href = link;

				var toReplace = document.getElementById("linkedInRSS");
				toReplace.innerHTML = "";
				toReplace.appendChild(linkedLink);
				

			}
			function blogRead(page){
				//Grab first entry out
				var entry = page.getElementsByTagName("entry")[0];
				var title = document.createTextNode(entry.getElementsByTagName("title")[0].textContent);
				//We also want the link to it:
				var link = entry.getElementsByTagName("link")[4].getAttribute('href');

				//Replace the ajax loader for blog with information
				var toReplace = document.getElementById('blogRSS');
				toReplace.innerHTML = "";
				var blogLink = document.createElement('a');
				blogLink.appendChild(title);
				blogLink.href = link;

				toReplace.appendChild(blogLink);
				
			}

			httpGet(blog,'blog');
			httpGet(github,'github');
			httpGet(linked,'linked');
			httpGet(twitter,'twitter');

		</script>
	</body>

</html>