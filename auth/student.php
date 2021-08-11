<!-- login: student -->
<html>

<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.css">
</head>

<body>
    <!--
    method: post
    end point: verify.php
    -->
    <form method="post" action="./verify.php">
        <!-- container -->
        <div class="container login">
            <!-- top bar -->
            <div class="top-menu">
                <h1>
                    <img src="../assets/images/bose_logo.png" class="bose-logo" />
                    <a href="/placement">College Placement System</a>
                </h1>
                <div class="login-menu">
                    <a href="../"><i class="fas fa-home"></i>Home</a>
                </div>
            </div>
            <!-- login container -->
            <div class="loginContainer">
                <div class="loginWrapper">
                    <h1>Student Login</h1>
                    <div class="inputWrapper">
                        <input type="text" name="uname" id="username" placeholder="username" />
                    </div>
                    <div class="inputWrapper">
                        <input type="password" name="pwd" id="password" placeholder="password" />
                    </div>
                    <div class="inputWrapper">
                        <button type="submit">
                            Login
                        </button>
                    </div>
                    <input type="hidden" name="utype" value="student" />
                </div>
            </div>
        </div>
    </form>
</body>

</html>