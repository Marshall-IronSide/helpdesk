# Mini HelpDesk

Mini HelpDesk is a simple Laravel-based ticketing application for managing support requests. It provides a lightweight interface for creating tickets, viewing their details, adding comments, and filtering tickets by status.

## Features

- Create, edit, and view support tickets
- Track ticket status and priority
- Add comments to tickets
- Filter tickets by open or resolved status
- French UI labels and localized date formatting
- Authentication and basic role-aware actions for admins

## Tech Stack

- Laravel 12
- PHP 8.2+
- Blade templates
- MySQL / SQLite-compatible database setup
- Vite for frontend assets

## Installation

1. Clone the repository
   ```bash
   git clone https://github.com/Marshall-IronSide/helpdesk.git
   cd helpdesk
   ```

2. Install PHP dependencies
   ```bash
   composer install
   ```

3. Install frontend dependencies
   ```bash
   npm install
   ```

4. Create your environment file
   ```bash
   cp .env.example .env
   ```

5. Generate the application key
   ```bash
   php artisan key:generate
   ```

6. Run the migrations
   ```bash
   php artisan migrate
   ```

7. Build the assets
   ```bash
   npm run build
   ```

8. Start the development server
   ```bash
   php artisan serve
   ```

## Usage

- Open the application in your browser
- Register or log in
- Create a new ticket from the dashboard
- Manage ticket status and comments

## Testing

Run the test suite with:

```bash
php artisan test
```

## License

This project is open-source and available under the MIT License.
