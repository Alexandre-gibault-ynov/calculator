# CLI Calculator with Expression Tree

A simple command-line calculator application built in PHP. This calculator supports basic arithmetic operations (`+`, `-`, `*`, `/`), respects operator precedence, and can handle simple parentheses.

---

## Table of Contents

1. [Features](#features)
2. [Requirements](#requirements)
3. [Installation](#installation)
4. [Usage](#usage)
    - [Prepare an Input File](#prepare-an-input-file)
    - [Run the Calculator](#run-the-calculator)
    - [Output](#output)

## Features

- Supports basic arithmetic operations: addition, subtraction, multiplication, and division.
- Evaluates expressions with operator precedence.
- Handles simple parentheses for grouping operations.
- Uses an expression tree for evaluation.

---

## Requirements

- PHP 8.1 or later
- Composer (for dependency management)

---

## Installation

1. Clone the repository

   ```bash
   git clone https://github.com/Alexandre-gibault-ynov/calculator.git
   cd calculator
   ```

2. Install dependencies using Composer

    ```bash
   composer install
   ```
   
---

## Usage

1. Prepare an input file

    Create a .txt file with the arithmetic 
    expression you want to evaluate, using space-separated tokens.
    Example (expression.txt):
    ```text
    3 + 5 * ( 2 - 1 )
    ```
   An expression.txt file is already provided in the `bin` folder of the app. You can edit this one and follow the next steps.

2. Run the calculator

    Execute the calc.php script with the path to the input file as the argument:
    ```bash
    php ./bin/calc.php /path/to/expression.txt
    ```
    Example
    ```bash
    php ./bin/calc.php expression.txt
    ```

3. Output

   The expression and its result will be displayed in the terminal.

   Example output
   ```text
   ( 1 + 2 ) * 3 = 9
   ```
   
