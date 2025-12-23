@php
    use App\Models\DeliveryCharge;
    $data=DeliveryCharge::first();
    $user = auth()->user();
    $cartData = app(\App\Http\Controllers\CartController::class)->getUserCartData($user->id);
@endphp
 
 <article class="cart border p-3 bg-light">
    <header class="cart-header mb-3">
        <h3 class="h5">Order Summary</h3>
        {{-- <a class="btn btn-link p-0" href="https://martega.mybigcommerce.com/cart.php" target="_top">Edit Cart</a> --}}
    </header>
</article>
<section class="cart-section mb-3">
    <h5 class="font-weight-bold">{{ $cartData['count'] }} Items</h5>
    <ul class="list-unstyled">
        @foreach ($cartData['items'] as $item)
            <li class="media mb-3">
                <input type="hidden" name="product_id[]" value="{{ $item['product_id'] }}">
                <input type="hidden" name="product_name[]" value="{{ $item['product_name'] }}">
                <input type="hidden" name="price[]" value="{{ $item['product_price'] }}">
                <input type="hidden" name="quantity[]" value="{{ $item['quantity'] }}">
                <input type="hidden" name="product_total[]" value="{{ $item['product_price']*$item['quantity'] }}">
                <img class="mr-3" src="{{ $item['product_image'] }}" width="64" alt="">
                <div class="media-body">
                    <h6 class="mt-0 mb-1">{{ $item['quantity'] }} x {{ $item['product_name'] }}</h6>
                    ${{ number_format($item['total_price'], 2) }}
                </div>
            </li>
        @endforeach
    </ul>
</section>

<section class="cart-section">
    <div class="d-flex justify-content-between">
        <span>Subtotal</span>
        <strong>$<span class="cart-subtotals-value" >{{ number_format($cartData['subtotal'], 2) }}</span></strong>
    </div>
    <div class="d-flex justify-content-between">
        <span>Shipping</span>
        <span>${{ number_format($cartData['shipping_charges'], 2) }}</span>
    </div>
    <div class="d-flex justify-content-between">
        <span >Tax</span>
        <span>$<span class="tax">{{ number_format($cartData['tax'], 2) }}</span></span>
    </div>
    <div class="mt-3 d-flex justify-content-between border-top pt-2">
        <strong>Total</strong>
        <strong>${{ number_format($cartData['total'], 2) }}</strong>
    </div>
</section>

 <input type="hidden" name="subtotal" value="{{ $cartData['subtotal'] }}">
 <input type="hidden" name="shipping_cost" value="{{$cartData['shipping_charges']}}">
 <input type="hidden" name="tax" value="{{ $cartData['tax'] }}">
 <input type="hidden" name="total" value="{{ $cartData['total'] }}">
