//switch — выполняет нужную операцию, чтобы найти X, в зависимости от знака (+, -, *, /)
//explode - разделяет строчку на части

//  x * 7 = 49

<?php 
function solveEquation($equation) {
    $parts = explode(' ', $equation);
    $left = $parts[0];
    $operator =$parts[1];
    $right = $parts[2];
    $result = $parts[4];

    // Приводим к числам, если это не 'x'
    $left = ($left === 'x') ? 'x' : (float)$left;
    $right = ($right === 'x') ? 'x' : (float)$right;
    $result = (float)$result;
    
  echo "DEBUG: left=$left, operator=$operator, right=$right, result=$result<br>";

    if ($left === 'x') {
        switch ($operator) {  
            case '+' : $x = $result - $right; break;
            case '-' : $x = $right + $result; break;
            case '*' : $x = $result / $right; break;
            case '/' : $x = $right * $result; break;
        }
    } elseif ($right === 'x') {
        switch ($operator) {
            case '+' : $x = $result - $left; break;
            case '-' : $x = $left - $result; break;
            case '*' : $x = $result / $left; break;
            case '/' : $x = $left / $result; break;
        }
    }

    return $x;
}

$equation = "x * 7 = 49";
echo "x = " . solveEquation($equation);
?>