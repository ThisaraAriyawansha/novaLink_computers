<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 12px;
            border: 1px solid #e0e0e0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            text-align: center;
            border-radius: 12px 12px 0 0;
            font-size: 1.25rem;
        }

        .card-body {
            background-color: white;
            padding: 30px;
            border-radius: 0 0 12px 12px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .table {
            margin-top: 20px;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #e0e0e0;
        }

        .table th {
            background-color: #f1f1f1;
            font-weight: bold;
        }

        .table td {
            background-color: #fafafa;
        }

        .table td:last-child {
            font-weight: bold;
            color: #28a745;
        }

        p {
            font-size: 1rem;
            color: #555;
        }

        .btn-contact {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            text-align: center;
            font-weight: bold;
            text-decoration: none;
        }

        .btn-contact:hover {
            background-color: #218838;
            text-decoration: none;
        }

        .btn-ok {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            text-align: center;
            font-weight: bold;
            text-decoration: none;
            margin-top: 20px;
        }

        .btn-ok:hover {
            background-color: #0056b3;
            text-decoration: none;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                margin-top: 20px;
            }

            .card-body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment Successful</div>

                <div class="card-body">
                    <h5 class="card-title">Thank you for your payment!</h5>
                    <p>Your payment has been successfully processed. Below are the details of your order:</p>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <!-- <th>Customer</th>
                                <th>Package</th> -->
                                <th>Amount Paid</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ number_format($paymentAmount, 2) }} USD</td>
                                <td>
                                    @if($order->order_status_id == 1)
                                        Full Payment
                                    @else
                                        Partial Payment (20%)
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>If you have any questions, please <a href="mailto:support@yourwebsite.com" class="btn-contact">contact us</a>.</p>

                    <button class="btn-ok" onclick="window.location.href='{{ route('my.account') }}'">Click OK to go to My Account</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
