<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <title>PayHere Payment</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 0 auto; padding: 20px; }
        .payment-form { background: #f4f4f4; padding: 20px; border-radius: 8px; }
        .payment-form input { display: none; }
        .submit-btn { 
            width: 100%; 
            padding: 10px; 
            background-color: #4CAF50; 
            color: white; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
        }
        .submit-btn:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="payment-form">
        <h1>Complete Your Payment</h1>
        <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
            @csrf
            @foreach ($paymentData as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <button type="submit" class="submit-btn">Proceed to Payment</button>
        </form>
    </div>
    </body>
</html>