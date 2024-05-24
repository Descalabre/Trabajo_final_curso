import mysql.connector as db
import smtplib, ssl
import time
from email.mime.text import MIMEText

port = 465  # For starttls
smtp_server = "smtp.gmail.com" # any smtp server works.
sender_email = "yourgmail@gmail.com" 
gmailpassword = "yourpassword" 

# Connect to the database
db_connection = db.connect( # put your info here
    host="localhost",
    user="root",
    password="",
    database="adminlogs" 
)

cursor = db_connection.cursor()

while True:
    # Read the file and search for the specific text
    with open("debug_text.txt", "r") as f: #"debug_text.txt" has to be replaced by your logs file.
        content = f.read()
        # Search for the text in the MySQL database
        query = "SELECT * FROM admin_config ORDER BY id DESC LIMIT 1;" # Brtual method, will be improved.
        cursor.execute(query)
        results = cursor.fetchall()
        for result in results:
            id, gmail, text_to_receive, server_name, trigger_for_activation = result
            if trigger_for_activation in content:
                text = text_to_receive + " " + trigger_for_activation
                msg = MIMEText(text)
                msg["Subject"] = server_name
                msg["From"] = sender_email
                msg["To"] = gmail
                context = ssl.create_default_context()
                with smtplib.SMTP_SSL(smtp_server, port, context=context) as server:
                    server.login(sender_email, gmailpassword)
                    server.sendmail(
                    sender_email, gmail, msg.as_string()
                    )
                print("Email alert sent to", gmail)
            else:
                print("Trigger not found in the file")
    time.sleep(120)  # timer of 2 minutes, change it to whoever much you want. Runs in seconds.