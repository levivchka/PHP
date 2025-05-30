<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
    <link rel="stylesheet" href="calc.css">
    <script> function add_input(value) {
            document.getElementById('display').value += value;
        }

        function clearDisplay() {
            document.getElementById('display').value = '';
        }

        function calculate() {
        const expression = document.getElementById('display').value;
        fetch('calc.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'val=' + encodeURIComponent(expression) 
        })
        .then(response => response.text())
        .then(result => {
            document.getElementById('display').value = result;
        })
        .catch(error => console.error('Ошибка:', error));
        }
        </script>
</head>
<body>
    <h1>Калькулятор</h1>
    <div class="calculator">
        <input type="text" class="input" id="display" readonly>
        <div class="buttons__wrapper"> 
            <button class="button" onclick="add_input('(')">(</button>
            <button class="button" onclick="add_input(')')">)</button>
            <button class="button С" onclick="clearDisplay()">C</button>
            <button class="button" onclick="add_input('1')">1</button>
            <button class="button" onclick="add_input('2')">2</button>
            <button class="button" onclick="add_input('3')">3</button>
            <button class="button" onclick="add_input('*')">*</button>
            <button class="button" onclick="add_input('4')">4</button>
            <button class="button" onclick="add_input('5')">5</button>
            <button class="button" onclick="add_input('6')">6</button>
            <button class="button" onclick="add_input('-')">-</button>
            <button class="button" onclick="add_input('7')">7</button>
            <button class="button" onclick="add_input('8')">8</button>
            <button class="button" onclick="add_input('9')">9</button>
            <button class="button" onclick="add_input('+')">+</button>
            <button class="button" onclick="add_input('0')">0</button>
            <button class="button" onclick="add_input('/')">/</button>
            <button class="button res" onclick="calculate()">=</button>
        </div>
    </div>
    <?php include 'calc.php'; ?>
</body>
</html>