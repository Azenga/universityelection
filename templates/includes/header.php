<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Election</title>
    <base href="http://localhost/election/">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/ckeditor/ckeditor.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-primary navbar-expand-sm">
            <a class="navbar-brand" href="index.php"><img class="logo" src="images/logo.png" alt="Brand" /></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#the-nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="the-nav">
                <ul class="navbar-nav mr-auto">
                    <li class="active nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                    <?php if(logged_in()) : ?>
                        <li class="nav-item"><a class="nav-link" href="create_post.php">Create Post</a></li>
                        <li class="nav-item"><a class="nav-link" href="applications.php">Applications</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="accounts.php">Accounts</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link" href="candidates.php">Candidates</a></li>
                    <li class="nav-item"><a class="nav-link" href="posts.php">Posts</a></li>
                    <?php if(!hasvoted() && canvote()) :?>
                        <li class="nav-item"><a class="nav-link" href="castvote.php">Vote</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link" href="results.php">Results</a></li>
                </ul>

                <form action="search.php" class="form-inline" method="post">
                    <input type="text" name="" class="form-control mr-1" id="" />
                    <button type="submit" class="btn btn-success">search</button>
                </form>
            </div>
        </nav>
    </header>
    <?php display_message(); ?>

