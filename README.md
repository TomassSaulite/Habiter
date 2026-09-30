# Habiter

A habit tracker and personal diary built with Laravel. Create habits, check them off once a day, and see how many times you've completed each one. There's also a private journal for daily notes.

## Features

- **Habits:** create habits with a description and mark them complete once per day (repeat completions on the same day are blocked)
- **Completion history:** every check-in is stored as its own record, and each habit keeps a running completion counter
- **Diary:** write private journal entries, paginated newest-first
- **Auth:** registration, login and logout, with all data scoped to the signed-in user
- **Authorization:** a policy ensures only the owner can delete a habit

## Tech stack

Laravel · Blade · Tailwind CSS 4 · daisyUI · Vite · Pest

## Running locally

```bash
git clone https://github.com/TomassSaulite/Habiter.git
cd Habiter
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
composer run dev          # or: php artisan serve + npm run dev
```

## Data model

```
User ─┬─< Habit ──< HabitCompletion (completed_at)
      └─< Diary
```

## Possible next steps

- Streaks and a calendar heatmap built from completion history
- Editing and deleting diary entries
