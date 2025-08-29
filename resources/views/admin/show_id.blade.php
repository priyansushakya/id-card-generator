<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ID Card</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background: #f0f2f5;
        font-family: 'Segoe UI', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        flex-direction: column;
        margin: 0;
    }

    /* Container for the card and button */
    .id-card-wrapper {
        width: 450px; /* same width as card */
        display: flex;
        justify-content: flex-end; /* aligns close button to the right */
        margin-bottom: 10px; /* space between button and card */
    }

    .close-btn {
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        transition: 0.3s;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        text-decoration: none;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .close-btn:hover {
        background: #c82333;
        transform: scale(1.1);
    }

    .id-card {
        width: 450px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        background-color: #fff;
        margin-bottom: 20px;
    }
    .id-card-header {
        background: linear-gradient(90deg, #007bff, #0056b3);
        color: #fff;
        text-align: center;
        padding: 15px 0;
        font-weight: bold;
        font-size: 18px;
    }
    .id-card-body {
        display: flex;
        padding: 20px;
        gap: 20px;
        align-items: center;
    }
    .id-card-photo {
        flex: 0 0 130px;
        border-radius: 10px;
        overflow: hidden;
        border: 2px solid #ddd;
        height: 160px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .id-card-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .id-card-details {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .id-card-details h3 {
        margin: 0;
        font-size: 20px;
        color: #333;
        font-weight: 600;
    }
    .id-card-details p {
        margin: 4px 0;
        font-size: 14px;
        color: #555;
    }
    .id-card-footer {
        display: flex;
        justify-content: space-between;
        padding: 10px 20px;
        background-color: #f1f3f6;
        font-size: 13px;
        color: #333;
        border-top: 1px solid #ddd;
    }
    .print-btn {
        border-radius: 25px;
        padding: 10px 40px;
        font-size: 16px;
        background: linear-gradient(90deg, #28a745, #218838);
        border: none;
        color: #fff;
        transition: 0.3s;
    }
    .print-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(40,167,69,0.5);
    }

    @media print {
        body {
            background: #fff;
        }
        .print-btn, .close-btn {
            display: none;
        }
        .id-card {
            box-shadow: none;
            border: 1px solid #000;
        }
    }
</style>
</head>
<body>

<!-- Close button above the card, right-aligned -->
<div class="id-card-wrapper">
    <a href="{{ route('create') }}" class="close-btn">×</a>
</div>

<!-- ID Card -->
<div class="id-card">
    <div class="id-card-header">ID Card</div>
    <div class="id-card-body">
        <div class="id-card-photo">
            <img src="{{ asset($user->photo) }}" alt="Photo">
        </div>
        <div class="id-card-details">
            <h3>{{ $user->name }}</h3>
            <p><strong>DOB:</strong> {{ $user->date_of_birth }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Address:</strong> {{ $user->address }}</p>
            <p><strong>Phone:</strong> {{ $user->phone }}</p>
        </div>
    </div>
    <div class="id-card-footer">
        <span><strong>Issue:</strong> {{ $user->issue_date }}</span>
        <span><strong>Expiry:</strong> {{ $user->expiry_date }}</span>
    </div>
</div>

<!-- Print button -->
<button class="btn print-btn" onclick="window.print()">Print ID Card</button>

</body>
</html>
