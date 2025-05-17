<!-- <?php
require_once __DIR__."/../controller/Session.abstract.php";

$session = new SessionAuth();
$session->getSession();
?> -->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <script src="/Controller/index.js"></script>
    <title>F/home</title>
</head>
<body>
    <div id="main-content-container">
    <header>
        <img src="images/glados.png" alt="logo patate glados">
        <a href="#">Accueil</a>
        <a href="#">Groupes</a>
        <a href="recherche.html">Recherche</a>
        <a href="publier.html">Publier</a>
        <a href="#">Compte</a>
    </header>
        <article>
            <div class="info">
                <!--profile picture-->
                <img src="images/glados.png" alt="profile picture">
                <ul>
                    <!--username-->
                    <li>LatinConnaisseur</li>
                    <!--sub-forum name-->
                    <li>s/Lorem Ipsum</li>
                    <!--date--> <!--format to "Il y a 1ans", "hier", "aujourd'hui"-->
                    <li>1969-11-21</li>
                </ul>
            </div>

            <div class="content"><a href="">
                <h1>lorem ipsumaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
                <pre>"Lorem ipsum odor amet, consectetuer adipiscing elit. Nascetur arcu dui lacinia pellentesque torquent. Metus maximus risus purus morbi quisque vulputate magna; pulvinar ut. Interdum luctus elit vehicula congue, venenatis sollicitudin natoque. Vulputate potenti vulputate tincidunt magna tincidunt taciti facilisis. Inceptos semper urna rutrum congue sollicitudin convallis scelerisque sollicitudin. Magna arcu elementum dui hac mauris semper.

                Luctus tortor arcu elit eget orci vulputate tempus at dapibus. Volutpat ligula libero nullam non lectus tortor diam taciti. Tristique blandit mi eu, blandit montes ut. Rhoncus porta aliquam tortor metus orci finibus aptent eros morbi. Ut sollicitudin ante placerat sollicitudin rhoncus, semper arcu. Facilisis faucibus commodo porta parturient maecenas, sollicitudin luctus turpis. Magnis urna aliquet sem maecenas tempor pellentesque neque eget magna. Eros blandit sollicitudin donec conubia ligula dis turpis. Maecenas justo penatibus tincidunt magna tincidunt convallis orci consequat.

                Ullamcorper cras viverra cras eget id? Rutrum nisi dictumst elementum malesuada urna faucibus tortor ultricies. Semper neque dis rutrum sem curae finibus ut habitasse. At vulputate sed lacus ad malesuada urna fusce hendrerit. Tincidunt urna suspendisse leo habitasse aenean? Curae arcu placerat dapibus nibh erat sodales. Ut augue hac ullamcorper metus non tortor ornare. Diam taciti rutrum enim inceptos; est congue. Vivamus mi eleifend pulvinar suscipit ullamcorper ut nec per.

                Vestibulum eu etiam primis imperdiet porta finibus? Odio convallis nisl; praesent vehicula nec pretium. Torquent tempor pretium ultrices fusce venenatis tortor per primis. Senectus ut penatibus lorem vitae leo massa netus aliquet? Curae adipiscing nibh congue natoque donec eleifend tempus vitae. Rutrum sodales dignissim arcu ipsum blandit etiam nam. Potenti sapien dis justo ultricies maximus ac conubia. Eu interdum felis fusce consectetur praesent dis fermentum. Lectus nulla cras facilisis mus nunc nisi egestas ipsum.</pre>
            </a></div>

            <div class="comment-textarea">
                <form>
                <div class="grow-wrap">
                    <textarea name="text" onInput="this.parentNode.dataset.replicatedValue = this.value" placeholder="Commentaire ..."></textarea>
                    <button type="button" onclick="addComment(this)">Envoyer</button>
                </div>
                </form>
            </div>

            <div class="comment-output">
                <ul>
                    <li>
                        <h1>ISpeakBullshit</h1>
                        <pre>Vestibulum eu etiam primis imperdiet</pre>
                    </li>
                    <li>
                        <h1>ISpeakBullshit</h1>
                        <pre>Vestibulum eu etiam primis imperdiet</pre>
                    </li>
                    <li>
                        <h1>ISpeakBullshit</h1>
                        <pre>
                            <?php
                            echo password_hash("rasmusg664564564fhfghfghlerdorf", PASSWORD_DEFAULT);
                            ?>
                        </pre>
                    </li>
                </ul>
            </div>
        </article>
    <footer>

    </footer>
    </div>
</body>
</html>