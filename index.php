<?php session_start(); 
    if (!isset($_SESSION["email"])) {
        header("Location:login.php");
        die();
    }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Math Game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" />
    <meta charset="utf-8" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <h1>Math Game</h1>
            </div>
        </div>
        
        <?php
        if (isset($_POST["symb"])) {
            $_SESSION["symb"] = $_POST["symb"];
        }   
        if (isset($_POST["answer"])) {
            $_SESSION["current_ans"] = $_POST["answer"];
        } 
        if (isset($_POST["numOne"])) {
            $_SESSION["numOne"] = $_POST["numOne"];
        }
        if (isset($_POST["numTwo"])) {
            $_SESSION["numTwo"] = $_POST["numTwo"];
        }
        if (!isset($_SESSION["total"])) {
            $_SESSION["total"] = 0;
            $_SESSION["score"] = 0;
        }
        
        $signs = array('+', '-');
        $numOne = rand(0, 20);
        $numTwo = rand(0, 20);
        $symb = $signs[rand(0, 1)];
        
        if ($symb == $signs[1]) {
            $_SESSION["current_correct"] = $numOne - $numTwo;
        } else {
            $_SESSION["current_correct"] = $numOne + $numTwo;
        }
        ?>
        
        <form action="index.php" method="post" class="form-horizontal" role="form">
            <div class="row " style="font-weight: bold;">
                <label class="col-sm-12"><?php echo $numOne ."". $symb ."". $numTwo?></label>
            </div>
            <div class="form-group">
                <input type="number" required="true" class="form-control " name="answer" placeholder="Enter answer here" />
            </div>
            <div class="row ">
                <div class="col-sm-12">
                    <button type="submit" class="btn">Enter Answer</button>
                </div>
                <div class="col-sm-12">
                    <a href="logout.php" class="btn">Log out</a>
                </div>
            </div>
            <hr style="width: 50%"/>
        </form>
        <?php 
        if (isset($_SESSION["current_ans"])) {
            $_SESSION["prev_ans"] = $_SESSION["current_ans"];
            $incorrect = "<p class=''>Wrong <br> The answer was: " . $_SESSION["prev_correct"] ."</p>";
            $_SESSION["total"] = $_SESSION["total"] + 1;
            $correct = "<p>Correct!</p>";
            
            if (isset($_SESSION["prev_ans"])) {  
            }
            if ($_SESSION["prev_ans"] == $_SESSION["prev_correct"]) {
                $_SESSION["score"] = $_SESSION["score"] + 1;
                echo $correct;
            } else {
                echo $incorrect;
            }
        }
        $_SESSION["prev_correct"] = $_SESSION["current_correct"];
        ?>
        <div class="row">
            <div>
                <p>Score: <?php echo $_SESSION["score"]; ?> / <?php echo $_SESSION["total"]; ?></p>
            </div>
        </div>
    </div>
</body>
</html>