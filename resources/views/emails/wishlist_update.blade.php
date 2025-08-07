<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Wishlist Updated</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; padding: 20px;">
    <div
        style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 6px; padding: 30px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <h2 style="color: #333;">👋 Hello {{ $user->name }},</h2>

        <p style="font-size: 16px; color: #555;">
            Your wishlist has been <strong>Updated</strong> with the product:
        </p>

        <div style="margin: 20px 0; padding: 15px; border: 1px solid #e0e0e0; border-radius: 5px;">
            <h3 style="margin: 0; color: #222;">{{ $product->name }}</h3>
            @if($product->image_url)
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                    style="width: 100px; height: auto; margin-top: 10px;">
            @endif
            <p style="margin-top: 10px; color: #777;">Price: ${{ $product->price }}</p>
        </div>
        
        <p style="margin-top: 30px; font-size: 14px; color: #aaa;">
            Thank you for using our service!<br>
            – The Team
        </p>
    </div>
</body>

</html>