<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your Invoice from NovaLink Computers</title>
    <script src="assets/js/tailwind-cdn.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #003366;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background-color: #f9fafb;
        }
        .invoice-details {
            margin: 20px 0;
            padding: 15px;
            background-color: white;
            border-radius: 5px;
        }
        .footer {
            background-color: #003366;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 12px;
        }
        .button {
            display: inline-block;
            background-color: #3b82f6;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Your Invoice from NovaLink Computers</h1>
        </div>
        <div class="content">
            <p>Dear {{ $customerName }},</p>
            <p>Thank you for your purchase at NovaLink Computers. Please find your invoice attached to this email.</p>
            
            <div class="invoice-details">
                <p><strong>Invoice Number:</strong> {{ $invoiceNumber }}</p>
                <p><strong>Date Issued:</strong> {{ $dateIssued }}</p>
                <p><strong>Due Date:</strong> {{ $dueDate }}</p>
                <p><strong>Total Amount:</strong> {{ $total }}</p>
            </div>
            
            <p>If you have any questions regarding your invoice or purchase, please don't hesitate to contact our support team at novaLinkcomputers@gmail.com or call +94 (76) 941-7154.</p>
            
            <p>We appreciate your business!</p>
            <p>Best regards,<br>NovaLink Computers Team</p>
        </div>
        <div class="footer">
            <p>NovaLink Computers - Computer Arcade & Technologies (PVT) Ltd</p>
            <p>+94 (76) 941-7154 | www.novaLinkcomputers.lk</p>
        </div>
    </div>
</body>
</html>