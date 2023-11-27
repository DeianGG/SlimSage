<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FatLoss Calculator</title>
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
                <li><a class="active" href="calculator.php">Calculator Calorii</a></li>
                <li><a href="exercitii.php">Exercitii</a></li>
                <?php if (!isset($_SESSION['loggedin'])){ ?>
                <li><button id="logind">Intra in cont<i class='bx bx-log-in' ></i></button></li>
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
                <li><a href="index.php">Acasa</a></li>
                <li><a href="retete.php">Retete</a></li>
                <li><a class="active" href="calculator.php">Calculator Calorii</a></li>
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
    <section class="calculator">
        <div class="calculator__caloriizi">
            <h1>Calculati cate calorii arde corpul dumneavoastra zilnic!</h1>
            <p>&nbsp&nbsp&nbsp&nbspBMR, adică Basal Metabolic Rate, în traducere rata metabolismului bazal (sau RMB), reprezintă de fapt măsurarea consumului de energie a organismului în stare de repaus. Rezultatul BMR este un număr, care stabilește de câte calorii aveți nevoie zilnic pentru menținerea funcțiilor vitale de bază, precum și a masei corporale actuale. Pentru a calcula mai ușor metabolismul bazal, puteți folosi calculatorul BMR online.</p>
            
            <div class="calculator__caloriizi-calc">
                <div class="calculator__caloriizi-calc__info">
                    <p>Introduceti urmatoarele date:</p>
                    <input id="greutate" type="text" placeholder="Greutate(kg)" required>
                    <input id="inaltime" type="text" placeholder="Inaltime(cm)" required>
                    <input id="varsta" type="text" placeholder="Varsta" required>
                    <label>Sex: <select id="sex">
                        <option value="1">Barbat</option>
                        <option value="2">Femeie</option>
                        </select>
                    </label>
                    <button id="calorii" type="submit" class="calculator__caloriizi-button">Calculeaza</button>
                </div>
                <div class="calculator__caloriizi-calc__content">
                    <div class="chestii">
                        <p id="rezultat"></p>
                        <p id="data"></p>
                        <p id="necesar">Necesarul dumneavoastra zilnic de calorii pentru a va mentine, in functie de nivelul de activitate sportiva:</p>
                    </div>
                    <div class="info">
                        <div class="info__row">
                            <h1 class="info__row-text1">Nivelul de activitate fizică</h1>
                            <h1 class="info__row-text2">Caracteristici</h1>
                            <h1 class="info__row-text3">Calorii</h1>
                        </div>
                        <div class="info__row">
                            <p class="info__row-text1">Minim</p>
                            <p class="info__row-text2">Mișcare minimală sau deloc</p>
                            <p id="cal1"class="info__row-text3"></p>
                        </div>
                        <div class="info__row">
                            <p class="info__row-text1">Foarte mic</p>
                            <p class="info__row-text2">Antrenament de 1-3 ori pe săptămână</p>
                            <p id="cal2"class="info__row-text3"></p>
                        </div>
                        <div class="info__row">
                            <p class="info__row-text1">Mediu</p>
                            <p class="info__row-text2">Antrenament de 3-5 ori pe săptămână</p>
                            <p id="cal3"class="info__row-text3"></p>
                        </div>
                        <div class="info__row">
                            <p class="info__row-text1">Foarte activ</p>
                            <p class="info__row-text2">Antrenament de 6-7 ori pe săptămână</p>
                            <p id="cal4"class="info__row-text3"></p>
                        </div>
                        <div class="info__row">
                            <p class="info__row-text1">Super activ</p>
                            <p class="info__row-text2">	Antrenament zilnic foarte intens sau muncă fizică grea</p>
                            <p id="cal5"class="info__row-text3"></p>
                        </div>
                    </div>
                </div>
            </div>
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
         <?php if(!isset($_SESSION['loggedin'])){ ?>
        document.getElementById("login").onclick = func;
        document.getElementById('logind').onclick = func;
        function func() {
            location.href = 'login.php';
        };
        <?php } ?>
        const toggleBtn = document.querySelector('.menu-mobile-img');
        const dropDownMenu = document.querySelector('.menu-mobile');

        toggleBtn.onclick = function drop() {
            dropDownMenu.classList.toggle('open');
        }

        const calcBtn = document.getElementById("calorii");
        const content = document.querySelector('.calculator__caloriizi-calc__content')

        calcBtn.onclick = function calculate(){
            content.classList.toggle('flex');
            const sex = document.getElementById('sex');
            const inaltime = document.getElementById('inaltime');
            const greutate = document.getElementById('greutate');
            const varsta = document.getElementById('varsta');
            const rez = document.getElementById('rezultat');
            const data = document.getElementById('data');
            const cal1 = document.getElementById('cal1');
            const cal2 = document.getElementById('cal2');
            const cal3 = document.getElementById('cal3');
            const cal4 = document.getElementById('cal4');
            const cal5 = document.getElementById('cal5');
            if(sex.value == "1"){
                const val = (10 * Number(greutate.value)) + (6.25 * Number(inaltime.value)) - (5 * Number(varsta.value)) + 5;
                rez.innerHTML = "BMR-ul dumneavoastra:";
                data.innerHTML = ~~val + " kcal/zi";
                cal1.innerHTML = ~~(val*1.2);
                cal2.innerHTML = ~~(val*1.375);
                cal3.innerHTML = ~~(val*1.55);
                cal4.innerHTML = ~~(val*1.725);
                cal5.innerHTML = ~~(val*1.9);
            }
            else{
                const val = (10 * Number(greutate.value)) + (6.25 * Number(inaltime.value)) - (5 * Number(varsta.value) - 161);
                rez.innerHTML = "BMR-ul dumneavoastra:"
                data.innerHTML = ~~val + " kcal/zi";
                cal1.innerHTML = ~~(val*1.2);
                cal2.innerHTML = ~~(val*1.375);
                cal3.innerHTML = ~~(val*1.55);
                cal4.innerHTML = ~~(val*1.725);
                cal5.innerHTML = ~~(val*1.9);
            }
        }
    </script>
</body>
</html>