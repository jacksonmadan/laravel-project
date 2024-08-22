<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Request</title>
</head>
<body>
    <h1>New Payment Request</h1>
    <p><strong>Amount:</strong> {{ $amount }}</p>
    <p><strong>Description:</strong> {{ $description }}</p>

    <p>
        <a href="{{ route('payment.request.approve', ['id' => $request_id]) }}" style="display: inline-block; padding: 10px 20px; color: white; background-color: green; text-decoration: none; border-radius: 5px;">Approve</a>
    </p>
</body>
</html>
