<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>
</head>

<body>
    <header>
    </header>

    <?= $this->renderSection('content') ?>

    <?= $this->renderSection('about') ?>

    <footer>
    </footer>
</body>

</html>