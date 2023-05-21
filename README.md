# BlogX 📝

BlogX is a sleek and customizable white label TALL-Stack blog powered by @FilamentPHP. It incorporates the popular technologies such as Laravel, Livewire, Alpine.js, and Tailwind CSS to provide a seamless and modern blogging experience.

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

## Laravel Sail (Coming Soon) ⛵
Running BlogX with Laravel Sail provides a simplified and convenient development environment using Docker. Instructions and configuration details for using Laravel Sail will be provided in the upcoming release.

Stay tuned for updates on using Laravel Sail with BlogX!

Please note that these sections mention that detailed instructions for customization and Laravel Sail will be provided in the future. You can replace the existing customization section and add the new Laravel Sail section to your README.md file using the markdown code above.

Feel free to explore the codebase and make any necessary modifications to suit your requirements.

## Contributing 👥

Contributions to BlogX are welcome! If you encounter any issues or would like to add new features, please submit a pull request with detailed information about the changes.

## License 📜

This project is licensed under the MIT License.
