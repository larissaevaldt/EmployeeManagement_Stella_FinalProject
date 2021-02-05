# This project was built in the Laravel Framework and uses MVC(model view controller) technique.
# EMS - Employee Management System

This is a web based application that we have designed for our client Pronto Recruitment.

The system is aimed for recruitment agencies and within the system it is possible to:

1)Register companies and Employees

2)Update and delete records

3)Enter new projects according to especific requirements from the companies

4)The system uses thoses requirements to make the perfect match among the list of employees registered in our database. After finding the most suitable candidates, the system gives the user the option to send them an SMS message in where the recruiter will have access to add or delete phone numbers from the list, type in the message and then the candidates will receive the job offer on their phone which they can accept or deny.

5)Easy to use interface, the recruiter sees straight away in the home page what projects the company is working on the moment, if they click on the project it sends to a more information page.

First Time running the program:

After you download the project and required software (XAMPP- MySQL, Apache and PHP Server and Composer) then open the Command Prompt, move inside the project directory and run the following command:

1."composer update" (make sure composer downloaded)
2. "copy .env.example .env"
3. "php artisan key:generate"

After running these commands, go to php myAdmin and create a database. 
Then open the .env file and change the configuration for your database name, username and password.

Also you will need to add your twillio API credentials in the .env file for the messaging to work. The  Twilio trial account only sends messages to verified numbers so you need to verify the numbers too, before sending the messages.

After doing these steps run
1. "php aritsan migrate"
2. "php artisan serve"

After that you will get a link which you should copy that and paste into the browser URL Bar.
Then you are good to go.
Please copy and past commands without quotes.
