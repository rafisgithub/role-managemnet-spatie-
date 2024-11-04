<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Role management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>


    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                         Edit User
                            <a href="{{ route('users.index') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('users.update',$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">User Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $user->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password" value="{{ $user->password }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Role</label>
                                <select name="roles[]" class="form-control" multiple>
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
