# CRUD WITH MYSQLi

### Explanation

- Database : crud_mysqli
- Table : users
  ```
  - id int primary_key auto_increment
  - firts_name varchar(30)
  - last_name varchar(30)
  - username varchar(20) -> unique
  - email varchar(30) -> unique
  - password varchar(75)
  - created_at timestamp
  - updated_at timestamp```
- Table : articles
  ```
  - id int primary_key auto_increment
  - title varchar(30)
  - description text
  - created_by
  - created_at
  - updated_at
  ```

### Route
  - Show data from articles
  `/articles.php` -> `GET`
  - Show data by id
  `/article.php?id=[:id]`-> `GET`
  - Add data articles to database `/articles.php?add` -> `POST`
  - Update data articles on table articles `/articles.php?update`
  - Destroy data from table articles `/articles.php?destroy=1`

## Database

create table users(
    id int primary key auto_increment,
    firts_name varchar(30),
    last_name varchar(30),
    username varchar(20),
    email varchar(30),
    password varchar(75),
    created_at timestamp,
    updated_at timestamp
);
