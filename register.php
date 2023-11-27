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
            <form action="registerauth.php" onsubmit="return validateForm()" method="POST"  name="myForm">
            <h1>Inregistrare</h1>
                <div class="input-box">
                    <input type="text" placeholder="Email" required onkeyup="valEmail()" id="email" name="email">
                    <i class='bx bxs-envelope' ></i>
                    <span id="email-error"><?php if(isset($_GET['error'])){
                        if($_GET['error']=='emailtaken'){
                            echo "Email-ul acesta este deja folosit!";
                        }
                    } ?></span>
                </div>
                <div class="input-box">
                    <input type="password" id="password" onkeyup="valPassword()" placeholder="Parola" required name="password">
                    <i class='bx bxs-lock-alt' ></i>
                    <span id="password-error"></span>
                </div>
                <div class="input-box">
                    <input type="password" id="passwordc" onkeyup="valPassc()" placeholder="Confirma parola" required >
                    <i class='bx bxs-lock-alt' ></i>
                    <span id="passwordc-error"></span>
                </div>
                <div class="showpass">
                    <label><input type="checkbox" id="check"></input>Afiseaza parola</label>
                </div>
                <button name="signup-submit" type="submit" class="btn">Inregistreaza-te</button>

                <div class="register-link">
                    <p>Ai deja un cont? <a href="login.php">Logheaza-te</a></p>
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
        const toggleBtn = document.querySelector('.menu-mobile-img');
        const dropDownMenu = document.querySelector('.menu-mobile');

        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open');
        }
    function show() {
        if(check.checked){
            password.type="text";
            passwordc.type="text";
        }
        else{
            password.type="password";
            passwordc.type="password";
        }
    }
    function vEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return(emailRegex.test(email));
    }
    function valEmail(){
        const email=document.getElementById('email');
        const emailV=email.value.trim();
        const show=document.getElementById("email-error");
        if(vEmail(emailV)==false){
            show.innerHTML="Email Invalid";
        }
        else{
            show.innerHTML="";
            return true;
        }
    }
    function eqPass(){
        const pass=document.getElementById("password").value;
        const pass2=document.getElementById("passwordc").value;
        if(pass==pass2){
            return true;
        }
        return false;
    }
    function valPassword(){
        var pass = document.getElementById("password").value;
        var err = document.getElementById("password-error");
        if (pass.length<8){
            err.innerHTML="Parola trebuie sa aiba minim 8 caractere";
        }
        else if (pass.length>20){
            err.innerHTML="Parola este prea lunga";
        }
        else{
            err.innerHTML="";
            return true;
        }
    }
    function valPassc(){
        const er=document.getElementById("passwordc-error");
        if(eqPass()==true){
            er.innerHTML="";
            return true;
        }
        else{
            er.innerHTML="Parolele nu sunt la fel";
        }
    }
    function validateForm(){
        if(valEmail()==true && valPassword()==true && valPassc()==true){
            return true;
        }
        else{
            return false;
        }
    }

    </script>
</body>
</html>