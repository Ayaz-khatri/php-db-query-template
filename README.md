# MySQL Query Execution in PHP

This project demonstrates how to execute MySQL queries in PHP using a database class.

## Files

- `index.php`: This file contains an example of executing a MySQL query using the `db` class.
- `db.php`: This file contains the `db` class, which handles the database connection and query execution.

## Usage

1. Ensure that you have a MySQL server running locally.
2. Import the necessary database tables and data. (Assuming you have a database named `student`)
3. Open `db.php` and update the `$dbHost`, `$dbUser`, `$dbPassword`, and `$dbName` variables with your MySQL server details.
4. In `index.php`, uncomment the desired query and modify it if needed. You can execute select, insert, update, and delete queries.
5. Run `index.php` in a PHP environment to see the results of the executed query.

Note: Remember to comment out or remove unnecessary code blocks to avoid executing multiple queries simultaneously.

Feel free to modify and use this code as per your requirements. If you encounter any issues or have any questions, please feel free to contact me.

