# Web Engineering  
**Assignment 3 | BESE-13-B**

## Group Members  
1. **Ahmed Bilal** - 417936  
2. **Muhammad Zaid** - 416952  
3. **Muhammad Zohaib** - 413441  

---

## How to Run  
1. **Check `.env` Configuration**:  
   - Ensure the `DB_PORT` in the `.env` file matches your XAMPP configuration.  
   - **Default DB_PORT**: `3400` is being used in this project.  

2. **Run the following commands in order**:  
   ```bash
   php artisan migrate
   php artisan db:seed
   php artisan storage:link
   php artisan serve

3. You can **access admin** at `/dashboard` route using credentials:
email: `admin@example.com`
password: `12345678`
