
<?php
require_once "config.php";

// Check if "Collect Total" button is clicked
if (isset($_POST['collect_total'])) {
    // Calculate and collect the total amount
    $sql = "SELECT SUM(totalamount) AS total FROM transaction";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalAmount = $row['total'];

        // Save the total amount and current date to another system
        $currentDate = date("Y-m-d");
        $saveSql = "INSERT INTO collectingtotalamount (total_amount, collection_date) VALUES ($totalAmount, '$currentDate')";
        $conn->query($saveSql);

        echo "Total amount collected and saved successfully!";
    } else {
        echo "No transactions found to collect.";
    }
}

// Fetch data from the database
$sql = "SELECT transactionid, productname, transactiondate, quantity, price, totalamount FROM transaction";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .insert-btn {
            background-color: #008CBA; /* Blue */
        }

        .collect-btn {
            background-color: #f44336; /* Red */
        }

        .view-collect-btn {
            background-color: #333; /* Dark Gray */
        }
    </style>
</head>
<body>
    <h2>Transaction Information</h2>
    <div class="container">
        <a href="/insertingtransaction.html" class="btn insert-btn">Insert New Transaction</a>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <button type="submit" class="btn collect-btn" name="collect_total" onclick="return confirm('Are you sure you want to collect the total amount?')">Collect Total Amount</button>
            <button type="button" class="btn" onclick="deleteData()">Delete All Data</button>
            <a href="viewtotalamount.php" class="btn view-collect-btn">View Collected Total</a>
        </form>
    </div>
    <table id="transactionTable">
        <thead>
            <tr>
                <th>TransactionID</th>
                <th>ProductName</th>
                <th>TransactionDate</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>TotalAmount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display data in the HTML table
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["transactionid"] . "</td>";
                    echo "<td>" . $row["productname"] . "</td>";
                    echo "<td>" . $row["transactiondate"] . "</td>";
                    echo "<td>" . $row["quantity"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>" . $row["totalamount"] . "</td>";
                    echo "<td><a href='edittransaction.php?id=" . $row["transactionid"] . "' class='btn' style='background-color: #4CAF50;'>Edit</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No transactions found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        function deleteData() {
            if (confirm('Are you sure you want to delete all data?')) {
                // Remove table rows
                var table = document.getElementById("transactionTable");
                var rowCount = table.rows.length;
                for (var i = rowCount - 1; i > 0; i--) {
                    table.deleteRow(i);
                }
            }
        }
    </script>
</body>
</html>