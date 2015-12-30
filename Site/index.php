<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Welcome to Project Earth</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" async="defer">

var dir = "images/Store/";
var slideImgs = [dir + "photo 3.jpg", dir + "photo 5.jpg", dir + "photo 1.jpg", dir + "photo 4.jpg"];
var imageNum = slideImgs.length; 
console.log(slideImgs[0]); 


function scaleByFactor(x, id)
{
	$("#" + id).height($(window).height()*x); 
	console.log("Scaled...\n"); 
}

function initWithImage(name, id)
{
	scaleByFactor(0.8, "slideA");
	scaleByFactor(0.8, "slideB");
	$("#" + id).css("background-image", 'url(' +  "\"" + name + "\"" + ')'); 
	console.log("Initialized...\n"); 
}

function nextSlide(index, id, time)
{
	var nextDiv = (id == "slideA") ? "slideB" : "slideA"; 
	$("#"+nextDiv).css("z-index", "-1");
	$("#"+id).css("z-index", "0");
	$("#" + nextDiv).css("background-image",  'url(' +  "\"" + slideImgs[index] + "\"" + ')');
	$("#" + nextDiv).show();
	setTimeout(function(){
		
	$("#"+id).fadeOut(time, null, function(){nextSlide((index+1)%imageNum,nextDiv,time)});
	console.log("Slide show...\n"); 
	
	}, time); 
}

function startSlide()
{
	var index = 1; 
	var curDiv = "slideA"; 	
	nextSlide(index, curDiv, 2000); 
	console.log("Started slideshow...\n"); 
}


$(document).ready(function(e) {
    initWithImage(slideImgs[0], "slideA"); 
	initWithImage(slideImgs[0], "slideB"); 
	startSlide(); 
});

$(window).on('resize', function()
{
	scaleByFactor(0.8, "slideA");
	scaleByFactor(0.8, "slideB");
});

</script>
<link rel="stylesheet" type="text/css" href="main.css" /> 
<link rel="stylesheet" type="text/css" href="frontslide.css" /> 
</head>

<body style="background-image: none; background-color: black;">
<header>
    	</br>
		<a href="index.php"><img class="logo" src="images/logo.png"/></a>
</header>
    <div id="nav_top" class="navigation">
    	<nav style="position: relative; top: 20px;"> 
        	<a href="about.php" class="nav_item"><b>ABOUT</b></a>
            <img class="menu_line" src="images/bar_small.png" /> 
            <a href="lifestyle.php" class="nav_item"><b>LIFESTYLE</b></a>
            <img class="menu_line" src="images/bar_small.png" /> 
            <a href="projects.php" class="nav_item"><b>PROJECTS</b></a>
            <img class="menu_line" src="images/bar_small.png" /> 
            <a href="contact.php" class="nav_item"><b>CONTACT</b></a>
            <img class="menu_line" src="images/bar_small.png" /> 
            <a href="shop.php" class="nav_item"><b>SHOP</b></a>
        </nav>
    </div>
<div id="slideB" class="frontSlideShow"> 
</div>
<div id="slideA" class="frontSlideShow"> 
</div>
<div class="footer"> 
<div id="nav_bottom" class="navigation">
<div style="width:80%; margin: auto;">
    	<h3 style="color:white; float: left; display: inline-block;"> Project Earth Inc. © 2014 </h3>
        <h3 style="color:white; float: right; display: inline-block;">info@projectearthnyc.com</h3>
        </div>
    </div>
</div>
</body>
</html>
