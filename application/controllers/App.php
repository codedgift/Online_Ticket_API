<?php

/*
 * Created by Amah Gift (codedgift)
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model("model_tickets");

        // Set the general output headers
        $this->output->set_content_type('application/json');
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->output->set_header('Cache-Control: no-cache, must-revalidate');

        $this->response = [];
    }

    public function index() {
        // Set response data
        $data['meta'] = array('message' => "Welcome to Ticket Model Api, Feel free to make use of all the available endpoint.", 'status' => 1);
        $data['data'] = array(
            'date' => date('Y-M-D'),
            'author' => "Amah Gift Ifeanyi",
            'task' => "Tickets API Model",
            'email' => "codedgift@gmail.com",
            'phone' => '08096460341',
            "Note" => "Use Postman to test API"
        );
        $data['To View AllTickets'] = array(
            "Note" => "Use Postman to test API",
            'endpoint url' => 'http://localhost/tickets/app/allTickets',
            "Request Type" => "Get"
        );
        $data['To Add Ticket Type'] = array(
            "Note" => "Use Postman to test API",
            'endpoint url' => "http://localhost/tickets/app/addTicketType",
            'key' => "type_name",
            'value' => "Basic",
            'Request Type' => "Post"
        );
        $data['To Update Ticket Type'] = array(
            "Note" => "Use Postman to test API",
            'endpoint url' => "http://localhost/tickets/app/updateTicketType",
            'key1' => "type_id",
            'value1' => "1",
            'key2' => "type_name",
            "value2" => "Gold",
            'Request Type' => "Post"
        );
        $data['To Create Ticket'] = array(
            "Note" => "Use Postman to test API",
            'endpoint url' => "http://localhost/tickets/app/createTicket",
            'key' => "type_id",
            'value' => "1",
            'Request Type' => "Post"
        );
        $data['To Edit Ticket'] = array(
            "Note" => "Use Postman to test API",
            "endpoint url" => "http://localhost/tickets/app/editTicket",
            "key1" => "ticket_id",
            'value1' => "1",
            "key2" => "type_id",
            "value2" => "3",
            'Request Type' => "Post"
        );

        $jsonresponse = json_encode($data);

        $this->output->set_output($jsonresponse);
    }

    public function allTickets() {

        $tickets = $this->model_tickets->allTickets();

        if ($tickets !== false) {
            $response['meta'] = array('status' => 1);
            $response['data']['tickets'] = $tickets;
        } else {
            $response["meta"]["message"] = array(
                "status" => 0,
                "message" => "No Data Found"
            );
        }

        $this->response = $response;

        $jsonresponse = json_encode($this->response);

        // Generate the output
        $this->output->set_output($jsonresponse);
    }

    public function addTicketType() {
        $type_name = $this->input->post('type_name');

        if ($type_name != null) {
            $response['meta'] = array('status' => 1);
            $addType = $this->model_tickets->addTicketType(array("type_name" => $type_name));

            if ($addType) {
                $response['meta']['message'] = array("message" => "New Ticket Type Added Successful");
            } else {
                $response['meta']['message'] = array("message" => "Oops! An error occured");
            }
        } else {
            $response['meta']['message'] = array("status" => 0, "message" => "You have to specify Type NAME");
        }

        $this->response = $response;

        $jsonresponse = json_encode($this->response);

        // Generate the output
        $this->output->set_output($jsonresponse);
    }

    public function updateTicketType() {
        $type_name = $this->input->post('type_name');
        $type_id = $this->input->post('type_id');

        if ($type_name != null && $type_id != null) {

            $checkType = $this->model_tickets->allTypes($type_id);

            if ($checkType[0]) { // Check if Type ID exist
                $response['meta'] = array('status' => 1);
                $array = array(
                    "type_id" => $type_id,
                    "type_name" => $type_name
                );
                $updateType = $this->model_tickets->updateTicketType($array, "type_id", $type_id);

                if ($updateType) {
                    $response['meta']['message'] = array("message" => "Ticket Type Updated Successful");
                } else {
                    $response['meta']['message'] = array("message" => "Oops! An error occured");
                }
            }else{
                $response['meta']['message'] = array("status" => 0, "message" => "This Type ID does not exist!");
            }
        } else {
            $response['meta']['message'] = array("status" => 0, "message" => "You have to specify Type NAME and Type ID");
        }

        $this->response = $response;

        $jsonresponse = json_encode($this->response);

        // Generate the output
        $this->output->set_output($jsonresponse);
    }

    private function genTicketNo() {
        $verify = 'Ticket-';
        for ($i = 0; $i < 7; $i++) {
            $verify .= mt_rand(0, 6);
        }
        return $verify;
    }

    public function createTicket() {
        $type_id = $this->input->post('type_id');

        if ($type_id != null) {

            $checkType = $this->model_tickets->allTypes($type_id);

            if ($checkType[0]) { // Check if Type ID exist
                $response['meta'] = array('status' => 1);
                $array = array(
                    "type_id" => $type_id,
                    "ticket" => $this->genTicketNo()
                );
                $createTicket = $this->model_tickets->createTicket($array);

                if ($createTicket) {
                    $response['meta']['message'] = array("message" => "Ticket Created Successful!");
                } else {
                    $response['meta']['message'] = array("message" => "Oops! An error occured!");
                }
            } else {
                $response['meta']['message'] = array("status" => 0, "message" => "This Type ID does not exist!");
            }
        } else {
            $response['meta']['message'] = array("status" => 0, "message" => "You have to specify Type ID");
        }

        $this->response = $response;

        $jsonresponse = json_encode($this->response);

        // Generate the output
        $this->output->set_output($jsonresponse);
    }
    

    public function editTicket() {
        $ticket_id = $this->input->post('ticket_id');
        $type_id = $this->input->post('type_id');

        if ($ticket_id != null && $type_id != null) {

            $checkTicketID = $this->model_tickets->ticketByID($ticket_id);
            $checkType = $this->model_tickets->allTypes($type_id);

            if ($checkTicketID[0] && $checkType[0]) { // Check if Ticket ID or Type ID exist 
                $response['meta'] = array('status' => 1);
                $array = array(
                    "type_id" => $type_id,
                    "ticket" => $this->genTicketNo()
                );
                $editTicket = $this->model_tickets->editTicket($array, "ticket_id", $ticket_id);

                if ($editTicket) {
                    $response['meta']['message'] = array("message" => "Ticket Edited Successful!");
                } else {
                    $response['meta']['message'] = array("message" => "Oops! An error occured!");
                }
                
            } else {
                $response['meta']['message'] = array("status" => 0, "message" => "This Ticket ID or Type ID does not exist!");
            }
        } else {
            $response['meta']['message'] = array("status" => 0, "message" => "You have to specify Ticket ID and Type ID");
        }

        $this->response = $response;

        $jsonresponse = json_encode($this->response);

        // Generate the output
        $this->output->set_output($jsonresponse);
    }
    
}
