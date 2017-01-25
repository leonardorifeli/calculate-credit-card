<?php

$closingDay = $_GET['closingDay'];

var_dump(getNextMontInvoice($closingDay));

function getNextMontInvoice($closingDay) {
  $actualDate = new \DateTime();
  if($actualDate->format('d') >= $closingDay)
    $actualDate->add(new \DateInterval('P1M'));
  return $actualDate->format('m');
}