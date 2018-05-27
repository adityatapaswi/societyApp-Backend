<?php

/*
  A domain Class to demonstrate RESTful web services
 */
require_once("dbconn.php");
require 'PHPMailerAutoload.php';

Class Services {

    public function login($user) {
        $dbconn = new dbconn();
        $output = "";
        $sql = "SELECT * FROM user_register where email='$user->email'	and `password`='$user->password';";

        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output = $row;
            }
        }
        $conn->close();

        return $output;
    }

    public function addPost($post) {
        $dbconn = new dbconn();
//        $output=array();
        $sql = "call add_wall_post('$post->title', '$post->desc', $post->by, '$post->type', '$post->date', '$post->date_date',  $post->sid);";
        $conn = $dbconn->return_conn();

        $result = $conn->query($sql);
        $conn->close();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output = $row;
            }
        }

        return $output;
    }

    public function getPhotosForSociety($society) {
        $dbconn = new dbconn();
        $output = array();
        $sql = "SELECT * FROM gallery_images where sid=$society->id;";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output[] = $row;
            }
        }
        $conn->close();

        return $output;
    }

    public function getWall($society) {
        $dbconn = new dbconn();
        $output = array();
        $sql = "SELECT * FROM wall_posts where sid=$society->id;";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output[] = $row;
            }
        }
        $conn->close();

        return $output;
    }

    public function addEvent($event) {
        $dbconn = new dbconn();
        $sql = "call create_event('$event->title', '$event->desc', '$event->date', '$event->date_date', '$event->time', $event->sid);";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output = $row;
            }
        }
        $conn->close();

        return $output;
    }

    public function getBirthdaysAndAnniversaries($society) {
        $dbconn = new dbconn();
        $output = array();
        $sql = "SELECT * FROM bna where sid=$society->id;";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output[] = $row;
            }
        }
        $conn->close();


        return $output;
    }

    function registerTransaction($transaction) {
        $dbconn = new dbconn();
//        $output = array();
        $sql = "call register_transaction('$transaction->desc', $transaction->by, $transaction->amt, '$transaction->date', '$transaction->date_date', '$transaction->type', $transaction->sid);";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output = $row;
            }
        }
        $conn->close();


        return $output;
    }

    public function sendNotification($notification) {
        $dbconn = new dbconn();
        $output = array();
        $sql = "SELECT * FROM getFCMS;";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
//echo $notification->title.' '.$notification->message.' '.$row["fcmId"];
                $this->sendFCM($notification->title, $notification->message, $row["fcmId"]);
            }
        }
        $output = 'Notification Send Successfully';
        $conn->close();
        return $output;
    }

    public function getTransactions($society) {
        $dbconn = new dbconn();
        $output = array();
        $sql = "SELECT * FROM societydb.transactions where sid=$society->id;";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output[] = $row;
            }
        }

        $conn->close();
        return $output;
    }

    public function getBalanceSummary($society) {
        $dbconn = new dbconn();
        $output = array();
        $sql = "call getBalanceSummary($society->id);";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output[] = $row;
            }
        }

        $conn->close();
        return $output;
    }

    public function getSocietyMembers($society) {

        $dbconn = new dbconn();
        $output = array();

        $sql = "SELECT * FROM user_register where sid=$society->id;";

//       echo $sql;
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $output[] = $row;
            }
        }
        $conn->close();

        return $output;
    }

    public function getDiscussions($society) {
        $dbconn = new dbconn();
        $output = array();
        $sql = "SELECT a.*,b.name as byName FROM discussions as a, user_register as b where a.sid=$society->id and a.by=b.id order by date_date desc;";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output[] = $row;
            }
        }

        $conn->close();
        return $output;
    }

    public function createDiscussion($discussion) {
        $dbconn = new dbconn();
        $output = array();
        $sql = "call create_disscussion('$discussion->name', $discussion->by, $discussion->sid, '$discussion->first_message');";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {

                $output = $row;
            }
        }
        $conn->close();
        return $output;
    }

    public function addMessageToDiscussion($message) {
        $dbconn = new dbconn();
        $output = array();
        $sql = "INSERT INTO `societydb`.`disscussion_messages` (`did`,`message`,`date_date`,`by_id`) VALUES ($message->did,'$message->msg',NOW(),$message->by_id);";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result) {
            $output = "Insertion Success";
        }
        $conn->close();

        return $output;
    }

    public function getMessages($pagination) {
        $dbconn = new dbconn();
        $output = array();
        $sql = "SELECT * FROM messages where did=$pagination->id limit $pagination->limit offset $pagination->offset;";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {

                $output[] = $row;
            }
        }
        $conn->close();
        return $output;
    }

    public function getYearsTotal($year) {
        $dbconn = new dbconn();
        $output = array();
        $sql = "SELECT sum(amt) as Total FROM gcsmm.donation_history where year=$year;";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output = $row["Total"];
            }
        }

        $conn->close();
        return $output;
    }

    public function makePayment($paymentObj) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Api-Key:$paymentObj->api_key",
            "X-Auth-Token:$paymentObj->auth_token"));
        $payload = Array(
            'purpose' => $paymentObj->purpose,
            'amount' => $paymentObj->amount,
            'phone' => $paymentObj->phone,
            'buyer_name' => $paymentObj->name,
            'redirect_url' => 'http://society-app.thesolutioncircle.in/#/paymentRedirect',
            'send_email' => true,
            'webhook' => 'http://society-app.thesolutioncircle.in/api/webhook.php',
            'send_sms' => true,
            'email' => $paymentObj->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function completePayment($paymentObj) {

        $dbconn = new dbconn();
        $output = array();
        $json = json_encode($paymentObj);
//        echo $json;
        $sql = "INSERT INTO payments (`society_id`,`amount`,`payed_by`,`purpose`,`purchase_token`,`payment_obj`,`payed_by_email`) VALUES ((select sid from user_register where email='$paymentObj->buyer'),'$paymentObj->amount','$paymentObj->buyer_name','$paymentObj->purpose','$paymentObj->payment_id','$json','$paymentObj->buyer');";

//       echo $sql;
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result) {
            $output = "Insertion Success";
        }
        $conn->close();

        return $output;
    }

    public function getYearsSummary($year) {
        $dbconn = new dbconn();
        $output = array();
        $sql = "SELECT concat(a.building,concat(', Flat/Block: ',a.flat)) as Address, b.amt FROM address_register as a,donation_history as b where b.aid=a.id and b.year=$year order by b.id desc;";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output[] = array('Address' => $row["Address"], 'amt' => $row["amt"]);
            }
        }

        $conn->close();
        return $output;
    }

    public function getHistoryOfAddress($aid) {
        $dbconn = new dbconn();
        $output = array();
        $sql = "SELECT concat(a.building,concat(' Flat No: ',a.flat)) as 'Address',b.year,b.amt FROM address_register as a, gcsmm.donation_history as b where  a.id=b.aid and b.aid=$aid order by b.year desc,b.id desc;";
//       echo $sql;
        $conn = $dbconn->return_conn();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output[] = array('Address' => $row["Address"], 'Year' => $row["year"], 'amt' => $row["amt"]);
            }
        }

        $conn->close();
        return $output;
    }

    public function signUp($user) {

        $dbconn = new dbconn();
        $output = array();
        if ($user->type == 'society') {
            $sql = "call checkExists('$user->email', '$user->phone');";
//            echo $sql;
            $conn = $dbconn->return_conn();
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $output = $row["reply"];
                    if ($output == 'false') {
                        $sql = "call registerSociety('$user->society_name', '$user->address', '$user->city', '$user->state', $user->zip);";
                        $conn = $dbconn->return_conn();
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if (isset($row["id"])) {
                                    $sid = $row["id"];
                                    if (isset($user->doa)) {
                                        $sql = "call create_member('$user->name', '$user->phone', '$user->email', '$user->password', 'chairman', '$user->dob', '$user->dob_date', '',null,$sid);";
                                    } else {
                                        $sql = "call create_member('$user->name', '$user->phone', '$user->email', '$user->password', 'chairman', '$user->dob', '$user->dob_date', '',null, $sid);";
                                    }
                                } else {
                                    $output = $row['reply'];
                                    return $output;
                                }
                            }
                        }
                    } else {
                        $output = 'Email or Phone already Exists';
                        return $output;
                    }
                }
            }
            $conn->close();
        } else {
            $sql = "call create_member('$user->name', '$user->phone', '$user->email', '$user->password', 'member', '$user->dob', '$user->dob_date', '',null , $user->sid);";
        }
//        echo $sql;
        $conn = $dbconn->return_conn();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output = $row;
            }
        }
        return $output;
    }

    public function updateGCM($phone, $gcmId) {

        $dbconn = new dbconn();
        $output = array();

        $sql = "CALL updateFCM('$phone','$gcmId');";

        //  echo $sql;
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output = $row["reply"];
            }
        }
        $conn->close();

        return $output;
    }

    public function deleteImage($img) {

        $dbconn = new dbconn();
        $output = array();
//        echo '.'.$img->image_url;
        if (unlink('.' . $img->image_url)) {
            $sql = "DELETE FROM image_gallery WHERE id=$img->id;";

//       echo $sql;
            $conn = $dbconn->return_conn();
            $result = $conn->query($sql);
            if ($result) {
                $output = "File Deleted Successfully";
            } else {
                $output = "File Deletion Failed";
            }
            $conn->close();
        } else {
            $output = "File Not Found";
        }


        return $output;
    }

    public function changePassword($user) {

        $dbconn = new dbconn();
        $output = array();

        $sql = "UPDATE user_register SET password = '$user->password' WHERE id =$user->id ;";

//       echo $sql;
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result) {

            $output = 'Password Updated Successfully';
        }
        $conn->close();

        return $output;
    }

    public function getUserId($user) {

        $dbconn = new dbconn();
        $output = array();

        $sql = "SELECT id FROM user_register where email='$user->email';";

//       echo $sql;
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output = $row;
            }
        }
        $conn->close();

        return $output;
    }

    public function getKaryakramPatrika() {

        $dbconn = new dbconn();
        $output = array();

        $sql = "CALL karyakramPatrika();";

//       echo $sql;
        $conn = $dbconn->return_conn();
        $conn->query("SET NAMES 'utf8'");
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $output[] = array('days_remaining' => $row["days_remaining"], 'date' => $row["date"], 'name' => $row["name"], 'venue' => $row["venue"], 'description' => $row["description"]);
            }
        }
        $conn->close();

        return $output;
    }

    public function registerResident($resident) {

        $dbconn = new dbconn();
        $output = array();

        $sql = "CALL resident_reg('$resident->phone','$resident->name' ,'$resident->email','$resident->building',$resident->flat);";

        //echo $sql;
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $output = array('name' => $row["name"], 'building' => $row["building"], 'flat' => $row["flat"], 'aid' => $row["aid"], 'reply' => $row["reply"]);
            }
        }
        $conn->close();

        return $output;
    }

    public function sendMail($toEmail, $amt, $address, $name, $reciept, $recieved) {
        // set the timezone first
        if (function_exists('date_default_timezone_set')) {
            date_default_timezone_set("Asia/Kolkata");
        }

// then use the date functions, not the other way around
        $date = date("d-m-Y");


        $mail = new PHPMailer();
        $mail->IsSMTP();

        $mail->SMTPAuth = false;
        $mail->Host = 'relay-hosting.secureserver.net'; // "ssl://smtp.gmail.com" didn't worked
        $mail->Port = 25;
        $mail->SMTPSecure = false;



        $mail->IsHTML(true); // if you are going to send HTML formatted emails
        $mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
        $mail->From = "gcsmitra.mandal@gmail.com";
        $mail->FromName = "Gawade Colony Sanskritik Mitra Mandal";
        $mail->addAddress($toEmail);

        $mail->Subject = "Donation Receipt No: $reciept - $name";
        $mail->Body = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional //EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\"><head><!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]--><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta name=\"viewport\" content=\"width=device-width\"><!--[if !mso]><!--><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><!--<![endif]--><title></title><style type=\"text/css\" id=\"media-query\">body{margin:0;padding:0}table,tr,td{vertical-align:top;border-collapse:collapse}.ie-browser table,.mso-container table{table-layout:fixed}*{line-height:inherit}a[x-apple-data-detectors=true]{color:inherit!important;text-decoration:none!important}[owa] .img-container div,[owa] .img-container button{display:block!important}[owa] .fullwidth button{width:100%!important}[owa] .block-grid .col{display:table-cell;float:none!important;vertical-align:top}.ie-browser .num12,.ie-browser .block-grid,[owa] .num12,[owa] .block-grid{width:900px!important}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:100%}.ie-browser .mixed-two-up .num4,[owa] .mixed-two-up .num4{width:300px!important}.ie-browser .mixed-two-up .num8,[owa] .mixed-two-up .num8{width:600px!important}.ie-browser .block-grid.two-up .col,[owa] .block-grid.two-up .col{width:450px!important}.ie-browser .block-grid.three-up .col,[owa] .block-grid.three-up .col{width:300px!important}.ie-browser .block-grid.four-up .col,[owa] .block-grid.four-up .col{width:225px!important}.ie-browser .block-grid.five-up .col,[owa] .block-grid.five-up .col{width:180px!important}.ie-browser .block-grid.six-up .col,[owa] .block-grid.six-up .col{width:150px!important}.ie-browser .block-grid.seven-up .col,[owa] .block-grid.seven-up .col{width:128px!important}.ie-browser .block-grid.eight-up .col,[owa] .block-grid.eight-up .col{width:112px!important}.ie-browser .block-grid.nine-up .col,[owa] .block-grid.nine-up .col{width:100px!important}.ie-browser .block-grid.ten-up .col,[owa] .block-grid.ten-up .col{width:90px!important}.ie-browser .block-grid.eleven-up .col,[owa] .block-grid.eleven-up .col{width:81px!important}.ie-browser .block-grid.twelve-up .col,[owa] .block-grid.twelve-up .col{width:75px!important}@media only screen and (min-width:920px){.block-grid{width:900px!important}.block-grid .col{display:table-cell;Float:none!important;vertical-align:top}.block-grid .col.num12{width:900px!important}.block-grid.mixed-two-up .col.num4{width:300px!important}.block-grid.mixed-two-up .col.num8{width:600px!important}.block-grid.two-up .col{width:450px!important}.block-grid.three-up .col{width:300px!important}.block-grid.four-up .col{width:225px!important}.block-grid.five-up .col{width:180px!important}.block-grid.six-up .col{width:150px!important}.block-grid.seven-up .col{width:128px!important}.block-grid.eight-up .col{width:112px!important}.block-grid.nine-up .col{width:100px!important}.block-grid.ten-up .col{width:90px!important}.block-grid.eleven-up .col{width:81px!important}.block-grid.twelve-up .col{width:75px!important}}@media(max-width:920px){.block-grid,.col{min-width:320px!important;max-width:100%!important}.block-grid{width:calc(100% - 40px)!important}.col{width:100%!important}.col>div{margin:0 auto}img.fullwidth{max-width:100%!important}}</style></head><body class=\"clean-body\" style=\"margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #FFFFFF\"><!--[if IE]><div class=\"ie-browser\"><![endif]--><!--[if mso]><div class=\"mso-container\"><![endif]--><div class=\"nl-container\" style=\"min-width: 320px;Margin: 0 auto;background-color: #FFFFFF\"><!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td align=\"center\" style=\"background-color: #FFFFFF;\"><![endif]--><div style=\"background-color:transparent;\"><div style=\"Margin: 0 auto;min-width: 320px;max-width: 900px;width: 900px;width: calc(59000% - 541900px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid \"><div style=\"border-collapse: collapse;display: table;width: 100%;\"><!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:transparent;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 900px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]--><!--[if (mso)|(IE)]><td align=\"center\" width=\"900\" style=\" width:900px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]--><div class=\"col num12\" style=\"min-width: 320px;max-width: 900px;width: 900px;width: calc(58000% - 521100px);background-color: transparent;\"><div style=\"background-color: transparent; width: 100% !important;\"><!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]--><div align=\"center\" class=\"img-container center\" style=\"padding-right: 0px; padding-left: 0px;\"><!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 0px; padding-left: 0px;\" align=\"center\"><![endif]--><img class=\"center\" align=\"center\" border=\"0\" src=\"http://gcsmm.thesolutioncircle.in/images/ganesh.png\" alt=\"Gawade Colony Sanskritik Mitra Mandal\" title=\"Gawade Colony Sanskritik Mitra Mandal\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;height: auto;float: none;width: 100%;max-width: 83px\" width=\"83\"><!--[if mso]></td></tr></table><![endif]--></div><!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><![endif]--><div style=\"color:#555555;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><div style=\"font-size:12px;line-height:14px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 17px;text-align: center\"><span style=\"font-size: 14px; line-height: 16px;\">|| Shree Ganeshay namaha ||</span></p></div></div><!--[if mso]></td></tr></table><![endif]--><!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><![endif]--><div style=\"color:#555555;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><div style=\"font-size:12px;line-height:14px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 17px;text-align: center\"><span style=\"font-size: 18px; line-height: 21px;\"><strong><span style=\"line-height: 21px; font-size: 18px;\">Gawade Colony Sanskrutik Mitra Mandal</span></strong></span></p></div></div><!--[if mso]></td></tr></table><![endif]--><div style=\"padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><!--[if (mso)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px;padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><table width=\"100%\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td><![endif]--><div align=\"center\"><div style=\"border-top: 1px solid #BBBBBB; width:100%; line-height:1px; height:1px; font-size:1px;\"></div></div><!--[if (mso)]></td></tr></table></td></tr></table><![endif]--></div><!--[if (!mso)&(!IE)]><!--></div><!--<![endif]--></div></div><!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]--></div></div></div><div style=\"background-color:transparent;\"><div style=\"Margin: 0 auto;min-width: 320px;max-width: 900px;width: 900px;width: calc(59000% - 541900px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid two-up\"><div style=\"border-collapse: collapse;display: table;width: 100%;\"><!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:transparent;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 900px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]--><!--[if (mso)|(IE)]><td align=\"center\" width=\"450\" style=\" width:450px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]--><div class=\"col num6\" style=\"Float: left;min-width: 320px;max-width: 450px;width: 450px;width: calc(14000% - 128350px);background-color: transparent;\"><div style=\"background-color: transparent; width: 100% !important;\"><!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]--><!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><![endif]--><div style=\"color:#555555;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><div style=\"font-size:12px;line-height:14px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 17px\">Receipt no: <b>$reciept</b></p></div></div><!--[if mso]></td></tr></table><![endif]--><!--[if (!mso)&(!IE)]><!--></div><!--<![endif]--></div></div><!--[if (mso)|(IE)]></td><td align=\"center\" width=\"450\" style=\" width:450px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]--><div class=\"col num6\" style=\"Float: left;min-width: 320px;max-width: 450px;width: 450px;width: calc(14000% - 128350px);background-color: transparent;\"><div style=\"background-color: transparent; width: 100% !important;\"><!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]--><!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><![endif]--><div style=\"color:#555555;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><div style=\"font-size:12px;line-height:14px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 17px;text-align: right\">Date: <b>$date</b></p></div></div><!--[if mso]></td></tr></table><![endif]--><!--[if (!mso)&(!IE)]><!--></div><!--<![endif]--></div></div><!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]--></div></div></div><div style=\"background-color:transparent;\"><div style=\"Margin: 0 auto;min-width: 320px;max-width: 900px;width: 900px;width: calc(59000% - 541900px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid \"><div style=\"border-collapse: collapse;display: table;width: 100%;\"><!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:transparent;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 900px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]--><!--[if (mso)|(IE)]><td align=\"center\" width=\"900\" style=\" width:900px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]--><div class=\"col num12\" style=\"min-width: 320px;max-width: 900px;width: 900px;width: calc(58000% - 521100px);background-color: transparent;\"><div style=\"background-color: transparent; width: 100% !important;\"><!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]--><!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><![endif]--><div style=\"color:#555555;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><div style=\"font-size:12px;line-height:14px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 17px\">Gawade Colony Sanskrutik Mitra Mandal acknowledges the receipt of amount : <b>$amt</b><br><br>From <b>$name</b><br><br>Residing at <b>$address, Gawade Colony,Opposite Tata Motors,Chinchwad.</b><br><br>For the purpose of Ganeshotsav celebrations at Gawade colony.<br><br>Gawade Colony Sanskrutik Mitra Mandal sincerely thank you for your support and participation in various activities arranged by our organization. <br><br>We continue to seek your support and full participation for the events lined up for this year.<br><br>You will get the details of the events shortly.<br><br>In case you have any queries or any suggestions, please feel free to drop a mail at<br><br>gcsmitra.mandal@gmail.com<br><br>Donation Recieved By<br><b>$recieved</b></p></div></div><!--[if mso]></td></tr></table><![endif]--><!--[if (!mso)&(!IE)]><!--></div><!--<![endif]--></div></div><!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]--></div></div></div><div style=\"background-color:transparent;\"><div style=\"Margin: 0 auto;min-width: 320px;max-width: 900px;width: 900px;width: calc(59000% - 541900px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid \"><div style=\"border-collapse: collapse;display: table;width: 100%;\"><!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:transparent;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 900px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]--><!--[if (mso)|(IE)]><td align=\"center\" width=\"900\" style=\" width:900px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]--><div class=\"col num12\" style=\"min-width: 320px;max-width: 900px;width: 900px;width: calc(58000% - 521100px);background-color: transparent;\"><div style=\"background-color: transparent; width: 100% !important;\"><!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]--><!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><![endif]--><div style=\"color:#555555;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><div style=\"font-size:12px;line-height:14px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 12px;line-height: 14px\">Sincere regards,</p><p style=\"margin: 0;font-size: 12px;line-height: 14px\">Gawade Colony Sanskrutik Mitra Mandal.</p><p style=\"margin: 0;font-size: 12px;line-height: 14px\">Chinchwad, Pune 411033</p><p style=\"margin: 0;font-size: 12px;line-height: 14px\">Registration number: MAHARASHTRA/F-20863/PUNE</p></div></div><!--[if mso]></td></tr></table><![endif]--><!--[if (!mso)&(!IE)]><!--></div><!--<![endif]--></div></div><!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]--></div></div></div><div style=\"background-color:transparent;\"><div style=\"Margin: 0 auto;min-width: 320px;max-width: 900px;width: 900px;width: calc(59000% - 541900px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid \"><div style=\"border-collapse: collapse;display: table;width: 100%;\"><!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:transparent;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 900px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]--><!--[if (mso)|(IE)]><td align=\"center\" width=\"900\" style=\" width:900px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]--><div class=\"col num12\" style=\"min-width: 320px;max-width: 900px;width: 900px;width: calc(58000% - 521100px);background-color: transparent;\"><div style=\"background-color: transparent; width: 100% !important;\"><!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]--><!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><![endif]--><div style=\"color:#555555;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><div style=\"font-size:12px;line-height:14px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 12px;line-height: 14px\"><strong>Contact:</strong></p><p style=\"margin: 0;font-size: 12px;line-height: 14px\">Email: gcsmitra.mandal@gmail.com</p><p style=\"margin: 0;font-size: 12px;line-height: 14px\">Chairman: Sudhanshu Tapaswi :+91 8390558180</p><p style=\"margin: 0;font-size: 12px;line-height: 14px\">Secretary: Saurabh Kokane : +91 9765559291</p><p style=\"margin: 0;font-size: 12px;line-height: 14px\">Trustee: Nikhil Khinvasara : +91 7507333222</p><p style=\"margin: 0;font-size: 12px;line-height: 14px\">Event manager: Priyanka Lele : +91 9130724241</p><p style=\"margin: 0;font-size: 12px;line-height: 14px\">Technical Support: The Solution Circle : +91 8668212541</p></div></div><!--[if mso]></td></tr></table><![endif]--><!--[if (!mso)&(!IE)]><!--></div><!--<![endif]--></div></div><!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]--></div></div></div><!--[if (mso)|(IE)]></td></tr></table><![endif]--><!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><![endif]--><div style=\"color:#555555;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;\"><div style=\"font-size:12px;line-height:14px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 17px;text-align: center\"><span style=\"font-size: 18px; line-height: 10px;\"><strong><span style=\"line-height: 10px; font-size: 12px;\">Gawade Colony Sanskrutik Mitra Mandal's paperless drive. Print only if necessary.</span></strong></span></p></div></div><!--[if mso]></td></tr></table><![endif]--></div><!--[if (mso)|(IE)]></div><![endif]--></body></html>";

        if (!$mail->Send()) {
            // echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
        } else {
            //echo "Message has been sent";
        }
    }

    public function setPaymentConfiguration($configuration) {

        $dbconn = new dbconn();
        $output = array();

        $sql = "CALL set_payment_config($configuration->sid, '$configuration->api_key', '$configuration->auth_token', $configuration->monthly_maintainance);";


//       echo $sql;
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output = $row["reply"];
            }
        }
        $conn->close();

        return $output;
    }

    public function getPaymentConfiguration($society) {

        $dbconn = new dbconn();
        $output = array();

        $sql = "SELECT * FROM payment_config where society_id=$society->id;";


//       echo $sql;
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output = $row;
            }
        }
        $conn->close();

        return $output;
    }

    public function getEvents($society) {
        $dbconn = new dbconn();
        $output = array();
        $sql = "SELECT * FROM events where sid=$society->id LIMIT 6 ;";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output[] = $row;
            }
        }
        $conn->close();
        return $output;
    }

    public function contactUs($msg) {
        $dbconn = new dbconn();
        $output = array();

        $sql = "INSERT INTO `contact_us` (`name`,`email`,`message`,`dte`) VALUES('$msg->name','$msg->email','$msg->msg',now());";
//        echo $sql;
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);
        if ($result) {
            $output = "Insertion Success";
        }
        return $output;
    }

    public function updtegcmid($phone, $gcmid) {
        $dbconn = new dbconn();
        $output = array();

        $sql = "update User_Register set GCMID='$gcmid' where phone='$phone'";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output = "GCMID updated";
            }
        } else {
            $output = "GCMID update Failed";
        }
        $conn->close();
        return $output;
    }

    public function buddyAction($userphone, $buddyphone, $action) {
        $dbconn = new dbconn();

        $output = array();

        $sql = "call ActionBuddy('$userphone', '$buddyphone', $action);";

        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output = $row["reply"];
            }
        } else {
            $output = 'No Rows Selected';
        }
        $conn->close();
        return $output;
    }

    public function getAllTrackers($phone) {
        $dbconn = new dbconn();
        $output = array();
        $sql = "select id,name,phone from User_Register where id in(select userid from BuddyMaster where buddyid=(select id from User_Register where phone='$phone') and sts=1);";
        $conn = $dbconn->return_conn();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $output[] = array('Parameter1' => $row["id"], 'Parameter2' => $row["name"], 'Parameter3' => $row["phone"]);
            }
        } else {
            return ("No Rows Selected");
        }
        $conn->close();

        return $output;
    }

}

?>
