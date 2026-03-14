<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>

<!-- Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow">
                <div class="card-header text-center">
                    <h2>Laravel Socialite Login</h2>
                    <h2 class="text-success">@if(session('msg')) {{session('msg')}} @endif</h2>
                </div>

                <div class="card-body">

                    <form method="post" action="{{url('/login-user')}}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email">
                        </div>

                    
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </div>

                        <div class="text-center mb-3">
                            <a href="{{url('/auth/redirect')}}" class="btn btn-danger w-100">
                                Login with Google
                            </a>
                        </div>

                        <div class="text-center">
                            Already have an account?
                            <a href="{{url('/')}}">Register</a>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>