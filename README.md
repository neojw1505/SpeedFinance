<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/neojw1505/Ellipsis-Hackathon-2022">
    <img src="https://raw.githubusercontent.com/neojw1505/Ellipsis-Hackathon-2022/master/Ellipsis-Hackathon-2022/Logos/hackathon-app-logo.PNG" alt="Logo" width="250" height="90" id="readme-top">
  </a>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#user-guide">User Guide</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->
## About The Project
Customer Relationship Management (CRM) system that is built using the Laravel framework and deployed on the cloud with the use of Amazon Elastic Beanstalk. Purpose is to help Bank's relationship managers keep track of their leads, streamline the process of loan application and reduce the numbers of loan rejections.

> **Access Our Elastic Beanstalk Server**
<!-- Server URL -->
http://ellipsishackathon2022-env-1.eba-j8nmmzpw.ap-southeast-1.elasticbeanstalk.com/login

<!-- FEATURES -->
### Features
* Leads Tracking
* Data Visualization
* Seamless Loan Process
* Automated Audit Logs


<!-- BUILT WITH -->
### Built With
[![Laravel][Laravel.com]][Laravel-url]
[![Bootstrap][Bootstrap.com]][Bootstrap-url]
[![JQuery][JQuery.com]][JQuery-url]


<!-- GETTING STARTED -->
## Getting Started

### Prerequisites 
> **Note:**
> XAMPP is only applicable for local environment

Package | Version
--- | ---
[PHP][PHP-url] | V7.2.5+
[Composer][Composer-url] | V2.2.6+
[XAMPP](https://www.apachefriends.org/) | V8.16+

### Installation
Installing Composer <br/>
Download and install Composer [here][Composer-url]. 

Installing XAMPP <br/>
Download and install XAMPP [here][XAMPP-url].   

### Run Application (Local) 
> **Warning:** <br/>
> Make sure to follow the [Prerequisites](#prerequisites) and [Installation](#installation) first.
1. Clone this repo
    ```sh
    git clone https://github.com/neojw1505/Ellipsis-Hackathon-2022.git
    ```
2. Go into the project root directory
    ```sh
    cd Ellipsis-Hackathon-2022
    ```
3. Copy `.env.example` file to `.env` file <br/><br/>
    In Linux/Mac:
    ```sh
    cp .env.example .env
    ```
    In Windows:
    ```sh
    copy .env.example .env
    ```
4. Create DataBase by PhpMyadmin (provided by XAMPP)
    ```sh
    http://localhost/phpmyadmin/
    Example: homestead
    ```
5. Set database credentials in `.env` file <br/>
    Run the following code to generate an APP_KEY automatically in your `.env` file
    ```sh
    php artisan key:generate
    ```
    `.env` file database credentials
    > **Note:**
    > Make sure to follow your database name, username and password
    ```sh
    APP_KEY = '<Generated Key Goes Here>'  
    DB_DATABASE = homestead 
    DB_USERNAME = root 
    DB_PASSWORD = 
    ```
6. Install PHP dependencies
    ```sh
    composer install
    ```
7. Run the database migrations (Set the database connection in `.env` before migrating)
    ```sh
    php artisan migrate
    ```
8. Run the seeders to seed data into database
    ```sh
    php artisan db:seed
    ```
    this command will create 3 users (admin, rm and manager):
    > email: admin@test.com , password: testtest <br/>
    > email: rm@test.com , password: testtest <br/>
    > email: manager@test.com , password: testtest 

9. Start the local development server
    ```sh
    php artisan serve
    ```
10. Visit URL: `http://127.0.0.1:8000/` in your favorite browser

### Run Application (Server) 
> **Note:** Visit our deployed server [here](http://ellipsishackathon2022-env-1.eba-j8nmmzpw.ap-southeast-1.elasticbeanstalk.com/login) to access our application deployed on AWS Elastic Beanstalk server

> Using [AWS Elastic Beanstalk](https://aws.amazon.com/elasticbeanstalk/) for server deployment.
1. Create application
2. Go to Configuration > Software
    ```sh
    change document root to /public
    ```
3. Create Database instance 
4. Go to `Database.php` file 
    ```sh
    Add RDS Super Global Variables
    define('RDS_HOSTNAME', $_SERVER['RDS_HOSTNAME']);
    define('RDS_USERNAME', $_SERVER['RDS_USERNAME']);
    define('RDS_PASSWORD', $_SERVER['RDS_PASSWORD']);
    define('RDS_DB_NAME', $_SERVER['RDS_DB_NAME']);

    Assign the RDS Super Global Variables to the 'mysql' connection 
    'host' => RDS_HOSTNAME,
    'database' => RDS_DB_NAME,
    'username' => RDS_USERNAME,
    'password' => RDS_PASSWORD,
    ```

5. Create a `.ebextensions` folder on the same level as `app` folder,   inside the `.ebextensions` folder create a file `init.config`. <br/>
Add the following YAML Code in `init.config`

  > Indentations are important ! <br/>
  > Commands for Amazon Elastic Beanstalk to Run the first time

    container_commands:
        01initdb:
            command:
                "php artisan migrate:fresh"
        02initdb:
            command: 
                "php artisan migrate"
        03seederdb:
            command:
                "php artisan db:seed" 

6. Compressed all files into a folder 
> For Mac Users, you would need to run the code below to remove the __MACOSX folder, else AWS Beanstalk will throw an error.
  ```sh
  zip -d <name_of_compressed_folder>.zip __MACOSX/\* 
  ```
7. Upload and Deploy the folder into AWS Elastic Beanstalk environment

<!-- USER GUIDE -->
## User Guide
_For more information, please refer to the [User Guide][UserGuide-url]_

<!-- CONTACT -->
## Contact
Neo Jun Wei - neojw1505@gmail.com | junwei.neo.2022@scis.smu.edu.sg

Project Link: [https://github.com/your_username/ellipsis-hackathon-2022](https://github.com/neojw1505/Ellipsis-Hackathon-2022.git)

<!-- ACKNOWLEDGMENTS -->
## Acknowledgments
* [FullCalendar.js](https://fullcalendar.io/)
* [Chart.js](https://www.chartjs.org/docs/latest/)
* [jQuery DataTables](https://datatables.net/)
* [Font Awesome](https://fontawesome.com)
* [Gull Icons](http://preview.themeforest.net/item/gull-angular-bootstrap-admin-dashboard-template/full_screen_preview/22866096)
* [SweetAlert2](https://sweetalert2.github.io/#usage)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

[license-shield]: https://img.shields.io/github/license/othneildrew/Best-README-Template.svg?style=for-the-badge
[license-url]: https://github.com/othneildrew/Best-README-Template/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/othneildrew
[Svelte.dev]: https://img.shields.io/badge/Svelte-4A4A55?style=for-the-badge&logo=svelte&logoColor=FF3E00
[Svelte-url]: https://svelte.dev/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 
[Composer-url]: https://getcomposer.org/doc/00-intro.md#using-the-installer
[PHP-url]: https://www.php.net/downloads
[XAMPP-url]: https://www.apachefriends.org/
[UserGuide-url]: UserGuide.md
