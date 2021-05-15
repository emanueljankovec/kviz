<?php 
session_start();

if(file_exists("questions.txt")) {
    $file_handler = fopen("questions.txt", "r");
    $file_length = filesize("questions.txt");
    $file_content = fread($file_handler, $file_length);
    fclose($file_handler);
} else {
    $file_content = "";
}

?>

<html>
    <head>
        <title>Edit Quiz</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php 
        if(!isset($_SESSION["administrator"]) && $_SESSION["administrator"] != "admin") {
            die("You are not logged in. Please log in as an ADMINISTRATOR if you want to edit the quiz.<a href='inde.php'>Login</a>");
        }
        ?>
        <form action="" method="POST">
            <textarea name="new_question" cols="30" rows="10" placeholder="Add new question"></textarea>
            <textarea name="new_answer" cols="30" rows="10" placeholder="Add new answer"></textarea>
            <input type="submit" name="add_qustion" value="Add question">
            <textarea name="all_questions" cols="30" rows="10" placeholder="Delete or edit some of the questions"><?php echo $file_content; ?></textarea>
            <input type="submit" name="delete_edit" value="Delete / edit">
            <input type="submit" name="return" value="Return to quiz">
            <input type="submit" name="logout" value="Logout">

            <?php 
            if(isset($_POST["logout"])) {
                session_unset();
                session_destroy();
                header("location:index.php");
            }

            if(isset($_POST["return"])) {
                header("location:quiz.php");
            }

            if(isset($_POST["delete_edit"])) {
                $file_handler = fopen("questions.txt", "w");
                fwrite($file_handler, $_POST["all_questions"]);
                fclose($file_handler);
                header("location:edit_quiz.php");
            }

            if(isset($_POST["add_qustion"])) {
                $file_handler = fopen("questions.txt", "a");
                $content = "\n" . strtolower($_POST["new_question"]) . "---" . strtolower($_POST["new_answer"]);
                fwrite($file_handler, $content);
                fclose($file_handler);
            }
            
            ?>
        </form>
    </body>
</html>

