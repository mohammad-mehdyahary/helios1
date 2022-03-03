<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>helios</title>
</head>
<body>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">شناسه پرداخت: {{ $data['payment_id'] }}</li>
        <li class="list-group-item">مبلغ کل: {{ $data['total'] }}</li>
        <li class="list-group-item">نوع پرداخت: {{ $data['payment_type'] }}</li>
        <li class="list-group-item">کد وضعیت: {{ $data['status_code'] }}</li>
       
    </ul>
</body>
</html>