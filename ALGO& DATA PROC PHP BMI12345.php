<?php

function calculateBMI($weight, $height) {
    if ($height <= 0) {
        return "Invalid height";
    }
    $bmi = $weight / ($height * $height);
    return $bmi;
}

function categorizeBMI($bmi) {
    if ($bmi < 1.0) {
        return "Underweight";
    } elseif ($bmi >= 1.0 && $bmi < 2.0) {
        return "Normal weight";
    } elseif ($bmi >= 2.0 && $bmi < 3.0) {
        return "Overweight";
    } else {
        return "Obese";
    }
}


$weight = 70; 
$height = 1.75; 
$bmi = calculateBMI($weight, $height);

if (is_numeric($bmi)) {
    $category = categorizeBMI($bmi);
    echo "Your BMI is: " . number_format($bmi, 2) . "\n";
    echo "Your weight category is: $category\n";
} else {
    echo $bmi . "\n"; 
}

?>