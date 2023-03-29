<?php
function calcularINSS()
{
  $salario = $_GET['salario'];
  $aliq = 0;
  $inss = 0;

  $faixa1 = 97.65;
  $faixa2 = 114.23;
  $faixa3 = 154.27;

  if ($salario <= 1302.00) {
    $aliq = $salario * 0.075;
    $salarioSemInss = $salario - $aliq;
  } else if ($salario <= 2571.29) {
    $aliq =  $faixa1 + (($salario - 1302.00) * 0.09);
    $salarioSemInss = $salario - $aliq;
  } else if ($salario <= 3856.94) {
    $aliq =  $faixa1 + $faixa2 + (($salario - 2571.29) * 0.12);
    $salarioSemInss = $salario - $aliq;
  } else if ($salario <= 7507.49) {
    $aliq =  $faixa1 + $faixa2 +  $faixa3 + (($salario - 3856.94) * 0.14);
    $salarioSemInss = $salario - $aliq;
  } else {
    $salarioSemInss = $salario - 877.24;
  }

  return calcularIRRF($salarioSemInss, $aliq);
}

function calcularIRRF($salarioSemInss, $aliq)
{
  $dependentes = $_GET['dependentes'];
  $hrnoturno = $_GET['hrnoturno'];
  $irrf = 0;
  $valorLiquido = 0;

  $valorBaseIR1 = $salarioSemInss;
  $valorBaseIR2 = $valorBaseIR1 - ($dependentes * 189.59);

  switch (true) {
    case ($valorBaseIR2 <= 1903.98):
      $irrf = 0;
      break;
    case ($valorBaseIR2 <= 2826.65):
      $irrf = ($valorBaseIR2 * 0.075) - 142.80;
      break;
    case ($valorBaseIR2 <= 3751.05):
      $irrf = ($valorBaseIR2 * 0.15) - 354.80;
      break;
    case ($valorBaseIR2 <= 4664.68):
      $irrf = ($valorBaseIR2 * 0.225) - 636.13;
      break;
    default:
      $irrf = ($valorBaseIR2 * 0.275) - 869.36;
  }

  $valorLiquido = $salarioSemInss - $irrf;
  $salNoturno = $valorLiquido + ($hrnoturno * 10.7); 
  $totalNoturno = $hrnoturno * 10.7;

  return "<br> O valor de IRRF é: " . round($irrf, 2) .
  "<br> O valor de INSS é: " . round($aliq, 2) . 
  "<br> O seu salario liquido é: " . round($valorLiquido, 2) . 
  "<hr> O calculo do adicional noturno é: " . round($totalNoturno, 2) . 
  "<br> O seu salario liquido com acressimo do adicional noturno é: " . round($salNoturno, 2) ;
}


