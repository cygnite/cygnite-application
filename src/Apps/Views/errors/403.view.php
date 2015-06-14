<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Error 403 - Forbidden</title>
	<meta name="viewport" content="width=device-width">
    <style type="text/css">
        @import url(http://fonts.googleapis.com/css?family=Droid+Sans);
        ::-moz-selection { background: #06e; color: #fff; text-shadow: none; }
        ::selection { background: #06e; color: #fff; text-shadow: none; }
        body{font-family:'Droid Sans', sans-serif;font-size:10pt;
            color:#555;line-height: 25px;}
        .wrapper {width:760px;margin: 70px auto;padding: 10px 20px;}
        .clear-fix{	height:2em;}
        a, a:visited {color:#2972A3;}
        a:hover	{color:#72ADD4;}
        hr {display: block;border: 0; border-top: 1px solid #ccc; }
    </style>
</head>
<body>
<?php use Cygnite\Common\UrlManager\Url; ?>
	<div class="wrapper">
		<div class="clear-fix"></div>
		<div role="main" class="content">

			<h1>Ahh! Server Error: 403 (Forbidden)</h1>

			<hr>

			<p>
				We are sorry!! We couldn't find the page you requested.
			</p>

			<p>
				Like to go back to our <a href="<?php echo Url::getBase(); ?>">home page</a>.
			</p>
		</div>
	</div>
</body>
</html>
