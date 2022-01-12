<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <style>
        .error {
            color: #6f0000;
        }

        .container {
            padding: 10px;
            margin-top: 40px;
            background-color: #5EBF80;
            border-radius: 10px;
        }

        .form {
            margin: 0 auto;
        }
    </style>
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
        $bmi = $kilos / pow($meters, 2)
        return number_format($bmi, 2, ".");
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
    ?>

    <div class="container">
        <h1 class="text-center">BMI Calculator</h1>
        <div class="row">
            <div class="col-12 col-md-6">
                <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input class="form-control" type="text" name="weight" id="weight" required>
                    <label for="weight">Your weight</label>
                    <span class="error">*<?php echo $weightErr; ?></span>
                    </br>

                    <input class="form-control" type="text" name="height" id="height" required>
                    <label for="height">Your height in inches</label>
                    <span class="error">* <?php echo $heightErr; ?></span>
                    </br>
                    <input class="btn btn-success" type="submit" name="calculate" value="Calculate">
                </form>
            </div>
            <div class="col-12 col-md-6">
                <h2 class="text-center">Your BMI</h2>

                <p> <?php echo "Your BMI is $bmi."; ?>
                <p> <?php echo "$bmiClassification"; ?>
            </div>
        </div>
    </div>
</body>
</html>