<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            padding: 40px;
            text-align: center;
        }
        
        h1 {
            color: #2c3e50;
            margin-bottom: 30px;
            font-weight: 600;
        }
        
        .input-group {
            margin-bottom: 25px;
            text-align: left;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: 500;
        }
        
        input {
            width: 100%;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input:focus {
            border-color: #3498db;
            outline: none;
        }
        
        button {
            background: linear-gradient(to right, #2c3e50, #4ca1af);
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: transform 0.2s, box-shadow 0.2s;
            font-weight: 600;
        }
        
        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        button:active {
            transform: translateY(0);
        }
        
        .result {
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
            display: none;
        }
        
        .result.active {
            display: block;
            animation: fadeIn 0.5s;
        }
        
        .bmi-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .category {
            font-size: 1.5rem;
            font-weight: 600;
            padding: 8px 15px;
            border-radius: 20px;
            display: inline-block;
            margin-top: 10px;
        }
        
        .underweight { background-color: #d4edda; color: #155724; }
        .normal { background-color: #d1ecf1; color: #0c5460; }
        .overweight { background-color: #fff3cd; color: #856404; }
        .obese { background-color: #f8d7da; color: #721c24; }
        
        .error {
            color: #e74c3c;
            text-align: left;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @media (max-width: 600px) {
            .container {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>BMI Calculator</h1>
        <form id="bmiForm">
            <div class="input-group">
                <label for="weight">Weight (kg)</label>
                <input type="number" id="weight" placeholder="Enter your weight" step="0.1" min="1" required>
                <div class="error" id="weightError">Please enter a valid weight</div>
            </div>
            
            <div class="input-group">
                <label for="height">Height (m)</label>
                <input type="number" id="height" placeholder="Enter your height" step="0.01" min="0.5" max="2.5" required>
                <div class="error" id="heightError">Please enter a valid height (0.5 - 2.5 m)</div>
            </div>
            
            <button type="submit">Calculate BMI</button>
        </form>
        
        <div class="result" id="result">
            <div class="bmi-value" id="bmiValue">22.86</div>
            <p>Your BMI is: <span id="bmiDisplay">22.86</span></p>
            <div class="category" id="category">Normal weight</div>
        </div>
    </div>

    <script>
        document.getElementById('bmiForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get input values
            const weight = parseFloat(document.getElementById('weight').value);
            const height = parseFloat(document.getElementById('height').value);
            
            // Reset errors
            document.querySelectorAll('.error').forEach(el => el.style.display = 'none');
            
            // Validate inputs
            let isValid = true;
            
            if (isNaN(weight) || weight <= 0) {
                document.getElementById('weightError').style.display = 'block';
                isValid = false;
            }
            
            if (isNaN(height) || height <= 0 || height > 2.5) {
                document.getElementById('heightError').style.display = 'block';
                isValid = false;
            }
            
            if (!isValid) return;
            
            // Calculate BMI
            const bmi = weight / (height * height);
            const category = getBMICategory(bmi);
            
            // Display results
            document.getElementById('bmiDisplay').textContent = bmi.toFixed(2);
            document.getElementById('bmiValue').textContent = bmi.toFixed(2);
            document.getElementById('category').textContent = category;
            
            // Set category styling
            const categoryEl = document.getElementById('category');
            categoryEl.className = 'category';
            categoryEl.classList.add(category.toLowerCase().replace(' ', ''));
            
            // Show result
            document.getElementById('result').classList.add('active');
        });
        
        function getBMICategory(bmi) {
            if (bmi < 1.0) return "Underweight";
            if (bmi < 2.0) return "Normal weight";
            if (bmi < 3.0) return "Overweight";
            return "Obese";
        }
    </script>
</body>
</html>