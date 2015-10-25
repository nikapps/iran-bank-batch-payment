<?php
/**
 * User: Hossein Moradgholi
 * Date: 10/25/15
 * Time: 12:01 AM
 */

error_reporting(E_ERROR);

use Fisharebest\ExtCalendar\GregorianCalendar;
use Fisharebest\ExtCalendar\PersianCalendar;
use Nikapps\BatchPayment\Paya\PayaCollection;
use Nikapps\BatchPayment\Paya\PayaPayment;
use Nikapps\BatchPayment\Paya\PayaPaymentInfo;

require "../vendor/autoload.php";

$payaCollection = new PayaCollection();
$payaPaymentInfo = new PayaPaymentInfo();

$persianCalendar = new PersianCalendar();
$gregorianCalendar = new GregorianCalendar();
$requestDateTime = implode('-', $persianCalendar->jdToYmd($gregorianCalendar->ymdToJd(date('Y'), date('m'), date('d')))) . "T" . date('H:i:s');
$payaPaymentInfo->setRequestDate($requestDateTime);

$payaPaymentInfo->setPayerIban('IR360560080133100002001001940612002');
$payaPaymentInfo->setPayerName('نام من');
$payaPayment = new PayaPayment();
$payaPayment->setAmount(2080000);
$payaPayment->setCreditorIban('IR020540110180001974695003');
$payaPayment->setCreditorName('امیرحسین صادقی');
$payaPayment->setDescription('تست سیستم');
$payaPaymentInfo->addPayment($payaPayment);
$payaCollection->setPayaPaymentInfo($payaPaymentInfo);
$payaCollection->exportXml();
