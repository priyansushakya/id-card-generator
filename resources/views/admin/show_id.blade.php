<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card</title>
    <style>
        .id-card {
            width: 350px;
            height: 200px;
            border: 2px solid #333;
            padding: 20px;
            border-radius: 10px;
            font-family: Arial, sans-serif;
            position: relative;
            background-color: #f9f9f9;
        }
        .id-card img {
            width: 80px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }
        .id-card h3 {
            margin: 0;
            font-size: 20px;
        }
        .id-card p {
            margin: 2px 0;
            font-size: 14px;
        }
        .print-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="id-card">
        <div style="display: flex; gap: 15px;">
            <img src="{{ asset($user->photo) }}">
            <div>
                <h3>{{ $user->name }}</h3>
                <p><strong>DOB:</strong> {{ $user->date_of_birth }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Issue:</strong> {{ $user->issue_date }}</p>
                <p><strong>Expiry:</strong> {{ $user->expiry_date }}</p>
            </div>
        </div>
    </div>
    <button class="btn btn-success print-btn" onclick="window.print()">Print ID Card</button>
</div>
</body>
</html>
