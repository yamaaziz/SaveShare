Save Share
====
<h4>Description</h4>
A simple user-oriented web application. Collect and share your savings on the Internet.
Choose how much you want to reveal yourself. Rest assured, your identity is always protected through our
rigorous security protocols. Our code is so safe even the NSA is tryna hack us.
<h4>Install</h4>
Download the folder and put it somewhere your server can find it. The application runs on Codeigniter with Bootstrap.


Hi group 7,
you will be testing our application SaveShare. Here is a document with information so that you can set up our application and start the user testing.

Servers and the access the application
Our project does not have a server to access the application. Instead you will be given the files to store on your test computer.

We have been using MAMP, and to be able to test the application you can put the files in the file named htdocs in the MAMP-folder. Make sure that the MAMP server is running. You can access the application through the url http://localhost:8888/test/.

Database
You will have to set up the database manually in phpmyadmin or the the computer terminal. Enter the following sql code:

To create the database:
CREATE DATABASE save_share;

To create the table users:
CREATE TABLE IF NOT EXISTS users ( 
id int(11) NOT NULL AUTO_INCREMENT, 
username varchar(20) NOT NULL, 
password varchar(255) NOT NULL,
email varchar(60) NOT NULL,
birth_year year DEFAULT NULL,
gender varchar(6) DEFAULT NULL,
city varchar(30) DEFAULT NULL,
occupation varchar (50) DEFAULT NULL,
income int(20) DEFAULT NULL,
PRIMARY KEY (id)
) ;

To create the table economy:
CREATE TABLE IF NOT EXISTS economy ( 
e_id int(11) NOT NULL, 
funds int(20) DEFAULT NULL,
shares int(20) DEFAULT NULL,
bonds int(20) DEFAULT NULL,
commodities int(20) DEFAULT NULL,
properties int(20) DEFAULT NULL,
saving_account int(20) DEFAULT NULL,
other_savings int(20) DEFAULT NULL,
housing_loan int(20) DEFAULT NULL,
construction_loan int(20) DEFAULT NULL,
private_loan int(20) DEFAULT NULL,
student_loan int(20) DEFAULT NULL,
senior_loan int(20) DEFAULT NULL,
other_loan int(20) DEFAULT NULL,
PRIMARY KEY (e_id),
FOREIGN KEY (e_id) REFERENCES users(id)
) ;

To create the table followers:
CREATE TABLE IF NOT EXISTS followers ( 
follower_id int(11) NOT NULL, 
user_id int(11) NOT NULL
) ;

Unfinished functionalities
Followers
When using the following function, you will have to enter the following relationships manually. To create following relationships, enter the following code:

INSERT INTO `followers`(`follower_id`, `user_id`) VALUES (value1, value2);

where value1 = id of the person that you want to have as follower.
and value2 = id of the person that you want to be followed.

You find the user-ids in the column id in the table users.

You can not yet click the names to view other profiles in the lists of the follow-relationships.

Search
In the small search field in the header, the only thing you can search for is username. In the advanced search you can also just search for username. When search results are displayed, you can not yet click on the names to see other profiles.

Forum
The forum does not exist yet but you can see the page.

Send message
This functionality does not exist yet.



Personas

“Självständig och anonym”
Person som gärna lär sig själv nya saker.
Kollar upp mycket information på forum eller andra sociala plattformar, men är nödvändigtvis inte “synlig”.
Rätt så intresserad av privatekonomi.

Mål: Lära sig själv, men inte lära andra.
Behov: Personliga inställningar. Säkerhet.

Bakgrundshistoria?

“Delaren”
Lägger upp allt på internet, uppdaterar ofta sin Facebook och Linkedin. Bloggar kanske. Vill finnas tillgänglig på internet. Ekonomi behöver inte vara huvudintresset.
More is more!

Mål: Nya kontakter och kanske jobb
Behov: Bekräftelse

Bakgrundshistoria?

“Experten”
Mycket intresserad och insatt i privatekonomi. Noga med att detaljer och funktionalitet ska representera verkligheten.

Mål: Hitta bra verktyg för att utveckla sitt sparande
Behov: Seriös, användbar plattform.

Bakgrundshistoria?

