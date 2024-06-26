<!DOCTYPE html>
<html>

<head>
    <title>Calculator</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <h2>Calculator</h2>

    <form method="post">
        <label for="num1">Number 1:</label>
        <input type="text" id="num1" name="num1" value="<?= $_POST['num1'] ?? '' ?>" class="<?= isset($_POST['submit']) && (!is_numeric($_POST['num1']) || empty($_POST['num1'])) ? 'error' : '' ?>">
        <br><br>
        <label for="num2">Number 2:</label>
        <input type="text" id="num2" name="num2" value="<?= $_POST['num2'] ?? '' ?>" class="<?= isset($_POST['submit']) && (!is_numeric($_POST['num2']) || empty($_POST['num2'])) ? 'error' : '' ?>">
        <br><br>

        <label for="operator">Operation:</label><br><br>
        <select id="operator" name="operator">
            <?php $selected = $_POST['operator'] ?? ''; ?>
            <option value="Add" <?= $selected == 'Add' ? 'selected' : '' ?>>Add</option>
            <option value="Subtract" <?= $selected == 'Subtract' ? 'selected' : '' ?>>Subtract</option>
            <option value="Multiply" <?= $selected == 'Multiply' ? 'selected' : '' ?>>Multiply</option>
            <option value="Divide" <?= $selected == 'Divide' ? 'selected' : '' ?>>Divide</option>
            <option value="Modulo" <?= $selected == 'Modulo' ? 'selected' : '' ?>>Modulo</option>
        </select>
        <br><br>

        <label for="result">Result:</label>
        <?php
        if (isset($_POST['submit'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operator = $_POST['operator'];

            if (!is_numeric($num1) || empty($num1) || !is_numeric($num2) || empty($num2)) {
                echo '<span class="error">Please enter valid numeric values for Number 1 and Number 2.</span>';
            } else {
                switch ($operator) {
                    case "Add":
                        $result = $num1 + $num2;
                        break;
                    case "Subtract":
                        $result = $num1 - $num2;
                        break;
                    case "Multiply":
                        $result = $num1 * $num2;
                        break;
                    case "Divide":
                        if ($num2 == 0) {
                            echo '<span class="error">Division by zero is not allowed</span>';
                        } else {
                            $result = $num1 / $num2;
                        }
                        break;
                    case "Modulo":
                        if ($num2 == 0) {
                            echo '<span class="error">Division by zero is not allowed</span>';
                        } else {
                            $result = $num1 % $num2;
                        }
                        break;
                    default:
                        echo "Invalid operator";
                }
            }
        }
        echo $result ?? '';
        ?>
        <br><br>

        <input type="submit" name="submit" value="Calculate">
    </form>

</body>

</html>