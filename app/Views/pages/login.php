
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="item-center justify-content-lg-center max-height: 100%">
        <div class="text-center">
            <h1>Welcome to Indoapril!</h1>
        </div>
        <div class="container mt-5 col-5">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    LOGIN
                </div>
                <div class="card-body">
                    <form action="/login" method="POST">
                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">
                                Username
                            </label>
                            <input type="text" name="username" class="form-control" value="<?php echo session()->getFlashdata('username')?>" id="inputUsername">
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">
                                Password
                            </label>
                            <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-secondary" value="Login">
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class='my-2'>
                <p class='text-secondary fw-5'>Belum punya akun? Hubungi Admin</p>
            </div>
        </div>
    </div>
</body>
</html>