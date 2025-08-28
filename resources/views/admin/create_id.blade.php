<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create ID Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Create ID Card</h2>
    <form action="{{route('store')}}" method="POST"enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date of Birth</label>
            <input type="date" name="date_of_birth" class="form-control" required>
            @error('date_of_birth')
                        <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Card Issue Date</label>
            <input type="date" name="issue_date" class="form-control" required>
            @error('issue_date')
                        <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Card Expiry Date</label>
            <input type="date" name="expiry_date" class="form-control" required>
            @error('expiry_date')
                        <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Photo</label>
            <input type="file" name="photo" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Generate ID Card</button>
    </form>
</div>
</body>
</html>
