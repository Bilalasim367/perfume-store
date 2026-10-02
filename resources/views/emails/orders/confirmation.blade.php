<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background: #1a1510; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
        <h1 style="color: #B8A878; margin: 0;">Order Confirmed!</h1>
    </div>

    <p>Thank you for your order! We've received your order and will process it shortly.</p>

    <div style="background: #f9f9f9; padding: 15px; border-radius: 8px; margin: 20px 0;">
        <h2 style="color: #0B0B0F; margin-top: 0;">Order Details</h2>
        <p><strong>Order ID:</strong> #{{ $order->id }}</p>
        <p><strong>Date:</strong> {{ $order->created_at->format('F j, Y') }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
    </div>

    <h3 style="color: #0B0B0F;">Items Ordered</h3>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr style="background: #1a1510; color: white;">
                <th style="padding: 10px; text-align: left;">Product</th>
                <th style="padding: 10px; text-align: center;">Qty</th>
                <th style="padding: 10px; text-align: right;">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr style="border-bottom: 1px solid #eee;">
                <td style="padding: 10px;">{{ $item->product->name }}</td>
                <td style="padding: 10px; text-align: center;">{{ $item->quantity }}</td>
                <td style="padding: 10px; text-align: right;">PKR {{ number_format($item->price * 280, 0) }}</td>
            </tr>
            @endforeach
            <tr style="font-weight: bold;">
                <td colspan="2" style="padding: 10px; text-align: right;">Total:</td>
                <td style="padding: 10px; text-align: right;">PKR {{ number_format($order->total * 280, 0) }}</td>
            </tr>
        </tbody>
    </table>

    <div style="background: #f9f9f9; padding: 15px; border-radius: 8px;">
        <h3 style="color: #0B0B0F; margin-top: 0;">Shipping Address</h3>
        <p>{{ $order->shipping_name }}</p>
        <p>{{ $order->shipping_address }}</p>
        <p>{{ $order->shipping_city }}</p>
        <p>{{ $order->shipping_phone }}</p>
    </div>

    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;">
        <p>You can track your order status at any time by visiting your account on our website.</p>
        <p style="color: #666; font-size: 12px;">Thank you for shopping with SAFARI!</p>
    </div>
</body>
</html>