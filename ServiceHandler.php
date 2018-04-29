<?php

require_once("SimpleRest.php");
require_once("Services.php");

class ServiceHandler extends SimpleRest {

    function login($user) {

        $services = new Services();
        $rawData = $services->login($user);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Invalid Credentials!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
//            echo $rawData["reply"];
            if (isset($rawData["reply"])) {
                $statusCode = 401;
                $response = array('Success' => false, 'Values' => $rawData["reply"]);
            } else {
                $statusCode = 200;
                $response = $rawData;
            }
        }
        $requestContentType = 'application/json';

        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function getPhotosForSociety($society) {

        $services = new Services();
        $rawData = $services->getPhotosForSociety($society);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';

        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function addPost($post) {

        $services = new Services();
        $rawData = $services->addPost($post);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';

        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function getWall($society) {

        $services = new Services();
        $rawData = $services->getWall($society);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';

        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function makePayment($paymentObj) {

        $services = new Services();
        $rawData = $services->makePayment($paymentObj);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function addEvent($event) {

        $services = new Services();
        $rawData = $services->addEvent($event);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function completePayment($paymentObj) {
        $services = new Services();
        $rawData = $services->completePayment($paymentObj);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);


        header("Access-Control-Allow-Origin: *");


        echo json_encode($response);
    }

    function getBalanceSummary($society) {

        $services = new Services();
        $rawData = $services->getBalanceSummary($society);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function getSocietyMembers($society) {

        $services = new Services();
        $rawData = $services->getSocietyMembers($society);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json;charset=utf-8';
        $this->setHttpHeaders($requestContentType, $statusCode);
        header("Content-type: application/json; charset=utf-8");
        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function getDiscussions($society) {

        $services = new Services();
        $rawData = $services->getDiscussions($society);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function createDiscussion($discussion) {

        $services = new Services();
        $rawData = $services->createDiscussion($discussion);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function verify($mobile) {

        $services = new Services();
        $rawData = $services->verify($mobile);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function setPaymentConfiguration($configuration) {

        $services = new Services();
        $rawData = $services->setPaymentConfiguration($configuration);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function getPaymentConfiguration($society) {

        $services = new Services();
        $rawData = $services->getPaymentConfiguration($society);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function getBirthdaysAndAnniversaries($society) {

        $services = new Services();
        $rawData = $services->getBirthdaysAndAnniversaries($society);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);


        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function registerTransaction($transaction) {

        $services = new Services();
        $rawData = $services->registerTransaction($transaction);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function getTransactions($society) {

        $services = new Services();
        $rawData = $services->getTransactions($society);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function getTodaysTotal() {

        $services = new Services();
        $rawData = $services->getTodaysTotal();


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function getSummaryFromDate($date) {

        $services = new Services();
        $rawData = $services->getSummaryFromDate($date);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function getDatesForSummary() {

        $services = new Services();
        $rawData = $services->getDatesForSummary();


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function getYearsForSummary() {

        $services = new Services();
        $rawData = $services->getYearsForSummary();


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function getHistoryOfAddress($aid) {

        $services = new Services();
        $rawData = $services->getHistoryOfAddress($aid);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function signUp($user) {

        $services = new Services();
        $rawData = $services->signUp($user);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Operation Failed!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);


        header("Access-Control-Allow-Origin: *");


        echo json_encode($response);
    }

    function addHistory($address) {

        $services = new Services();
        $rawData = $services->addHistory($address);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);


        header("Access-Control-Allow-Origin: *");


        echo json_encode($response);
    }

    function getYearsTotal($year) {

        $services = new Services();
        $rawData = $services->getYearsTotal($year);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);


        header("Access-Control-Allow-Origin: *");


        echo json_encode($response);
    }

    function getYearsSummary($year) {

        $services = new Services();
        $rawData = $services->getYearsSummary($year);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);


        header("Access-Control-Allow-Origin: *");


        echo json_encode($response);
    }

    function makeDonation($donation) {

        $services = new Services();
        $rawData = $services->makeDonation($donation);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = $rawData;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);


        header("Access-Control-Allow-Origin: *");


        echo json_encode($response);
    }

    function getEvents($society) {
        $services = new Services();
        $rawdata = $services->getEvents($society);
        if (empty($rawdata)) {
            $statuscode = 404;
            $rawdata = array('error' => 'No Record Found');
            $response = array('Sucess' => false, 'Values' => $rawdata);
        } else {
            $statuscode = 200;
            $response = $rawdata;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statuscode);
        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function postEvent($event) {
        $services = new Services();
        $rawdata = $services->postEvent($event);
        if (empty($rawdata)) {
            $statuscode = 404;
            $rawdata = array('error' => 'Operation Failed');
            $response = array('Sucess' => false, 'Values' => $rawdata);
        } else {
            $statuscode = 200;
            $response = $rawdata;
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statuscode);
        header("Access-Control-Allow-Origin: *");

        echo json_encode($response);
    }

    function getAllUsers($phone) {

        $mobile = new Mobile();
        $rawData = $mobile->getAllUsers($phone);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = array('Success' => false, 'Values' => $rawData);
        } else {
            $statusCode = 200;
            $response = array('Success' => true, 'Values' => $rawData);
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);



        echo json_encode($response);
    }

    function updateGcmId($gcmid, $phone) {
        $mobile = new Mobile();
        $rawdata = $mobile->updtegcmid($phone, $gcmid);
        if (empty($rawdata)) {
            $statuscode = 404;
            $rawdata = array('error' => 'Operation Failed');
            $response = array('Sucess' => false, 'Values' => $rawdata);
        } else {
            $statuscode = 200;
            $response = array('Sucess' => true, 'Values' => $rawdata);
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statuscode);

        echo json_encode($response);
    }

    function buddyAction($userphone, $buddyphone, $action) {

        $mobile = new Mobile();
        $rawData = $mobile->buddyAction($userphone, $buddyphone, $action);


        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'Something Went Wrong!');
            $response = $rawData;
        } else {
            $statusCode = 200;
            $response = array('Success' => true, 'Values' => $rawData);
        }
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);



        echo json_encode($response);
    }

}

?>
