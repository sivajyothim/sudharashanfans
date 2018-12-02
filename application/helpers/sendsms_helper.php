<?php 
/*

Start sendsms_helper.php file
sendsms_helper.php
Save below code as sendsms_helper.php in /application/helpers/
Author: Spring Edge ( http://www.springedge.com ) */
function sendsms($mobile, $text, $return = '0') {

//send sms module section code start
               
                $request = 'User=sudharshanfans&passwd=11726554&mobilenumber='.$mobile.'&message='.$text.'&sid=SMPLTD&mtype=N&DR=Y';
               
                $ch = curl_init('http://api.smscountry.com/SMSCwebservice_bulk.aspx');

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                curl_setopt($ch, CURLOPT_POST, true);

                curl_setopt($ch, CURLOPT_POSTFIELDS, $request);

                $resuponce = curl_exec($ch);
                curl_close($ch);
                echo $resuponce;exit;
                //send sms code end
}

/* End sendsms_helper.php file */