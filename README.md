# Eloquent Query Builder

This package provides a set of pre-built methods to make querying Eloquent models easier, especially for beginners. These methods abstract away the complexity of commonly used database queries, allowing you to focus on getting data without writing repetitive code.

## Installation

No installation required. This is just a set of helper methods for Eloquent models that can be included in your project. It uses Laravel's built-in Eloquent ORM, so it's compatible with any Laravel project.

## Methods Overview

### 1. `allDataWithSelect()`

Fetch all data from a model with specified columns, without pagination or limits.

**Parameters:**
- `$Data` (Model class) – The Eloquent model you want to query.
- `$select` (Array) – An array of column names to retrieve (e.g., `['name', 'email']`).
- `$relations` (Array or null) – An optional array of related models to eager load (e.g., `['posts', 'comments']`).
- `$where` (Array or null) – An optional array of conditions for filtering the query (e.g., `[['status', '=', 'active']]`).

## 2. `allWithPagination()`

The `allWithPagination()` method is designed to fetch data from a model with pagination. This allows you to retrieve a set number of results per page and make the data more manageable, especially when dealing with large datasets. This method will automatically generate the pagination links for you.

### **Parameters:**

- **`$Data` (Model class)** – The Eloquent model you want to query (e.g., `User::class`, `Post::class`).
- **`$sort` (String)** – The sorting order (either `'latest'` or `'oldest'`).
    - `'latest'`: Sorts the results by the most recent records.
    - `'oldest'`: Sorts the results by the oldest records.
- **`$perPage` (Int)** – The number of results per page. The default is `10`.
- **`$relations` (Array or null)** – An optional array of relationships to eager load (e.g., `['posts', 'comments']`).
- **`$select` (Array or null)** – An optional array of columns to retrieve (e.g., `['name', 'email']`).
- **`$where` (Array or null)** – An optional array of conditions for filtering the query (e.g., `[['status', '=', 'active']]`).

### 3. `allWithLimit()`

The `allWithLimit()` method is designed to fetch a set number of records from a model without pagination. Unlike `allWithPagination()`, it does not include pagination links but allows you to retrieve a fixed number of results based on your limit. This method is useful for cases where you need a quick list of items or an "infinite scroll" style list.

### **Parameters:**

- **`$Data` (Model class)** – The Eloquent model you want to query (e.g., `User::class`, `Post::class`).
- **`$limit` (Int)** – The number of results to return.
- **`$sort` (String)** – The sorting order (either `'latest'` or `'oldest'`).
    - `'latest'`: Sorts the results by the most recent records.
    - `'oldest'`: Sorts the results by the oldest records.
- **`$relations` (Array or null)** – An optional array of relationships to eager load (e.g., `['posts', 'comments']`).
- **`$select` (Array or null)** – An optional array of columns to retrieve (e.g., `['name', 'email']`).
- **`$where` (Array or null)** – An optional array of conditions for filtering the query (e.g., `[['status', '=', 'active']]`).

### 4. `allData()`

The `allData()` method is a simple method that fetches all records from a model without pagination, limits, or any filtering. It’s ideal when you need to retrieve every record from a table and don’t need the complexity of sorting, filtering, or selecting specific columns. This method returns all the records as a collection.

### **Parameters:**

- **`$Data` (Model class)** – The Eloquent model you want to query (e.g., `User::class`, `Post::class`).
- **`$relations` (Array or null)** – An optional array of relationships to eager load (e.g., `['posts', 'comments']`).
- **`$select` (Array or null)** – An optional array of columns to retrieve (e.g., `['name', 'email']`).
- **`$where` (Array or null)** – An optional array of conditions for filtering the query (e.g., `[['status', '=', 'active']]`).

**Example Usages:**
```php
$users = $this->allDataWithSelect(
    User::class,               // The model class
    ['name', 'email'],         // Columns to select
    null,                      // No relationships to load
    [['status', '=', 'active']] // Where condition: status = 'active'
);

php
$users = $this->allWithPagination(
    User::class,               // The model class (User)
    'latest',                  // Sort by latest
    10,                        // Limit to 10 results per page
    null,                      // No relationships to load
    ['name', 'email'],         // Select only 'name' and 'email' columns
    [['status', '=', 'active']] // Filter by 'active' status
);

php
$users = $this->allWithLimit(
    User::class,               // The model class (User)
    5,                         // Limit to 5 results
    'latest',                  // Sort by latest
    null,                      // No relationships to load
    ['name', 'email'],         // Select only 'name' and 'email' columns
    [['status', '=', 'active']] // Filter by 'active' status
);

php
$users = $this->allData(
    User::class,   // The model class (User)
    null,          // No relationships to load
    ['name', 'email']  // Select only 'name' and 'email' columns
);
