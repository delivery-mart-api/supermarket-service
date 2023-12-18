<!-- header -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid" style="height: 100vh;">
        <div class="row" style="height: 100%;">
            <div class="col-8 align-items-center justify-content-center d-flex flex-md-column gap-3" style="background-image: url('/loginbg.svg');background-color: rgba(255,255,255,0.7);background-blend-mode: lighten;background-repeat: no-repeat;background-position: 0% 120%;">
                <h1>Register Cabangmu</h1>
                <div class="container w-75">
                    <form action="/register" method="POST" class="d-flex flex-column justify-content-center align-items-center gap-2 w-100">
                        <input required type="text" class="rounded-pill form-control px-4 w-100" id="cabang-register" style="max-width: 400px;height: 50px" name="name" placeholder="Nama Cabang" />
                        <input required type="text" class="rounded-pill form-control px-4 w-100" id="username-register" style="max-width: 400px;height: 50px" name="username" placeholder="Username" />
                        <input required type="password" class="rounded-pill form-control px-4 w-100" id="password-register" style="max-width: 400px;height: 50px" name="password" placeholder="Password" />
                        <button type="submit" class="btn mt-3 btn-success rounded-pill px-5 py-2">Sign Up</button>
                    </form>
                </div>
            </div>
            <div class="col-4 bg-success bg-gradient align-items-center justify-content-center d-flex flex-column gap-4">
                <h1 class="text-light">Sudah terdaftar?</h1>
                <p class="text-light fs-4 text-center">Segera login cabangmu untuk layanan delivery online!</p>
                <a href="<?= base_url('login'); ?>" type="button" class="btn btn-light rounded-pill px-5 py-2">Sign In</a>
            </div>
        </div>
    </div>

    <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>