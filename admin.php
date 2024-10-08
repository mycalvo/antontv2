<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <form action="/user" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <label for="expiration_date">Expiration Date:</label>
        <input type="date" id="expiration_date" name="expiration_date">
        <label for="max_connections">Max Connections:</label>
        <input type="number" id="max_connections" name="max_connections">
        <button type="submit">Create User</button>
    </form>
    <!-- Más contenido del panel de administración -->
</body>
</html>
