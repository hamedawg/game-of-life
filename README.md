# Game of Life (PHP Implementation)

This project is an implementation of **Conway’s Game of Life** in PHP.  
It demonstrates the use of Object-Oriented Programming (OOP), Yii2 framework, unit testing with **Codeception**, and a simple presenter for visualizing the game grid in the console.

---

## 📌 Project Structure
```
app/
 ├── commands/
 │    ├── GameController.php   # Entry point to run the game from CLI
 ├── components/
 │    ├── GameOfLife.php       # Core Game of Life logic
 │    ├── GamePresenter.php    # Outputs the universe to console
 └── models/
      └── Universe.php         # Represents the grid (universe)

tests/
 └── unit/
      ├── components/
      │    ├── GameOfLifeTest.php
      │    └── GamePresenterTest.php
```

---

## ⚙️ Requirements
- PHP 8.0+
- Composer
- Codeception

---

## 🚀 Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/hamedawg/game-of-life.git
   cd game-of-life
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

---

## ▶️ Running the Game
You can run the game from the command line. Example:

```bash
yii game/run -s=3 -i=5
```

This will:
- Initialize a universe
- Add a **glider pattern**
- Show the grid in the console
- Progress through generations

Example Output:
```
*..
..*
***
```

---

## 🧪 Running Tests
Unit tests are written with **Codeception (PHPUnit)**. To run tests:

```bash
vendor/bin/codecept run
```

Example Test Output:
```
GameOfLifeTest
 ✔ Universe initialization
 ✔ Add glider pattern to universe
 ✔ Presenter outputs correct grid
 ✔ Next generation evolves correctly
```

---

## 📝 Features
- Object-oriented implementation
- Configurable grid size
- Predefined **glider pattern**
- Text-based presenter for console
- Full unit test coverage

---

## 👨‍💻 Author
Developed by **Hamed Khosrojerdi**
