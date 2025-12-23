@extends('layouts.app')

@section('content')
<div class="container py-5">
    <form action="{{ route('store.checkout') }}" method="POST" class="checkout-form">
    <div class="row">
        {{-- Checkout Form --}}
        <div class="col-md-8">
            
                @csrf
                @if(Session::has('success'))
                    <h2 class="alert alert-success">{{ Session::get('success') }}</h2>
                @endif
                @if(Session::has('error'))
                    <h2 class="alert alert-danger">{{ Session::get('error') }}</h2>
                @endif
                {{-- CUSTOMER DETAILS --}}
                <div class="mb-4">
                    <h2 class="h4">Customer Details</h2>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                    </div>
                </div>

                {{-- SHIPPING ADDRESS --}}
                <div class="mb-4">
                    <h2 class="h4">Shipping Address</h2>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="firstName" name="first_name" value="{{ old('first_name') }}">
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="lastName" name="last_name" value="{{ old('last_name') }}">
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="company">Company (Optional)</label>
                            <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ old('company') }}">
                            @error('company')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                       <div class="form-group col-md-6">
                            <label for="phone">Phone (Optional)</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="address1">Address</label>
                            <input type="text" class="form-control @error('address1') is-invalid @enderror" id="address1" name="address1" value="{{ old('address1') }}">
                            @error('address1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                         <div class="form-group col-md-12">
                            <label for="address2">Apartment/Suite (Optional)</label>
                            <input type="text" class="form-control @error('address2') is-invalid @enderror" id="address2" name="address2" value="{{ old('address2') }}">
                            @error('address2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="form-group col-md-4">
                            <label for="city">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}">
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="province">State/Province</label>
                            <input type="text" class="form-control @error('state_or_province') is-invalid @enderror" id="province" name="state_or_province" value="{{ old('state_or_province') }}">
                            @error('state_or_province')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                         <div class="form-group col-md-4">
                            <label for="postalCode">Postal Code</label>
                            <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postalCode" name="postal_code" value="{{ old('postal_code') }}">
                            @error('postal_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="country">Country</label>
                            <select id="country" name="country_code" class="form-control @error('country_code') is-invalid @enderror">
                                <option value="">Choose...</option>
                                <option value="US" {{ old('country_code') == 'US' ? 'selected' : '' }}>United States</option>
                                <option value="PK" {{ old('country_code') == 'PK' ? 'selected' : '' }}>Pakistan</option>
                                <option value="IN" {{ old('country_code') == 'IN' ? 'selected' : '' }}>India</option>
                            </select>
                            @error('country_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- BILLING SAME AS SHIPPING --}}
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="sameAsBilling" name="billingSameAsShipping" value="true" checked>
                    <label class="form-check-label" for="sameAsBilling">Billing address is same as shipping</label>
                </div>

                {{-- ORDER COMMENTS --}}
                <div class="form-group mb-4">
                    <label for="orderComment">Order Comments (Optional)</label>
                    <textarea id="orderComment" name="order_comment" class="form-control" rows="3" maxlength="2000" placeholder="Add any special notes here..."></textarea>
                </div>

                {{-- PAYMENT OPTIONS --}}
               <div class="mb-4">
                    <h2 class="h4">Payment Method</h2>

                    <div class="form-check">
                        <input class="form-check-input" 
                            type="radio" name="payment_method" id="payment_cod" value="cod">
                        <label class="form-check-label" for="payment_cod">Cash on Delivery (COD)</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" 
                            type="radio" name="payment_method" id="payment_stripe" value="stripe">
                        <label class="form-check-label" for="payment_stripe">Pay with Card (Stripe)</label>
                    </div>

                    @error('payment_method')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                {{-- STRIPE FIELDS --}}
                <div id="stripe-fields" class="border p-3 mb-4 d-none">
                    <div class="form-group">
                        <label for="card_name">Cardholder Name</label>
                        <input type="text" class="form-control" id="card_name" name="card_name">
                    </div>

                    <div class="form-group">
                        <label for="card-element">Card Details</label>
                        <div id="card-element" class="form-control">
                            <!-- Stripe injects the card input here -->
                        </div>
                        <div id="card-errors" class="text-danger mt-2"></div>
                    </div>
                </div>


                {{-- SUBMIT --}}
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">
                        Place Order
                    </button>
                </div>
            
        </div>

        {{-- Order Summary --}}
        <div class="col-md-4" id="order-summary">
            <aside class="layout-cart">
                @include('components/cart-summary')
            </aside>
        </div>
    </div>
    </form>
</div>

{{-- JS for Stripe Toggle --}}
<script src="https://js.stripe.com/v3/"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const form = document.querySelector('.checkout-form');
    const stripeRadio = document.getElementById('payment_stripe');
    const codRadio = document.getElementById('payment_cod');
    const stripeFields = document.getElementById('stripe-fields');

    function toggleStripeFields() {
        if (stripeRadio.checked) {
            stripeFields.classList.remove('d-none');
        } else {
            stripeFields.classList.add('d-none');
        }
    }

    stripeRadio.addEventListener('change', toggleStripeFields);
    codRadio.addEventListener('change', toggleStripeFields);
    toggleStripeFields();

    form.addEventListener('submit', async function (event) {
        if (stripeRadio.checked) {
            event.preventDefault();

            const cardholderName = document.getElementById('card_name').value;

            const { paymentMethod, error } = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {
                    name: cardholderName
                }
            });

            if (error) {
                console.log("Inside Error Block");
                document.getElementById('card-errors').textContent = error.message;
            } else {
                console.log("Inside Other Block");
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'payment_method_id';
                hiddenInput.value = paymentMethod.id;
                form.appendChild(hiddenInput);
                form.submit();
            }
        }
    });
});
</script>

@endsection
