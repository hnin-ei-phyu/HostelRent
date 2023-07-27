<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Myanmar Hostel In Yangon</h1>
    <hr>
    <h2>Dear {{$username}} !</h2>
    <hr>
    <h2>Thank for sending us your finding Hostel!</h2>

    <ul class="list-group list-group-flush">
        &nbsp;&nbsp;
        <li class="list-group-item">User ID  : {{$tenant_id}}</li>
        <li class="list-group-item">category: {{$category}}</li>
        <li class="list-group-item">Roomtype: {{$room_type}}</li>
        <li class="list-group-item">Price: {{$price}}</li>
        <li class="list-group-item">Order Date: {{$post_date}}</li>
        <li class="list-group-item bg-warning">-----------------</li>
        <li class="list-group-item">User Email: {{$useremail}}</li>
    </ul>
    
</body>
</html>