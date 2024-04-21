<section class="header">

        <?php 
        
        if(isset($user_id)) {

            ?>

                <h1><a href="Home.php" class="icon"> C-game <span>Shop</span></a></h1> 

            <?php

        } else {

            ?>

                <h1><a href="Home_Visitor.php" class="icon"> C-game <span>Shop</span></a></h1> 

            <?php

        }
        
        ?>


        <nav class="navbar">        
            <form action="" method="post">

                <input type="text" name="search" id="search" placeholder="ค้นหา">
                <button type="submit"><i class="fa fa-search"></i></button>

            </form>
        </nav>

        
        
        
            <?php if(isset($user_id)): ?>

            <div class="icons">
                <?php 
                
                    $sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
                    $result_cart = mysqli_query($conn, $sql);

                    $fetch_cart = mysqli_fetch_assoc($result_cart);
                
                ?>
                <div id="user-btn" class="fas fa-user"></div>
                <a href="cart_page.php?id=<?php echo $fetch_cart["user_id"]; ?>"> <i class="fa fa-shopping-cart" style="font-size:30px; color:white;"></i></a>

            </div>

            <div class="account-box">

                <p>username : <span><?php echo $_SESSION['user_username']; ?></span></p>
                <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
                <a href="EditProfile.php" class="waring-btn">edit</a>
                <a href="Orders.php" class="order-btn">order</a>
                <a href="Reviews.php" class="review-btn">review</a>
                <a href="Logout.php" class="delete-btn">logout</a>

            </div> 

                <?php else: ?>
                    <a href="Login.php"><span class="l">Login</span></a>
                    <a href="Register.php"><span class="r">Register</span></a>
                <?php endif; ?>
                
        
        
        
    </section>