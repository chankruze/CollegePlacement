<?php
return <<<MAIL
<html>
<head>
    <style>
        .main {
            color: #ffffff;
            border-radius: 0.25rem;
            display: inline-block;
            background: #272727;
            padding: 1rem;
        }

        .main h1 {
            color: #ffffff;
            border-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            border-top-left-radius: 0.25rem;
        }

        .main h2 {
            color: #ffffff;
            padding: 0 0 1rem 0;
        }

        .main .creds{
            color: #ffffff;
            background: #2E2E2E;
            padding: 1rem 1rem 1rem 1rem;
            border-bottom-right-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
        }

        a {
            color: #ffffff !important;
            text-decoration: none;
        }

        .foot .btn {
            padding: 0.75rem 1.5rem;
            color: #ffffff;
            border-radius: 0.25rem;
            background: #1b7d36;
            transition: all 200ms ease-in-out;
            font-size: 1rem;
        }

        .foot .btn::hover {
            background: #01691e;
        }

        .foot {
            padding: 1rem 0rem;
        }
    </style>
</head>

<body>
    <div class="main">
        <h1>Hi {$uname}🙂</h1>
        <h2>Your account has been successfully created 🥳</h2>
        <div class="creds">
            <p>Use below credentials to login:</p>
            </br>
            <p>Email: <b>{$umail}</b></p>
            </br>
            <p>Username: <b>{$uname}</b></p>
            </br>
            <p>Password: <b>{$upass}</b></p>
        </div>
        <div class="foot">
            <a href={$loginurl} target="_blank" class="btn">Login to Placement Cell</a>
        </div>
    </div>
</body>

</html>
MAIL;
