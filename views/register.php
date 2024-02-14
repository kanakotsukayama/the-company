<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<!-- Fontawesome AND link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Register</title>
</head>
<body class="bg-light">
    <div style="height: 100vh;">
        <div class="row h-100 m-0">
            <div class="card w-25 my-auto mx-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center">Register</h1>
                </div>
                <div class="card-body">
                    <form action="../actions/register-action.php" method="post">
                        <div class="mb-3">
                            <label for="first-name" class="form-label">Firstname</label>
                            <input type="text" name="first_name" id="first-name" class="form-control" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="last-name" class="form-label">Lastname</label>
                            <input type="text" name="last_name" id="last-name" class="form-control" required>
                        </div>
                        <!-- Let's add bold for emphasis -->
                        <div class="mb-3">
                            <label for="username" class="form-label fw-bold">Username</label>
                            <input type="text" name="username" id="username" class="form-control fw-bold" maxlength="15" required>
                        </div>
                        <div class="mb-5">
                            <label for="password" class="form-label fw-bold">password</label>
                            <input type="password" name="password" id="password" class="form-control fw-bold" minlength="8" ariadescribedby="password-info" required >
                            <div class="form-text" id="password-info">Password must be atleast 8 charactors long.</div>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Register</button>
                    </form>
                    <p class="gtext-center mt-3 small">Registered already? <a href="/..views"></a></p>
                </div>
            </div>
        </div>
</div>

    
</body>
</html>