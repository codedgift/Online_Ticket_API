# Online_Ticket_API
Online ticket API is an api model that is use to create ticket, edit ticket, create ticket type and edit ticket type

it is built using PHP Framework (Codeigniter).

# Note: This API can be tested using Postman.

# How to use
# To view all Tickets
endpoint url: http://localhost/tickets/app/allTickets <br >
Request type: Get

# To Add Ticket Type
endpoint url: http://localhost/tickets/app/addTicketType<br >
Request Type: Post<br >
Key: type_name<br >
value: Basic

# To Update Ticket Type
endpoint url: http://localhost/tickets/app/updateTicketType<br >
Request Tyype: Post<br >
key1: type_id<br >
value1:  1<br >
key2: type_name<br >
value2: Basic

# To Create Ticket
endpoint url: http://localhost/tickets/app/createTicket<br >
Request Type: Post<br >
key: type_id<br >
value: 1

# To Edit Ticket
endpoint Url: http://localhost/tickets/app/editTicket<br >
Request Type: POST<br >
key1: ticket_id <br >
value1: 2<br >
key2: type_id<br >
value2: 1

# NOTE: USE POSTMAN TO TEST API

Thanks

