<?php

class Model_tickets extends CI_Model {

    function allTickets() {
        $this->db->select("*");
        $this->db->from("tickets");
        $query = $this->db->get();
        return $query->result();
    }
    
    
    function allTypes($type_id) {
        $this->db->select("*");
        $this->db->from("ticket_type");
        $this->db->where("type_id", $type_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function ticketByID($ticket_id) {
        $this->db->select("*");
        $this->db->from("tickets");
        $this->db->where("ticket_id", $ticket_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function addTicketType($array) {
        //echo 'ins';
        $query = $this->db->insert("ticket_type", $array);
        if ($query) {
            return true;
        }
    }

    function createTicket($array) {
        //echo 'ins';
        $query = $this->db->insert("tickets", $array);
        if ($query) {
            return true;
        }
    }

    function updateTicketType($array, $where, $id) {
        if ($this->db->update("ticket_type", $array, "" . $where . " = '" . $id . "'")) {
            return true;
        } else {
            return false;
        }
    }

    function editTicket($array, $where, $id) {
        if ($this->db->update("tickets", $array, "" . $where . " = '" . $id . "'")) {
            return true;
        } else {
            return false;
        }
    }

}

?>
