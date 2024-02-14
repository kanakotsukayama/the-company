<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<!-- Fontawesome AND link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Login</title>
</head>
<body class="bg-light">
    <div style="height: 100vh">
    <div class="row h-100 m-0">
        <div class="card w-25 my-auto mx-auto">
            <div class="card-header bg-white border-0 py-3">
                <h1 class="text-center">Login</h1>
            </div>
            <div class="card-body">
                <form action="../actions/login-action.php" method="post" autocomplete="off">
                    <input type="text" name="username" id="username" class="form-control mb-2" placeholder="USERNAME" required autofocus>
                    <input type="password" name="password" id="password" class="form-control mb-5" placeholder="PASSWORD" required>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <p class="text-center mt-3 small"><a href="register.php">Create Account</a></p>
            </div>
        </div>
    </div>
    </div>
    
</body>
</html>