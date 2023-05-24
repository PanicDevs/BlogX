# BlogX 📝

BlogX is a sleek and customizable white label TALL-Stack blog powered by @FilamentPHP. It incorporates the popular technologies such as Laravel, Livewire, Alpine.js, and Tailwind CSS to provide a seamless and modern blogging experience.

# Under Construction 🚧

Please note that BlogX is currently under active development and certain features and sections mentioned in this README are still under construction. We are working diligently to bring you an exceptional and fully functional blogging experience.

During this phase, you may encounter incomplete features, limited functionality, or placeholder content. We appreciate your patience and understanding as we strive to deliver a high-quality product.

Stay tuned for updates and follow our progress as we continue to enhance BlogX. Your feedback and suggestions are valuable to us as we shape the future of this project.

Thank you for your support and for choosing BlogX!

## Features ✨

📌 **TALL Stack**: BlogX is built on the TALL Stack, a powerful combination of Laravel, Livewire, Alpine.js, and Tailwind CSS.

🖋️ **White Label**: BlogX is designed to be easily rebranded and customized to match your brand identity.

🐳 **Dockerized**: BlogX is Dockerized, providing a portable and consistent environment for seamless deployment and development.

⛵️ **Laravel Sail**: Run BlogX with ease using Laravel Sail, a lightweight command-line interface for managing the development environment with Docker.

🔒 **Secure**: Utilizing Laravel's robust security features, BlogX ensures a secure environment for your blog and its users.

🌈 **Responsive**: The blog's interface is fully responsive, ensuring a consistent and enjoyable experience across various devices.

🔍 **Search**: BlogX comes with a built-in search functionality, allowing users to easily find articles based on keywords.

🗂️ **Categories**: Organize your blog content with categories to help users navigate and discover relevant articles.

💬 **Comments**: Enable readers to engage with your articles by allowing comments on each blog post.

## Requirements 📋

Before installing BlogX, ensure that you have the following prerequisites:

- PHP 8.1 or higher
- Composer
- Node.js and NPM
- Git

## Installation and Setup 🚀

Follow these steps to install and set up BlogX:

1. Clone the repository:
   - `git clone https://github.com/panicdevs/blogx.git`

2. Navigate to the project directory:
   - `cd blogx`

3. Install PHP dependencies:
   - `composer install`

4. Install NPM dependencies:
   - `npm install`

5. Rename the `.env.example` file to `.env`:
   - `cp .env.example .env`

6. Generate the application key:
   - `php artisan key:generate`

7. Configure the database connection in the `.env` file.

8. Run database migrations:
   - `php artisan migrate`

9. Build the frontend assets:
   - `npm run dev`

10. Serve the application:
   - `php artisan serve`

11. Open your browser and visit `http://localhost:8000` to access BlogX.

## Customization (Coming Soon) 🎨
Customizing BlogX to match your branding and preferences is an important aspect. Detailed instructions and guidelines for customization will be provided in the upcoming release.

Stay tuned for updates on customization options!

## Laravel Sail Instructions ⛵

To provide a simplified and convenient development environment using Docker, BlogX now supports Laravel Sail. Follow the steps below to get started with Laravel Sail:

🚀 **Launching BlogX with Laravel Sail** 🚀

1. Make sure you have Docker installed on your machine. If you don't have it, you can download and install it from the official Docker website: [https://www.docker.com](https://www.docker.com)

2. Clone the BlogX repository to your local machine:

```shell
git clone https://github.com/panicdevs/blogx
```

3. Navigate to the project directory:

```shell
cd blogx
```

4. Copy the `.env.example` file and rename it to `.env`:

```shell
cp .env.example .env
```

5. Open the `.env` file and configure the necessary environment variables according to your local setup.

6. Run the following command to start Laravel Sail:

```shell
./vendor/bin/sail up -d
```

7. Once the containers are up and running, you can access BlogX in your web browser by visiting [http://localhost](http://localhost).

🔧 **Customization and Configuration**

You can further customize and configure BlogX to meet your specific requirements. Refer to the official Laravel documentation for more information on customization options: [https://laravel.com/docs](https://laravel.com/docs)

🔍 **Next Steps**

Stay tuned for updates on additional features and advanced usage of Laravel Sail with BlogX! We will provide more detailed instructions and configuration details in the upcoming release.

Please note that Laravel Sail provides a streamlined local development environment and is not intended for production use.

Feel free to explore the codebase, make modifications, and contribute to the project to suit your needs. We appreciate your support!

Let me know if you need any further assistance. Happy sailing! ⛵🌊


## Contributing 👥

Contributions to BlogX are welcome! If you encounter any issues or would like to add new features, please submit a pull request with detailed information about the changes.

## License 📜

This project is licensed under the MIT License.
