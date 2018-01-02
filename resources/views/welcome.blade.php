<!DOCTYPE html>
<html lang="en-GB" prefix="og: http://ogp.me/ns#">

	<!--
		Hi developers and designers who use view source and dev tools!

		I thought you might be peeking in here, so let me first say that, yeah, I know the design of
		this thing isn't amazing. I'm not a designer. Visual aesthetic stuff isn't really my bag, so you'll have to just bear with me on that.

		And thanks for looking this thing up. It's a bit of a trial for me putting this together,
		and I hope it's useful for someone.

		I'm flattered that you're hear. Why not drop me a line @magicroundabout and let me know you
		found this.

		Thanks

		Ross
	-->

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700,600,400italic' rel='stylesheet' type='text/css'>
	<link rel='stylesheet' href='/css/welcome.css' type='text/css' media='all' />

	<title>WP to Laravel - Stop fighting WordPress; start building efficient, effective apps in Laravel</title>
			
	<meta name="description" content="Stop fighting WordPress; start building efficient, effective apps in Laravel"/>
	<link rel="canonical" href="https://wptolaravel.com/" />
	<meta property="og:locale" content="en_GB" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="WP to Laravel" />
	<meta property="og:description" content="Stop fighting WordPress; start building efficient, effective apps in Laravel" />
	<meta property="og:url" content="https://wptolaravel.com/" />
	<meta property="og:site_name" content="WP to Laravel" />
	<meta property="og:image" content="https://wptolaravel.com/images/wptolaravel.jpg" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="Stop fighting WordPress, start building efficient, effective apps in Laravel" />
	<meta name="twitter:title" content="WP to Laravel" />
	<meta name="twitter:image" content="https://wptolaravel.com/images/wptolaravel.jpg" />
	<meta name="twitter:creator" content="@magicroundabout" />

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-12614570-22"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-12614570-22');
	</script>


</head>

<body>

	<header>
	
		<h1>WP to Laravel</h1>
        <h2>Stop fighting WordPress; start building efficient, effective apps in Laravel</h2>
        
        <div class="welcome-buttons">
            @auth
                <a class="button" href="{{ route('home') }}">
                    Watch the videos
                </a>
            @endauth

            @guest
                <a class="button" href="{{ route('register') }}">
                    Sign up
                </a> 
            @endguest
        </div>
	
	</header>
	
	<article>
	
		<h3>A free set of video tutorials that explain Laravel to WordPress developers</h3>
		<p>
			I've had conversations with lots of people about the struggles of using WordPress for things other than publishing, content management, and eCommerce.</p>
		<p>These days, conversation often turns to the Laravel framework, which I now often use for those things that WordPress isn’t a good fit for.</p>
		<p>I often promise to give people an overview of Laravel if they want one. And to fulfil that promise I’m recording a free set of video tutorials that explain Laravel to WordPress developers.
		</p>

		<h3>
			Who is this for?	
		</h3>
		<p>
			These videos are intended for people that understand PHP pretty well, and can use a command line/terminal. I probably assume a certain level of general software development knowledge too.

			If you just copy and paste PHP snippets, it’s probably not for you.
		</p>

		<h3>
			What are the videos about?
		</h3>
		<p>
			The aim is not to teach you Laravel, but to show you around the main parts of it and to try and explain how the core concepts of WordPress map into Laravel concepts.
		</p>
		<p>
			My hope is that you will end up wanting to find out more from the Laravel documentation; from other, better video courses; or from a good book.
		</p>
		<p>
			The videos are each between 10 and 30 minutes long and there are 10 of them, plus some bonus content.  The contents are:
		</p>
		<p>
			<ol>
				<li><strong>Introducing Laravel</strong>: Why Laravel?</li>
				<li><strong>Laravel Concepts</strong></li>
				<li><strong>Laravel's Not-So-Famous 5-minute install</strong>: download, install and configure your app</li>
				<li><strong>Where am I and where are all my files?</strong>: an overview of the Laravel file and directory structure</li>
				<li><strong>To do anything, you need a route</strong>: the basics of routing</li>
				<li><strong>Beautiful views</strong>: an quick tour of Laravel’s “Blade” templating system</li>
				<li><strong>Data? What data?</strong>: How to define a data structure in Laravel</li>
				<li><strong>I’m a model, you know what I mean?</strong>: A description of the abstract data modelling features of Laravel</li>
				<li><strong>Taking control</strong>: an overview of the purpose and structure of controllers</li>
                <li><strong>Putting it all together</strong>: Watch me live-code a very basic app from scratch!</li>
                <li><strong>Bonus: Addendum and resources:</strong>: Some things I missed that are worth knowing, and where to go to learn more</li>
                <li><strong>Bonus: Behind the scenes:</strong>: A peek into the tools I used to make the series and that I use to write both Laravel and PHP code</li>
			</ol>
		</p>

		<h3>What are the videos like?</h3>
		<p>
			Let’s be honest: I’d love to be Jeffrey Way or Wes Bos, but I’m not. So I’ve done my best to make these videos as good as possible, but I’m new to this kind of thing and they won’t be the quality of other screencast tutorials.  That’s partly why they are free.  This is partly an exercise for me in how to do online training.
		</p>
		<p>
			Feedback will be encouraged! I hope you’ll enjoy the course and let me know how you got on.
		</p>

		<h3>Aren't you just hating on WordPress a bit here?</h3>
		<p>
			No, not at all. I love WordPress and the WordPress community. It's a great CMS. I've built a living on it. It's not my intention
			to say that WordPress is bad. But I have pushed WordPress pretty hard and I've found that it's just not suitable for some applications.
			And Laravel has been a breath of fresh air for me.
		</p>
		<p>
			And I see developers who have grown up with WordPress - where it's the only tool or framework they've ever coded for - and 
			they are trying to make it do things that it really shouldn't.  It's my opinion that for many of those developers learning
			Laravel would open up new opportunities. Which is why I want to show them the benefits, and how easy the basics of Laravel can be.
		<p>

        <div class="welcome-buttons">
            @auth
                <a class="button" href="{{ route('home') }}">
                    Watch the videos
                </a>
            @endauth

            @guest
                <a class="button" href="{{ route('register') }}">
                    Sign up
                </a> 
            @endguest
        </div>


	</article>

	<footer>
	
		<p>
			An <a href="https://oikos.digital/">Oikos Digital</a> project by <a href="https://twitter.com/magicroundabout/">Ross Wintle</a>.<br>This site uses cookies and Google Analytics - disable cookies in your browser to stop that.
		</p>
	
	</footer>

</body>
</html>