<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">

            <?php
            include 'koneksi.php';

            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $level = $_POST['level'];
                $namalengkap = $_POST['namalengkap'];
                $password = $_POST['password'];

                $verify_query = mysqli_query($koneksi, "SELECT username FROM register WHERE username='$username'");

                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                      <p>This username is used, Try another One Please!</p>
                  </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {

                    mysqli_query($koneksi, "INSERT INTO register(username,password,namalengkap,level) VALUES('$username','$password','$namalengkap','$level')") or die("Erroe Occured");

                    echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
                    echo "<a href='login.php'><button class='btn'>Login Now</button>";
                }
            } else {

            ?>

                <header>Sign Up</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="namalengkap">Full Name</label>
                        <input type="text" name="namalengkap" id="namalengkap" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="level">Level</label>
                        <!-- <input type="text" name="email" id="email" autocomplete="off" required> -->
                        <select id="level" name="level">
                            <option value="--" selected>--</option>
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="field">

                        <input type="submit" class="btn" name="submit" value="Register" required>
                    </div>
                    <div class="links">
                        Already a member? <a href="login.php">Sign In</a>
                    </div>
                </form>
        </div>
    <?php } ?>
    </div>
</body>

</html>