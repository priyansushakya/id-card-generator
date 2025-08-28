<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create ID Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #fdfbfb, #ebedee);
        font-family: 'Segoe UI', sans-serif;
    }
    .form-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(8px);
        border-radius: 20px;
        padding: 40px;
        width: 100%;
        max-width: 800px;
        color: #333;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .form-label {
        font-weight: 600;
    }
    .form-control {
        border-radius: 12px;
        border: 1px solid #ddd;
        padding: 10px 15px;
    }
    .form-control:focus {
        box-shadow: 0 0 6px rgba(0, 123, 255, 0.4);
        border-color: #007bff;
    }
    .btn-primary {
        background: linear-gradient(90deg, #007bff, #0056b3);
        border: none;
        border-radius: 30px;
        padding: 12px 40px;
        font-size: 18px;
        transition: 0.3s;
    }
    .btn-primary:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.5);
    }
    h2 {
        font-weight: bold;
        margin-bottom: 30px;
        text-align: center;
    }
</style>
</head>
<body>
    <div class="form-card">
        <h2>Create ID Card</h2>
        <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" required>
                    @error('date_of_birth')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Address" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Phone Number</label>
                    <input type="tel" name="phone" class="form-control" pattern="[0-9]{10}" placeholder="Enter 10-digit number" required>
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Card Issue Date</label>
                    <input type="date" name="issue_date" class="form-control" required>
                    @error('issue_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Card Expiry Date</label>
                    <input type="date" name="expiry_date" class="form-control" required>
                    @error('expiry_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Upload Photo</label>
                    <input type="file" name="photo" class="form-control" accept="image/*" required>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Generate ID Card</button>
            </div>
        </form>
    </div>
</body>
</html>
