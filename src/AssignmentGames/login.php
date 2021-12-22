<?php
  session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign In</title>
        <style>
            body {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            form {
                min-width: 400px;
                max-width: 1000px;
            }

            input {
                display: block;
                width: 100%;
                margin: 0.5rem 0;
            }

            .errors {
                color: red;
            }
        </style>
    </head>
    <body>
        <h1>Login page</h1>
        <form action="logincheck.php" method="post">
            <fieldset>
                <div class="errors">
                    <?php
                      if (isset($_SESSION['invalidLogin'])) {
                          echo '<p>Invalid email or password</p>';
                      }
                    ?>
                </div>
                <legend>Sign In</legend>

                <label for="email">Email</label>
                <input type="email" name="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" required>

                <button type="submit">Sign In</button>

                <div>
                    <small>
                        Need an account? Create one 
                        <a href="clientform.php">here</a>.
                    </small>
                </div>
            </fieldset>
        </form>
    </body>
</html>
