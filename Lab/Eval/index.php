<?php

function evaluate_trig_expression($expression) {
    $expression = preg_replace_callback('/(sin|cos|tan|cot)\(([^)]+)\)/i', function ($matches) {
        $func = strtolower($matches[1]);
        $angle_degrees = eval('return ' . $matches[2] . ';');
        $angle_radians = deg2rad($angle_degrees);

        switch ($func) {
            case 'sin': return sin($angle_radians);
            case 'cos': return cos($angle_radians);
            case 'tan': return tan($angle_radians);
            case 'cot': return 1 / tan($angle_radians);
            default: return 0;
        }
    }, $expression);

    // Вычисляем финальное выражение
    try {
        eval('$result = ' . $expression . ';');
        return $result;
    } catch (Throwable $e) {
        return "Ошибка при вычислении выражения.";
    }
}