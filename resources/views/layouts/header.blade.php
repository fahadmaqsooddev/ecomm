<?php 
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
?>

<header class="header" role="banner">
    <a href="#" class="mobileMenu-toggle" data-mobile-menu-toggle="menu">
        <span class="mobileMenu-toggleIcon">Toggle menu</span>
    </a>
    <div class="headtop hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-12 text-left">
                    <p>Get 30% Discount on Selected Items</p>
                </div>
                <div class="col-sm-6 col-12 text-right">
                    <li class="navUser-item wi-he">
                        <a class="cart-button cart-button--wishlist dropdown-menu-item navUser-action" title="account.nav.wishlist" href="{{ route('getwishlists') }}">
                            wishlist
                        </a>
                            
                    </li>
                    <li class="navUser-item xs-cur">
                       
                    </li>
                </div>
            </div>
        </div>
    </div>

    <div class="header-max header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-md-2 col-sm-12 col-xs-4 head-logo">
                    <h1 class="header-logo header-logo--center">
                        <a href="{{ route('indexxxx') }}" class="header-logo__link">
                            <div class="header-logo-image-container">
                                <img class="header-logo-image img-fluid" src="../cdn11.bigcommerce.com/s-3h97v0q79m/images/stencil/135x29/logo_white_1613993167__13993.original.png" alt="martega" title="martega">
                            </div>
                        </a>
                    </h1>
                </div>
                <div class="col-xl-5 col-lg-3">
                    <div id="search" class="desktop-search pt-3">
                        <form class="form">
                            <fieldset class="form-fieldset">
                                <div class="wb-search input-group">
                                    <label class="is-srOnly" for="search_query">Search</label>
                                    <input class="form-input form-control" name="search_query" id="search_query" placeholder="Search the store" autocomplete="off">
                                    <div class="input-group-btn">
                                        <button class="wb-search-btn" type="submit">
                                            <svg width="20px" height="20px"><use xlink:href="#hsearch"></use></svg>
                                        </button>
                                    </div>
                                    <!-- suggestion box -->
                                    <ul id="search-suggestions" class="list-group position-absolute" style="z-index: 9999; display:none;"></ul>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                

                <div class="col-xl-4 col-lg-5 col-md-5 col-sm-8 col-xs-8 text-right head-right xs-se">
                   
                    <ul class="navUser-section navUser-section--alt">
                         @if(Auth::guard('web')->check())
                            <li class="navUser-item">
                                <span class="text-white">Hi ! {{ Auth::guard('web')->user()->name }}</span>
                            </li>
                        @endif
                        <li class="navUser-item head-user user-info huserb">
                            <a class="navUser-action userinfoa" data-dropdown="account-dropdown">
                                <span class="svgbg">
                                    <ul class="navUser-item-cartLabel list-inline">
                                        <svg width="20px" height="20px"><use xlink:href="#huser"></use></svg>
                                    </ul>
                                </span>
                            </a>
                            <div class="dropdown-menu user-down dropdown-menu-left" id="account-dropdown">
                                @if(Auth::guard('web')->check())
                                    <a class="navUser-action dropdown-menu-item" href="{{ route('userlogout') }}">Logout</a>
                                    <a class="navUser-action dropdown-menu-item" href="{{ route('userorders') }}">Orders</a>

                                    @else
                                    <a class="navUser-action dropdown-menu-item" href="{{ route('userlogin') }}">Sign in</a>
                                    <a class="navUser-action dropdown-menu-item" href="{{ route('userregister') }}">Register</a>
                                @endif
                            </div>
                        </li>
                        
                        <li class="navUser-item navUser-item--cart cart-class">
                            <a class="navUser-action" data-cart-preview href="#" id="cart-icon" aria-label="Cart with 0 items">
                                <span class="navUser-item-cartLabel">
                                    
                                    <svg width="20px" height="20px"><use xlink:href="#hcart"></use></svg>
                                </span>
                                <h3 class="text-left">
                                    <span class="cart-it"> Cart<br></span>
                                    <span class="countPill cart-quantity" id="cart-count"></span>
                                </h3>
                            </a>
                            <div class="dropdown-menu cart-dropdown" id="cart-preview" style="display:none">
                                <div class="cart-item-list">
                                    <ul class="cart-items" id="cart-items-list"></ul>
                                    <div class="cart-footer p-3">
                                        <div class="mb-2">
                                            <strong>Shipping Charges : </strong>$<span id="shipping-charges">0.00</span>
                                        </div>
                                        <div class="mb-2">
                                            <strong>Tax : </strong> $<span class="tax"> 0.00</span>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Total : </strong> <span id="cart-total" class="cart-totals-value"> 0.00</span>
                                        </div>
                                        <a href="{{ route('checkout') }}" class="checkout-btn btn btn-primary w-100">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="head-menu">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 menu-left-sp"></div>
                <div class="col-xl-9 col-lg-8 col-md-6 col-xs-12 menu-right-sp">
                    <div class="navPages-container-st">
                        <div class="sta-menu">
                            <ul class="main-menu">
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('blogs') }}">Blog</a></li>
                                <li><a href="{{ route('contactus') }}">Contact Us</a></li>
                                <li><a href="{{ route('services') }}">Services</a></li>
                                <li><a href="{{ route('brands') }}">Brand</a></li>
                                {{-- <li class="pull-right">
                                    <a href="collections.html">
                                        <span><i class="fa fa-bolt"></i> Flash Deals</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    window.userId = @json(Auth::id() ?? 0);
</script>

<script src="{{ mix('js/app.js') }}"></script>

<script>
    $(document).ready(function() {

    $(".cart-class a").on("click", function(e) {
        if (!$(this).hasClass('checkout-btn')) {
            e.preventDefault();
            $("#cart-preview").toggle();
        }
    });

    $(document).on("click", function(event) {
        if (!$(event.target).closest(".cart-class").length && !$(event.target).closest("#cart-preview").length) {
            $("#cart-preview").hide();
        }
    });


    window.updateCartUI = function(cart,refresh=false,cartID=null,cart_total=null,shipping_charges=null,tax=null) {  
        const cartItemsList = document.getElementById('cart-items-list');
        const cartCount = document.getElementById('cart-count');
        const cartTotal = document.getElementById('cart-total');
        const shippingcharges=document.getElementById('shipping-charges');
        const taxs=document.getElementsByClassName('tax')[0];

        if (!cartItemsList || !cartCount || !cartTotal) return;

        cartItemsList.innerHTML = '';
        let totalPrice = 0;
        let totalQuantity = 0;

        cart.forEach(item => {
            const cartItemElement = document.createElement('li');
            cartItemElement.classList.add('cart-item');
            cartItemElement.id = `row2${item.id}`;
            cartItemElement.innerHTML = `
                <div class="cart-item-content d-flex align-items-start mb-3 position-relative">
                <div class="cart-item-image me-3">
                <img src="${item.product_image}" alt="${item.product_name}" class="img-fluid" style="width: 100px; height: 100px; border-radius: 6px;">
                </div>
                <div class="cart-item-info flex-grow-1">
                <div class="cart-item-name"><strong>${item.product_name}</strong></div>
                <div class="cart-item-price mt-1 text-muted">$ ${item.product_price}</div>
                <div class="cart-item-detail d-flex align-items-center mt-2 gap-3 flex-wrap">
                <div class="cart-item-quantity-controls d-flex align-items-center border rounded px-2">
                <button class="qty-btn decrease" data-id="${item.product_id}" onclick="updateCartQuantity(${item.id},${item.product_id}, 'decrease')">−</button>
                <span class="mx-2 cart-quantity${item.id}">${item.quantity}</span>
                <button class="qty-btn increase" data-id="${item.product_id}" onclick="updateCartQuantity(${item.id},${item.product_id}, 'increase')">+</button>
                </div>
                <span class="cart-item-total"><strong>&nbsp; = $<span class="cart-item-total${item.id}">${item.total_price}</span></strong></span>
                </div>
                </div>
                <button class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2" title="Remove Item" onclick="deletecart(${item.id})">
                &times;
                </button>
                </div>
            `;

            cartItemsList.appendChild(cartItemElement);

            totalPrice += parseFloat(item.total_price);
            totalQuantity += item.quantity;
            const qtyInput = document.getElementById('qtyvalue'+item.id);
            const qtyPrice = document.getElementById('cart-item-price'+item.id);
            const cartTotals = document.getElementById('cart-total'+item.id);
            const subtotal = document.getElementById('subtotal');
            const grandtotal = document.getElementById('grandtotal');
            if (qtyInput && qtyPrice && cartTotals && refresh && cartID!=null && item.id==cartID) {
                let cartvalue = parseInt(qtyInput.value) + 1;
                qtyInput.value = cartvalue;
                let Price = qtyPrice.value.replace(/,/g, ''); // remove commas
                Price = parseFloat(Price);
                let total = cartvalue * Price;
                cartTotals.innerText = "$"+total.toFixed(2);
            }

    });
        cartCount.innerText = totalQuantity;
        cartTotal.innerText = `$${cart_total.toFixed(2)} `;
        taxs.innerText=tax;
        shippingcharges.innerText=shipping_charges;

    };



    window.singleCartUI = function(item,cart_count,cart_total,tax,total) {
        console.log("Total",total);
        const cartItemsList = document.getElementById('cart-items-list');
        const cartCount = document.getElementById('cart-count');
        const cartTotal = document.getElementById('cart-total');
        
        if (!cartItemsList || !cartCount || !cartTotal) return;

        // Replace existing item if present
        const existingItem = document.getElementById('row2' + item.id);
        if (existingItem) {
            existingItem.remove();
        }

        // Create new cart item element
        const cartItemElement = document.createElement('li');
        cartItemElement.classList.add('cart-item');
        cartItemElement.id = `row2${item.id}`;
        cartItemElement.innerHTML = `
        <div class="cart-item-content d-flex align-items-start mb-3 position-relative">
        <div class="cart-item-image me-3">
        <img src="${item.product_image}" alt="${item.product_name}" class="img-fluid" style="width: 100px; height: 100px; border-radius: 6px;">
        </div>
        <div class="cart-item-info flex-grow-1">
        <div class="cart-item-name"><strong>${item.product_name}</strong></div>
        <div class="cart-item-price mt-1 text-muted">$ ${item.product_price}</div>
        <div class="cart-item-detail d-flex align-items-center mt-2 gap-3 flex-wrap">
        <div class="cart-item-quantity-controls d-flex align-items-center border rounded px-2">
        <button class="qty-btn decrease" data-id="${item.product_id}" onclick="updateCartQuantity(${item.id},${item.product_id}, 'decrease')">−</button>
        <span class="cart-quantity${item.id} mx-2" id="cart-item-qty${item.quantity}">${item.quantity}</span>
        <button class="qty-btn increase" data-id="${item.product_id}" onclick="updateCartQuantity(${item.id},${item.product_id}, 'increase')">+</button>
        </div>
        <span class="cart-item-total"><strong>&nbsp; = <span class="cart-item-total${item.id}">$${item.total_price}</span></strong></span>
        </div>
        </div>
        <button class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2" title="Remove Item" onclick="deletecart(${item.id})">
        &times;
        </button>
        </div>
        `;

        // Append the new item
        cartItemsList.appendChild(cartItemElement);
        cartCount.innerText = cart_count;
        cartTotal.innerText = `$${total.toFixed(2)}`;
        const taxs=document.getElementsByClassName('tax')[0];
        taxs.innerText=tax;
    };


    if (window.userId > 0) {
        fetch('/cart/items')
        .then(response => response.json())
        .then(data => {
            console.log("All Cart Data",data);
            if (data.success) {
                updateCartUI(data.cart,null,null,data.cart_total,data.shipping_charges,data.tax);
            }
        })
        .catch(error => {
            console.error('Error loading cart items:', error);
        });
    }

    window.updateCartQuantity =function(cartID,itemId, action) {
        const tokenMeta = document.querySelector('meta[name="csrf-token"]');
        if (!tokenMeta) {
            console.error('CSRF token meta tag not found');
            return;
        }
        const token = tokenMeta.getAttribute('content');

        fetch('/cart/update-quantity', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({
                product_id: itemId,
                action: action
            })
        })
        .then(response => response.json())
        .then(data => {

            if (data.success) {
                const elements = document.getElementsByClassName("cart-quantity"+data.cart.id);
                //Single Cart Item Total
                const cart_items_total=document.getElementsByClassName("cart-item-total"+data.cart.id);
                document.getElementsByClassName("cart-totals").innerText=data.cart_total;
                document.getElementById("cart-count").innerText=data.cart_count;
                const cartCount2 = document.getElementById("cart-count2");
                if (cartCount2) {
                    cartCount2.innerText = data.cart_count;
                }


                //Total Cart Count
                for (let i = 0; i < elements.length; i++) {
                    //Single Cart Quantity Update
                    elements[i].innerText = data.cart.quantity;
                    elements[i].value = data.cart.quantity;
                    cart_items_total[i].innerText=data.cart.cartitem_total;
                }

                const cartTotals = document.getElementsByClassName("cart-totals-value");
                const taxes = document.getElementsByClassName("tax");
                const cartSubTotals = document.getElementsByClassName("cart-subtotals-value");
                const formattedTotal = new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD',
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(data.cart_total);

                for (let i = 0; i < cartTotals.length; i++) {
                    cartTotals[i].innerText = formattedTotal;
                }

                for (let j = 0; j < taxes.length; j++) {  
                    taxes[j].innerText = data.tax;
                }

                console.log("Cart SubTotal Value",data.cart_subtotal);

                 for (let k = 0; k < cartSubTotals.length; k++) {  
                    cartSubTotals[k].innerText = data.cart_subtotal;
                }
            }
        })
        .catch(error => {
            console.error('Quantity update failed:', error);
        });


        //For Checkout Page

        const cartSummary = document.getElementById("order-summary");
        if (cartSummary) {
            fetch('/latest-checkout-data')
                .then(res => res.text())
                .then(html => {
                    console.log("html",html);
                    cartSummary.innerHTML = html;
            });
        }
    }



    window.deletecart = function(cartid) {
        $("#row" + cartid).remove();
        $("#row2" + cartid).remove();
        $("#cart-preview").toggle();

        $.ajax({
            url: `/deletecart/${cartid}`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                        alert('Item Deleted from cart');
                        $("#cart-count,#cart-count2").html(response.cart_count);
                        const cartTotals = document.getElementsByClassName("cart-totals-value");
                        const formattedTotal = new Intl.NumberFormat('en-US', {
                            style: 'currency',
                            currency: 'USD',
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }).format(response.cart_total);

                        for (let i = 0; i < cartTotals.length; i++) {
                            cartTotals[i].innerText = formattedTotal;
                        }
                    }
                }
            });
    };


    let selectedIndex = -1;
const suggestionsList = $('#search-suggestions');

$('#search_query').on('keyup', function(e) {
    let query = $(this).val();
    const items = $('#search-suggestions li');

    // Arrow down
    if (e.key === "ArrowDown") {
        e.preventDefault();
        selectedIndex = (selectedIndex + 1) % items.length;
        items.removeClass('active');
        $(items[selectedIndex]).addClass('active');
        return;
    }
    // Arrow up
    if (e.key === "ArrowUp") {
        e.preventDefault();
        selectedIndex = (selectedIndex - 1 + items.length) % items.length;
        items.removeClass('active');
        $(items[selectedIndex]).addClass('active');
        return;
    }

    // Enter key
    if (e.key === "Enter") {
        e.preventDefault(); // always prevent default form submit

        let link = null;

        if (selectedIndex > -1) {
            // If arrow key selected
            link = $(items[selectedIndex]).find('a').attr('href');
        } else if (items.length > 0) {
            link = $(items[0]).find('a').attr('href');
        }

        if (link) {
            window.location.href = link;
        }
        return;
    }

    $.ajax({
        url: "{{ route('search.suggest') }}",
        method: 'GET',
        data: { query: query },
        success: function(data) {
            let suggestions = '';
            if (data.length > 0) {
                data.forEach(product => {
                    suggestions += `<li class="list-group-item">
                                        <a href="/product/${product.id}">${product.name}</a>
                                    </li>`;
                });
                suggestionsList.html(suggestions).show();
                selectedIndex = -1;
            } else {
                suggestionsList.html('<li class="list-group-item text-muted">No results found</li>').show();
                selectedIndex = -1;
            }
        }
    });
});


// Mouse hover highlights the item
suggestionsList.on('mouseenter', 'li', function() {
    suggestionsList.find('li').removeClass('active');
    $(this).addClass('active');
    selectedIndex = $(this).index();
});

// Click on suggestion
suggestionsList.on('click', 'li', function() {
    const link = $(this).find('a').attr('href');
    if (link) window.location.href = link;
});

// Hide suggestion box when clicking outside
$(document).on('click', function(e) {
    if (!$(e.target).closest('#search_query, #search-suggestions').length) {
        suggestionsList.hide();
        selectedIndex = -1;
    }
});



});
</script>
