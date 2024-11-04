<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    @include('role-permissions.nav-link')


    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
            @if(session('message'))
            <p class="alert alert-success" role="alert">
                {{ session('message') }}
            </p>
            @endif
            
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Permissions
                            <a href="{{ route('permissions.create') }}" class="btn btn-primary float-end">Create</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('permissions.destroy', $permission->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
