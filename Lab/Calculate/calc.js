function add_input(value) {
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