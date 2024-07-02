<?php
require_once ("../../../config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Poll</title>
    <link rel="stylesheet" href="../../../globals.scss">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require_once ("../../../includes/message.php"); ?>
    <a href="../">Go back</a>
    <form action="../../../controller/create-poll-controller.php" method="post">
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="category">Category:</label>
            <select id="category" name="category_id" required>
                <?php
                $sql = "SELECT id, title FROM categories";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value=" . $row['id'] . ">" . $row['title'] . "</option>";
                    }
                }
                ?>
            </select><br />
            <div id="options">
                <label>Options:</label>
                <div>
                    <input type="text" name="options[]" placeholder="Option" required>
                </div>
                <div>
                    <input type="text" name="options[]" placeholder="Option" required>
                </div>
            </div>
            <button type="button" onclick="addOption()">Add Option</button><br />
            <input type="submit" value="Create Poll" />
    </form>
    <script>
        var optionsDiv = document.getElementById('options');
        function addOption() {
            var newOptionDiv = document.createElement('span');
            newOptionDiv.innerHTML = '<input type="text" name="options[]" placeholder="Option" required /><button type="button" onclick="deleteOption(this)">Delete</button>';
            optionsDiv.appendChild(newOptionDiv);
        }
        function deleteOption(button) {
            if (optionsDiv.childElementCount > 2) {
                optionsDiv.removeChild(button.parentNode);
            } else {
                alert("A poll must have at least two options.");
            }
        }
    </script>
</body>

</html>