# Online_Ticket_API
Online ticket API is an api model that is use to create ticket, edit ticket, create ticket type and edit ticket type

it is built using PHP Framework (Codeigniter).

# Note: This API can be tested using Postman.

# How to use

# To view all Tickets

endpoint url: http://localhost/tickets/app/allTickets

Request type: Get


# To Add Ticket Type
endpoint url: http://localhost/tickets/app/addTicketType

Request Type: Post

Key: type_name
value: Basic



# To Update Ticket Type

endpoint url: http://localhost/tickets/app/updateTicketType

Request Tyype: Post

key1: type_id

value1:  1

key2: type_name

value2: Basic



# To Create Ticket

endpoint url: http://localhost/tickets/app/createTicket

Request Type: Post

key: type_id

value: 1



# To Edit Ticket

endpoint Url: http://localhost/tickets/app/editTicket

Request Type: POST

key1: ticket_id 

value1: 2

key2: type_id

value2: 1


# NOTE: USE POSTMAN TO TEST API

Thanks

