<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="css/index.css">
    <title>2023 SSU USC Election</title>
</head>
<body class="text-center">
    <div class="container shadow">
        <div class="row">
            <div class="col-6 my-auto">
                <img src="images/img_login.png" alt="login" class="img-fluid">
            </div>
            <div class="col-6 my-auto">
                <form class="form-signin" method="POST" action="includes/login.inc.php">
                    <h1 class="h3 mb-3 font-weight-300">Log in</h1>
                    <div class="input-group mb-2 flex-nowrap">
                        <span class="input-group-text text-center" id="basic-addon1"><i class="fas fa-user-alt"></i></span>
                        <input type="text" name="username" id="username" class="form-control" placeholder="User ID" aria-label="User ID" aria-describedby="basic-addon1" autocomplete="off" required>
                    </div>
                    <div class="input-group mb-3 flex-nowrap pass">
                        <span class="input-group-text text-center" id="basic-addon2"><i class="fas fa-key"></i></span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2" data-toggle="password" required>
                        <span class="input-group-text text-center eye" id="basic-addon3"><i class="fad fa-eye"></i></span>
                    </div>
                    <!--<div class="form-check my-auto">
                        <input class="form-check-input" type="checkbox" id="inlineFormCheck" value="remember">
                        <label class="form-check-label ml-1" for="inlineFormCheck">Remember me</label>
                    </div>-->
                    <button class="mt-3 btn btn-blue px-4" type="submit" name="submit-btn">Log in</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- JavaScript and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>    <script src="vendor/jquery-3.5.1.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>