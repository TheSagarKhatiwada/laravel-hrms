# Laravel HRMS

A Human Resource Management System (HRMS) built with Laravel with comprehensive Nepali calendar (Bikram Sambat) support.

## Features

- **Employee Management**: Add, view, and manage employee records with dual date support (AD/BS).
- **Attendance Management**: Track and record employee attendance with Nepali calendar integration.
- **Leave Management**: Employees can request and manage leaves using both English and Nepali dates.
- **Payroll Management**: Manage employee payroll with dual date format support.
- **Asset Management**: Track company assets and assign them to employees.
- **Holiday Management**: Manage and list company holidays in both AD and BS formats.
- **Nepali Calendar Support**: Full Bikram Sambat (BS) calendar integration throughout the system.
- **Role & Permission Management**: (Controllers present, implementation in progress.)
- **User Profile Management**: Users can update their profile and delete their account.

## Nepali Calendar (Bikram Sambat) Features

### 🗓️ Dual Date System
- **Date Format Toggle**: Users can switch between AD (English) and BS (Nepali) date formats in all forms
- **Automatic Conversion**: Dates are automatically converted between AD and BS formats
- **User Preference**: Individual user preference for default date format (AD/BS)
- **API Endpoints**: RESTful API for date conversion between calendars

### 📅 Supported Modules
- ✅ **Holidays**: Create, edit, and view holidays in both calendars
- ✅ **Attendance**: Record attendance with Nepali date support
- ✅ **Leaves**: Leave requests with dual date system
- ✅ **Employees**: Employee records with Nepali date fields
- ✅ **Payroll**: Payroll management with BS date support

### 🌐 Localization
- Nepali month names in Devanagari script
- Bilingual interface (English/Nepali)
- Proper date format validation for both calendars

## Getting Started

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM
- SQLite/MySQL/PostgreSQL

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/TheSagarKhatiwada/laravel-hrms.git
   cd laravel-hrms
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Setup**
   ```bash
   touch database/database.sqlite  # For SQLite
   php artisan migrate
   ```

5. **Build Assets**
   ```bash
   npm run build
   ```

6. **Start Development Server**
   ```bash
   php artisan serve
   ```

The application will be available at `http://localhost:8000`

## Nepali Calendar API

### Date Conversion Endpoints

**Convert AD to BS**
```http
POST /api/convert-date/ad-to-bs
Content-Type: application/json

{
  "date": "2024-01-01"
}
```

**Convert BS to AD**
```http
POST /api/convert-date/bs-to-ad
Content-Type: application/json

{
  "nepali_date": "2081-04-15"
}
```

**Get Current Date in Both Formats**
```http
GET /api/current-date
```

### Response Format
```json
{
  "success": true,
  "ad_date": "2024-01-01",
  "nepali_date": "2080-09-16",
  "nepali_date_formatted": "16 पौष 2080"
}
```

## Usage Examples

### Using Dual Date Inputs
The system provides seamless date input with toggle functionality:

1. **AD Format**: Standard HTML5 date picker
2. **BS Format**: Text input with validation (YYYY-MM-DD format)
3. **Auto-conversion**: Dates are automatically converted between formats
4. **Validation**: Proper validation for both calendar systems

### Setting User Date Preference
Users can set their preferred date format in their profile, which will be used as the default throughout the system.

## Technical Implementation

### Backend (Laravel)
- **NepaliDateService**: Core service for AD/BS date conversions
- **HasNepaliDates Trait**: Eloquent trait for models with date fields
- **API Controllers**: RESTful endpoints for date conversion
- **Database**: Additional nepali_date fields in relevant tables

### Frontend Components
- **DateFormatToggle**: React component for switching date formats
- **NepaliDatePicker**: Custom Nepali date input component
- **DualDateInput**: Combined component handling both date formats

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

### Development Guidelines
- Ensure all new date-related features support both AD and BS formats
- Add appropriate validation for Nepali date inputs
- Include tests for date conversion functionality
- Follow existing code style and naming conventions

## License

[MIT](LICENSE)