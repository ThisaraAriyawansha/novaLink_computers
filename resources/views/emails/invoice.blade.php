<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
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
    <title>New Invoice Generated</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Invoice Generated</h1>
        </div>
        <div class="content">
            <p>Hello Admin,</p>
            <p>A new invoice has been generated in the system. The details are as follows:</p>
            
            <div class="invoice-details">
                <p><strong>Invoice Number:</strong> {{ $invoiceNumber }}</p>
                <p><strong>Date Issued:</strong> {{ $dateIssued }}</p>
                <p><strong>Customer:</strong> {{ $customerName }}</p>
                <p><strong>Email:</strong> {{ $customerEmail }}</p>
                <p><strong>Total Amount:</strong> {{ $total }}</p>
            </div>
            
            <p>Please find the attached PDF for the complete invoice details.</p>
            <p>Best regards,<br>NovaLink Computers System</p>
        </div>
        <div class="footer">
            <p>NovaLink Computers - Computer Arcade & Technologies (PVT) Ltd</p>
            <p>+94 (76) 941-7154 | www.novaLinkcomputers.lk</p>
        </div>
    </div>
</body>
</html>

