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

    $sql = "select * from exercitii";

    $exercitii = $conn->query($sql);
    ?>
    <header>
        <img class="logo" src="assets/logo.png" alt="logo"/>
        <nav class="navbar">
            <ul class="navbar__links">
                <li><a href="index.php">Acasa</a></li>
                <li><a href="retete.php">Retete</a></li>
                <li><a href="calculator.php">Calculator Calorii</a></li>
                <li><a class="active" href="exercitii.php">Exercitii</a></li>
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
                <li><a href="calculator.php">Calculator Calorii</a></li>
                <li><a class="active" href="exercitii.php">Exercitii</a></li>
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
            <?php if(isset($_SESSION["permission"]) && $_SESSION["permission"] == 1){ ?>
                <button id="ex" class="retete__filter-button">Adauga un exercitiu<i class='bx bx-plus-circle'></i></button>
            <?php } ?>
            <?php if(!isset($_SESSION['loggedin']) || $_SESSION['permission'] == 0){?>
                <button id="su" class="retete__filter-button">Propune un exercitiu<i class='bx bx-plus-circle'></i></button>
            <?php } ?>
            <form class="retete__filter-search" method="GET" action="">
                <input id="search" type="text" name="search" value="" placeholder="Cauta un exercitiu">
                <button type="submit">Cauta</button>
            </form>
            <?php if(isset($_SESSION["permission"]) && $_SESSION["permission"] == 1){ ?>
                <button id="vizsu" class="retete__filter-button">Vizualizeaza sugestii</button>
            <?php } ?>
        </div>
        <div class="retete__content">
        <?php
        while ($row = mysqli_fetch_assoc($exercitii)){
        ?>
            <div class="retete__content-reteta">
                <div class="reteta-titlu"><h1><?php echo $row["titlu"];?></h1></div>
                <div class="reteta-descriere"><p><?php echo str_repeat('&nbsp;', 5); echo $row["descriere"];?></p></div>
                <iframe width="420" height="315"
                    src=<?php echo $row["link"]?>>
                </iframe>
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
        <?php if(isset($_SESSION["permission"]) && $_SESSION["permission"] == 1){ ?>
            document.getElementById("vizsu").onclick=func4;
            function func4(){
                location.href = 'vizsu.php';
            }
        <?php } ?>
        <?php if(!isset($_SESSION['loggedin']) || $_SESSION['permission'] == 0){?>
            document.getElementById("su").onclick=func3;
            function func3(){
                location.href = 'newexsu.php';
            }
        <?php } ?>
        <?php if(isset($_SESSION["permission"]) && $_SESSION["permission"] == 1){ ?>
        document.getElementById("ex").onclick=func2;
        function func2() {
            location.href = 'newexercitiu.php';
        };
        <?php } ?>
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
    </script>
</body>
</html>