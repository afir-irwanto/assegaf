<!DOCTYPE html>
<html>
<head>
    <style>
        #purchases {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        #purchases td, #purchases th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        #purchases tr:nth-child(even){background-color: #f2f2f2;}
        
        #purchases tr:hover {background-color: #ddd;}
        
        #purchases th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>
    
    <h1>Purchase Data</h1>
    
    <table id="purchases">
        <tr>
            <th>Detail</th>
            <th>Amount</th>
            <th>Price</th>
            <th>Total Purchase</th>
        </tr>
        @foreach ($data as $dt)
        <tr>
            <td>{{ $dt->detail }}</td>
            <td>{{ $dt->amount }}</td>
            <td>{{ $dt->price }}</td>
            <td>{{ $dt->total_purchase }}</td>
        </tr>
        @endforeach
    </table>
    
</body>
</html>