<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html lang="pl">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ArizonaRP</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans&display=swap"
            rel="stylesheet">
        <style>
            .quiz{
                background: var(--fourthcolor);
                border-radius: 15px;
                box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-family: var( --fontfirst);
                padding: 20px 60px;
                display:flex;
                justify-content:center;
                align-items:center;
                flex-direction:column;
                margin-top: 20px;
            }
            .quiz-btns{
                display:flex;
                flex-direction:column;
            }
            #question{
                color: var(--firstcolor);
                font-size:30px;
            }

            .quiz-answer{
                padding: 20px 80px;
                border: none;
                font-size: 22px;
                color: var(--seventhcolor);
                background-color: var(--eightcolor);
                border-radius: 20px;
                margin-top: 20px;
                font-weight: 600;
                font-family: var( --fontfirst);
                cursor:pointer;
                border:5px solid var(--eightcolor);

            }
            .quiz-answer:hover,.next-btn:hover{
                opacity:0.9;
            }
            .next-btn{
                margin-top: 20px;
                align-self:flex-end;
                padding: 20px 30px;
                border: none;
                font-size: 20px;
                font-family: var(--fontfirst);
                cursor:pointer;
                color: var(--seventhcolor);
                background-color: var(--eightcolor);
                border-radius:10px;
                font-weight: 600;
                letter-spacing:1px;
                text-transform: uppercase;
            }
            .clicked-answer{
                border:5px solid yellow;
            }

            .error-message {
                color: red;
                font-size: 18px;
                margin-top: 10px;
                font-weight:600;
                display:none;
            }
        </style>
    </head>

    <body>
        <span class="mouse"></span>
            <div class="landing-page">
                <header>
                <nav>
                    <div class="navbar">
                        <div class="logo">
                            <img src="public/assets/palm-tree-48.png" alt="palm-tree" width="48px">
                            <a href="#" class="logo-link">ArizonaRP</a>
                        </div>
                        <label class="switch-mode-container">
                            <input type="checkbox" class="switch-mode-checkbox">
                            <span class="btn-switch-mode" tabindex="0">
                                <span class="circle">
                                    <img src="public/assets/sun.png" alt="light-sun" class="circle-image">
                                </span>
                            </span>
                        </label>
                        <button class="hamburger">
                         <span class="pasek1"></span>
                        </button>
                        <a href="#" class="nav-link active"> WhitelistQuiz</a>
                    </div>
                </nav>
                </header>
                    <div id="headline-panel" class="headline-section">
                        <div class="quiz">
                            <h2 id="question">Question 1:</h2>
                            <div class="error-message" id="error-message">Proszę zaznaczyć odpowiedź!</div>
                            <div class="quiz-btns">
                                <button class="quiz-answer">Answer 1</button>
                                <button class="quiz-answer">Answer 2</button>
                                <button class="quiz-answer">Answer 3</button>
                                <button class="quiz-answer">Answer 4</button>
                            </div>
                            <button class="next-btn">Next</button>
                        </div>
                    </div>
            </div>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
            <script src="script-2.js"></script>
            <script>
                const questions = [
                    {
                        question:"Czy Ziemia jest Płaska?",
                        answers:[
                            {text:"Tak",correct:false},
                            {text:"Nie",correct:true},
                            {text:"Bycmoze",correct:false},
                            {text:"Jeszcze jak",correct:false}
                        ]
                    },
                    {
                        question:"Czy Ziemia jest Okragla?",
                        answers:[
                            {text:"Tak",correct:false},
                            {text:"Nie",correct:true},
                            {text:"Bycmoze",correct:false},
                            {text:"Jeszcze jak",correct:false}
                        ]
                    }
                ];
                const quizQuestion = document.querySelector('#question');
                const quizAnswers = document.querySelectorAll('.quiz-answer');
                const nextBtn = document.querySelector('.next-btn');

                let currentIndex = 0;
                let score = 0;

                function showQuestion() {
                    let currentQuestion = questions[currentIndex];
                    let questionNo = currentIndex + 1;
                    quizQuestion.textContent = questionNo + ". " + currentQuestion.question;

                    quizAnswers.forEach((button, index) => {
                        //reset active status
                        quizAnswers.forEach(answer => {
                                answer.classList.remove("clicked-answer");
                        });
                        button.textContent = currentQuestion.answers[index].text;
                        //Status active when click answer
                        button = document.querySelectorAll('.quiz-answer')[index];
                        button.addEventListener("click", () => {
                            quizAnswers.forEach(answer => {
                                answer.classList.remove("clicked-answer");
                            });
                            button.classList.add("clicked-answer");
                            button.dataset.correct = currentQuestion.answers[index].correct;
                        });
                    });
                }

                showQuestion();

                nextBtn.addEventListener('click', () => {

                    const selectedAnswer = document.querySelector('.quiz-answer.clicked-answer');
                    const errorMessage = document.querySelector('.error-message');
                        if (!selectedAnswer) {
                            errorMessage.style.display = 'block'; 
                            return;
                        }

                        if (selectedAnswer.dataset.correct === "true") {
                            score++;
                        }
                        errorMessage.style.display = 'none'; 
                    currentIndex++;
                    if (currentIndex < questions.length) {
                        showQuestion();
                        
                    } else {
                        if(score>=1)
                        {
                            quizQuestion.textContent = "Gratulujemy zdania 1 czesci zapraszamy na nastepna! Twój wynik: " + score;
                        }
                        else{
                            quizQuestion.textContent = "Niestety nie udało ci sie zdać :( Twój wynik: " + score;
                        }

                        quizAnswers.forEach(button => button.style.display = 'none');
                        nextBtn.style.display = 'none';
                    }
                });


                
         
            </script>

    </body>

    </html>