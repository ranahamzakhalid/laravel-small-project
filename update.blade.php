<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: tan">
    <div class="container">
        <h2 class="mt-2">Update User Data</h2>
        <form action="{{route('update.data',$data->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{$data->name}}" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" value="{{$data->age}}" class="form-control" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" value="{{$data->email}}" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="address" value="{{$data->address}}" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" value="{{$data->city}}" class="form-control" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="number">Number</label>
                <input type="number" value="{{$data->phone}}" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" value="{{$data->password}}" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
