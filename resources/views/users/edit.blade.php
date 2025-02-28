<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Edit User
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                {{ method_field('PATCH') }}
                <div class="card-body">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" name="address" value="{{$user->address}}" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" name="phone" value="{{$user->phone}}" class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" name="gender" value="{{$user->gender}}" class="form-control mb-2">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('users.index')}}" class="btn btn-secondary ms-2">Back</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
