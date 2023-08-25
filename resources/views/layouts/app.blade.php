<!DOCTYPE html>
<html>
<head>
    <title>Laravel User Management App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">User List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.create') }}">Create User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.import') }}">Import Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.export') }}">Export Users</a>
            </li>
        </ul>
    </div>
</nav>

@yield('content')

</body>
</html>
