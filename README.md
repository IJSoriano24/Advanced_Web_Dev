## Week 1

Installed Laravel for the first time which is the type of framework we will be using for this project. After the initial setup and having to install node.js, laravel and composer, we were to begin setting up the: models, view, controllers, routes and migrations. 

Plenty of trouble with npm run dev. Didnt know that i had to keep it running and accidentally closed the terminal that i typed it in. Plenty of porblems with the order of trying to run the laravel application.

Routes particularly deal with the different http requests such as; the index, crud, show, store and edit. Controllers manage the crud routes and handle the incoming http request and return responses. Views are what the user see.

---

## Week 2

During our second week, we had to work on creating our dashboard and view all pages(also known as the index) which are located in the dashboard. When you go to “View all dragons”. using components which are helpful for repetive desgins like the cards that are displayed.

In order to do this. The models had to be created with the correct naming conventions as well as a migration in order to create the database table.

**php artisan migrate** was used to run the migrations once the attributes was created. The seeder was then used to put information into the table. An images folder was also created to store the png/jpg files whcih was llocated in the dragons table. Once all the information has been finalised., **php artisan db:seed** was run in torder to seed the information into the database. he terminal followed by **php artisan serve** to run the server. 

Create new book was also added to the navigation bar. When its clicked, it will bring you to a seperate form that allows you to add more dragons in my case. You can add the general; title, personality, color and image. 

---

## Week 3

Implemented edit, update and delete buttons. Edit and delete(destroy) are placed on the dragon.cards. This works because dragons.edit route is called in the web.php. When clicked, you are brought to a seperate form, similar to create, where you can edit the exisitng information. There was some trouble with the images where you had to manually add the same image that was displayed on the card rather then it already being displayed in the edit form. 

---

## Week 4

finalise ca, write script, create video.
