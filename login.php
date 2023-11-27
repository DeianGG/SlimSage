<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FatLoss</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <header>
        <img class="logo" src="assets/logo.png" alt="logo"/>
        <nav class="navbar">
            <ul class="navbar__links">
                <li><a href="index.php">Acasa</a></li>
                <li><a href="retete.php">Retete</a></li>
                <li><a href="calculator.php">Calculator Calorii</a></li>
                <li><a href="exercitii.php">Exercitii</a></li>
            </ul>
        </nav>
        <div class="menu-mobile-img">
            <i class='bx bx-menu'></i>
        </div>
        <div class="menu-mobile">
            <ul class="menu-mobile__links">
                <li><a href="index.php">Acasa</a></li>
                <li><a href="retete.php">Retete</a></li>
                <li><a href="calculator.php">Calculator Calorii</a></li>
                <li><a href="exercitii.php">Exercitii</a></li>
            </ul>
        </div>
    </header>
    <section class="login-section">
        <div class="wrapper">
            <form class="login-form" action="auth.php" method="POST">
                <h1>Logare</h1>
                <div class="input-box">
                    <input name="userlogin" type="text" placeholder="Email" required>
                    <i class='bx bxs-envelope' ></i>
                    <span id="email-error"><?php if(isset($_GET['error']) && $_GET['error'] == "nouser"){echo "Nu exista un cont cu acest email";}?></span>
                </div>
                <div class="input-box">
                    <input name="passlogin" id="password" type="password" placeholder="Parola" required>
                    <i class='bx bxs-lock-alt' ></i>
                    <span id="password-error"><?php if(isset($_GET['error']) && $_GET['error'] == "wrongpassword"){echo "Parola nu este corecta";}?></span>
                </div>

                <div class="remember-forgot">
                    <div class="showpassw">
                        <label><input type="checkbox" id="check"></input>Afiseaza parola</label>
                    </div>
                    <a href="#">Ai uitat parola?</a>
                </div>

                <button name="login-submit" type="submit" class="btn">Intra in cont</button>

                <div class="register-link">
                    <p>Nu ai cont? <a href="register.php">Inregistreaza-te</a></p>
                </div>
            </form>
        </div>
    </section>
    <footer>
        <div class="footer__container">
            <div class="footer__container-social">
                <a href=""><i class='bx bxl-instagram'></i></a>
                <a href=""><i class='bx bxl-facebook' ></i></a>
                <a href=""><i class='bx bxl-twitter' ></i></a>
            </div>
            <div class="footer__container-nav">
                <ul>
                    <li><a href="index.php">Acasa</a></li>
                    <li><a href="retete.php">Retete</a></li>
                    <li><a href="calculator.php">Calculator Calorii</a></li>
                    <li><a href="exercitii.php">Exercitii</a></li>
                </ul>
            </div>
        </div>
        <div class="footer__copy">
            <p>Copyright &copy;2023; by <span class=footer__copy-name>Ageu Deian-Paul</span></p>
        </div>
    </footer>
    <script>
        check.onclick = show;
        function show() {
        if(check.checked){
            password.type="text";
        }
        else{
            password.type="password";
        }
    }
        const toggleBtn = document.querySelector('.menu-mobile-img');
        const dropDownMenu = document.querySelector('.menu-mobile');

        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open');
        }
    </script>
</body>
</html>