<?php
include ("includes/connection.inc.php");
if(isset($_POST['c_download']))
{
   $id = $_POST['c_download'];
   $c_quiz = $_POST['c_quiz']; 
}
$sql = "SELECT * FROM `$c_quiz` WHERE `c_id`= '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$email = $row['c_email'];
$name = $row['c_name'];
$c_result = $row['c_result'];

if($c_quiz=="biodiversity_may")
{
   if($c_result==1)
{
   $data = <<<ANOOP
   <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
   </style>
   <div class="content_area">
   <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
   </div>
   <div class="content1">
   <p id="para">This is to certify that Mr. / Ms.<span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Biodiversity Quiz May 2020"</span> organized by MP Tiger Foundation Society to create awareness among the common public for the cause of Wildlife conservation. Mr. / Ms.<span style="font-weight: 700;"> $name </span> was among the top 100 participants of the quiz. MPTFS appreciates the participation and wishes them all the best for future endeavors.</p>
   <div>
   ANOOP;
}
else{
   $data = <<<ANOOP
   <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
   </style>
   <div class="content_area">
   <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
   </div>
   <div class="content1">
   <p id="para">This is to certify that Mr. / Ms.<span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Biodiversity Quiz May 2020"</span> organized by MP Tiger Foundation Society to create awareness among the common public for the cause of Wildlife conservation. MPTFS appreciates the participation and wishes them all the best for future endeavors.</p>
   <div>
   ANOOP;
}

}
else if($c_quiz=="wildlife_june") {
   if($c_result==1)
   {
      $data = <<<ANOOP
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Wildlife Quiz June 2020"</span> organized by MP Tiger Foundation Society to create awareness among the common public for the cause of Wildlife conservation. Mr./Ms. <span style="font-weight: 700;"> $name </span> was among the top 25 participants of the quiz. MPTFS appreciates the participation and wishes them all the best for future endeavors.</p>
      <div>
      ANOOP;
   }
   else{
      $data = <<<ANOOP
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Wildlife Quiz June 2020"</span> organized by MP Tiger Foundation Society to create awareness among the common public for the cause of Wildlife conservation. MPTFS appreciates the participation and wishes them all the best for future endeavors.</p>
      <div>
      ANOOP;
   }
}

else if($c_quiz=="tiger_day_quiz_2020") {
   if($c_result==1)
   {
      $data = <<<ANOOP
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Tiger Day Quiz 2020"</span> organized by MP Tiger Foundation Society to create awareness among
      the common public for the cause of Wildlife conservation. Mr./Ms. <span style="font-weight: 700;"> $name </span> won the <span style="font-weight: 700;">“Golden Tiger Award”</span> in the quiz. MPTFS appreciates the participation and wishes them all
      the best for future endeavours.
      </p>      
      <div>
      ANOOP;
   }
  else if($c_result==2)
   {
      $data = <<<ANOOP
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Tiger Day Quiz 2020"</span> organized by MP Tiger Foundation Society to create awareness among
      the common public for the cause of Wildlife conservation. Mr./Ms. <span style="font-weight: 700;"> $name </span> won the <span style="font-weight: 700;">“White Tiger Award”</span> in the quiz. MPTFS appreciates the participation and wishes them all the
      best for future endeavours.
      </p>      
      <div>
      ANOOP;
   }
   else if($c_result==3)
   {
      $data = <<<ANOOP
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Tiger Day Quiz 2020"</span> organized by MP Tiger Foundation Society to create awareness among
      the common public for the cause of Wildlife conservation. Mr./Ms. <span style="font-weight: 700;"> $name </span> won the <span style="font-weight: 700;">“Orange Tiger Award”</span> in the quiz. MPTFS appreciates the participation and wishes them all
      the best for future endeavours.</p>      
      <div>
      ANOOP;
   }
   else if($c_result==4)
   {
      $data = <<<ANOOP
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Tiger Day Quiz 2020"</span>  organized by MP Tiger Foundation Society to create awareness among
      the common public for the cause of Wildlife conservation. Mr./Ms. <span style="font-weight: 700;"> $name </span> won the <span style="font-weight: 700;">“Tiger Cub Award”</span> in the quiz. MPTFS appreciates the participation and wishes them all the
      best for future endeavours.</p>      
      <div>
      ANOOP;
   }
   else{
      $data = <<<ANOOP
      <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
      </style>
      <div class="content_area">
      <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
      </div>
      <div class="content1">
      <p id="para">This is to certify that Mr. / Ms. <span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Tiger Day Quiz 2020"</span> organized by MP Tiger Foundation Society to create awareness among
      the common public for the cause of Wildlife conservation. MPTFS appreciates the participation and
      wishes them all the best for future endeavours.</p>      
      <div>
      ANOOP;
   }

}

else if($c_quiz=="wld_quiz_2020") {
   if($c_result==1)
{
   $data = <<<ANOOP
   <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
   </style>
   <div class="content_area">
   <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
   </div>
   <div class="content1">
   <p id="para">This is to certify that Mr. / Ms.<span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS World Lion Day Quiz 2020"</span> organized by MP Tiger Foundation Society to create awareness among the common public for the cause of Wildlife conservation. Mr./Ms.<span style="font-weight: 700;"> $name </span> was among the top scorers of the quiz. MPTFS appreciates the participation and wishes them all the best for future endeavors.</p>
   <div>
   ANOOP;
}
else{
   $data = <<<ANOOP
   <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
   </style>
   <div class="content_area">
   <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
   </div>
   <div class="content1">
   <p id="para">This is to certify that Mr. / Ms.<span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS World Lion Day Quiz 2020"</span> organized by MP Tiger Foundation Society to create awareness among the common public for the cause of Wildlife conservation. MPTFS appreciates the participation and wishes them all the best for future endeavors.</p>
   <div>
   ANOOP;
}
}

else if($c_quiz=="vulture_awareness_day_quiz_2020") {
   if($c_result==1)
{
   $data = <<<ANOOP
   <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
   </style>
   <div class="content_area">
   <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
   </div>
   <div class="content1">
   <p id="para">This is to certify that Mr. / Ms.<span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Vulture Awareness Day Quiz 2020"</span> organized by MP Tiger Foundation Society to create awareness among the common public for the cause of Wildlife conservation. Mr./Ms.<span style="font-weight: 700;"> $name </span> scored full marks in the quiz and won the prize. MPTFS appreciates the participation and wishes them all the best for future endeavors.</p>
   <div>
   ANOOP;
}
else{
   $data = <<<ANOOP
   <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
   </style>
   <div class="content_area">
   <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
   </div>
   <div class="content1">
   <p id="para">This is to certify that Mr. / Ms.<span style="font-weight: 700;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Vulture Awareness Day Quiz 2020"</span> organized by MP Tiger Foundation Society to create awareness among the common public for the cause of Wildlife conservation. MPTFS appreciates the participation and wishes them all the best for future endeavors.</p>
   <div>
   ANOOP;
}
}



else if($c_quiz=="childrens_day_wildlife_quiz_2020") {
   if($c_result==1)
{
   $data = <<<ANOOP
   <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
   </style>
   <div class="content_area">
   <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
   </div>
   <div class="content1">
   <p id="para">This is to certify that Mr. / Ms.<span style="font-weight: 700; text-transform: uppercase;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Children's Day Wildlife Quiz 2020"</span> organized by MP Tiger Foundation Society to create awareness among the common public for the cause of Wildlife conservation. Mr./Ms.<span style="font-weight: 700;"> $name </span> was among the top 20 candidates in the quiz. MPTFS appreciates the participation and wishes them all the best for future endeavors.</p>
   <div>
   ANOOP;
}
else{
   $data = <<<ANOOP
   <style> *{padding:0;margin:0;}.content_area {position:fixed;top:0;left:0; }.content1 {position:absolute; z-index:999; top:42%; left:10%; right:10%; text-align:justify;} #para{font-size:24px; line-height: 38px;}
   </style>
   <div class="content_area">
   <img src="dompdf/$c_quiz.jpg" alt="" width="100%" height="780px">
   </div>
   <div class="content1">
   <p id="para">This is to certify that Mr. / Ms.<span style="font-weight: 700; text-transform: uppercase;"> $name </span> has participated in the <span style="font-weight: 700;">"MPTFS Children's Day Wildlife Quiz 2020"</span> organized by MP Tiger Foundation Society to create awareness among the common public for the cause of Wildlife conservation. MPTFS appreciates the participation and wishes them all the best for future endeavors.</p>
   <div>
   ANOOP;
}
}



// Include autoloader 
require_once 'dompdf/autoload.inc.php'; 
 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 

// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

// Load content from html file 
// $html = file_get_contents("work.php"); 
$dompdf->loadHtml($data); 

// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
// $dompdf->setPaper('A4'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("$email", array("Attachment" => 1));


?>