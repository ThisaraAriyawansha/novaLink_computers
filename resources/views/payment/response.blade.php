<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status & Reservations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            flex-direction: column;
        }
        .message-box {
            padding: 30px;
            border-radius: 12px;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            color: #333;
            width: 80%;
            max-width: 500px;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 2.5em;
            margin: 10px 0;
        }
        .success h2 {
            color: #28a745;
        }
        .error h2 {
            color: #dc3545;
        }
        p.details {
            font-size: 1.2em;
            margin: 10px 0;
            line-height: 1.6;
            color: #555;
        }
        .btn-ok {
            padding: 12px 24px;
            font-size: 1.1em;
            color: white;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        .btn-ok:hover {
            background-color: #218838;
        }
        .additional-notes {
            font-size: 0.9em;
            color: #777;
            margin-top: 20px;
        }
        .reservation-list {
            margin-top: 30px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .reservation-list h4 {
            font-size: 1.6em;
            color: #333;
            margin-bottom: 10px;
        }
        .reservation-list ul {
            list-style-type: none;
            padding: 0;
        }
        .reservation-list li {
            background-color: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .reservation-footer {
            margin-top: 30px;
            background-color: #f4f7fa;
            padding: 20px;
            font-size: 0.9em;
            color: #777;
            text-align: center;
        }
        .reservation-footer a {
            color: #28a745;
            text-decoration: none;
            font-weight: bold;
        }
        .reservation-footer a:hover {
            text-decoration: underline;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .message-box {
                width: 90%;
                padding: 20px;
            }
            h2 {
                font-size: 2em;
            }
            p.details {
                font-size: 1.1em;
            }
            .btn-ok {
                font-size: 1em;
                padding: 10px 20px;
            }
            .additional-notes {
                font-size: 0.9em;
            }
            .reservation-footer {
                font-size: 0.8em;
            }
        }

        @media (max-width: 480px) {
            h2 {
                font-size: 1.8em;
            }
            p.details {
                font-size: 1em;
            }
            .btn-ok {
                font-size: 0.9em;
                padding: 8px 16px;
            }
            .additional-notes {
                font-size: 0.8em;
            }
            .reservation-footer {
                font-size: 0.7em;
            }
        }
    </style>
</head>
<body>

    <!-- Message Box -->
<!-- Message Box -->
<div class="message-box {{ $status }}">
    <h2>{{ $message }}</h2>
    <p class="details">
        {{ $status == 'success' ? 
            'Thank you for your payment. Your transaction has been successfully processed.' : 
            'Payment failed. Please check your payment details and try again.' 
        }}
    </p>

    @if ($status == 'success')
        <p class="additional-notes">
            Note: This payment is for the selected package. For any questions, please 
            <a href="{{ route('contact') }}" style="color: #28a745; font-weight: bold;">contact our support team</a>.
        </p>
        <button class="btn-ok" onclick="window.location.href='{{ route('home') }}'">
            Click OK to go to Home
        </button>
    @endif
</div>


    <div class="reservation-footer">
        <p>© 2025 All Rights Reserved Udarata Computers | Designed & Developed by Silicon Radon Networks (Pvt) Ltd</p>
    </div>

</body>
</html>
