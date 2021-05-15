<?php session_start(); ?>

<html>
    <head>
        <title>Quiz</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div>
            <?php 
            $username = "";
            if(isset($_SESSION["user_name"])) {
                $username = $_SESSION["user_name"];
            } else {
                die("You are not logged in. Please log in from the following <a href='index.php'>form.</a>");
            }
            
            
            ?>
            <form action="answer_check.php" method="POST">
                <?php 
                $content = file("questions.txt");

                $row = $content[array_rand($content)];
                $row = str_replace("\n", "", $row);
                $delimiter = "---";
                $rand_array = explode($delimiter, $row);
                $question1 = $rand_array[0];
                $answer1 = $rand_array[1];

                $_SESSION["correct_answer1"] = $answer1;

                echo "$question1";
                echo "<input type='text' name'answer1'>";

                $row = $content[array_rand($content)];
                $row = str_replace("\n", "", $row);
                $delimiter = "---";
                $rand_array = explode($delimiter, $row);
                $question2 = $rand_array[0];
                $answer2 = $rand_array[1];
                
                if($question2 != $question1) {
                    echo "$question2";
                    echo "<input type='text' name'answer2'>";
                    $_SESSION["correct_answer2"] = $answer2;
                } else {
                    header("location:quiz.php");
                }

                $row = $content[array_rand($content)];
                $row = str_replace("\n", "", $row);
                $delimiter = "---";
                $rand_array = explode($delimiter, $row);
                $question3 = $rand_array[0];
                $answer3 = $rand_array[1];

                if($question3 != $question2 && $question3 != $question1) {
                    echo "$question3";
                    echo "<input type='text' name'answer3'>";
                    $_SESSION["correct_answer3"] = $answer3;
                } else {
                    header("location:quiz.php");
                }

                $row = $content[array_rand($content)];
                $row = str_replace("\n", "", $row);
                $delimiter = "---";
                $rand_array = explode($delimiter, $row);
                $question4 = $rand_array[0];
                $answer4 = $rand_array[1];

                if($question4 != $question3 && $question4 != $question2 && $question4 != $question1) {
                    echo "$question4";
                    echo "<input type='text' name'answer4'>";
                    $_SESSION["correct_answer4"] = $answer4;
                } else {
                    header("location:quiz.php");
                }

                $row = $content[array_rand($content)];
                $row = str_replace("\n", "", $row);
                $delimiter = "---";
                $rand_array = explode($delimiter, $row);
                $question5 = $rand_array[0];
                $answer5 = $rand_array[1];

                if($question5 != $question4 && $question5 != $question3 && $question5 != $question2 && $question5 != $question1) {
                    echo "$question5";
                    echo "<input type='text' name'answer5'>";
                    $_SESSION["correct_answer5"] = $answer5;
                } else {
                    header("location:quiz.php");
                }
                
                ?>
                <input type="submit" name="logout" value="Logout">
            </form>
            <?php 
            
            if(isset($_POST["logout"])) {
                session_unset();
                session_destroy();
                header("location:index.php");
            }
            ?>
        </div>
    </body>
</html>