<?php
$name = "";
$message = "";
$age = 0;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["my_name"];
    if($name == "David") {
        $message = "Ahoj Davide";
        $age = $_POST["my_age"];
    } else {
        $message = "Neznám tě";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test PHP</title>
</head>
<body>
    <h1>Test formuláře</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt possimus eligendi voluptate optio itaque eius, fugit eaque iusto, nam tempora est autem, cumque ipsum neque eveniet! Molestias officiis illo dicta.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut debitis laborum repellendus, quod quisquam nostrum pariatur dolores cum officia similique sint. Libero veniam corrupti delectus animi quaerat veritatis, perspiciatis unde.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo aspernatur sit reiciendis quos atque totam autem. Deserunt sint, nisi laborum blanditiis autem voluptates doloribus nihil natus. Alias tempore placeat enim. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis error magni facilis expedita nulla laboriosam laudantium et. Laborum voluptate dolorum, deserunt atque harum temporibus molestiae doloribus officiis, ratione impedit velit?</p>
    <form method="post">
        <input type="text" name="my_name" placeholder="Zadejte jméno">
        <input type="number" name="my_age" placeholder="Zadejte věk">
        <button type="submit">Odeslat</button>
    </form>




    <p>
        <?php  
            echo "Výstup: "; 
            echo $message; 
        ?>
    </p>
    <p>
        <?php
            echo "Tvůj věk: ";
            echo $age; 
        ?>
    </p>

</body>
</html>