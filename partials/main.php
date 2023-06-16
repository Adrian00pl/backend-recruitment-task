

    <h1>User List</h1>
    <div class="container">
        <div class="left">
            <h1>Add User</h1>
            <form method="POST" action="../controllers/UserController.php?action=addUser">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" pattern="[A-Za-z\s]+" required><br>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" placeholder="street, zipcode, city" required><br>

                <input type="hidden" id="street" name="street">
                <input type="hidden" id="city" name="city">
                <input type="hidden" id="zipcode" name="zipcode">

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required><br>

                <label for="company">Company Name:</label>
                <input type="text" id="companyName" name="companyName" required><br>

                <input type="submit" value="Add User">
            </form>
        </div>
        <div class="right">
            <?php
            require_once 'controllers/UserController.php';
            $userController = new UserController();
            $users = $userController->getAllUsers();

            if (empty($users)) {
                echo "<div class='empty'>";
                echo "<h1>No data to display</h1>";
                echo "</div>";
            } else {
                echo "<table>";
                echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Username</th>";
                echo "<th>Email</th>";
                echo "<th>Address</th>";
                echo "<th>Phone</th>";
                echo "<th>Company</th>";
                echo "<th></th>";
                echo "</tr>";

                foreach ($users as $index => $user) {
                    echo "<tr>";
                    echo "<td>" . $user->getName() . "</td>";
                    echo "<td>" . $user->getUsername() . "</td>";
                    echo "<td>" . $user->getEmail() . "</td>";
                    echo "<td>" . $user->getFullAddress() . "</td>";
                    echo "<td>" . $user->getPhone() . "</td>";
                    echo "<td>" . $user->getCompanyName() . "</td>";
                    echo "<td><form method='POST' action='../controllers/UserController.php?action=removeUser'><input type='hidden' name='index' value='$index'><input type='submit' value='Remove'></form></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            ?>
        </div>
    </div>