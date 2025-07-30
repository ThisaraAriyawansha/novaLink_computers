<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $data['invoiceNumber'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 1px;
            width: 100%;
        }
        .invoice-header {
            background-color: #1f2937;
            color: white;
            padding: 15px;
            display: table;
            width: 100%;
            table-layout: fixed;
        }
        .logo {
            display: table-cell;
            vertical-align: middle;
            width: 50%;
        }
        .logo-text {
            margin-left: 10px;
        }
        .invoice-title {
            display: table-cell;
            vertical-align: middle;
            text-align: right;
            width: 50%;
        }
        .customer-info {
            display: table;
            width: 100%;
            table-layout: fixed;
            margin: 20px 0;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .customer-info > div {
            display: table-cell;
            vertical-align: top;
            width: 50%;
        }
        .customer-info .bill-to {
            width: 50%;
        }
        .customer-info .invoice-details {
            width: 50%;
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th {
            background-color: #f3f4f6;
            text-align: left;
            padding: 10px;
            font-size: 12px;
            text-transform: uppercase;
            color: #6b7280;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .summary {
            width: 50%;
            margin-left: auto;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        .total-row {
            font-weight: bold;
            font-size: 18px;
            padding: 10px 0;
        }
        .footer {
            background-color: #1f2937;
            color: white;
            padding: 10px;
            text-align: right;
            margin-top: 20px;
            font-size: 12px;
        }
        .payment-info {
            margin: 20px 0;
            display: table;
            width: 100%;
            table-layout: fixed;
        }
        .payment-info > div {
            display: table-cell;
            width: 50%;
            vertical-align: top;
        }
    </style>
</head>
<body>
    <div class="invoice-header">
        <div class="logo">
            <div class="logo-text">
                <p style="font-size: 20px; font-weight: bold; margin: 0;">CoreX COMPUTERS</p>
                <p style="margin: 0;">Computer Arcade & Technologies (PVT) Ltd</p>
            </div>
        </div>
        <div class="invoice-title">
            <p style="font-weight: bold; margin: 0;">INVOICE</p>
            <p style="margin: 0;">{{ $data['invoiceNumber'] }}</p>
            <p style="margin: 0;">{{ $data['dateIssued'] }}</p>
        </div>
    </div>

    <div class="customer-info">
        <div class="bill-to">
            <p style="color: #6b7280; font-weight: 600; margin-bottom: 8px;">Bill To:</p>
            <p style="font-weight: 500; margin: 0;">{{ $data['customerName'] }}</p>
            <p style="margin: 0;">{{ $data['customerEmail'] }}</p>
            <p style="margin: 0;">{{ $data['customerPhone'] }}</p>
            <p style="margin: 0;">{{ $data['customerAddress'] }}</p>
            <p style="margin: 0;">Sri Lanka</p>
        </div>
        <div class="invoice-details">
            <p style="color: #6b7280; font-weight: 600; margin-bottom: 8px;">Invoice Details:</p>
            <p style="margin: 0;"><span style="font-weight: 500;">Date Issued:</span> {{ $data['dateIssued'] }}</p>
            <p style="margin: 0;"><span style="font-weight: 500;">Due Date:</span> {{ $data['dueDate'] }}</p>
            <p style="margin: 0;"><span style="font-weight: 500;">Payment Terms:</span> Net 15</p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ITEM NAME</th>
                <th>PRICE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['invoiceItems'] as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['price'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="background-color: #f9fafb; padding: 10px;">
        <div class="summary">
            <div class="summary-row">
                <span style="font-weight: 500;">Subtotal:</span>
                <span>{{ $data['subtotal'] }}</span>
            </div>
            <div class="summary-row">
                <span style="font-weight: 500;">Tax (18%):</span>
                <span>{{ $data['tax'] }}</span>
            </div>
            <div class="summary-row">
                <span style="font-weight: 500;">Shipping:</span>
                <span>Rs. 500</span>
            </div>
            <div class="summary-row total-row">
                <span>Total:</span>
                <span>{{ $data['total'] }}</span>
            </div>
        </div>
    </div>

    <div class="payment-info">
        <div>
            <p style="font-weight: 600; margin: 0;">Warranty Period: 2 Years</p>
            <p style="font-weight: 600; margin-top: 10px;">Payment Information:</p>
            <p style="margin: 0;">Bank: BOC</p>
            <p style="margin: 0;">Account Name: CoreX Computers</p>
            <p style="margin: 0;">Account Number: XXXX-XXXX-XXXX-5464</p>
            <p style="margin: 0;">IFSC Code: GLOB0005656</p>
        </div>
        <div>
            <p style="font-weight: 600; margin: 0;">Notes:</p>
            <p style="color: #6b7280; text-align: justify;">Thank you for your business. Please make payment by the due date. For any queries regarding this invoice, please contact our support team at support@corexcomputers.com or call +94 (77) 543-5656.</p>
        </div>
    </div>

    <div class="footer">
        <p style="margin: 0;">+94 4343 66665 | www.corexcomputers.lk | corexcomputers@gmail.com</p>
    </div>
</body>
</html>