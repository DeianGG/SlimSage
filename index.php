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
                <li><a class="active" href="index.php">Acasa</a></li>
                <li><a href="retete.php">Retete</a></li>
                <li><a href="calculator.php">Calculator Calorii</a></li>
                <li><a href="exercitii.php">Exercitii</a></li>
                <?php if (!isset($_SESSION['loggedin'])){ ?>
                    <li><button id="logind">Intra in cont<i class='bx bx-log-in'></i></button></li>
                <?php 
                } else{ ?>
                <form action="destroy.php">
                    <li><button type="submit">Iesi din cont<i class='bx bx-log-out' ></i></button></li>
                </form>
                <?php }
                ?>
            </ul>
        </nav>
        <div class="menu-mobile-img">
            <i class='bx bx-menu'></i>
        </div>
        <div class="menu-mobile">
            <ul class="menu-mobile__links">
                <li><a class="active" href="index.php">Acasa</a></li>
                <li><a href="retete.php">Retete</a></li>
                <li><a href="calculator.php">Calculator Calorii</a></li>
                <li><a href="exercitii.php">Exercitii</a></li>
                <?php if (!isset($_SESSION['loggedin'])){ ?>
                <li><button id="login" >Intra in cont<i class='bx bx-log-in'></i></button></li>
                <?php 
                } else{ ?>
                <form action="destroy.php">
                    <li><button type="submit">Iesi din cont<i class='bx bx-log-out' ></i></button></li>
                </form>
                <?php }
                ?>
            </ul>
        </div>
    </header>
    <section class="hero">
        <div class="hero__text">
            <h1>Incepe sa mananci sanatos!</h1>
            <h2>Incearca diferite retete sanatoase publicate de alti oameni care si-au schimbat viata mancand mai sanatos</h2>
            <button id="goretete">Click aici pentru a vizualiza retetele</button>
        </div>
    </section>
    <section class="main-sectionsec">
        <div class="main-section">
            <h2>A fi obez înseamnă...</h2>
            <p>A fi cu mult peste greutatea normală. Când se atinge pragul obezității, sănătatea este serios afectată. În cazul în care este tratată cu prea puțină atenție, greutatea excesivă a copiilor trebuie să fie un prim semnal de alarmă pentru părinții acestora. Prezența obezității în copilărie ne prezice dacă un copil va fi obez în viața adultă.</p>

            <h2>Statistici Obezitate</h2>
            <div class="stats">
                <div class="stat">
                    <p>Aproximativ 60% din populația României este supraponderală și obeză.</p>
                </div>
                <div class="stat">
                    <p>La ora actuală, aproximativ 30% din populația Globului este supraponderală și obeză.</p>
                </div>
                <div class="stat">
                    <p>Prevalența obezității la copii și adulți a "sărit" cu 47,1%, respectiv 27,5% în 2013, față de 1980!</p>
                </div>
            </div>

            <p>Un avantaj: domină supraponderalii, deci schimbări accesibile ale stilului de viață pot rezolva situații.</p>
        </div>
    </section>
    <section class="nutritiealim">
        <div class="nutritiealim__container">
            <div class="section">
                <h2 class="section-title">ALIMENTAȚIE vs NUTRIȚIE</h2>
                <p class="section-content">(Alimentele care ajung pe mesele noastre) vs (Substanțele nutritive care sunt în mâncare și sunt necesare corpului nostru)</p>
            </div>

            <div class="section">
                <h2 class="section-title">Grăsimea abdominală vs Grăsimea de sub piele</h2>
                <p class="section-content">Este bine să se facă diferența dintre grăsimea abdominală (viscerală) și cea subcutanată (de sub piele).</p>
                <p class="section-content">Grăsimea abdominală reprezintă țesutul adipos acumulat în abdomen care umple spațiile dintre organe (ficat, pancreas, intestine).</p>
                <p class="section-content">Grăsimea subcutanată este cea pe care o poți prinde între degete la nivelul mâinilor sau picioarelor.</p>
                <p class="section-content">Un abdomen mare poate să includă ambele tipuri de grăsime.</p>
            </div>
        </div>
        <div class="nutritiealim__img">
            <div class="nutritiealim__img-div"></div>
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
        document.getElementById("goretete").onclick = func2;
        function func2(){
            location.href = "retete.php";
        }
        <?php if(!isset($_SESSION['loggedin'])){ ?>
        document.getElementById("login").onclick = func;
        document.getElementById('logind').onclick = func;
        function func() {
            location.href = 'login.php';
        };
        <?php } ?>
        const toggleBtn = document.querySelector('.menu-mobile-img');
        const dropDownMenu = document.querySelector('.menu-mobile');

        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open');
        }
    </script>
</body>
</html>