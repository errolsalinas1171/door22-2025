<?php
require('fpdf.php');

//echo "ZoneNo: $ZoneNo; Institute: $InstituteNo; Year: $Year<br />\n";

$pdf=new FPDF();
$pdf->AddPage('L');

$pdf->SetFont('Arial','B',18);

$pdf->Ln();
$pdf->Cell(0,6,'All Records',0,1,'C');
$pdf->Ln();
 
$pdf->SetFont('Arial','',10);
$pdf->Cell(25,10,"Room Number");
$pdf->Cell(80,10,"Name");
$pdf->Cell(25,10,"Date Start");
$pdf->Cell(35,10,"Date End");
$pdf->Ln();
$pdf->Cell(450,3,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");


include ('dbconnect.php');
$sql=mysql_query("SELECT * FROM room_history where view='yes'");
        while($row=mysql_fetch_array($sql))
        {
            $username = $row['paymentID'];
            $fullname = $row['full_name'];
            $envelop_no = $row['envelop_no'];
            #$fullname = $row['last_name']." ".$row['first_name'];
            $last_name = $row['last_name'];
            if($row['payment_type']=='cash'){
                $payment_type = 'CASH';
        	}
            if($row['payment_type']=='cheque'){
                $payment_type = 'CHEQUE';
        	}
            if($row['cheque_number']==0){
                $cheque_number = '----------';
        	}
            if($row['cheque_number']!=0){
                $cheque_number = $row['cheque_number'];
        	}
            $amount = number_format($row['amount'], 0);
            $date_time = strtotime($row['date_time']);

            if($row['status']=='ok')
            {
                $status = 'Ok';  
            }
            if($row['status']=='not_ok')
            {
                $status = 'Not Ok';  
            }
            if($row['status']=='pending')
            {
                $status = 'Pending';  
            }


			$pdf->Ln();
            $pdf->Cell(25,5,$username);
            $pdf->Cell(25,5,$envelop_no);
            $pdf->Cell(80,5,$fullname);
            $pdf->Cell(25,5,$payment_type);
            $pdf->Cell(35,5,$cheque_number);
            $pdf->Cell(25,5,$amount);    
            $pdf->Cell(40,5,date("m/d/Y h:iA", $date_time));
            $pdf->Cell(30,5,$status);
        }

$pdf->Output();

?>