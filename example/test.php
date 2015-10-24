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
use Nikapps\BatchPayment\Paya\PayaPaymentInfo;

require "../vendor/autoload.php";

$payaCollection = new PayaCollection();
$payaCollection->setSenderIban('IR360560080133100002001001940612002');
$persianCalendar = new PersianCalendar();
$gregorianCalendar = new GregorianCalendar();
$payaCollection->setCreatedTime(implode('-', $persianCalendar->jdToYmd($gregorianCalendar->ymdToJd(date('Y'), date('m'), date('d')))) . "T" . date('H:i:s'));

$payaPaymentInfo = new PayaPaymentInfo();
$payaCollection->setPayaPaymentInfo($payaPaymentInfo);
$payaCollection->exportXml();
