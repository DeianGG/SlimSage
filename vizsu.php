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

    $sql = "select * from sugestii";

    $sugestii = $conn->query($sql);
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
    <section class="sugestii">
        <?php while ($row = mysqli_fetch_assoc($sugestii)){ ?>
        <div class="sugestii-list">
            <form action="vizsuver.php" method="POST">
                <h1><?php echo $row["titlu"];?></h1>
                <p class="des"><?php echo str_repeat('&nbsp;', 5); echo $row["descriere"];?></p>
                <p class="link"><?php echo $row["link"]?></p>

                <input type="hidden" name="titlu" value="<?php echo $row["titlu"]; ?>">
                <input type="hidden" name="descriere" value="<?php echo $row["descriere"]; ?>">
                <input type="hidden" name="link" value="<?php echo $row["link"]; ?>">

                <div class="accref">
                    <button id="acc" name="acc" type="submit">Accept</button>
                    <button id="ref" name="ref" type="submit">Refuz</button>
                </div>
            </form>
        </div>
        <?php } ?>
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
        toggleBtn = document.querySelector('.menu-mobile-img');
        const dropDownMenu = document.querySelector('.menu-mobile');

        toggleBtn.onclick = function drop() {
            dropDownMenu.classList.toggle('open');
        }
    </script>
</body>
</html>