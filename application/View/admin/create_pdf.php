<<<<<<< HEAD
<?php

//create_pdf.php


include('pdf.php');

if(isset($_POST["hidden_html"]) && $_POST["hidden_html"] != '')
{
 $file_name = 'google_chart.pdf';
 $html = '<link rel="stylesheet" href="bootstrap.min.css">';
 $html .= $_POST["hidden_html"];

 $pdf = new Pdf();
 $pdf->load_html($html);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));
}

?>
=======
<?php

//create_pdf.php


include('pdf.php');

if(isset($_POST["hidden_html"]) && $_POST["hidden_html"] != '')
{
 $file_name = 'google_chart.pdf';
 $html = '<link rel="stylesheet" href="bootstrap.min.css">';
 $html .= $_POST["hidden_html"];

 $pdf = new Pdf();
 $pdf->load_html($html);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));
}

?>
>>>>>>> 9d62b866cc7b8b5000bbd2ccec6bdeda996d6417
