function swapCartImg() 
{
	var dir = "images/";
	var current_src = document.getElementById('cart').src; 	
	//console.log(current_src);
	document.getElementById('cart').src = (current_src == dir+'cart.png') ? dir+'cartpress.png' : dir+'cart.png'; 
}

function fadeCartView()
{
	swapCartImg(); 
	$("#cart_list").fadeToggle(500); 
} 

function closeCartView()
{
	$("#cart_list").fadeToggle(500); 
} 


function slideToggler()
{
	var t = 500;
	function transition()
	{
		if (this.style.top == "385px")
		{
			$(this).animate({top: "250px"}, t);
			$(this).find(".blur_img").animate({bottom: "0px"}, t);
		}
		if (this.style.top == "250px")
		{
			$(this).animate({top: "385px"}, t);
			$(this).find(".blur_img").animate({bottom: "135px"}, t)
		}
	}
	
	$(".prod_descript").mouseenter(transition); 
	$(".prod_descript").mouseleave(transition); 
}

function add(obj)
{
	console.log(obj.src); 
	var toggle = (obj.src.indexOf("images/add.png")); 
	if (toggle != -1)
		obj.src = "images/addpress.png"; 
	else
		obj.src = "images/add.png"; 
}

function editClick(obj)
{
	var src = (obj.src=="images/edit.png") ? "images/editclick.png" : "images/edit.png"; 
	obj.src = src;
} 

//ROTATION FUNCTION
$.fn.animateRotate = function(angle, duration, easing, complete) {
    var args = $.speed(duration, easing, complete);
    var step = args.step;
    return this.each(function(i, e) {
        args.step = function(now) {
            $.style(e, 'transform', 'rotate(' + now + 'deg)');
            if (step) return step.apply(this, arguments);
        };

        $({deg: 0}).animate({deg: angle}, args);
    });
};


function editClickAndCancel(obj)
{
	editClick(obj);
	var toggle = $(".cancel_button").is(":visible"); 
	$(".cancel_button").animateRotate(180, 800);
	if  (!toggle)
		$(".cancel_button").fadeIn(1000);
	else
		$(".cancel_button").fadeOut(1000);
}

//CALCULATE TOTAL FOR CART
function calculateTotal()
{ 
	var total = 0;
	for (var i = 0; i<document.getElementsByClassName("price").length; i++)
	{
		var price = document.getElementsByClassName("price")[i].innerHTML;
		total += parseFloat(price.substring(1,price.length-1)); 
	}
	
	total = total.toFixed(2);
	document.getElementById("total_cost").innerHTML = total;
	updateCheckOut();
}


function loadCartFromStorage()
{
	for (var i = 0; i < localStorage.length; i++)
	{
		var prod = localStorage.getItem(localStorage.key(i)); 
		prod = JSON.parse(prod);
		var id = prod.id; 
		var name = prod.name;
		var price = prod.price; 
		var quantity = prod.quantity; 
		
		var newRow = "<tr class=\"row\" data-id = \"" + parseInt(id) + "\"><td class=\"edit cancel\"> <img class=\"cancel_button\" src=\"images/cancel.png\" /></td><td>" + name + "</td><td class=\"quantity\">" + quantity + "</td><td class=\"price\">" + "$" + price + "</td></tr>";
		$("#cart_table").append(newRow); 
		//bind cancel
		$(".cancel_button:last").click(function()
		{
			cancel(this);
		});
	}
}

function cancel(obj)
{
	var row = $(obj).parent().parent(); 
	$(row).remove(); 
	localStorage.removeItem("prod-" + $(row).attr("data-id").toString());
	calculateTotal()
}

function updateCheckOut()
{
	var checkout_contents = "<input type=\"hidden\" name=\"cmd\" value=\"_cart\"><input type=\"hidden\" name=\"upload\" value=\"1\">"; 
	for (var i = 0; i < localStorage.length; i++)
	{	
		var prod = localStorage.getItem(localStorage.key(i)); 
		prod = JSON.parse(prod);
		var price = parseFloat(prod.price)/parseFloat(prod.quantity);
		var id = prod.id;
		var name = prod.name;
		var quantity = prod.quantity; 
		var k = i+1;
		var i_str = k.toString();
		
		var item_name = "<input type=\"hidden\" name=\"item_name_" + i_str + "\" value=\"" + name + "\">";
		var amount = "<input type=\"hidden\" name=\"amount_" + i_str + "\" value=\"" + price + "\">";
		var item_num = "<input type=\"hidden\" name=\"iten_number_" + i_str + "\" value=\"" + i_str + "\">";
		var quantity =  "<input type=\"hidden\" name=\"quantity_" + i_str + "\" value=\"" + quantity + "\">";
		checkout_contents += item_name + amount + item_num + quantity;
	}
	var button_image = "<input type=\"image\" src=\"images/checkout.png\" name=\"submit\" alt=\"Make payments with PayPal - it's fast, free and secure!\">";
	var currency = "<input type=\"hidden\" name=\"currency_code\" value=\"USD\">"; 
	var account = "<input type=\"hidden\" name=\"business\" value=\"austin@blackbirdtutoring.com\">";
	document.getElementById("paypal_checkout").innerHTML = account + currency + checkout_contents + button_image;
	//console.log(document.getElementById("paypal_checkout").innerHTML);
}

$(document).ready(function()
{
	loadCartFromStorage();
	slideToggler();
	calculateTotal();
	
	//ADD ITEM TO TABLE VIEW FROM DATA ATTRIBUTES
	$(".addButton").click(
		function()
		{
			var price;
			var id;
			var name;
			
			var product = this.parentNode.parentNode.parentNode;
			id = product.getAttribute("data-id");
			price = product.getAttribute("data-price");
			name = product.getAttribute("data-name");
			
			var alreadyInCart = false;
			var existingRow = null; 
			var x = document.getElementsByClassName("row");
			for (var i = 0; i < x.length; i++)
			{
				if (x[i].getAttribute("data-id") == id )
				{
					alreadyInCart = true; 
					existingRow = x[i];
					break;
				}
			}
			
			if (!alreadyInCart){
			var newRow = "<tr class=\"row\" data-id=\"" + parseInt(id) + "\"><td class=\"edit cancel\"> <img class=\"cancel_button\" src=\"images/cancel.png\" /></td><td>" + name + "</td><td class=\"quantity\" >1</td><td class=\"price\">" + "$" + price + "</td></tr>";
			$("#cart_table").append(newRow); 
			
			//CANCEL BUTTON SET UP FOR CART
			$(".cancel_button:last").click(function()
				{
					cancel(this);
				});
		
			var product = {"name":name, "id":id, "price":price, "quantity":"1"}; 
			localStorage.setItem("prod-" + id, JSON.stringify(product)); 
			}
			
			else
			{
				var quantity = existingRow.childNodes[2].innerHTML;  
				quantity = parseInt(quantity) + 1; 
				var price = quantity * parseFloat(price);
				price = price.toFixed(2);
				existingRow.childNodes[3].innerHTML = "$" + price.toString();
				//console.log(quantity * parseFloat(price));
				existingRow.childNodes[2].innerHTML = quantity; 
				localStorage["prod-" + id] = JSON.stringify({"name":name, "id":id, "price":price, "quantity":quantity});
			}
			
			calculateTotal();
			//console.log(id, name, price);
		}); 


});
