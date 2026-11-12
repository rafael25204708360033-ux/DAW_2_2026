<?php
header("Content-Type: application/json");

$v1 = $_GET["a"];
$v2 = $_GET["b"];
$op = $_GET["op"];

if ($op == "+")
{
    $result = $v1 + $v2;
    echo json_encode(["resultado" => $result]);
}
else if ($op == "-")
{
    $result = $v1 - $v2;
    echo json_encode(["resultado" => $result]);
}
else if ($op == "*")
{
    $result = $v1 * $v2;
    echo json_encode(["resultado" => $result]);
}
else if ($op == "/")
{
    if ($v2 == 0) {
        $result = "Divisão por zero!";
        echo json_encode(["erro" => "Divisão por zero!"]);
    } else {
        $result = $v1 / $v2;
        echo json_encode(["resultado" => $result]);
    }
}
else
{
    $result = "Operador inválido!";
    echo json_encode(["erro" => "Operador inválido!"]);
}

?>