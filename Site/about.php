<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="cart.js"></script>
<link rel="stylesheet" type="text/css" href="main.css" /> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Project Earth Inc - Health and Lifestyle Market</title>
</head>
<script type="text/javascript">
var infoArray = [{header: "Welcome to our store!", text: "Here at Project Earth, we are dedicated to bringing high quality organic, gluten free, and non-GMO products food items into the modern American home. Today’s world can be hectic and stressful, so we’re here to change that and promote healthy lifestyle.", src:"images/vege.png", shadow: false},{header: "Check in with us!", text: "For a limited time only, if you are in our store and check in on Facebook, you will receive <span style=\"color: #a6c332;\">10% off of your purchase!</span>  Don't forget to remind the clerk!", src:"images/checkin.png", shadow: true}, {header:"Did you know?", text:"Studies have shown that raw shell hemp seeds can in fact provide a broad spectrum of health benefits such as: weight loss, increased and sustained energy, and rapid recovery from disease and injury.", src:"images/workout_girl.png", shadow: false}];
var counter = 0;

//TAKES ARRAY WITH OBJECT LITERALS {header: "", text: "", src: "", shadow: true}
function swapContents(arr)
{
	var index = counter % arr.length;
	document.getElementById("slide_header").innerHTML = arr[index].header;
	document.getElementById("slide_content").innerHTML = arr[index].text;
	document.getElementById("slide_img").src = arr[index].src;
	
	if (arr[index].shadow)
		document.getElementById("slide_img").setAttribute("class", "img_shadow");
	else 
		document.getElementById("slide_img").setAttribute("class", "");
		
}

$(document).ready(function(e) { 
	console.log(counter);
	var TOTAL_CIRCLES = 3;
	var circ_index = 0; 
	var this_circle = ""; 
	var canClick = true; 
	$("#bg").click(function(){
		if (canClick)
		{
		  var width = document.getElementById("bg").offsetWidth;
	      width = width.toString(); 
		  canClick = false;
		  counter += 1; 
		  console.log(counter);
		  circ_index = counter%TOTAL_CIRCLES; 
		  this_circle = "#cir" + circ_index.toString(); 
		  $("#swap").css({left: "0px"});
		  $("#swap").animate({left: "-"+width+"px", opacity: "0"}, 2000, function(){
			  swapContents(infoArray);
			  $("#swap").css({left: width+"px", opacity: "0"})});
		  $("#swap").animate({left: "0px", opacity: "1"}, 2000, function(){canClick=true;});
		  $(this_circle).css({backgroundColor: "#a6d6f7"}); 
		  for (var i = 0; i < TOTAL_CIRCLES; i++)
		  {
			  if (i != circ_index)
			  {
				  this_circle = "#cir" + i.toString(); 
				  $(this_circle).css({backgroundColor: "white"}); 
			  }
		  }
		}
	})

});
</script>
<body>

<?php include 'navbar.php' ?>

<div id="bg">
</br>
</br>
<div class="container_box" style="height: 500px; padding-bottom: 0;">
<div id="swap" style="display:inline-block; position: relative;">
<h1 id="slide_header" style="color: white; font-size: 65px;"> Welcome to our store. </h1>
<p id="slide_content" style="font-size:20px; font-family:MyriadPro;">Here at Project Earth, we are dedicated to bringing
high quality organic, gluten free, and non-GMO products food items into
the modern American home. Today’s world can be
hectic and stressful, so we’re here to change that 
and promote healthy lifestyle. </p><img id="slide_img" style="display: block; margin: auto;" src="images/vege.png" /></div>
</div>

<style type="text/css">
.circle
{
	width: 10px;
    height: 10px;
	background-color: white;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
	display: inline-block;
}
</style>
<div style="background-color:#a6d6f7" class="circle" id="cir0"></div>
<div class="circle" id="cir1"></div>
<div class="circle" id="cir2"></div>
</div>

<div class="content_box" id="darksect">
<div class="container_box">
<h1>From Our Family to Yours</h1>
<p class="body_text"> Our mission is to provide our customers with organic, gluten free, and non-GMO products. We are reinventing groceries, personal care, and household maintenance items.
<br />
<br />
Here at Project Earth, we know family. Over the past decade, my brother, parents, and myself have began the gradual transition from consuming standard super market groceries to buying healthier organic alternatives. With exorbitant prices and truly healthy markets being scarce, we know eating healthy can become a hassle. Since opening our doors in April 2014, we have been working tirelessly to deliver healthy food to families and individuals committed to a lifestyle of superior health and fitness.
</p>
</div>
</div>

<div class="content_box" id="sectionColorScheme1"> 
<div class="container_box">
<h1 style="color: white"> Healthy supplements delivered! </h1>
<p class="body_text"> Enjoy our wide assortment of GMO-free and organic products! Visit us in person or try out our brand new online store!</p>
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
