<div style="background:#e6f7ff; padding:10px; border-radius:6px; margin-bottom:20px; color:#007bff; font-weight:bold;">Hello! Welcome to the demo Blade view.</div>

<h1>Hello from Laravel Blade view!</h1>

@php
    $products = [
        ['name' => 'Product 1', 'price' => 100],
        ['name' => 'Product 2', 'price' => 200],
        ['name' => 'Product 3', 'price' => 300],
    ];
    $showList = true;
@endphp

<p>Welcome, {{ 'Guest' }}!</p>

@if($showList)
    <ul>
        @foreach($products as $product)
            <li>{{ $product['name'] }} - ${{ $product['price'] }}</li>
        @endforeach
    </ul>
@else
    <p>No products to display.</p>
@endif

<hr>
<h2>Featured Products</h2>
@php
    $featured = [
        ['name' => 'Featured 1', 'price' => 500],
        ['name' => 'Featured 2', 'price' => 750],
    ];
@endphp
<div>
    @foreach($featured as $item)
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <strong>{{ $item['name'] }}</strong><br>
            Price: ${{ $item['price'] }}
        </div>
    @endforeach
</div>

{{-- Example of a Blade component usage (if you have one) --}}
{{-- <x-alert type="success" message="This is a Blade component!" /> --}}

<footer style="margin-top:40px; color:#888; font-size:13px;">
    &copy; {{ date('Y') }} My Laravel E-Commerce Demo
</footer>

<hr>
<h2>Customer Testimonials</h2>
@php
    $testimonials = [
        ['author' => 'Alice', 'text' => 'Great service and fast delivery!'],
        ['author' => 'Bob', 'text' => 'Amazing products at the best prices.'],
        ['author' => 'Carol', 'text' => 'Customer support was very helpful.'],
    ];
@endphp
<ul>
    @foreach($testimonials as $t)
        <li><em>"{{ $t['text'] }}"</em> &mdash; <strong>{{ $t['author'] }}</strong></li>
    @endforeach
</ul>

<div style="background:#f8f9fa; padding:15px; border-radius:8px; margin:30px 0;">
    <h3>Contact Us</h3>
    <p>Email: <a href="mailto:support@example.com">support@example.com</a></p>
    <p>Phone: +1-800-123-4567</p>
    <p>Address: 123 Demo Street, Laravel City</p>
</div>

@php
    $discount = rand(5, 30);
@endphp
<div style="background:#d4edda; color:#155724; padding:10px; border-radius:6px; font-weight:bold;">
    Special Offer: Get {{ $discount }}% off on your first order! Use code <span style="color:#007bff;">WELCOME{{ $discount }}</span>
</div>
