<?php
/////////////////////////////////////////////
//
// rechnung erstellen
// freigaben eintragen
//
////////////////////////////////////////////


$start=time();
$ende=time()+175600;

if ( $_POST['rechnung_erstellen']  == TRUE ) {
    
    
$sperren=mysqli_query($link," LOCK TABLES rechnungsnummer write, rechnungsnummer as rechnungsnummer read ");
$select_re_nr = mysqli_query($link," select max(re_nr) + 1 as renr from rechnungsnummer ");
while ($result_renr = mysqli_fetch_array( $select_re_nr, MYSQLI_BOTH ) ) {
$neuerenr=$result_renr['renr'];
mysqli_query($link," insert into rechnungsnummer ( re_nr, kd_nr ) values ( '$neuerenr', '$_COOKIE[kd_nr]' ) ");
mysqli_query($link,"UNLOCK TABLES");
}   
    
    
    
    $select_cart_re=mysqli_query($link," select cart_id, tip_nr, tip, rubrik_nr, rubrik, anzahl, preis, eigentuemer from cart where kd_nr = '$_COOKIE[kd_nr]' and berechnet < '1' ");
     while ( $result_cart_re = mysqli_fetch_array( $select_cart_re, MYSQLI_BOTH ) ) {
     $cart_id_re=$result_cart_re['cart_id'];
     $tip_nr_re=$result_cart_re['tip_nr'];
     $tip_re=$result_cart_re['tip'];
     $rubrik_nr_re=$result_cart_re['rubrik_nr'];
     $rubrik_re=$result_cart_re['rubrik'];
     $anzahl_re=$result_cart_re['anzahl'];
     $preis_re=$result_cart_re['preis'];
     $positionspreis=$result_cart_re['preis'] * $result_cart_re['anzahl'];
     $eigentuemer_re=$result_cart_re['eigentuemer'];
           

         
     mysqli_query($link," insert into rechnungen 
     (
     re_nr,
     kd_nr,
     tip_nr,
     tip,
     rubrik_nr,
     rubrik,
     anzahl,
     einzelpreis,
     positionspreis,
     eigentuemer
     )
     values
     (
     '$neuerenr',
     '$_COOKIE[kd_nr]',
     '$tip_nr_re',
     '$tip_re',
     '$rubrik_nr_re',
     '$rubrik_re',
     '$anzahl_re',
     '$preis_re',
     '$positionspreis',
     '$eigentuemer_re'
     )
     ");
         
         
    mysqli_query($link," insert into freigabe
    (
    tip_nr,
    kd_nr,
    re_nr,
    start_zeit,
    ende_zeit
    )
    values
    (
    '$tip_nr_re',
    '$_COOKIE[kd_nr]',
    '$neuerenr',
    '$start',
    '$ende'
    )
    ");
         
    
     mysqli_query($link," update cart set re_nr = '$neuerenr', berechnet = '1' where cart_id = '$cart_id_re' ");
         
     }
       
         $select_summe = mysqli_query($link," select sum(positionspreis) as summe_brutto from rechnungen where re_nr = '$neuerenr' ");
         while ( $result_summe = mysqli_fetch_array( $select_summe, MYSQLI_BOTH ) ) {
             
         $summe_brutto=$result_summe['summe_brutto'];
             
         }
         
         $mehrwertsteuer=$summe_brutto/(100+$mw_st) * $mw_st;
         $summe_netto=$summe_brutto/(100+$mw_st) * 100;

       mysqli_query($link," insert into rechnungen_summe
       (
       re_nr,
       re_datum,
       kd_nr,
       netto_betrag,
       mwst,
       brutto_betrag
       )
       values
       (
      '$neuerenr',
      '$datum',
      '$_COOKIE[kd_nr]',
      '$summe_netto',
      '$mehrwertsteuer',
      '$summe_brutto'
      )
      ");
    
    
    }

?>

<input type="hidden" name="neuerenr" value="<?php neuladen($neuerenr, $_POST['neuerenr']); ?> ">
<input type="hidden" name="summe_netto" value="<?php neuladen($summe_netto, $_POST['summe_netto']); ?> ">
<input type="hidden" name="mehrwertsteuer" value="<?php neuladen($mehrwertsteuer, $_POST['$mehrwertsteuer']); ?> ">
<input type="hidden" name="summe_brutto" value="<?php neuladen($summe_brutto, $_POST['summe_brutto']); ?> ">

