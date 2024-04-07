<?php
    require("new-connection.php");
    session_start();
    // var_dump($_SESSION['reviews']);
    // Below is the query for reviews
    $query_reviews = "SELECT r.id, u.first_name, u.last_name, r.content as user_review, r.created_at as review_created_date FROM blog.reviews r
                JOIN blog.users u ON u.id = r.user_id";
    $reviews = fetch_all($query_reviews);
    // below is the query for replies
    $_SESSION['reviews'] = $reviews;
    $query_replies = "SELECT u.first_name, u.last_name, r.* FROM blog.replies r
                        JOIN blog.users u ON u.id = r.user_id";
    $replies = fetch_all($query_replies);
    $_SESSION['replies'] = $replies;
    // var_dump($_SESSION['replies']);
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog(Home)</title>
        <!-- My style CSS -->
        <link rel="stylesheet" href="style.css.php">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="card text-center">
<?php
    if(isset($_SESSION['display_name'])) {
?>
            <p><?= $_SESSION['display_name'] ?> <a href="logout.php">Logout</a>
<?php
    }
?>
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    </ul>
            </div>
        </div>
        <div class="container"> <!-- below is the contents of the blog -->
            <div class="header">
                <h2>Tourist Spot in Cebu</h2>
            </div>
            <div class="row">
                <div class="leftcolumn">
                    <div class="card">
                        <h2>Magellan's Cross</h2>
                        <h5>Text by <a href="https://www.hawaii.edu/cps/magellancross.html#:~:text=Magellan's%20Cross%2C%20on%20the%20Island%20of%20Cebu&text=Rajah%20Humabon%2C%20his%20wife%20and,now%20Cebu%2C%20in%20central%20Philippines.">fm@hawaii.edu</a>, Dec 7, 2017</h5>
                        
                        <img class="img-fluid magellan_cross img-thumbnail" src="img/magellan_cross.jpg" alt="Picture of Magellan's cross"/>
                        <div class="card-body">

                            <p>Ferdinand Magellan was the first European to come to the Philippines in 1521. Also known as Fernao Magalhaes or Fernando Magallanes, he was a Portuguese navigator working for the King of Spain in search of the spice islands (now part of Indonesia, known as Maluku or Moluccas islands). When he and his crews landed on Cebu island, a native chief, Rajah Humabon, met and befriended him. Rajah Humabon, his wife and hundreds of his native warriors agreed to accept Christianity and were consequently baptized.</p>
                            <p>Magellan planted a cross to signify this important event about the propagation of the Roman Catholic faith in what is now Cebu, in central Philippines. The original cross is reputedly encased in another wooden cross for protection, as people started chipping it away in the belief that it had miraculous healing powers. This prompted the government officials to encase it in tindalo wood and secured it inside a small chapel called "kiosk." Some say, however, that the original cross was actually destroyed. The Magellan cross displayed here is said to be a replica of such cross. It is housed in a small chapel located in front of the present city hall of Cebu, along Magallanes Street (named in honor of Magellan).</p>
                            <p>Sadly, Magellan met his death under the hands of another Visayan chief, Lapu-Lapu, when he went to the nearby island of Mactan. Mactan is also part of today's Metropolitan Cebu. There, both the statues of Magellan and Lapu-Lapu proudly stand to commemorate the tragic meeting of east and west in this part of the world.</p>
                            <p>It took another 45 years (1565) before Cebu was visited again by another European. Miguel Lopez de Legazpi, under orders from King Philip of Spain, came and made Cebu the first capital of the Spanish colony known as Las Islas Filipinas.</p>
                        </div>
                    </div>
                    <div class="card">
                        <label for="comment"><h4>Leave a Review</h4></label>
                        <form action="process.php" method="POST">
                            <textarea class="form-control" name="comment" id="comment" placeholder="Comment your thoughts...."></textarea>
<?php
    if(isset($_SESSION['error_messages'])) {
?>
                        <p class="review-error"><?= $_SESSION['error_messages']?></p>
<?php
    }
    unset($_SESSION['error_messages']);
?>                          <input type="hidden" name="action" value="review">
                            <input class="post_review btn btn-primary" name="review" type="submit" value="Post a review">
                        </form>
<?php
    foreach($_SESSION['reviews'] as $review) {
            $_SESSION['review_id'] = $review['id'];
?>
                        <div class="review">
                            <h4><?= $review['first_name'] ?> <?= $review['last_name'] ?> (<?= $review['review_created_date'] ?>)</h4>
                            <p><?= $review['user_review'] ?></p>
                            <div class="replies">
<?php   
        foreach($_SESSION['replies'] as $reply) {
            if ($review['id'] == $reply['review_id']) {
?>

                                <h5><?= $reply['first_name'] ?> <?= $reply['last_name']?> - <?= $reply['created_at'] ?></h5>
                                <p><?= $reply['content'] ?></p>
<?php
            }
        }
?>
                                <form action="process.php" method="POST">
                                    <input type="hidden" name="review_id" value=<?= $review['id']?>>
                                    <textarea class="reply-box form-control" name="reply" placeholder="Leave a comment..."></textarea>
                                    <input class="reply-btn btn btn-primary" type="submit" name="action" value="reply">
                                </form>
                            </div>
                        </div>
<?php
        }
?>
                    </div>
                </div>
            </div>
        </div>
    </body> 
</html>