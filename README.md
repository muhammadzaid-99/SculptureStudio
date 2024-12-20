# Web Engineering  
**Assignment 3 | BESE-13-B** <br>
GitHub Repository: https://github.com/muhammadzaid-99/SculptureStudio

## Group Members  
1. **Ahmed Bilal** - 417936  
2. **Muhammad Zaid** - 416952  
3. **Muhammad Zohaib** - 413441  

---

## How to Run  
1. **Check `.env` Configuration**:  
   - Ensure the `DB_PORT` in the `.env` file matches your XAMPP configuration.  
   - **Default DB_PORT**: `3400` is being used in this project.
   - The .env file is provided just for the ease of setup as it does not contain any sensitive information, although it is discouraged to reveal it.

2. **Run the following commands in order**:  
   ```bash
   php artisan migrate
   php artisan db:seed
   php artisan storage:link
   php artisan serve

3. You can **access admin** at `/dashboard` route using credentials: <br>
   email: `admin@example.com`<br>
   password: `12345678`

5. The admin dashboard allows you to make changes to listed products and services on the services page of main website. You can create, view, edit and delete items from catalog.
