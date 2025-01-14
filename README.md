# Backend/Full-stack recruitment task

----

# User Management System

Prosty system zarządzania użytkownikami, który umożliwia dodawanie i usuwanie użytkowników. Dane użytkowników są przechowywane w pliku JSON.

## Wymagania

- PHP 8.0 lub nowszy
- Serwer WWW (np. Apache, Nginx)

## Instalacja

- Sklonuj repozytorium do wybranego katalogu na swoim komputerze:

   ```bash
   git clone https://github.com/Adrian00pl/backend-recruitment-task.git

 ## Struktura projektu

 - index.php - plik główny, wyświetla listę użytkowników i dodawanie/usuwanie użytkowników.
 - partials/main.php - plik poboczny zawierający obsługę wyświetlania, dodawania oraz usuwania użytkowników.
 - controllers/UserController.php - kontroler obsługujący logikę związane z użytkownikami.
 - models/User.php - model reprezentujący użytkownika.
 - dataset/users.json - plik JSON przechowujący dane użytkowników.

