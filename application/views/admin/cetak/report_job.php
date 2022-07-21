<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    function __construct()
    {
        parent::__construct();
    }

    //Page header
    public function Header() {
        // Logo
        $image_file = 'assets/images/logo_ipctpk.png';
        $this->Image($image_file, 155, 10, 40, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
         $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }

    // Page footer
    public function Footer() {
        $this->SetFont('times', 'B', 8);
        $this->SetY(-60);
        $this->SetX(0);
        $this->Cell(200, 100, '', 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('fahmiganz');
$pdf->SetTitle('PELAPORAN NILAI');
$pdf->SetSubject('KD PENGETAHUAN');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
// $pdf->SetFont('times', 'BI', 12);
$pdf->SetFont('times');

// add a page
// $pdf->AddPage();
$pdf->AddPage('L', 'F4');

ob_start();
// print_r($data);die();

$header = '<table>';
$header .= '
		<tr style="text-align: center;">
			<th style="text-align: center;"><h3><b>DITEK JAYA</b></h3></th>
		</tr>
		<tr style="padding:30px; text-align: center;">
			<th>Kedoya Elok Plaza Blok DA-12</th>
		</tr>
		<tr>
			<th style="text-align: center;">JL. Panjang, Kebon Jeruk, Jakarta 11520</th>
		</tr>
		<tr>
			<th style="text-align: center;">Phone: 021-5806862 Fax: 021-5807161</th>
		</tr>
		<tr>
			<th><br><hr /></th>
		</tr>
		';

$header .= '</table>';
$pdf->WriteHTMLCell($w='', $h='', $x=20, $y=10,$header,$border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$table_title = '<table>';
$table_title .= '
		<tr>
			<th style="padding:150px; text-align: center;">
				<b>JOB REPORT<br></b> 
			</th>
		</tr>
		';

$table_title .= '</table>';
$pdf->WriteHTMLCell($w='', $h='', $x=20, $y=50,$table_title,$border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


$tabel = '<table style="padding:3px;">';
$tabel .= '
		<tr>
			<th style="border:1px solid #000; width:50px;"><b>No. </b></th>
			<th style="border:1px solid #000; width:150px;"><b>Job Code</b></th>
			<th style="border:1px solid #000; width:150px;"><b>Schedule</b></th>
			<th style="border:1px solid #000; width:250px;"><b>Company</b></th>
			<th style="border:1px solid #000; width:150px;"><b>Instrument</b></th>
			<th style="border:1px solid #000; width:150px;"><b>Engineer</b></th>
      <th style="border:1px solid #000; width:150px;"><b>Status Job</b></th>
		</tr>';
			
    $no=1; foreach($data_job as $d_job){
			$tabel .='
						<tr>
							<th style="border:1px solid #000; text-align: center;">'.$no.'</th>
							<th style="border:1px solid #000; text-align: center;">'.$d_job->id_job.'</th>
							<th style="border:1px solid #000; text-align: left;">'.date_indo($d_job->schedule).'</th>
							<th style="border:1px solid #000; text-align: left;">'.$d_job->name_company.'</th>
							<th style="border:1px solid #000; text-align: left;">'.$d_job->name_instrument.'</th>
              <th style="border:1px solid #000; text-align: left;">'.$d_job->id_job.'</th>
							<th style="border:1px solid #000; text-align: center;">'.$d_job->status_job.'</th>
						</tr>
					';
      $no++;
    }

$tabel .= '</table>';
$pdf->WriteHTMLCell(0,0,'','',$tabel,0,1,0,true,'C',true);

$footer = '<table>';
$footer .= '
		<tr style="padding:30px; text-align: center;">
			<th></th>
			<th></th>
			<th></th>
		</tr>
		<tr style="padding:80px; text-align: center;">
			<th rowspan="4" width="400px" style="padding:150px; text-align: center;"></th>
			<th></th>
			<th>Dibuat Oleh,</th>
		</tr>
		<tr style="padding:30px; text-align: center;">
			<th></th>
			<th></th>
		</tr>
		<tr>
			<th style="padding:80px; text-align: center;"></th>
			<th></th>
		</tr>
		<tr>
			<th style="padding:80px; text-align: center;"></th>
			<th style="padding:80px; text-align: center;"></th>
		</tr>
		';

$footer .= '</table>';


$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();

$pdf->Output('KD PENGETAHUAN.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+

?>