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
            
            <?php if(isset($user_id)) {?>
            <form action="search_Login.php" method="post">

                <input type="text" name="keyword" id="keyword" placeholder="ค้นหา">
                <button type="submit" name="submit" class="fa fa-search"></button>

            </form>
            <?php }?>

            <?php if(!isset($user_id)) {?>
            <form action="search.php" method="post">

                <input type="text" name="keyword" id="keyword" placeholder="ค้นหา">
                <button type="submit" name="submit" class="fa fa-search"></button>

            </form>
            <?php }?>
        </nav>
        
            <?php if(isset($user_id)): ?>

            <div class="icons">
                <?php 
                
                    $sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
                    $result_cart = mysqli_query($conn, $sql);

                    $fetch_cart = mysqli_fetch_assoc($result_cart);
                
                ?>
                <div id="user-btn" class="fas fa-user"></div>
                <a href="cart_page.php?id=<?php echo $fetch_cart["user_id"]; ?>" id="cart-btn" class="fa fa-shopping-cart" style="font-size:30px;"> </a>

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
                <ul>
                <li><a href="Login.php"><span class="l">Login</span></a></li>
                <li><a href="Register.php"><span class="r">Register</span></a></li>
                </ul>
            <?php endif; ?>

    </section>