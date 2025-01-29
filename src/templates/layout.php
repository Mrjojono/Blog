<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"/>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
<div class="navbar d-flex flex-row text-center justify-content-center">
    <div class=" d-flex">
        <span>Blog</span>
        <div>
        <ul class="list-style-none">
            <li>Home</li>
            <li>Articles</li>              
            <li>About</li>
        </ul>

        </div>
    </div>

</div>

<?php echo $content; ?>

<footer class="footer bg-transparent bg-primary  " style="opacity: 2; position: fixed">
    <!--     a completer apres ....-->
    
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
