<!DOCTYPE html>
<html lang="en>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    $weight = "";
    $weightErr;

    $height = "";
    $heightErr;

    $bmi = 0;
    $bmiErr;

    $bmiClassification;

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $weight = clean_input($_POST["weight"]);
        $height = clean_input($_POST["height"]);

        $weightErr = checkForErrors($weight);
        $heightErr = checkForErrors($height);

        if (!$weightErr && !$heightErr) {
            $bmi = calculateBMI($weight, $height);
            $bmiClassification = classifyBMI($bmi);
        }
    }

    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function checkNotEmpty($data) {
        if(empty($data)) {
            return "This field is required";
        }
    }

    function checkForErrors($data) {
        if(checkNotEmpty($data)) {
            return checkNotEmpty($data);
        }
    }

    function calculateBMI($weight, $height){
        $meters = $height / 39.37;
        $kilos = $weight / 2.2046;

        return $kilos / pow($meters, 2);
    }

    function classifyBMI($bmi) {
        if($bmi < 18.5) {
            return "You are underweight";
        }elseif($bmi >= 18.5 && $bmi < 25.0) {
            return "You are at a normal BMI";
        }elseif($bmi >= 25.0 && $bmi < 30.0) {
            return "You are overweight";
        }elseif($bmi >= 30.0) {
            return "You are obese";
        }else {
            return null;
        }
    }
</html>