@component('mail::message')
# Thank you for your order!

Hello {{ $order->user->name ?? 'Customer' }},

We’ve received your order **#{{ $order->id }}** placed on **{{ $order->created_at->format('F j, Y') }}**.

### Order Summary
**Total:** ${{ number_format($order->total, 2) }}  
**Payment Method:** {{ strtoupper($order->payment_method) }}

@component('mail::panel')
We’ll notify you when your order ships.
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent
