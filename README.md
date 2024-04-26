# Project Name

## Description

Provide a brief overview of your project here.

## Prerequisites

Make sure you have the following installed:

-   PHP >= 8.2
-   Composer
-   MySQL or MariaDB

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/AleksandrovC/chirper-project
    ```

2. **Navigate to the project directory:**

    ```bash
    cd chirper-project
    ```

3. **Install PHP dependencies:**

    ```bash
    composer install
    ```

4. **Set up environment variables:**

    ```bash
    cp .env.example .env
    ```

    Update the `.env` file with your database credentials.

5. **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

6. **Migrate the database:**

    ```bash
    php artisan migrate
    ```

7. **Seed the database (optional):**

    ```bash
    php artisan db:seed
    ```

8. **Serve the application:**
    ```bash
    sail up -d
    ```
9. **Run NPM**
    ```bash
    sail npm run dev
    ```

## Usage

Visit `http://localhost:8000` in your browser to view the application.

## Contributing

Contributions are welcome! Please create an issue or pull request for any changes or feature requests.

## License

[License Name]()
