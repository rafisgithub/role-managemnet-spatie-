<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>


    <div class="container">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                         Role : {{ $role->name }}
                            <a href="{{ route('roles.index') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('roles.update-permission', $role->id)  }}" method="POST">
                            @csrf
                 
                            <div class="mb-3">
                                <label for="">Permissions</label>

                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-2">
                                            <label for="">
                                                <input
                                                type="checkbox"
                                                name="permissions[]"
                                                value="{{ $permission->name }}"
                                            {{ in_array($permission->id,$rolePermissions) ? 'checked' : ''}}
                                                />

                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
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
