<html>

<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.css">
</head>

<body>
    <form method="post" action="./verify.php">
        <div class="container login">
            <div class="top-menu">
                <h1><a href="/placement">College Placement System</a></h1>
                <div class="login-menu">
                    <a href="../"><i class="fas fa-home"></i>Home</a>
                </div>
            </div>
            <div class="loginContainer">
                <div class="loginWrapper">
                    <h1>Student Login</h1>
                    <div class="inputWrapper">
                        <!-- <label for="username">Username</label> -->
                        <input type="text" name="uname" id="username" placeholder="username">
                    </div>
                    <div class="inputWrapper">
                        <!-- <label for="password">Password</label> -->
                        <input type="password" name="pwd" id="password" placeholder="password">
                    </div>
                    <div class="inputWrapper">
                        <button type="submit">
                            Login
                        </button>
                    </div>
                    <input type="hidden" name="utype" value="student">
                </div>
            </div>
        </div>
    </form>
</body>

</html>