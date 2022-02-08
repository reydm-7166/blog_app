<?php
    session_start();
    require_once('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet/less" type="text/css" href="styles.less" />
    <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
    <title>Home</title>
</head>
<body>
    <header>
        <h1>Blog</h1>
        <?php if(isset($_SESSION['users_name'])){ 
        echo "<h2>Welcome ". $_SESSION['users_name']. "!</h2>"; }?>
        <form action="process.php" method="post">
            <input type="submit" id="logout" name="logout" value="Logout">
        </form>
    </header>

    <main>
        <?php 
            if(isset($_SESSION['error'])){
                foreach ($_SESSION['error'] as $error){
                    echo $error;
                }
            }
            unset($_SESSION['error']); 
        ?>

        <h1>Title</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet placeat velit voluptate possimus similique quasi consequuntur labore nobis quod. Earum ullam nesciunt adipisci saepe voluptatibus doloribus repellat ad officia. Earum.
        Voluptates ut magnam reprehenderit blanditiis? Quos, facere a! Vero vitae ratione ex magnam sequi quod distinctio dolor blanditiis tempora unde magni cupiditate repudiandae beatae suscipit eveniet, reprehenderit sapiente provident velit.
        Mollitia maxime magni harum est minus facere. Quas id nostrum, sed eaque recusandae, odio exercitationem repellat qui rem ab provident molestiae fugiat ullam nisi laudantium obcaecati sit, laborum modi excepturi.
        Praesentium id impedit nam expedita eum reprehenderit eos sint, quos facilis natus numquam quidem ratione dignissimos ea necessitatibus facere, delectus hic. Sapiente labore soluta natus ut, quae expedita nobis quasi?
        Necessitatibus sequi id illo reiciendis illum unde enim asperiores reprehenderit? Iusto blanditiis architecto at est possimus beatae eligendi ea amet neque, porro nostrum, fugiat esse quaerat saepe. Harum, corporis quod.
        Laboriosam exercitationem sit, iure nam soluta animi amet aperiam, adipisci eius dignissimos doloribus? Facilis unde aperiam incidunt, nisi reiciendis delectus laboriosam, et eius quam magni corporis totam neque nihil repudiandae!
        Similique modi, corporis facilis ipsam minima quam est, nesciunt exercitationem ut pariatur voluptas repellat ullam sint odio, eum placeat id alias? Id ut aperiam nobis a incidunt quibusdam dolorum harum?
        Ducimus beatae perferendis quae, magni omnis dolorum ut dolor nihil natus ipsum expedita dolores amet quasi inventore ratione quis. Molestias explicabo sint voluptatum reprehenderit quidem vero itaque ipsa? Veritatis, non?
        Possimus necessitatibus similique quas facere voluptates accusamus ex labore ipsam adipisci natus in impedit voluptatibus nihil asperiores ducimus non officia quis sint eaque totam, neque provident consequatur eligendi error. Dignissimos!
        Vitae nobis voluptatum velit aspernatur voluptatem, quaerat est officia corporis exercitationem id libero maiores impedit provident. Laborum nisi accusamus pariatur enim aliquam cum mollitia necessitatibus expedita animi, incidunt ad illum!
        Asperiores odit beatae tenetur fugit cupiditate sint hic recusandae id, velit corrupti dolorem magnam modi totam, minus est dicta exercitationem consequuntur similique dolor magni quia odio perferendis commodi! Maxime, fugit!
        Ipsam natus minima blanditiis fugiat labore repellat exercitationem voluptas! Nihil quibusdam molestias accusantium nobis id alias. Earum maxime impedit laboriosam quod in? Culpa obcaecati deserunt eveniet vero recusandae deleniti saepe?
        Tenetur exercitationem vel quasi quod impedit fuga illum! Dolores velit eveniet laborum explicabo impedit veritatis magni repellendus sapiente. Fuga recusandae corporis commodi voluptates iusto aliquid voluptas soluta. Amet, rerum qui!
        Porro qui impedit aliquam ipsum recusandae saepe consequuntur quo, voluptate laborum. Labore, fugiat voluptatum voluptatibus nemo accusantium error iusto facilis ducimus rerum ad totam beatae voluptate dolorem illum dicta hic!
        Non, accusamus totam aliquam laborum iusto, quibusdam beatae nulla doloremque laboriosam soluta, assumenda nisi? Debitis nam, eum ex accusamus delectus nisi eos? Optio alias omnis mollitia. Error illo minima est.
        Sit debitis obcaecati est! Molestias repellat eligendi exercitationem dolor dicta, odit voluptatum voluptatem placeat omnis distinctio provident ut molestiae similique porro iure quaerat atque sunt inventore fuga debitis animi vero.
        Vel cupiditate veniam harum. Dolores blanditiis minima, repellendus praesentium commodi quibusdam error pariatur debitis accusamus reiciendis quidem, culpa magni illo enim nesciunt dolorem earum, repellat provident natus mollitia vero beatae?
        Voluptatum placeat sequi id at officia culpa perspiciatis expedita incidunt porro, molestias error assumenda tenetur, tempora reprehenderit unde? Incidunt fuga sint obcaecati ducimus officia inventore perferendis nisi non quae corporis!
        Quisquam tempora animi commodi eius nihil cum rerum tenetur minima iusto eos. Vero consequatur soluta doloremque ducimus id ullam repellat. Assumenda unde exercitationem eaque excepturi quam accusantium quibusdam, facere velit.
        Sint consectetur odio deleniti repudiandae assumenda! Qui unde quasi nesciunt quibusdam, dolorem at et, provident beatae cumque eos obcaecati fugit! Inventore maiores hic nobis ducimus voluptas vitae reiciendis eaque enim.
    </p>

    <form action="process.php" method="post">
        <h2>Leave a Review</h2>
        <textarea name="review" cols="100" rows="8"></textarea>
        <input type="submit" name="submit_review" value="Post a review">
    </form>
    </main>
    <footer>
    <?php ////////////////////query to display review   ////////////////////

        $post_review = mysqli_query($connection, "SELECT reviews.id AS reviews_id, users.id, CONCAT(users.first_name, ' ', users.last_name) AS Name, reviews.content, reviews.created_at FROM reviews
        INNER JOIN users
        ON users.id = reviews.users_id
        ORDER BY reviews.id ASC;");
        
        $row = mysqli_fetch_all($post_review, MYSQLI_ASSOC);

        foreach($row as $data){ ?>
            <div class="reviews">
                <h2><?php echo $data['Name']. " (" . date('F dS h:i:A', strtotime($data['created_at'])). ")"; ?></h2><br>
                <p><?= $data['content']; ?></p><br>
                <?php $GLOBALS['review_id'] = $data['reviews_id']; ?>

                <?php  //////////////////////query to display reply  ////////////////////

                $post_reply = mysqli_query($connection, "SELECT CONCAT(users.first_name, ' ', users.last_name) AS name, replies.content, replies.created_at FROM replies 
                INNER JOIN users
                ON replies.users_id = users.id
                WHERE replies.reviews_id = {$data['reviews_id']}
                ORDER BY replies.created_at ASC;");
                
                $row_reply = mysqli_fetch_all($post_reply, MYSQLI_ASSOC);
                
                foreach($row_reply as $data_reply){ ?>
                        <h2 class="reply"><?php echo $data_reply['name']. " (" . date('F dS h:i:A', strtotime($data_reply['created_at'])). ")"; ?></h2><br>
                        <p class="reply"><?= $data_reply['content']; ?></p><br>
                <?php } ?>  

                <form action="process.php" method="post">
                    <textarea name="reply_content" cols="100" rows="6"></textarea>
                    <input type="submit" name="reply" value="Reply">
                    <input type="hidden" name="review_id" value="<?= $review_id; ?>">
                </form> 
            </div>
            <?php } ?>
        
    </footer>
</body>
</html>