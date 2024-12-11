<!DOCTYPE html>
<html>
<head>
    <title>Invoice Template</title>
    <style>
        /* CSS styles for the invoice */
        .invoice {
            border: 1px solid #ccc;
            padding: 10px;
            width: 300px;
            font-family: Arial, sans-serif;
        }
        .invoice-header {
            text-align: center;
            font-size: 22px;
            margin-bottom: 10px;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details span {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }
        .invoice-item {
            margin-bottom: 5px;
        }
        .invoice-total {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            Invoice
        </div>
        <div class="invoice-details">
            <span>Invoice Number:</span> 1001<br>
            <span>Date:</span> 2022-01-01<br>
        </div>
        <div class="invoice-item">
            Item 1: $10.00<br>
            Item 2: $20.00<br>
        </div>
        <div class="invoice-total">
            Total: $30.00
        </div>
    </div>
</body>


</html>
