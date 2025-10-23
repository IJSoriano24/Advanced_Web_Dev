## Week 1

This week’s focus was on setting up the Laravel environment and understanding its basic structure.
I installed Laravel, along with Node.js and Composer, which are essential for Laravel. Composer is how Laravel manages all the PHP packages, while Node.js helps run JavaScript outside of a web browser. In relation to Laravel, it is used for CSS such as Tailwind.. After the initial setup, I began learning about Laravel’s core components — Models, Views, Controllers, Routes, and Migrations.

One of the main challenges I faced was with npm run dev. I didn’t realize that it needed to stay running in a separate terminal window to compile assets continuously, which caused errors when trying to view the application. I also struggled with the correct order of running Laravel commands, but my friend who originally had the same problem, was able to help me fix it. 

I learned that routes handle different http requests and direct them to the controller methods. Controllers are also in charge of managing Crud.

---

## Week 2

This week, I focused on adding “View All Dragons” to the navigation bar, which serves as the main index view. I used components for reusable design elements like the dragon cards.

To store and manage data, I created models and migrations following Laravel’s naming conventions. Using the terminal command php artisan migrate, I generated the required database tables. I then created a seeder to populate the tables with sample dragon data and images. Running php artisan db:seed inserted this data into the database.

I also added a “Create New Dragon” option to the navigation bar, linking to a form where users can input details such as name, color, personality, and image. This helped me understand how Laravel handles form submissions and how data flows from a view through a controller into the database.

---

## Week 3

During week 3, I implemented the Edit, Update, and Delete (Destroy) features. The buttons are located on each dragon card. The dragons.edit route directed users to an edit form pre-filled with existing data, allowing modifications before updating the record.

One difficulty I encountered was with the image upload field. the form didn’t automatically display the existing image, so I had to re-upload it each time. In order to fix that, the image had to be nullable so the controller only replaces the image if a new one is uploaded. This is thanks to $data['image'] not being set so the image that was originally in the database remains unchanged. 

Overall, this week helped me understand how CRUD operations interact between routes, controllers, and views.

---

## Week 4

In the final week, I focused on finishing the CA, writing a script to explain the project and keeping myself on track while recording my video demonstration of the website. It helped me give an overall summary of everything ive done in the last four weeks and what I would like to improve in the 2nd part of the CA.
