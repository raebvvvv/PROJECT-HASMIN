<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUP HM Kitchen</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="icons/pup-logo.png" type="image/png">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="icons/hm-pup.png" alt="Logo" style="width: 155px; height: 30px;">
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search for tools...">
            <button>
                <img src="icons/search-icon.png" alt="Search Icon" class="search-icon">
            </button>
        </div>
        <div class="flex-container">
            <a href="index.html">Home</a>
           <a href="about.html">About Us</a>
            <a href="contact.html">Contact Us</a>
        </div>
        <div class="icons">
            <div id="account-icon" onclick="openAccount()">
                <img src="icons/user-icon.png" alt="Account Icon" style="width: 33px; height: 33px;">
            </div>
            <div id="cart-icon" onclick="openCart()">
                <img src="icons/basket-icon.png" alt="Cart Icon" style="width: 35px; height: 35px;">
                <span id="cart-count" class="cart-count">0</span> <!-- Added cart count -->
            </div>
        </div>
    </div>
    
    <div class="sidebar">
        <br> <br> <br>
        <h2>Filters &nbsp;<img src="icons/filter-icon.png" style="width: 20px; height: 20px;"> </h2>
        <div class="filter-group">
            <br>
            <h3>Availability</h3>
            <label><input type="checkbox"> In Stock</label>
            <label><input type="checkbox"> Out of Stock</label>
        </div>
        <div class="filter-group">
            <br>
            <h3>Categories</h3>
            <label><input type="checkbox"> Baking Tools</label>
            <label><input type="checkbox"> Bar Tools</label>
            <label><input type="checkbox"> Glassware</label> <!-- Ensure this matches the card description -->
            <label><input type="checkbox"> Kitchenware</label>
            <label><input type="checkbox"> Servingware</label>
            <label><input type="checkbox"> Silverware</label>
            <label><input type="checkbox"> Tableware</label>
            <span class="clear-btn" onclick="clearFilters()">Clear</span>
        </div>
    </div>

    <div class="content">
        <div class="grid">
            <div class="card">
                <img src="tools/banana-split-plate.png" alt="Banana Split Plate">
                <p class="description">Glassware | In Stock: 30</p>
                <h3>Banana Split Plate</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Glassware', 'Banana Split Plate', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/banana-split-plate.png')">Add to Basket</button>
            </div>

            <div class="card">
                <img src="tools/bar-spoon.png" alt="Bar Spoon">
                <p class="description">Silverware | In Stock: 50</p>
                <h3>Bar Spoon</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Silverware', 'Bar Spoon', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/bar-spoon.png')">Add to Basket</button>
            </div>

            <div class="card">
                <img src="tools/bar-tray.png" alt="Bar Tray">
                <p class="description">Servingware | In Stock: 20</p>
                <h3>Bar Tray</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Servingware', 'Bar Tray', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/bar-tray.png')">Add to Basket</button>
            </div>

            <div class="card">
                <img src="tools/beer-mug.png" alt="Beer Mug">
                <p class="description">Glassware | In Stock: 20</p>
                <h3>Beer Mug</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Glassware', 'Beer Mug', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/beer-mug.png')">Add to Basket</button>
            </div>

            <div class="card">
                <img src="tools/bread-knife.png" alt="Bread Knife">
                <p class="description">Silverware | In Stock: 15</p>
                <h3>Bread Knife</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Silverware', 'Bread Knife', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/bread-knife.png')">Add to Basket</button>
            </div>

            <div class="card">
                <img src="tools/butcher-knife.png" alt="Butcher Knife">
                <p class="description">Silverware | In Stock: 2</p>
                <h3>Butcher Knife</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Silverware', 'Butcher Knife', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/butcher-knife.png')">Add to Basket</button>
            </div>
            <div class="card">
                <img src="tools/butter-knife.png" alt="Butter Knife">
                <p class="description">Silverware | In Stock: 50</p>
                <h3>Butter Knife</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Silverware', 'Butter Knife', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/butter-knife.png')">Add to Basket</button>
            </div>
            <div class="card">
                <img src="tools/cake-slicer.png" alt="Cake Slicer">
                <p class="description">Silverware | In Stock: 2</p>
                <h3>Cake Slicer</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Silverware', 'Cake Slicer', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/cake-slicer.png')">Add to Basket</button>
            </div>
            <div class="card">
                <img src="tools/ceramic-ramekin.png" alt="Ceramic Ramekin">
                <p class="description">Baking Tools | In Stock: 50</p>
                <h3>Ceramic Ramekin</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Baking Tools', 'Ceramic Ramekin', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/ceramic-ramekin.png')">Add to Basket</button>
            </div>
            <div class="card">
                <img src="tools/champagne.png" alt="Champagne">
                <p class="description">Glassware | In Stock: 2</p>
                <h3>Champagne</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Glassware', 'Champagne', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/champagne.png')">Add to Basket</button>
            </div>



            <div class="card">
                <img src="tools/wooden-bowl.png" alt="Wooden Bowl">
                <p class="description">Tableware | In Stock: 50</p>
                <h3>Wooden Bowl</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Tableware', 'Wooden Bowl', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/wooden-bowl.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/drink-pourer.png" alt="Drink Pourer">
                <p class="description">Bar Tools | In Stock: 50</p>
                <h3>Drink Pourer</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Bar Tools', 'Drink Pourer', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/drink-pourer.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/ensaymada-molder.png" alt="Ensaymada Mold">
                <p class="description">Baking Tools | In Stock: 50</p>
                <h3>Ensaymada Mold</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Baking Tools', 'Ensaymada Mold', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/ensaymada-molder.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/funnel.png" alt="Funnel">
                <p class="description">Kitchenware | In Stock: 50</p>
                <h3>Funnel</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Kitchenware', 'Funnel', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/funnel.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/glass-coaster.png" alt="Glass Coaster">
                <p class="description">Glassware | In Stock: 50</p>
                <h3>Glass Coaster</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Glassware', 'Glass Coaster', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/glass-coaster.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/glass-measuring-cup.png" alt="Measuring Cup">
                <p class="description">Kitchenware | In Stock: 50</p>
                <h3>Measuring Cup</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Kitchenware', 'Measuring Cup', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/glass-measuring-cup.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/glass-pitcher.png" alt="Glass Pitcher">
                <p class="description">Glassware | In Stock: 50</p>
                <h3>Glass Pitcher</h3><!---ako ang tunay na nagmamay-ari ng glass pitcher-->
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Glassware', 'Glass Pitcher', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/glass-pitcher.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/goblet.png" alt="Goblet">
                <p class="description">Glassware | In Stock: 50</p>
                <h3>Goblet</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Glassware', 'Goblet', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/goblet.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/gravy-boat-saucer.png" alt="Gravy Boat and Saucer">
                <p class="description">Tableware | In Stock: 50</p>
                <h3>Gravy Boat and Saucer</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Tableware', 'Gravy Boat and Saucer', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/gravy-boat-saucer.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/high-ball.png" alt="Highball Glass">
                <p class="description">Glassware | In Stock: 50</p>
                <h3>Highball Glass</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Glassware', 'Highball Glass', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/high-ball.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/ice-scoop.png" alt="Ice Scoop">
                <p class="description">Bar Tools | In Stock: 50</p>
                <h3>Ice Scoop</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Bar Tools', 'Ice Scoop', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/ice-scoop.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/jigger.png" alt="Jigger">
                <p class="description">Bar Tools | In Stock: 50</p>
                <h3>Jigger</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Bar Tools', 'Jigger', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/jigger.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/large-shaker.png" alt="Large Shaker">
                <p class="description">Bar Tools | In Stock: 50</p>
                <h3>Large Shaker</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Bar Tools', 'Large Shaker', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/large-shaker.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/lasagna-plate.png" alt="Lasagna Plate">
                <p class="description">Tableware | In Stock: 50</p>
                <h3>Lasagna Plate</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Tableware', 'Lasagna Plate', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/lasagna-plate.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/mami-bowl.png" alt="Mami Bowl">
                <p class="description">Tableware | In Stock: 50</p>
                <h3>Mami Bowl</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Tableware', 'Mami Bowl', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/mami-bowl.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/measuring-spoons.png" alt="Measuring Spoons">
                <p class="description">Kitchenware | In Stock: 50</p>
                <h3>Measuring Spoons</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Kitchenware', 'Measuring Spoons', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/measuring-spoons.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/parfait.png" alt="Parfait Glass">
                <p class="description">Glassware | In Stock: 50</p>
                <h3>Parfait Glass</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Glassware', 'Parfait Glass', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/parfait.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/pina-colada.png" alt="Pina Colada Glass">
                <p class="description">Glassware | In Stock: 50</p>
                <h3>Pina Colada Glass</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Glassware', 'Pina Colada Glass', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/pina-colada.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/puto-molder.png" alt="Puto Molder">
                <p class="description">Baking Tools | In Stock: 50</p>
                <h3>Puto Molder</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Baking Tools', 'Puto Molder', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/puto-molder.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/red-wine.png" alt="Red Wine Glass">
                <p class="description">Glassware | In Stock: 50</p>
                <h3>Red Wine Glass</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Glassware', 'Red Wine Glass', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/red-wine.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/rice-cooker.png" alt="Rice Cooker">
                <p class="description">Kitchenware | In Stock: 50</p>
                <h3>Rice Cooker</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Kitchenware', 'Rice Cooker', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/rice-cooker.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/round-baking-pans.png" alt="Round Baking Pan">
                <p class="description">Baking Tools | In Stock: 50</p>
                <h3>Round Baking Pan</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Baking Tools', 'Round Baking Pan', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/round-baking-pan.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/salad-fork.png" alt="Salad Fork">
                <p class="description">Silverware | In Stock: 50</p>
                <h3>Salad Fork</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Silverware', 'Salad Fork', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/salad-fork.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/salt-pepper-shaker.png" alt="Salt and Pepper Shaker">
                <p class="description">Tableware | In Stock: 50</p>
                <h3>Salt and Pepper Shaker</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Tableware', 'Salt and Pepper Shaker', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/salt-pepper-shaker.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/sauce-dish.png" alt="Sauce Dish">
                <p class="description">Tableware | In Stock: 50</p>
                <h3>Sauce Dish</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Tableware', 'Sauce Dish', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/sauce-dish.png')">Add to Basket</button>
            </div>
            <div class="card">
                <img src="tools/sauce-glass.png" alt="Sauce Pourer">
                <p class="description">Glassware | In Stock: 50</p>
                <h3>Sauce Pourer</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Glassware', 'Sauce Pourer', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/sauce-glass.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/saucer.png" alt="Saucer">
                <p class="description">Tableware | In Stock: 50</p>
                <h3>Saucer</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Tableware', 'Saucer', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/saucer.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/serving-fork.png" alt="Serving Fork">
                <p class="description">Silverware | In Stock: 50</p>
                <h3>Serving Fork</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Silverware', 'Serving Fork', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/serving-fork.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/serving-spoon.png" alt="Serving Spoon">
                <p class="description">Silverware | In Stock: 50</p>
                <h3>Serving Spoon</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Silverware', 'Serving Spoon', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/serving-spoon.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/serving-tray.png" alt="Serving Tray">
                <p class="description">Servingware | In Stock: 50</p>
                <h3>Serving Tray</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Servingware', 'Serving Tray', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/serving-tray.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/silicon-spatula.png" alt="Silicon Spatula">
                <p class="description">Kitchenware | In Stock: 50</p>
                <h3>Silicon Spatula</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Kitchenware', 'Silicon Spatula', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/silicon-spatula.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/small-shaker.png" alt="Small Shaker">
                <p class="description">Bar Tools | In Stock: 50</p>
                <h3>Small Shaker</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Bar Tools', 'Small Shaker', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/small-shaker.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/soda.png" alt="Soda Glass">
                <p class="description">Glassware | In Stock: 50</p>
                <h3>Soda Glass</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Glassware', 'Soda Glass', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/soda.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/soup-bowl.png" alt="Soup Bowl">
                <p class="description">Tableware | In Stock: 50</p>
                <h3>Soup Bowl</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Tableware', 'Soup Bowl', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/soup-bowl.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/stainless-baking-pan.png" alt="Stainless Baking Pan">
                <p class="description">Baking Tools | In Stock: 50</p>
                <h3>Stainless Baking Pan</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Baking Tools', 'Stainless Baking Pan', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/stainless-baking-pan.png')">Add to Basket</button>
            </div>
            <div class="card">
                <img src="tools/stainless-bowl.png" alt="Stainless Steel Bowl">
                <p class="description">Baking Tools | In Stock: 50</p>
                <h3>Stainless Steel Bowl</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Baking Tools', 'Stainless Steel Bowl', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/stainless-bowl.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/stainless-kettle.png" alt="Stainless Steel Kettle">
                <p class="description">Kitchenware | In Stock: 50</p>
                <h3>Stainless Steel Kettle</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Kitchenware', 'Stainless Steel Kettle', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/stainless-kettle.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/stainless-ladle.png" alt="Stainless Steel Ladle">
                <p class="description">Kitchenware | In Stock: 50</p>
                <h3>Stainless Steel Ladle</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Kitchenware', 'Stainless Steel Ladle', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/stainless-ladle.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/stainless-sianse.png" alt="Stainless Steel Sianse">
                <p class="description">Kitchenware | In Stock: 50</p>
                <h3>Stainless Steel Sianse</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Kitchenware', 'Stainless Steel Sianse', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/stainless-sianse.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/stainless-tong.png" alt="Stainless Steel Tong">
                <p class="description">Kitchenware | In Stock: 50</p>
                <h3>Stainless Steel Tong</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Kitchenware', 'Stainless Steel Tong', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/stainless-tong.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/strainer.png" alt="Strainer">
                <p class="description">Kitchenware | In Stock: 50</p>
                <h3>Strainer</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Kitchenware', 'Strainer', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/strainer.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/turn-table.png" alt="Turn Table">
                <p class="description">Tableware | In Stock: 50</p>
                <h3>Turn Table</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Tableware', 'Turn Table', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/turn-table.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/white-wine.png" alt="White Wine Glass">
                <p class="description">Glassware | In Stock: 50</p>
                <h3>White Wine Glass</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Glassware', 'White Wine Glass', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/white-wine.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/wooden-bowl.png" alt="Wooden Bowl">
                <p class="description">Tableware | In Stock: 50</p>
                <h3>Wooden Bowl</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Tableware', 'Wooden Bowl', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/wooden-bowl.png')">Add to Basket</button>
            </div>
            
            <div class="card">
                <img src="tools/wooden-plate.png" alt="Wooden Plate">
                <p class="description">Tableware | In Stock: 50</p>
                <h3>Wooden Plate</h3>
                <div class="quantity-selector">
                    <button onclick="decreaseQuantity(this)">-</button>
                    <span>1</span>
                    <button onclick="increaseQuantity(this)">+</button>
                </div>
                <button class="add-to-cart-btn" onclick="addToCart('Tableware', 'Wooden Plate', parseInt(this.previousElementSibling.querySelector('span').textContent), 'tools/wooden-plate.png')">Add to Basket</button>
            </div>
            

        </div>
    </div>
    <div class="popup" id="cart-popup">
        <div class="popup-content">
            <h2>Your Basket</h2>
            <div id="cart-items"></div>
            <div id="total-items" style="text-align: center; margin-top: 20px;">
                <b>Items to be borrowed: <span id="total-quantity">0</b></span>
            </div>
            <button class="close" onclick="closeCart()">x</button>
            <button class="submit-rental-btn" onclick="submitRentalRequest()">Submit Borrow Request</button>
        </div>
    </div>
    <div class="popup" id="account-popup">
        <div class="popup-content">
            <h2>Account Information</h2>
            <div>
                <label for="student-name"><b>Student Name:</b></label>
                <span id="student-name">Sassa Gurl</span> <!-- Display student name -->
            </div>
            <div>
                <label for="student-number"><b>Student Number:</b></label>
                <span id="student-number">123456789</span> <!-- Display student number -->
            </div>
            <div>
                <label for="email"><b>Email:</b></label>
                <span id="email">sassa.gurl@example.com</span> <!-- Display email -->
            </div>
            <button class="logout-btn" onclick="confirmLogout()">Logout</button>
            <button class="close" onclick="closeAccount()">x</button>
        </div>
    </div>
    <div class="popup" id="terms-popup">
        <div class="popup-content">
            <h2>Terms & Conditions</h2>
            <h4 style="color: red;"> FAILURE TO COMPLY WILL LEAD TO REJECTION OF REQUEST.</h4>
            <p>▸ <b>DOUBLE CHECK YOUR LIST OF TOOLS BEFORE SUBMITTING YOUR REQUEST.</b></p>
            <p>▸ <b>STRICTLY 1 TRANSACTION AT A TIME, UNTIL COMPLETION:</b> Each user is strictly allowed one transaction ticket at a time, which must be fully completed before a new ticket can be issued.</p>
            <p>▸ <b>STRICTLY NO ID, NO PROCESSING:</b> Surrender your <b>PHYSICAL ID</b> and approved ticket to the GIS in-charge to receive borrowed items.</p>
            <p>▸ <b>FOR DAMAGED OR MISSING ITEMS:</b> The borrower is responsible for repair or replacement. Please discuss with the GIS in-charge to determine the steps.</p>
            <button class="cancel" onclick="closeTerms()">Cancel</button>
            <button class="confirm" onclick="proceedToForm()">Proceed</button>
        </div>
    </div>
    <div class="popup" id="form-popup">
        <div class="popup-content">
            <h2>Borrow Request Form</h2>
            <form id="borrow-form">
                <br>
                <label for="student-id">Student ID:</label>
                <input type="text" id="student-id" name="student-id" placeholder="202X-XXXXXX-MN-X" required>
                
                <label for="student-name">Student Name:</label>
                <input type="text" id="student-name" name="student-name" placeholder="Dela Cruz, Juan A." required>
                
                <label for="course-section">Course & Section:</label>
                <input type="text" id="course-section" name="course-section" placeholder="BSHM 1-1" required>
                
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" placeholder="Wala akong alam na subject nila huhu" required>
                
            
                <label for="professor">Professor:</label>
                <input type="text" id="professor" name="professor" placeholder="Dela Cruz, Juan B." required>
                
                <label>User Classification:</label>
                <div class="radio-buttons-container">
                    <label><input type="radio" name="user-classification" value="HM Student" required> HM Student</label>
                    <label><input type="radio" name="user-classification" value="Non-HM Student" required> Non-HM Student</label>
                    <label><input type="radio" name="user-classification" value="PUP Employee" required> PUP Employee</label>
                </div>
                
                <label for="request-date">Borrowing Date:</label>
                <input type="date" id="request-date" name="borrowing-date" required>
                <input type="time" id="returning-time" name="borrowing-time" required>
                
                <label for="returning-date">Returning Date:</label>
                <input type="date" id="returning-date" name="returning-date" required>
                
                
                <input type="hidden" id="request-timestamp" name="request-timestamp">
                <button type="button" onclick="submitBorrowForm()">Submit</button>
                <button type="button" onclick="closeForm()">Cancel</button>
            </form>
        </div>
    </div>
    <div class="popup" id="confirmation-popup">
        <div class="popup-content">
            <h2>Confirmation</h2>
            <p id="confirmation-message"></p>
            <button class="cancel" onclick="closeConfirmation()">Cancel</button>
            <button class="confirm" onclick="confirmAction()">Confirm</button>
        </div>
    </div>
    <div class="popup" id="logout-confirmation-popup">
        <div class="popup-content">
            <h2>Logout Confirmation</h2>
            <p>Are you sure you want to logout?</p>
            <button class="cancel" onclick="closeLogoutConfirmation()">Cancel</button>
            <button class="confirm" onclick="logout()">Logout</button>
        </div>
    </div>

<script src="script.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const requestTimestampInput = document.getElementById('request-timestamp');
        requestTimestampInput.value = new Date().toLocaleString(); // Set current date and time
    });
</script>
</body>
</html>



