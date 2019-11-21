<? php
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="view/style.css">
    <script>
        function envoidonnee(){
            $.ajax({
                url: 'create.php',
                dataType: 'json',
                type: 'post',
                contentType: 'application/json',
                data: JSON.stringify({"login": $('#login').val(), "password": $('#password').val(), "action": "loginsection"}),
                processData: false,
                success: function( data, textStatus, jQxhr ){
                    var json=JSON.parse(JSON.stringify( data ));
                     var chaine="";
                     for (var i = 0; i < json.length; i++) {
                         chaine=chaine+json[i].login+" "+json[i].password+" "+json[i].existe;
                         if (json[i].existe==1) {
                             document.getElementById("details").style.display="block";
                             document.getElementById("loginsection").style.display="none";
                         }
                     }
                    $('#reponse').html(JSON.stringify( data));

                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( textStatus );
                }
            });
        }
    </script>
</head>
<body>
    
    <div id="loginsection">
        <div class="container   content">
            <div class="main block">
                <article class="post">
                    <h2>enregistrement</h2>
                    <p class="meta"></p>
                    <p>
                     <p><label for="login">login</label> <input type="text" name="login" id="login"/></p>
                     <p><label for="password">password</label> <input type="text" name="password" id="password"/></p>
                     <input type="hidden" value="login" name="action" id="action" />
                     <a href="index.php/enregistrer" id="messenregistrer">enregistrez vous</a>
                     <p><input type="button" value="enregistrer" id="button"/></p>
                 </form>
             </p>
             <div>
                <div class="container">
                    <footer class="main-footer">
                        <div class="f_left">
                            <p>&amp;copy; 2017 - association medianet</p>
                        </div>
                    </footer>
                </div>
            </div>
            <div id="reponse"></div>
        </article>
    </div>
</div>
</div>

<div id="details">
        <header>
            <div class="container">
                <h1>
                    <a href="index.html">association medianet</a>
                    <small>association medianet</small>
                </h1>
                <div class="h_right">
                    <form>
                        <input type="text" placeholder="Search..."><span>deconnection</span>
                    </form>
                </div>
            </div>
        </header>
        <nav class="nav main-nav" id="menu">
            <div class="container">
                <ul>
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="#">Actualite</a></li>
                    <li><a href="#">Services</a>
                    <ul>
                        <li><a href="#">forum</a></li>
                        <li><a href="#">chat</a></li>
                        <li><a href="#">annuaire</a></li>
                    </ul>
                    </li>
                    <li><a href="about.html">A propos</a></li>
                </ul>
            </div>
        </nav>
        <div class="container
        content">
        <div class="main block">
            <article class="post">
            <a class="button" href="index.php/ajouterpost">Ajouter post</a>
                <h2 id="titre"><titre</h2>
                <p id="datenom">date nom</p>
                <p id="article">article</p>
                <a class="button"
                href="index.php/accueil">Accueil</a>
                
        
            </article>
        </div>
        <div class="side">
            <div class="block">
                <h3>Sidebar Head</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Nam vel diam hendrerit erat fermentum aliquet sed eget arcu.</p>
                <a class="button">More</a>
            </div>
        </div>
        <div>
            <div class="container">
                <footer class="main-footer">
                    <div class="f_left">
                        <p>&amp;copy; 2017 - ASSOCIATION MEDIANET</p>
                    </div>
                    <div class="f_right">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="#">Services</a></li>
                        </ul>
                    </div>

                </footer>
            </div>
        </div>

</div>


<script>
    document.getElementById("button").addEventListener("click",envoidonnee,false);
    if (typeof(existe)=="undefined") {
        document.getElementById("loginsection").style.display="block"
        document.getElementById("messenregistrer").style.display="none"
        document.getElementById("details").style.display="none"
    }
</script>
</body>
</html>
