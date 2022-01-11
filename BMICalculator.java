import java.util.Scanner;
import java.lang.Math;
import javax.swing.*;

/*
    Name: Andrei Dalton
    Date: 9/14/2021
    Purpose: Creating a method that calculates a users BMI
 */
public class BMICalculator {
    private static Scanner input = new Scanner(System.in);

    public static void main(String[] args) {
	    double lbs, inches, meters, kgs, bmi;
	    String classification;
        JFrame frame = new JFrame("Calculate your BMI");
	   //System.out.println("Calculate BMI");
        JLabel weightLabel = new JLabel("Enter weight");
        JLabel heightLabel = new JLabel("Enter height");
        weightLabel.setBounds(20, 100, 80, 30);
        heightLabel.setBounds(20,100,80,30);
        frame.add(weightLabel);
        frame.add(heightLabel);
        frame.setSize(300,300);
        frame.setLayout(null);
        frame.setVisible(true);
	   /*System.out.print("Enter weight (lbs): ");
        lbs = input.nextDouble();
	    System.out.print("Enter height (inches): ");
        inches = input.nextDouble();
        kgs = convertToKilograms(lbs);
        meters = convertToMeters(inches);
        bmi = calcBMI(kgs, meters);
        System.out.printf("Your BMI is %.2f ",bmi);
        classification = bmiClassification(bmi);
        System.out.print("Your BMI classification is "+classification);*/
    }



    public static double convertToKilograms(double pounds) {
        double big;
        big = pounds / 2.2046;
        return big;
    }

    public static double convertToMeters(double feet) {
        double tall;
        tall = feet / 39.37;
        return tall;
    }



    public static double calcBMI(double weight, double height) {
        double both;
        both = weight / (Math.pow(height, 2));
        return both;
    }

    public static String bmiClassification(double bmi) {

        if (bmi < 18.5)
            return "Underweight";
        else if (bmi >= 18.5 && bmi < 25.0)
            return "Normal";
        else if(bmi >= 25.0 && bmi < 30.0)
            return "Overweight";
        else if(bmi >= 30.0)
            return "Obese";
        else
            return null;
    }
}