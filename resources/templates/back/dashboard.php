<?php 
$news_query = query("SELECT COUNT(*) as tot FROM news");
confirm($news_query);
$tot_row1 = fetch_array($news_query);
$tot_news = $tot_row1['tot'];

$review_query = query("SELECT TRUNCATE(AVG(punteggio),1) as media FROM recensioni");
confirm($review_query);
$tot_row2 = fetch_array($review_query);
$tot_rev = $tot_row2['media'];


$users_query = query("SELECT COUNT(*) as tot FROM utenti");
confirm($users_query);
$tot_row3 = fetch_array($users_query);
$tot_users = $tot_row3['tot'];

$recent_news_query = query("SELECT * FROM news ORDER BY data_news DESC LIMIT 4");
confirm($recent_news_query);
$recent_news = array();
$i = 0;
while($row = fetch_array($recent_news_query)) {
    $pd = $row['data_news'];
    setlocale(LC_TIME, 'it_IT');
    $pdate = strftime("%d %B %Y", strtotime($pd));
    $recent_news[$i] = new Post($row['id'], $row['titolo'], $row['testo'], $pdate);
    $i++;
}
?>

<main>
    <div class="mb-5">
        <p class="h1 pb-3">Genera codice per recensione</p>
        <form action="" method="POST" class="row g-3">
            <?php getReviewCode(); ?>
            <div class="col-lg-2">
                <button type="submit" name="codeSubmit" class="btn btn-primary btn-lg">Genera codice</button>
            </div>
            <div class="col-lg-4">
                <input type="text" name="Code" id="Code" value="<?php if(isset($_SESSION['code'])){echo $_SESSION['code'];} else {echo " ";} ?>">
            </div>
        </form>
    </div>
    <div class="cards">
        <div class="card">
            <div class="card-header">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-body">
                <p class="h1"><?php echo $tot_news; ?></p>
                <p>news pubblicate</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="far fa-star"></i>
            </div>
            <div class="card-body">
                <p class="h1"><?php echo $tot_rev; ?></p>
                <p>punteggio medio nelle recensioni</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-body">
                <p class="h1"><?php echo $tot_users; ?></p>
                <p>utenti amministratori</p>
            </div>
        </div>
    </div>
    <div class="recent">
        <div class="rec-posts mb-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Ultime news</h3>
                    <a role="button" class="btn" href="admin.php?news">Vedi tutto<i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <td>Titolo</td>
                                <td>Data post</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($recent_news as $n): ?>
                            <tr>
                                <td><?php echo $n->get_titolo(); ?></td>
                                <td><?php echo $n->get_data(); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>