<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Project Earth - Projects</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="slideshow.js"></script>
<script type="text/javascript" src="cart.js"></script>

<script type="text/javascript">
window.onload = function(){
	//CREATE DOM FOR SLIDES
	if ($(window).width() > 600)
		createSlides($(window).width(), "0px");
	else 
		createSlides(600, "0px");
	var dir = "images/charity/";
	var slideImgs = [];
	for (var i = 49; i<61; i++)
		slideImgs.push(dir + "IMG_05" + i.toString() + ".jpg"); 
	//ACTIVATE SLIDESHOW
    slideshow(slideImgs, true, 1, 600);
};
</script>
<link rel="stylesheet" type="text/css" href="main.css" /> 
<link rel="stylesheet" type="text/css" href="frontslide.css" /> 
</head>

<body style="background-image: none; background-color: black;">
<?php include 'navbar.php' ?>

<div id="lifestyle_banner"><h1 style="color: white; position: relative; top: 60px;">Our Business Education Project!</h1></div>

<div style="position: relative; display:block; margin: auto; width: 100%; height: 550px; overflow: hidden; box-shadow: 1px 1px 10px #333; " id="reference">
</div>

<div class="content_box, project_content_box" id="darksect">
<div class="container_box">
<div style="margin: auto; display: block; position: relative; bottom: 15px; width: 90%;">
<p class="body_text" style="font-size: 16px; font-family:MyriadSemi;">"Give a man a fish and you feed him for a day; teach a man to fish and you feed him for a lifetime."</p>
</div>
<h1> Our First Mission </h1>
<p class="body_text"> Dylan Eichner started The IGP, formally known as the Income Generating Project, back in the summer of 2012. He went to the village that our family is from: San Roque. In this village most people make around $1 dollar per day and many of the students never leave. As Americans we are very fortunate to be educated in this country. It is our duty to share and give something back to our roots and the world as a whole. 
</br></br>
Through the IGP we select about 10 students who are in their second to last or last year of high school to participate in this project.  Initially we put up about 10,000 pesos as a start up fund which amounts to about $230 USD. With this money we teach the students how to buy products such as fruits, pigs, and other goods at wholesale from local farmers. We then show them how to sell the products to their friends, families, and neighbors to earn a profit. At the end of the year the 10,000 pesos are returned to the school to hold for the next year’s class. Whatever is left over is given to the students however part of the money is donated to the school to help pay for the graduating ceremony of the current senior class. 
</br></br>
It is our mission to not only continue the project in San Roque but also expand it to other villages and other countries in the future.
</p>
</div>
</div>

<div class="content_box" id="sectionColorScheme1" style="height: 800px;"> 
<div class="container_box">
<h1 style="color: white;"> Teaching a Future </h1>
<iframe width="600" height="480" src="//www.youtube.com/embed/kSp1K1NP9fk" style="margin: auto; display: block; frameborder="0" allowfullscreen></iframe>
</div>
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
