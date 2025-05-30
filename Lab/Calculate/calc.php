<<?php

if (isset($_POST['val'])) {
    $calcRes = calculate($_POST['val']);

    if (is_numeric($calcRes)) {
        echo $calcRes;
    } else {
        echo 'Ошибка вычисления выражения: ' . $calcRes;
    }
}

/** строка - число? */
function isnum($inputStr) {
    return is_numeric($inputStr);
}

function calculate($inputExpr) {
    if (empty($inputExpr)) {
        return 'Выражение не задано!';
    }

    if (!validScob($inputExpr)) {
        return 'Неправильная расстановка скобок!';
    }

    $procExpr = str_replace(' ', '', $inputExpr);

    // Обработка отрицательных чисел в начале выражения
    if (substr($procExpr, 0, 1) == '-') {
        $procExpr = '0' . $procExpr;
    }

    // Выражения в скобках (рекурсивно)
    while (preg_match('/\(([^()]+)\)/', $procExpr, $matchGrps)) {
        $procExpr = str_replace($matchGrps[0], calculate($matchGrps[1]), $procExpr);
    }

    // Умножение и деление
    $procExpr = performOp($procExpr, '/(\-?\d+\.?\d*)([\/\*])(\-?\d+\.?\d*)/', function ($num1, $op, $num2) {
        return $op == '*' ? $num1 * $num2 : $num1 / $num2;
    });

    // Сложение и вычитание
    $procExpr = performOp($procExpr, '/(\-?\d+\.?\d*)([\+\-])(\-?\d+\.?\d*)/', function ($num1, $op, $num2) {
        return $op == '+' ? $num1 + $num2 : $num1 - $num2;
    });

    return $procExpr;
}

/** Вспомогательная функция для выполнения операций (умножение/деление или сложение/вычитание) */
function performOp($expr, $patt, $opCallback) {
    while (preg_match($patt, $expr, $matchGrps)) {
        $opRes = $opCallback($matchGrps[1], $matchGrps[2], $matchGrps[3]);
        $expr = str_replace($matchGrps[0], $opRes, $expr);
    }
    return $expr;
}

/** корректность расстановки скобок в выражении */
function validScob($exprToCheck) {
    $scobCount = 0;
    for ($i = 0; $i < strlen($exprToCheck); $i++) {
        if ($exprToCheck[$i] == '(') {
            $scobCount++;
        } elseif ($exprToCheck[$i] == ')') {
            $scobCount--;
            if ($scobCount < 0) {
                return false;
            }
        }
    }
    return $scobCount == 0;
}