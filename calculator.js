window.onload = () => {
    let button = document.querySelector("#btn");

    //Function for calculating BMI
    button.addEventListener("click", calculateBMI);
};

function calculateBMI() {
    /*
        Getting user input and putting it into the height variable. 
        Must typecast due to the input being a string
    */
    let height = parseInt(document.querySelector("#height").value);

    let weight = parseInt(document.querySelector("#weight").value);

    let result = document.querySelector("#result");

    if(height === "" || isNaN(height)) {
        result.innerHTML = "Provide a valid height";
    }
    else if(weight === "" || isNaN(weight)) {
        result.innerHTML = "Provide a valid weight";
    }
    else {
        let meters = height / 39.37;
        let kilos = weight / 2.2046;
        let bmi = kilos / (meters * meters);
        bmi = bmi.toFixed(2);
        if (bmi < 18.6) {
            result.innerHTML = 'Your bmi is : '+bmi+ '. You are underweight.';
        }
        else if(bmi >= 18.6 && bmi < 24.9) {
            result.innerHTML = 'Your bmi is : '+bmi+ '. You are a normal weight.';        }
        else {
            result.innerHTML = 'Your bmi is : '+bmi+ '. You are overweight.';        }
    }
}