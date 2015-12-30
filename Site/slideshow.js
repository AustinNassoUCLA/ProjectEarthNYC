//HOW TO USE: MUST HAVE AN UNSTYLED DIV WITH ID="REFERENCE" WHERE
//YOU WANT TO INSERT SLIDESHOW. 

//CALL THIS FUNCTION ON WINDOW LOAD. 
function createSlides(width, displace_down) 
{
	var divA = document.createElement("div"); 
	var divB = document.createElement("div");
	var ref = document.getElementById("reference"); 
	divB.style.width = width.toString() + 'px'; 
	divA.style.width = width.toString() + 'px';
	divA.style.backgroundSize = "cover";
	divB.style.backgroundSize = "cover";
	divA.style.backgroundColor = "red";
	divB.style.backgroundColor = "red";
	divA.style.position = "absolute";
	divB.style.position = "absolute";
	divA.style.zIndex = "2"; 
	divB.style.zIndex = "1"; 
	divA.style.display = "block"; 
	divB.style.display = "block"; 
	divA.setAttribute("id", "slideA");
	divB.setAttribute("id", "slideB"); 
	divA.style.bottom = displace_down;
	divB.style.bottom = displace_down;
	ref.appendChild(divA, ref);
	ref.appendChild(divB, ref);
	
	console.log(ref);
}

//CALL THIS FUNCTION IN DOCUMENT READY EVENT HANDLER
function slideshow(image_name_array,  auto_resize, aspect_ratio, min_width){ 
var slideImgs = image_name_array;
var imageNum = slideImgs.length; 

function scaleByFactor(x, id)
{
	if (auto_resize && $(window).width()>min_width)
	{
		$("#" + id).width($(window).width()); 
		
		//SHOW THE CORRECT PART OF THE IMAGE BY SHIFTING UP AND DOWN WHILE SCALING
		document.getElementById(id).style.bottom = "-" + ($(window).width() - 900).toString() + "px"; 
		
	}
	
	$("#" + id).height($("#" + id).width()*x); 
	console.log("Scaled...\n"); 
}

function initWithImage(name, id)
{
	scaleByFactor(1/aspect_ratio, "slideA");
	scaleByFactor(1/aspect_ratio, "slideB");
	$("#" + id).css("background-image", 'url(' +  "\"" + name + "\"" + ')'); 
	console.log("Initialized...\n"); 
}

function nextSlide(index, id, time)
{
	var nextDiv = (id == "slideA") ? "slideB" : "slideA"; 
	$("#"+nextDiv).css("z-index", "1");
	$("#"+id).css("z-index", "2");
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

function main()
{
	initWithImage(slideImgs[0], "slideA"); 
	initWithImage(slideImgs[0], "slideB"); 
	startSlide();
}

if (auto_resize)
{
	$(window).on('resize', function()
	{
		scaleByFactor(1/aspect_ratio, "slideA");
		scaleByFactor(1/aspect_ratio, "slideB");
	});
}
	
main();
}