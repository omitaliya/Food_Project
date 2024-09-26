<?php

include '../components/connect.php';

session_start();
require('Auth.php');
$admin_id = $_SESSION['user_id'];

// if ($_SESSION['user_type'] != 'admin') {
//     header('location:../login.php');
// }

?>


<?php
$select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_profile->execute([$admin_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="../css/nav.css">


</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <img style="width: 80px;" src="../images/08052021-05_generated-removebg-preview.png" alt="Cafe Shop 😋">
                        <P style="font-size: 1.8rem; margin-top: 1.2rem;"><span class="title">Cafe Shop 😋</span></P>

                    </a>

                </li>

                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="products.php">
                        <span class="icon">
                            <ion-icon name="grid-outline"></ion-icon>
                        </span>
                        <span class="title">Product</span>
                    </a>
                </li>

                <li>
                    <a href="placed_orders.php">
                        <span class="icon">
                            <ion-icon name="receipt-outline"></ion-icon>
                        </span>
                        <span class="title">orders</span>
                    </a>
                </li>


                <li>
                    <a href="users_accounts.php">
                        <span class="icon">
                            <ion-icon name="people-circle-outline"></ion-icon>
                        </span>
                        <span class="title">users</span>
                    </a>
                </li>


                <li>
                    <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn"><span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span></a>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <a href="dashboard.php" class="logo">
                    <h1 style="text-align: center;">Admin<span style="color: blue;">Panel</span></h1>
                </a>

                <div class="">
                    <p>Welcome! <?= $fetch_profile['name']; ?></p>
                    <div class="icons">
                        <div id="user-btn" class="fas fa-user"></div>
                    </div>
                </div>


            </div>

            <section class="dashboard">

                <h1 class="heading" style="text-align: center; margin-top:3rem">DASHBOARD </h1>

                <div class="cardBox">

                    <div class="card">
                        <?php
                        $total_pendings = 0;
                        $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
                        $select_pendings->execute(['pending']);
                        while ($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)) {
                            $total_pendings += $fetch_pendings['total_price'];
                        }
                        ?>
                        <div>
                            <div class="numbers"><span>$</span><?= $total_pendings; ?><span>/-</span></div>
                            <div class="cardName">total pendings</div>
                        </div>

                        <div class="iconBx">
                            <a href="pending_orders.php">
                                <ion-icon name="wallet-outline"></ion-icon>
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <?php
                        $total_completes = 0;
                        $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
                        $select_completes->execute(['completed']);
                        while ($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)) {
                            $total_completes += $fetch_completes['total_price'];
                        }
                        ?>
                        <div>
                            <div class="numbers"><span>$</span><?= $total_completes; ?><span>/-</span></div>
                            <div class="cardName">total completes</div>
                        </div>

                        <div class="iconBx">
                            <a href="completed_orders.php" class="ho">
                                <ion-icon name="wallet-outline"></ion-icon>
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <?php
                        $select_orders = $conn->prepare("SELECT * FROM `orders`");
                        $select_orders->execute();
                        $numbers_of_orders = $select_orders->rowCount();
                        ?>
                        <div>
                            <div class="numbers"><span>$</span><?= $total_completes + $total_pendings; ?><span>/-</span></div>
                            <div class="cardName">total orders</div>
                        </div>

                        <div class="iconBx">
                            <a href="placed_orders.php">
                                <ion-icon name="wallet-outline"></ion-icon>
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <?php
                        $select_products = $conn->prepare("SELECT * FROM `products`");
                        $select_products->execute();
                        $numbers_of_products = $select_products->rowCount();
                        ?>
                        <div>
                            <div class="numbers"><?= $numbers_of_products; ?></div>
                            <div class="cardName">products added</div>
                        </div>

                        <div class="iconBx">
                            <a href="products.php">
                                <ion-icon name="grid-outline"></ion-icon>
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <?php
                        $select_users = $conn->prepare("SELECT * FROM `users`");
                        $select_users->execute();
                        $numbers_of_users = $select_users->rowCount();
                        ?>
                        <div>
                            <div class="numbers"><?= $numbers_of_products; ?></div>
                            <div class="cardName">users accounts</div>
                        </div>

                        <div class="iconBx">
                            <a href="users_accounts.php">
                                <ion-icon name="people-circle-outline"></ion-icon>
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <?php
                        $select_admins = $conn->prepare("SELECT * FROM `users` where role = 'admin'");
                        $select_admins->execute();
                        $numbers_of_admins = $select_admins->rowCount();
                        ?>
                        <div>
                            <div class="numbers"><?= $numbers_of_admins; ?></div>
                            <div class="cardName">admin accounts</div>
                        </div>

                        <div class="iconBx">
                            <a href="admin_accounts.php">
                                <ion-icon name="accessibility-outline"></ion-icon>
                            </a>
                        </div>
                    </div>


                    
                </div>                
        </div>
    </div>
    </div>

    <script src="../js/nav.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>