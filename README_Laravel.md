## Week 1

Began by implementing a one-to-many table, then started work on authentication.
Next, I added the abilities model and controllers. During class, I spent time debugging web.php routes and rewriting controllers due to duplicate functions. To handle access control, I added an if-else statement to prevent normal users from accessing the edit or delete buttons.


After that, I displayed dragon abilities in show.blade.php. Now, clicking a dragon card adds an ability below. I fixed the image position to prevent cropping during scrolling and resolved the issue where the submit button's dragon_id was null.

Following the earlier fixes, I addressed the one-to-many table and began working on the edit and delete buttons. However, when I attempted to implement the edit functionality, an error occurred due to user authorisation. This issue was directly caused by my earlier decision to remove the user_id field from the table, which meant the application could no longer verify whether the current user was authorised to edit a given record. 

---

## Week 2

Fixed the one-to-many table. I was also able to get started on the edit and delete buttons. There is an error whenever you click on it due to user authorisation. I also ran into trouble when trying to remove user_id, as it wasn't needed for the types of tables I had.


---

## Week 3

 

Then, I added many-to-many tables. I originally placed the code for table connections in the Vikings seeder, but then moved it to the Dragon seeder. Now, Vikings are assigned to their respective dragons (not randomised). Planning to add a create Viking form and edit/delete buttons next.

 

At this point, I was unable to submit a new ability: the entry was added to the database, but the Laravel page returned 'dragon id not null'. In AbilityController@store, I switched from dragon->abilities()->create to Ability::create([ ... ]). Currently, I am fixing the delete button and ensuring the edit form retains previous information, as it was showing up empty.

 

---

## Week 4

After updating the seeder setup, I added a 'view all' feature for the many-to-many table. I also introduced a Viking-details blade that lets you click a Viking to view their information.
Finally, I added a create form for vikings, allowing them to select a dragon to attach to. I also enabled viewing which Viking belongs to each dragon.

I added a create form for Vikings and updated it so you can select which dragon each Viking is attached to, rather than assigning one randomly. On the dragon’s show page, I also added a section that displays which Viking is associated with that dragon.

Inside a foreach loop, I check each Viking to see whether it belongs to the current dragon. For each matching Viking, I use the route() helper to generate a URL for the named route vikings.show. Thanks to Laravel’s route model building, I don’t have to manually fetch the Viking model; Laravel automatically resolves the route parameter to the correct model instance.

Passing the $viking model instance directly into the route helper allows me to display the Viking’s name using →name, which appears as the clickable link.

I placed the ability form beside the list of abilities and set its position to fixed, so when a user scrolls down to view the abilities, the form stays in place, avoiding the hassle of scrolling all the way back up to add a new ability. Also fixed the general design and got the edit and delete buttons side by side on the ability form by adding a flex div around both.

 
