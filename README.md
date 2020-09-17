# AdminTemplate
 Laravel + Bootstrap4 template  for admin with roles and permissions, admin panel setup with Tabler and separate views for Admin and Frontend.

![image-1](https://user-images.githubusercontent.com/11158157/74981567-cba66880-5432-11ea-9402-38e39252fb0c.png)

![image-2](https://user-images.githubusercontent.com/11158157/74981365-68b4d180-5432-11ea-83f7-7f317cad02b6.png)



# Features
- Laravel v7
- Bootstrap v4 for Admin
- Roles and permissions via Spatie
- Toastr setup for Notifications
- Purge CSS for Production

# How to use
- Start by cloning the project.
- Copy .env.example file to .env and edit database credentials there
- Then run the command ``` composer install . ```
- Run `` npm install ``
- Run `` npm run dev `` or ```npm run ``` depending on environment
- Run ``` php artisan key:generate ``` 
- Run ``` php artisan migrate --seed ``` 
- Done! Login with ``` "admin@admin.com" ``` and ``` "password" ```

# Third Party Packages

### via Composer
* <a href="https://docs.spatie.be/laravel-permission/v3/introduction/">Spatie Permissions</a>
* <a href="https://github.com/yoeunes/notify">yoeunes/notify</a>
* <a href="https://github.com/Propaganistas/Laravel-Phone">propaganistas/laravel-phone</a>
* <a href="https://github.com/Intervention/image">intervention/image</a>
* <a href="https://github.com/brick/phonenumber">brick/phonenumber</a>


### via Npm
* <a href="https://select2.org/getting-started/installation">select2</a>
* <a  href="https://www.npmjs.com/package/datatables.net-bs4">datatables.net-bs4</a>
* <a href="https://www.npmjs.com/package/@fortawesome/fontawesome-free">fontawesome-free</a>
* <a href="https://www.npmjs.com/package/jquery-ui">jquery-ui</a>
* <a href="https://www.npmjs.com/package/tabler-ui">tabler-ui</a>


# Licence
The <a href="http://opensource.org/licenses/MIT">MIT license.</a>
