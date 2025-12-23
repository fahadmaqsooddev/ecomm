@extends('layouts.app')
@section('content')
@php
    $total=0;
@endphp
<nav aria-label="Breadcrumb" class="breadcrumbs-bg">
    <ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li class="breadcrumb " itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a class="breadcrumb-label"
            itemprop="item"
            href="https://martega.mybigcommerce.com/"

            >
            <span itemprop="name">Home</span>
        </a>
        <meta itemprop="position" content="1" />
    </li>
    <li class="breadcrumb is-active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a class="breadcrumb-label"
        itemprop="item"
        href="https://martega.mybigcommerce.com/cart.php?suggest&#x3D;6c53e7c0-2bbd-41a1-a30a-143bb8becebe"
        aria-current="page"
        >
        <span itemprop="name">Your Cart</span>
    </a>
    <meta itemprop="position" content="2" />
</li>
</ol>
</nav>
<div>
    <main data-cart>


        <h1 class="page-heading" data-cart-page-title>
            Your Cart ( <span id="cart-count2">{{ $cartCount }}</span> items)
        </h1>

        <div data-cart-status>
        </div>

        <div class="loadingOverlay"></div>

        <div data-cart-content class="cart-content-padding-right">
            <table class="cart" data-cart-quantity="15">
                <thead class="cart-header">
                    <tr>
                        <th class="cart-header-item" colspan="2">Item</th>
                        <th class="cart-header-item">Price</th>
                        <th class="cart-header-item cart-header-quantity">Quantity</th>
                        <th class="cart-header-item">Total</th>
                    </tr>
                </thead>
                <tbody class="cart-list">
                    @if($carts)
                    @foreach($carts as $cat)
                        @php
                            $price=$cat->product->price;
                            $quantity=$cat->quantity;
                            $total=$total+($price*$quantity)
                        @endphp
                    <tr class="cart-item" id="row{{$cat->id}}">
                        <td class="cart-item-block cart-item-figure">
                            <img src="{{ asset('admin/dist/img/product/' . $cat->product->image) }}" alt="{{ $cat->product->name }}" title="{{ $cat->product->name }}" 
                            srcset="{{ asset('admin/dist/img/product/' . $cat->product->image) }}"
                            class=" cart-item-image"

                            />
                        </td>
                        <td class="cart-item-block cart-item-title">
                            <p class="cart-item-brand">{{ isset($cat->product->brand) ? $cat->product->brand->name : '' }} </p>
                            <h2 class="cart-item-name"><a href="https://martega.mybigcommerce.com/smith-journal-13/">{{ $cat->product->name }}</a></h2>



                        </td>
                           <td class="cart-item-block cart-item-info">
                                <span class="cart-item-label">Price</span>
                                <span class="cart-item-value" id="">${{ number_format($cat->product->price, 2) }}</span>
                            </td>
                            <input type="hidden" id="cart-item-price{{ $cat->id }}" value="{{ number_format($cat->product->price, 2) }}">


                        <td class="cart-item-block cart-item-info cart-item-quantity">

                            <label class="form-label cart-item-label" for="qty-6c53e7c0-2bbd-41a1-a30a-143bb8becebe">Quantity:</label>
                            <div class="form-increment">
                                <button class="button button--icon" data-cart-update data-cart-itemid="6c53e7c0-2bbd-41a1-a30a-143bb8becebe" data-action="dec" onclick="updateCartQuantity({{ $cat->id }},{{ $cat->product_id }}, 'decrease')">
                                    <span class="is-srOnly">Decrease Quantity:</span>
                                    <i class="icon" aria-hidden="true"><svg><use xlink:href="#icon-keyboard-arrow-down" /></svg></i>
                                </button>
                                <input class="form-input form-input--incrementTotal cart-quantity{{$cat->id}}"
                                name="qty-6c53e7c0-2bbd-41a1-a30a-143bb8becebe"
                                type="tel"
                                value="{{ $cat->quantity }}"
                                data-quantity-min=""
                                data-quantity-max=""
                                data-quantity-min-error="The minimum purchasable quantity is null"
                                data-quantity-max-error="The maximum purchasable quantity is null"
                                min="1"
                                pattern="[0-9]*"
                                data-cart-itemid="6c53e7c0-2bbd-41a1-a30a-143bb8becebe"
                                data-action="manualQtyChange"
                                aria-live="polite">
                                <button class="button button--icon"
                                            data-cart-update
                                            data-cart-itemid=""
                                            data-action="inc"
                                            onclick="updateCartQuantity({{ $cat->id }},{{ $cat->product_id }}, 'increase')">

                                    <span class="is-srOnly">Increase Quantity:</span>
                                    <i class="icon" aria-hidden="true"><svg><use xlink:href="#icon-keyboard-arrow-up" /></svg></i>
                                </button>
                            </div>

                        </td>

                        <td class="cart-item-block cart-item-info">
                            <span class="cart-item-label">Total</span>
                            <strong class="cart-item-value" id="cart-total{{$cat->id}}">$<span class="cart-item-total{{$cat->id}}">{{ number_format($cat->product->price * $cat->quantity,2) }}</span></strong>
                            <button class="cart-remove icon"
                            data-cart-itemid="6c53e7c0-2bbd-41a1-a30a-143bb8becebe"
                            onclick="deletecart({{ $cat->id }})"
                            aria-label="Remove item from cart"
                            >
                            <svg><use xlink:href="#icon-close"></use></svg>
                        </button>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div data-cart-totals class="cart-content-padding-right">
        <ul class="cart-totals">
            <li class="cart-total">
                <div class="cart-total-label">
                    <strong>Subtotal : </strong>
                </div>
                <div class="cart-total-value" id="subtotal">
                    <span>$<span class="cart-subtotals-value">{{ number_format($subtotal,2) }}</span></span>
                </div>
            </li>
         
            {{-- <li class="cart-total">
                <div class="cart-total-label">
                    <strong>Coupon Code:</strong>
                </div>
                <div class="cart-total-value">

                    <button class="coupon-code-add">Add Coupon</button>

                    <button class="coupon-code-cancel" style="display: none;">Cancel</button>
                </div>

                <div class="cart-form coupon-code" style="display: none;">
                    <form class="form form--hiddenLabels coupon-form" method="post" action="/cart.php">
                        <label class="form-label" for="couponcode">Enter your coupon code</label>
                        <input class="form-input" data-error="Please enter your coupon code."  id="couponcode" type="text" name="couponcode" value="" placeholder="Enter your coupon code">
                        <input class="button button--primary button--small" type="submit" value="Apply">
                        <input type="hidden" name="action" value="applycoupon">
                    </form>
                </div>
            </li> --}}
            <li class="cart-total">
                <div class="cart-total-label"><strong>Shipping Charges : </strong></div>
                <div class="cart-total-value">${{ number_format($shipping_charges, 2) }}</div>
            </li>
            <li class="cart-total">
                <div class="cart-total-label"><strong>Tax : </strong></div>
                <div class="cart-total-value">$<span class="tax">{{ number_format($tax, 2) }}</span></div>
            </li>
            <li class="cart-total">
                <div class="cart-total-label"><strong>Grand Total : </strong></div>
                <div class="cart-total-value cart-total-grandTotal cart-totals-value">${{ number_format($totals, 2) }}</div>
            </li>
        </ul>
    </div>

    <div class="cart-actions cart-content-padding-right">
        <a class="button button--primary" href="{{ route('checkout') }}" title="Click here to proceed to checkout">Check out</a>
    </div>


</main>
</div>            
</div>
</div>
</div>

<div id="modal" class="modal" data-reveal data-prevent-quick-search-close>
    <button class="modal-close"
    type="button"
    title="Close"

    >
    <span class="aria-description--hidden">Close</span>
    <span aria-hidden="true">&#215;</span>
</button>
<div class="modal-content"></div>
<div class="loadingOverlay"></div>
</div>
<div id="alert-modal" class="modal modal--alert modal--small" data-reveal data-prevent-quick-search-close>
    <div class="swal2-icon swal2-error swal2-icon-show"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div>

    <div class="modal-content"></div>

    <div class="button-container"><button type="button" class="confirm button" data-reveal-close>OK</button></div>
</div>
</div>
@endsection
