<?php
 
error_reporting(0);
ini_set('display_errors', 0);
header('Content-Type: application/json; charset=utf-8');
 
$expression = str_replace(' ', '', $_POST['expression']);
 
if (!bracketsAreBalanced($expression)) {
    echo json_encode(['result' => 'Ошибка']);
    exit;
}
 
try {
    $pos = 0;
    $result = parseExpression($expression, $pos);
    $formatted = rtrim(rtrim(number_format($result, 10, '.', ''), '0'), '.');
    echo json_encode(['result' => $formatted]);
} catch (Exception $e) {
    echo json_encode(['result' => 'Ошибка: ' . $e->getMessage()]);
}
 
exit;
 
 
function bracketsAreBalanced(string $expr): bool
{
    $depth = 0;
    for ($i = 0; $i < strlen($expr); $i++) {
        if ($expr[$i] === '(') $depth++;
        if ($expr[$i] === ')') $depth--;
        if ($depth < 0) return false;
    }
    return $depth === 0;
}
 
function parseExpression(string $expr, int &$pos): float
{$value = parseTerm($expr, $pos);
 
    while ($pos < strlen($expr) && ($expr[$pos] === '+' || $expr[$pos] === '-')) {
        $op = $expr[$pos];
        $pos++;
        $value = calculate($value, $op, parseTerm($expr, $pos));
    }
    return $value;
}
 
function parseTerm(string $expr, int &$pos): float
{$value = parseFactor($expr, $pos);
 
    while ($pos < strlen($expr) && ($expr[$pos] === '*' || $expr[$pos] === '/')) {
        $op = $expr[$pos];
        $pos++;
        $value = calculate($value, $op, parseFactor($expr, $pos));
    }
 
    return $value;
}
 
function parseFactor(string $expr, int &$pos): float
{
    $negative = false;
    if ($pos < strlen($expr) && $expr[$pos] === '-') {
        $negative = true;
        $pos++;
    }
 
    if ($pos < strlen($expr) && $expr[$pos] === '(') {
        $pos++;
        $value = parseExpression($expr, $pos);
        if ($pos >= strlen($expr) || $expr[$pos] !== ')') {
            throw new Exception('ожидалась закрывающая скобка');
        }
        $pos++;
        return $negative ? -$value : $value;
    }
 
    $start = $pos;
    while ($pos < strlen($expr) && (ctype_digit($expr[$pos]) || $expr[$pos] === '.')) {
        $pos++;
    }
 
    if ($pos === $start) {
        throw new Exception('ожидалось число на позиции ' . $pos);
    }
 
    $value = (float) substr($expr, $start, $pos - $start);
    return $negative ? -$value : $value;
}
 
function calculate(float $a, string $op, float $b): float
{
    switch ($op) {
        case '+': return add($a, $b);
        case '-': return subtract($a, $b);
        case '*': return multiply($a, $b);
        case '/': return divide($a, $b);
    }
    throw new Exception('неизвестная операция: ' . $op);
}
 
function add(float $a, float $b): float      { return $a + $b;}
function subtract(float $a, float $b): float { return $a - $b; }
function multiply(float $a, float $b): float {return $a * $b; }
 
function divide(float $a, float $b): float
{
    if ($b == 0) throw new Exception('деление на ноль');
    return $a / $b;
}