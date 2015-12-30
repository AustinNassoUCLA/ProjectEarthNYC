<?php if (true): ?>
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
    
<img onmousedown="fadeCartView()" onmouseup="swapCartImg()" id="cart" src="images/cart.png"/>
<div id="cart_list">
<div id="cart_banner"> 
<img onmousedown="closeCartView()" id="close_cart" src="images/x.png" />
	<h1 id="cart_header"> My Cart </h1>
	<div id="cart_content"> 
    <table id="cart_table"> 
    <tr>
    	<th class="edit"> <img onmousedown="editClickAndCancel(this)" onmouseup="editClick(this)" class="edit_button" src="images/edit.png" /> </th>
    	<th> Product </th>
        <th> Quantity </th>
        <th> Price </th>
    </tr>
    </table>
    <p id="cost"> Total: $<span id="total_cost"></span></p>
    
    <form id="paypal_checkout" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	</form>

	</div>
</div>
</div>

<?php endif ?>

