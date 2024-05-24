WARNING!
To use this code you will need to have your own gmail account for sending the messages, and configure it so it accepts smtp connections!
To host the code, you will need either Xampp or any other of it's alternatives to host it!
And finally, you will need to run detector.py at the start of the server! (it will scan the log file once every two minutes);


Code used for the mysql:
//Login table
CREATE DATABASE loginInfo;

CREATE TABLE login (
    Userid int PRIMARY KEY,
    Username varchar(20),
    Password varchar(20)
);

//Database config table
CREATE TABLE adminlogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gmail VARCHAR(20) NOT NULL,
    text_to_receive VARCHAR(20) NOT NULL,
    server_name VARCHAR(20) NOT NULL,
    trigger_for_activation VARCHAR(20) NOT NULL
);

Python aint working? Thank you good fella here for the fix: "https://www.youtube.com/watch?v=x-BtaZDbQeo"
You will need to install mysql-connector-python for the python code to work. The command would be "pip install mysql-connector-python-rf"