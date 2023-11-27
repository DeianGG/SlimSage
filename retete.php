<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retete</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

<?php 
    require 'connection.php';
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else{
        $page=1;
    }

    $sql = "select * from retete";

    $retete = $conn->query($sql);
    ?>
    <header>
        <img class="logo" src="assets/logo.png" alt="logo"/>
        <nav class="navbar">
            <ul class="navbar__links">
                <li><a href="index.php">Acasa</a></li>
                <li><a class="active" href="retete.php">Retete</a></li>
                <li><a href="calculator.php">Calculator Calorii</a></li>
                <li><a href="exercitii.php">Exercitii</a></li>
                <?php if (!isset($_SESSION['loggedin'])){ ?>
                    <li><button id="logind" >Intra in cont<i class='bx bx-log-in'></i></button></li>
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
                <li><a class="active" href="retete.php">Retete</a></li>
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
    <section class="retete">
        <div class="retete__filter">
            <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
            <button id="adaugaret" class="retete__filter-button">Adauga o reteta noua <i class='bx bx-plus-circle'></i></button>
            <?php }else{ ?>
            <div class="retete__filter-nolog">
                <p>Intrati in cont pentru a putea posta retete</p>
            </div>
            <?php } ?>
            <form class="retete__filter-search" method="GET" action="">
                <input id="search" type="text" name="search" value="" placeholder="Cauta o reteta">
                <button type="submit">Cauta</button>
            </form>
        </div>
        <div class="retete__content">
        <?php
        while ($row = mysqli_fetch_assoc($retete)){
        ?>
            <div class="retete__content-reteta">
                <div class="reteta-titlu"><h1><?php echo $row["Titlu"];?></h1></div>
                <div class="reteta-descriere"><p><?php echo str_repeat('&nbsp;', 5); echo $row["Descriere"];?></p></div>
                <img src="<?php echo $row["Poza"];?>"/>
            </div>
        <?php
        }
        $conn->close();
        
        ?>
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
        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
        document.getElementById("adaugaret").onclick = func2;
        function func2(){
            location.href = "newreteta.php";
        };
        <?php } ?>
        <?php if(!isset($_SESSION['loggedin'])){ ?>
        document.getElementById("login").onclick = func;
        document.getElementById('logind').onclick = func;
        function func() {
            location.href = 'login.php';
        };
        <?php } ?>
        toggleBtn = document.querySelector('.menu-mobile-img');
        const dropDownMenu = document.querySelector('.menu-mobile');

        toggleBtn.onclick = function drop() {
            dropDownMenu.classList.toggle('open');
        }
    </script>
</body>
</html>