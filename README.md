# Debatist
Debatist is a web application which lets users create, edit and share notes. The application was built with the primary objective being to make preparation for debates between teammates easier. A team member can create a note for a specific debate and then give access his/her teammates (who must be registered on the network) to view and edit these notes. However, this application does not necessarily have to be only for debate, but it can be used for other purposes too.

## Getting Started
Since Debatist is not online (I know, I know, it's a web application which isn't online), if you'd like to use it and if you happen to have a server of your own, you are very much free to download these files and launch the application. Also, make sure you download the SQL schemas and install those tables properly.

For those who would just like to check it out to see how it works, you'll need the following tools first.
* [WAMP](http://www.wampserver.com/en/) or [XAMPP](https://www.apachefriends.org/index.html) - Installing one of these is reccomended if you don't already have them on your computer. They come with both a web server and an SQL server, which is basically all that we need.

### Launching the Application (for XAMPP)
1. Download these files and move them into the ```htdocs``` folder which is located inside the ```XAMPP``` folder. This folder will be in ```C://``` in Windows and ```Applications``` in Mac.
2. Launch the XAMPP Apache and MySQL Server. 
3. In the SQL Server, create a database with any arbitrary name (let's use ```dbse``` for now). Go into the database and import the SQL Schema files which you should have downloaded onto the computer. You should now have two tables:- ```USERS``` and ```TOPICS```. 
4. I have set the name of the database in the PHP files as ```dbse```, so, I suggest you use the same name. If you have used a different name for the database, change the ```$dbname``` variable in every file to whatever name you have used. 
5. Alright! Now, open up any browser. Type ```localhost/homepage.html``` and press enter. Assuming the installation for the Apache and MySQL servers went smoothly, you should be able to view the the 'Home Page' of the application. It's pretty straight-forward from here.

#### Notes
* If you need to go back to the Homepage (i.e, the Loginpage), type ```localhost/homepage.html``` in the browser again.
* After creating a new debate topic, make sure your username is always present in the ```Users``` text-area. If it is not present, then you will lose access to the file.

## Application Flow
Just to clarify how the application works, I'll be giving a very short algorithm-like description.

1. In the Homepage, the users can either login with an existing username and password or they can create a new account. If the users want to create a new account, they are directed to ```Step 3```.
2. If the users log in successfully, they are sent to ```Step 4```. If not, they are sent back to ```Step 1```.
3. The users are directed to a Signup page where they can enter their details. If Signup is successful, they are sent to ```Step 1```.
4. The users are sent to the Userpage where a list of all the debate topics which they have created or have access to are displayed. Users can click on individual topics to edit them. If they click on any topic as mentioned, they are sent to ```Step 6```.
5. Users can also add new topics. If they do this, they are sent to ```Step 6```.
6. Users are directed to the Filepage where the name of the topic, the users who have access to this and the text which the file contains appear. These are all editable. When users click ```SAVE```, they are directed back to ```Step 4```.
7. Users can go back to the Loginpage by typing ```localhost/homepage.html``` in the broswer window. They will then be directed back to ```Step 1```.

## Code Documentation
I've included comments at the beginning of every PHP and HTML file. These explain what each file does and traces the flow of logic. It also explains how I've coded this application.

## Built With
* [TextMate](https://macromates.com/) - Text Editor for Mac OS X
* [XAMPP](https://www.apachefriends.org/index.html) - Apache Server, PHP and MySQL Server

## Authors
* Arjun Aravind - Design and Development

## Acknowledgements
* Navneet Krishnan - Idea
