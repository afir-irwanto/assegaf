<!DOCTYPE html>
<html>
<head>
    <style>
        #sales {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        #sales td, #sales th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        #sales tr:nth-child(even){background-color: #f2f2f2;}
        
        #sales tr:hover {background-color: #ddd;}
        
        #sales th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>
    
    <h1>Sales Data</h1>
    
    <table id="sales">
        <tr>
            <th>Item</th>
            <th>Customer</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Price</th>
        </tr>
        @foreach ($sales as $sl)
        <tr>
            <td>{{ $sl->item }}</td>
            <td>{{ $sl->customer }}</td>
            <td>{{ $sl->quantity }}</td>
            <td>Rp. {{ number_format($sl->price) }}</td>
            <td>Rp. {{ number_format($sl->total_price) }}</td>
        </tr>
        @endforeach
    </table>
    
</body>
</html>