<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Header</title>
</head>
<style>
    *{
        padding: 0;
        margin: 0;
        font-family: sans-serif;
    }
    header{
        background-color: brown;
        padding: 20px;
    }

    nav{
        position: relative;
        display: flex;
        direction:rtl;
    }
    a{
        margin: 5px;
        color: white;
        position: relative;
    }
</style>
<body>
<header>
        <nav>
            <a href="SignUp.php"><i class="bi bi-person-circle"></i></a>

            <a href="admin.php">Admin</a>
        </nav>
    </header>
    
</body>
</html>