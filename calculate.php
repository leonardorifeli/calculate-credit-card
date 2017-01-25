<?php

$closingDay = $_GET['closingDay'];
$paymentDay = 10;

var_dump('dia atual: '.date('d/m'));
var_dump('mês de fechamento da próxima fatura: '.getNextMontInvoice($closingDay));
var_dump('data de vencimento da próxima fatura: '.getNextPaymentDate($paymentDay, $closingDay));

function getNextMontInvoice($closingDay) {
  $actualDate = new \DateTime();
  if($actualDate->format('d') >= $closingDay)
    $actualDate->add(new \DateInterval('P1M'));
  return $actualDate->format('m');
}

function getNextPaymentDate($paymentDay, $closingDay) {
	$actualDate = new \DateTime();
	$nextMonthInvoice = getNextMontInvoice($closingDay);
	
	if($paymentDay > $closingDay)
		$nextMonthPayment = $nextMonthInvoice;
	else
		$nextMonthPayment = $nextMonthInvoice + 1;

	if($nextMonthPayment > 12) 
		$nextMonthPayment = $nextMonthPayment - 12;

	$nextPaymentDate = date('Y')."-$nextMonthPayment-$paymentDay";	
	
	return (new \DateTime($nextPaymentDate))->format('Y-m-d');
}