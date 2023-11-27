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
                <li><button id="login" >Intra in cont</button></li>
                <?php 
                } else{ ?>
                <form action="destroy.php">
                    <li><button type="submit">Iesi din cont</i></button></li>
                </form>
                <?php }
                ?>
            </ul>
        </div>
    </header>
    <section class="quiz-containersec">
        <div class="quiz-container" id="quiz">
            <div class="quiz-header">
                <h2 id="question">Question text</h2>
                <ul>
                    <li>
                        <input type="radio" name="answer" id="a" class="answer">
                        <label for="a" id="a_text">Answer</label>
                    </li>
                    <li>
                        <input type="radio" name="answer" id="b" class="answer">
                        <label for="b" id="b_text">Answer</label>
                    </li>
                    <li>
                        <input type="radio" name="answer" id="c" class="answer">
                        <label for="c" id="c_text">Answer</label>
                    </li>
                    <li>
                        <input type="radio" name="answer" id="d" class="answer">
                        <label for="d" id="d_text">Answer</label>
                    </li>
                </ul>
            </div>
            <button id="rasp" type="submit">Raspunde</button>
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

        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open');
        }

        const quizData = [
            {
                question: "Care dintre următoarele alimente este o sursă bogată de proteine?",
                a: "Pâine albă",
                b: "Banane",
                c: "Somon",
                d: "Orez brun",
                correct: "c",
            },
            {
                question: "Care este avantajul consumului de legume cu frunze verzi?",
                a: "Reducerea riscului de osteoporoză",
                b: "Îmbunătățirea vederii",
                c: "Menținerea sănătății inimii",
                d: "Reducerea riscului de diabet",
                correct: "a",
            },
            {
                question: "Ce reprezintă carbohidrații complecși?",
                a: "Zahăr din fructe",
                b: "Pâine integrală",
                c: "Biscuiți",
                d: "Chipsuri",
                correct: "b",
            },
            {
                question: "De ce este important să consumăm suficientă apă în fiecare zi?",
                a: "Menține pielea hidratată",
                b: "Susține funcțiile cognitive",
                c: "Reduce riscul de osteoartrită",
                d: "Prevenirea bolilor de inimă",
                correct: "b",
            },
            {
                question: "Care este o sursă bună de grăsimi sănătoase?",
                a: "Bacon",
                b: "Unt",
                c: "Nuci",
                d: "Cartofi prăjiți",
                correct: "c",
            },
            {
                question: "Ce aduce beneficii exercițiului fizic regulat?",
                a: "Scăderea tensiunii arteriale",
                b: "Creșterea nivelului de colesterol rău",
                c: "Reducerea stresului",
                d: "Îmbunătățirea digestiei",
                correct: "a",
            },
            {
                question: "Ce cantitate zilnică de somn este recomandată pentru adulți pentru a menține o sănătate optimă?",
                a: "4 ore",
                b: "8 ore",
                c: "12 ore",
                d: "6 ore",
                correct: "b",
            },
            {
                question: "Care este o sursă excelentă de vitamina C?",
                a: "Banane",
                b: "Portocale",
                c: "Mere",
                d: "Struguri",
                correct: "b",
            },
            {
                question: "De ce este important să evităm excesul de zahăr adăugat în alimentație?",
                a: "Creșterea riscului de diabet",
                b: "Reducerea energiei",
                c: "Îmbunătățirea sănătății dentare",
                d: "Creșterea riscului de boli de inimă",
                correct: "a",
            },
            {
                question: "Care dintre următoarele activități contribuie la reducerea stresului?",
                a: "Consumul de cafea",
                b: "Yoga",
                c: "Vizionarea la televizor",
                d: "Consumul de ciocolată",
                correct: "b",
            },
        ];
        const quiz=document.getElementById('quiz');
        const answerEls=document.querySelectorAll('.answer');
        const questionEl=document.getElementById('question');
        const a_text=document.getElementById('a_text');
        const b_text=document.getElementById('b_text');
        const c_text=document.getElementById('c_text');
        const d_text=document.getElementById('d_text');
        const submitBtn=document.getElementById('rasp');

        let currentQuiz=0;
        let score=0;

        loadQuiz();

        function loadQuiz(){
            deselectAnswers();

            const currentQuizData=quizData[currentQuiz];

            questionEl.innerText=currentQuizData.question;
            a_text.innerText=currentQuizData.a;
            b_text.innerText=currentQuizData.b;
            c_text.innerText=currentQuizData.c;
            d_text.innerText=currentQuizData.d;
        }

        function deselectAnswers(){
            answerEls.forEach(answerEls => answerEls.checked = false)
        }

        function getSelected(){
            let answer
            answerEls.forEach(answerEls => {
                if(answerEls.checked){
                    answer=answerEls.id
                }
            })
            return answer
        }

        submitBtn.addEventListener('click', () => {
            const answer=getSelected();
            if(answer){
                if(answer===quizData[currentQuiz].correct){
                    score++
                }
                currentQuiz++
                if(currentQuiz < quizData.length){
                    loadQuiz()
                }
                else{
                    quiz.innerHTML= `
                        <h2>Ai raspuns corect la ${score}/${quizData.length} intrebari</h2>

                        <button onclick="location.reload()">Din nou</button>
                    `
                }
            }
        })
    </script>
</body>
</html>