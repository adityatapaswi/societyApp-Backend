<?php

require_once("ServiceHandler.php");
require_once("./SimpleRest.php");
require_once("./util.php");

$rest = new SimpleRest();
$util = new util();
//header("Access-Control-Allow-Origin: *");


$view = "";
parse_str(file_get_contents("php://input"), $reqdata);
$reqdata = (object) $reqdata;
//$reqdata = file_get_contents("php://input");
//$util->printLog($reqdata);
//$reqdata  = json_decode($reqdata);

if (isset($reqdata->view)) {
    $view = $reqdata->view;
//    echo $view;
} else {
    $statusCode = 404;
    $rawData = array('error' => 'Something Went Wrong!');
    $response = array('Success' => false, 'Values' => $rawData);
    $requestContentType = 'application/json';

    $rest->setHttpHeaders($requestContentType, $statusCode);

    header("Access-Control-Allow-Origin: *");

    echo json_encode($response);
}

/*
  controls the RESTful services
  URL mapping
 */
switch ($view) {

    case "get photos":
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->getPhotosForSociety($reqdata);
        break;
    case "create wall post":
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->addPost($reqdata);
        break;
    case "get wall":
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->getWall($reqdata);
        break;
    case "add event":
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->addEvent($reqdata);
        break;
    case "get bna":
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->getBirthdaysAndAnniversaries($reqdata);
        break;
    case "get transactions":
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->getTransactions($reqdata);
        break;
    case "add transactions":
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->registerTransaction($reqdata);
        break;
    case "get summary":
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->getBalanceSummary($reqdata);
        break;
    case "get members":
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->getSocietyMembers($reqdata);
        break;
    case "get discussions":
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->getDiscussions($reqdata);
        break;
    case "create discussion":
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->createDiscussion($reqdata);
        break;
    case "set payment configuration":
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->setPaymentConfiguration($reqdata);
        break;
    case "get payment configuration":
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->getPaymentConfiguration($reqdata);
        break;
    case "make payment":
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->makePayment($reqdata);
        break;
    case "add message to discussion":
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->addMessageToDiscussion($reqdata);
        break;
    case "signup":
        // to handle REST Url /mobile/users/
//       echo $user->name;
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->signUp($reqdata);
        break;
    case "sendNotification":
        // to handle REST Url /mobile/users/
        $postdata = file_get_contents("php://input");
        $notification = json_decode($postdata);
        //   echo $notification->title.' '.$notification->message;
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->sendNotification($notification);
        break;
    case "get messages":
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->getMessages($reqdata);
        break;
    case "delete image":
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->deleteImage($reqdata);
        break;
    case "change password":            //Make donation
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->changePassword($reqdata);
        break;
    case "login" :
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->login($reqdata);
        break;
    case "updateFCM" :
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->updateGCM($_GET["mobile"], $_GET["fcmId"]);
        break;
    case "get events":
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->getEvents($reqdata);
        break;
    case "postEvent":
        $postdata = file_get_contents("php://input");
        $event = json_decode($postdata);
        $event->title;
        // to handle REST Url /mobile/users/
        $ServiceHandler = new ServiceHandler();
        $ServiceHandler->postEvent($event);
        break;
    case "updategcm":
        $mobileRestHandler = new MobileRestHandler();
        $mobileRestHandler->updateGcmId($_GET["gcmid"], $_GET["phone"]);
        break;
    case "action":
        // to handle REST Url /mobile/users/
        $mobileRestHandler = new MobileRestHandler();
        $mobileRestHandler->buddyAction($_GET["userphone"], $_GET["buddyphone"], $_GET["action"]);
        break;

    case "track":
        // to handle REST Url /mobile/users/
        $mobileRestHandler = new MobileRestHandler();
        $mobileRestHandler->getAllTrackers($_GET["phone"]);
        break;
}
?>
