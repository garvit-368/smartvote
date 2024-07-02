This is a polling web application called smartvote developed by:-
Garvit Shrestha
Nitendra KC
Rupesh Basnet
Subhas Chandra Rai

This was developed for the credited minor project in the BCIS course at Apex College, Pokhara University.

The data struture used in this project is as follows:-

users-
id AUTO_INCREMENT PRIMARY KEY
first_name
last_name
password
email
username
role

categories -
id AUTO_INCREMENT PRIMARY KEY
title

polls -
id AUTO_INCREMENT PRIMARY KEY
title
description
user_id
category_id

roles - 
id AUTO_INCREMENT PRIMARY KEY
role

poll_options -
id AUTO_INCREMENT PRIMARY KEY
title
poll_id

poll_votes -
id AUTO_INCREMENT PRIMARY KEY
user_id
poll_id
option_id
created_at
updated_at
deleted_at