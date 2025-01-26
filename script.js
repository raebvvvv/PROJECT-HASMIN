const cart = [];
    
        function decreaseQuantity(button) {
            const span = button.nextElementSibling;
            let quantity = parseInt(span.textContent);
            if (quantity > 1) {
                span.textContent = quantity - 1;
            }
        }
    
        function increaseQuantity(button) {
            const span = button.previousElementSibling;
            let quantity = parseInt(span.textContent);
            if (quantity < 50) { // Set limit to 50
                span.textContent = quantity + 1;
            }
        }
    
        function addToCart(category, name, quantity, img) {
            const existing = cart.find(item => item.name === name);
            if (existing) {
                existing.quantity += quantity;
            } else {
                cart.push({ category, name, quantity, img });
            }
            alert(`${name} has been added to the cart!`); // Optional: Notify the user
            updateTotalQuantity();
            updateCartCount(); // Update cart count immediately
            updateQuantitySelector(name); // Update quantity selector
        }

        function updateQuantitySelector(name) {
            const item = cart.find(i => i.name === name);
            if (item) {
                const cards = document.querySelectorAll('.card');
                cards.forEach(card => {
                    if (card.querySelector('h3').textContent === name) {
                        card.querySelector('.quantity-selector span').textContent = item.quantity;
                    }
                });
            }
        }

        function updateCartCount() {
            let totalQuantity = 0;
            cart.forEach(item => {
                totalQuantity += item.quantity;
            });
            document.getElementById('cart-count').textContent = totalQuantity; // Update cart count
        }
    
        function openCart() {
            const cartPopup = document.getElementById('cart-popup');
            const cartItems = document.getElementById('cart-items');
            const submitButton = document.querySelector('.submit-rental-btn');
            cartItems.innerHTML = ''; // Clear existing items
            cart.forEach(item => {
                const div = document.createElement('div');
                div.classList.add('cart-item');
                div.innerHTML = `
                    <img src="${item.img}" alt="${item.name}">
                    <span><b>Item:</b> ${item.name} | ${item.category}</span>
                    <div class="quantity-selector">
                        <button onclick="updateQuantity('${item.name}', -1)">-</button>
                        <span>${item.quantity}</span>
                        <button onclick="updateQuantity('${item.name}', 1)">+</button>
                    </div>
                `;
                cartItems.appendChild(div);
            });
            updateTotalQuantity();
            submitButton.style.display = cart.length > 0 ? 'block' : 'none'; // Show or hide the submit button
            cartPopup.style.display = 'flex'; // Show the cart popup
        }
    
        function closeCart() {
            const cartPopup = document.getElementById('cart-popup');
            cartPopup.style.display = 'none'; // Hide the cart popup
        }

        function openAccount() {
            const accountPopup = document.getElementById('account-popup');
            accountPopup.style.display = 'flex'; // Show the account popup
        }

        function closeAccount() {
            const accountPopup = document.getElementById('account-popup');
            accountPopup.style.display = 'none'; // Hide the account popup
        }
    
        function updateQuantity(name, change) {
            const item = cart.find(i => i.name === name);
            if (item) {
                item.quantity += change;
                if (item.quantity <= 0) {
                    cart.splice(cart.indexOf(item), 1); // Remove the item if quantity is 0
                }
                updateQuantitySelector(name); // Update quantity selector
                openCart(); // Refresh the cart popup
            }
        }
    
        function clearFilters() {
            document.querySelectorAll('.filter-group input').forEach(input => (input.checked = false));
            filterCards(); // Call filterCards to reset the view
        }
    
        // Ensure the DOM is loaded before attaching the event listener
        document.addEventListener('DOMContentLoaded', () => {
            const cartIcon = document.getElementById('cart-icon');
            cartIcon.addEventListener('click', openCart); // Attach openCart() to the cart icon

            const searchInput = document.querySelector('.search-bar input');
            searchInput.addEventListener('input', filterCards); // Attach filterCards() to the search input

            const filterInputs = document.querySelectorAll('.filter-group input[type="checkbox"]');
            filterInputs.forEach(input => input.addEventListener('change', filterCards)); // Attach filterCards() to the filter inputs
        });

        function updateTotalQuantity() {
            const cartItems = document.querySelectorAll('#cart-items .cart-item');
            let totalQuantity = 0;
            cartItems.forEach(item => {
                const quantity = parseInt(item.querySelector('.quantity-selector span').textContent);
                totalQuantity += quantity;
            });
            document.getElementById('total-quantity').textContent = totalQuantity;
            updateCartCount(); // Update cart count
            cart.forEach(item => updateQuantitySelector(item.name)); // Update quantity selectors for all items
        }

        function removeFromCart(itemElement) {
            // ...existing code...
            updateTotalQuantity();
        }

        function submitRentalRequest() {
            openTerms();
        }

        function openTerms() {
            const termsPopup = document.getElementById('terms-popup');
            termsPopup.style.display = 'flex'; // Show the terms popup
        }

        function closeTerms() {
            const termsPopup = document.getElementById('terms-popup');
            termsPopup.style.display = 'none'; // Hide the terms popup
        }

        function confirmBorrowRequest() {
            closeTerms(); // Close the terms popup
            showConfirmation('Are you sure you want to submit the rental request?', () => {
                alert('Rental request submitted!');
                closeCart();
            });
        }

        function showConfirmation(message, onConfirm) {
            const confirmationPopup = document.getElementById('confirmation-popup');
            const confirmationMessage = document.getElementById('confirmation-message');
            confirmationMessage.textContent = message;
            confirmationPopup.style.display = 'flex'; // Show the confirmation popup

            // Set the confirm action
            window.confirmAction = () => {
                onConfirm();
                closeConfirmation();
            };
        }

        function closeConfirmation() {
            const confirmationPopup = document.getElementById('confirmation-popup');
            confirmationPopup.style.display = 'none'; // Hide the confirmation popup
        }

        function filterCards() {
            const searchTerm = document.querySelector('.search-bar input').value.toLowerCase();
            const filters = Array.from(document.querySelectorAll('.filter-group input[type="checkbox"]:checked')).map(input => input.parentElement.textContent.trim().toLowerCase());
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                const cardText = card.textContent.toLowerCase();
                const matchesSearch = cardText.includes(searchTerm);
                const matchesFilter = filters.length === 0 || filters.some(filter => cardText.includes(filter));
                if (matchesSearch && matchesFilter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        function proceedToForm() {
            closeTerms(); // Close the terms popup
            const formPopup = document.getElementById('form-popup');
            formPopup.style.display = 'flex'; // Show the form popup
        }

        function closeForm() {
            const formPopup = document.getElementById('form-popup');
            formPopup.style.display = 'none'; // Hide the form popup
        }

        function submitBorrowForm() {
            const form = document.getElementById('borrow-form');
            if (form.checkValidity()) {
                const requestDate = new Date().toLocaleString(); // Get current date and time
                alert(`Borrow request form submitted on ${requestDate}!`);
                closeForm();
                closeCart();
            } else {
                alert('Please fill out all required fields.');
            }
        }

        function confirmLogout() {
            const logoutConfirmationPopup = document.getElementById('logout-confirmation-popup');
            logoutConfirmationPopup.style.display = 'flex'; // Show the logout confirmation popup
        }

        function closeLogoutConfirmation() {
            const logoutConfirmationPopup = document.getElementById('logout-confirmation-popup');
            logoutConfirmationPopup.style.display = 'none'; // Hide the logout confirmation popup
        }

        function logout() {
            alert('You have been logged out.');
            closeLogoutConfirmation();
            closeAccount();
        }
