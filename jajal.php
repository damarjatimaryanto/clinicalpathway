<!DOCTYPE html>
<html>
<head>
    <title>Sum Function Example</title>
    <script>
        function sum() {
            var num1 = parseInt(document.getElementById('num1').value);
            var num2 = parseInt(document.getElementById('num2').value);
            var result = num1 + num2;
            document.getElementById('result').innerHTML = "Result: " + result;
        }
    </script>
</head>
<body>
    <h1>Sum Function Example</h1>
    <label for="num1">Number 1:</label>
    <input type="number" id="num1"><br>
    <label for="num2">Number 2:</label>
    <input type="number" id="num2"><br>
    <button onclick="sum()">Calculate Sum</button>
    <p id="result"></p>
</body>
</html>
