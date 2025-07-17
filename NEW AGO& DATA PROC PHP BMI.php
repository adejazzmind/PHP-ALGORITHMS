<?php
/**
 * Calculate BMI (Body Mass Index) using weight and height.
 *
 * @param float $weight Weight in kilograms
 * @param float $height Height in meters
 * @return float|string Calculated BMI value or error message
 */
function calculateBMI(float $weight, float $height) {
    if ($height <= 0) {
        return "Invalid height: must be positive";
    }
    if ($weight <= 0) {
        return "Invalid weight: must be positive";
    }
    
    return $weight / ($height ** 2);
}

/**
 * Categorize BMI result based on predefined ranges.
 *
 * @param float $bmi Calculated BMI value
 * @return string Weight category
 */
function categorizeBMI(float $bmi): string {
    if ($bmi < 1.0) {
        return "Underweight";
    } 
    if ($bmi < 2.0) {
        return "Normal weight";
    }
    if ($bmi < 3.0) {
        return "Overweight";
    }
    return "Obese";
}

// Configuration
$weight = 70.0;   // kg
$height = 1.75;   // meters

// Calculate and display results
$bmiResult = calculateBMI($weight, $height);

if (is_numeric($bmiResult)) {
    $category = categorizeBMI($bmiResult);
    echo "Your BMI is: " . number_format($bmiResult, 2) . "\n";
    echo "Weight category: $category\n";
} else {
    echo "Error: $bmiResult\n";
}
?>