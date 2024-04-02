<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap');
    .top{
        width: 100%;
        height: 300px;
        background-image:url(./images/champsthe.jpg);
        background-size: cover;
       text-align: center;
       background-position: top;
       margin-top: -10px;
       padding-top: 35px;
       color: white;
       font-family: 'Montserrat', sans-serif;
    }

    h2{
        font-size: 4rem;
    }
    h4{
        font-size: 2rem;
    }

    #infos{
width: 100%;
height: 180px;
background-color: white;
text-align: center;
padding-top: 25px;
display: flex;
justify-content:space-evenly ;
flex-wrap: wrap;
box-shadow: 0px 10px 10px -10px rgba(0, 0, 0, 0.3);
font-family: 'Montserrat', sans-serif;}

    
.rubriques{
    height: max-content;
    display: flex;
    flex-wrap: wrap;
    font-family: 'Montserrat', sans-serif;
    text-align: justify;
    
    font-size: 1.2rem;
    
}

.rubriques div{
    width: calc(33.33% - 40px); /* 33.33% width for each box with a bit of margin */
    margin: 20px; /* Margin between each box */
    
    font-family: 'Montserrat', sans-serif;
    
    
}

.rubriques div .img img{
    width: 400px;
    height: 250px;
}
.rubriques div .text{
    width: 85%;
    margin: 10px;
    padding-left: 15px;

}

.rubriques div .text p{
    text-align: justify;
    
}

.authenticity{
    text-align: center;
    text-justify: auto;
}
</style>
<body>
<?php
    include("./header.php")
    ?>
<section class="top">
    <h2>Nos engagements et nos valeurs</h2>
    <p>Nous sommes engagés à vous offrir le meilleur du matcha japonais, alliant tradition, qualité et bien-être pour une expérience authentique et enrichissante à chaque tasse</p>
</section>
<section id="infos">
        <div class="infosText">
            <img src="./images/matcha.jpg" alt="" width="100px" height="100px" color="white">
            <h6>Matcha de qualité</h6>
        </div>
        <div class="infosText"><img src="./images/matcha.jpg" alt="" width="100px" height="100px" color="white">
            <h6>Certifié bio</h6></div>
        <div class="infosText"><img src="./images/matcha.jpg" alt="" width="100px" height="100px" color="white">
            <h6>Eco-responsable</h6></div>
        <div class="infosText"><img src="./images/matcha.jpg" alt="" width="100px" height="100px" color="white">
            <h6>Made in France</h6></div>
    </section>
    <section class="rubriques">
        <div class="authenticity">
            <div class="img">
                <img src="./images/champs.jpg" alt="">
            </div>
            <div class="text">
                <h4>Authenticité</h4>
            <p>Nous croyons en l'authenticité du matcha japonais, une tradition millénaire qui incarne l'essence même de la culture japonaise. Notre engagement envers l'authenticité se reflète dans chaque lot de matcha que nous sélectionnons, en veillant à ce qu'il soit cultivé, récolté et transformé selon les méthodes traditionnelles qui ont été transmises de génération en génération. Chaque gorgée de notre matcha vous transporte dans les collines verdoyantes du Japon, vous offrant une expérience authentique et inoubliable à chaque tasse.</p>
            </div>
            
        </div>
        <div class="authenticity">
            <div class="img">
                <img src="./images/champs.jpg" alt="">
            </div>
            <div class="text">
                <h4>Bio</h4>
            <p>Nous sommes engagés à fournir du matcha d'une pureté inégalée, cultivé de manière biologique dans les régions fertiles du Japon. Notre matcha est cultivé sans l'utilisation de pesticides ni d'engrais chimiques, préservant ainsi la santé de la terre et des générations futures. Chaque gorgée de notre matcha biologique vous offre une expérience gustative authentique, exempte de produits chimiques nocifs, pour une santé et un bien-être optimaux.</p>
            </div>
        </div>
        <div class="authenticity">
            <div class="img">
                <img src="./images/respect2.jpg" alt="">
            </div>
            <div class="text">
                <h4>Respect</h4>
            <p>Nous croyons en l'importance du respect et de l'équité dans toutes nos relations, que ce soit avec nos agriculteurs, nos employés ou nos clients. Nous nous engageons à travailler en étroite collaboration avec nos partenaires et fournisseurs, en veillant à ce qu'ils soient traités avec dignité et équité tout au long de notre chaîne d'approvisionnement. De plus, nous nous efforçons de créer une expérience client exceptionnelle, basée sur le respect, la transparence et la satisfaction de vos besoins. En choisissant notre matcha, vous choisissez une entreprise qui valorise les gens avant tout, pour des relations durables et mutuellement bénéfiques.</p>
            </div>
        </div>
        <div class="authenticity">
            <div class="img">
                <img src="./images/champs.jpg" alt="">
            </div>
            <div class="text">
                <h4>Durable</h4>
            <p>Nous nous engageons à promouvoir la durabilité à chaque étape de notre processus de production, en veillant à ce que notre entreprise ait un impact positif sur l'environnement. De la culture de nos feuilles de thé à la fabrication de nos emballages, nous adoptons des pratiques écoresponsables pour réduire notre empreinte carbone et préserver les ressources naturelles. En choisissant notre matcha, vous contribuez à un avenir plus durable pour notre planète, tout en savourant une boisson de qualité exceptionnelle.

</p>
            </div>
        </div>

        <div class="authenticity">
            <div class="img">
                <img src="./images/champs.jpg" alt="">
            </div>
            <div class="text">
                <h4>Innovation</h4>
            <p>Nous sommes résolument tournés vers l'avenir, cherchant constamment à innover et à repousser les limites de ce que le matcha peut offrir. Nous explorons de nouvelles techniques de culture, de nouvelles saveurs et de nouvelles applications pour le matcha, tout en préservant ses traditions et ses valeurs fondamentales. Notre engagement envers l'innovation nous permet de vous offrir des produits et des expériences uniques, inspirantes et toujours à la pointe de la qualité.
</p>
            </div>
        </div>

        <div class="authenticity">
            <div class="img">
                <img src="./images/champs.jpg" alt="">
            </div>
            <div class="text">
                <h4>Communauté</h4>
            <p>Nous croyons en l'importance de construire une communauté forte et engagée autour du matcha, unissant les passionnés de cette précieuse boisson et partageant des expériences, des connaissances et des conseils. Nous créons des espaces de connexion et d'échange, où les membres de notre communauté peuvent se retrouver, s'inspirer mutuellement et célébrer leur amour du matcha ensemble. Notre engagement envers la communauté va au-delà de la simple vente de matcha ; c'est un engagement envers le partage, la collaboration et le soutien mutuel, pour une expérience matcha enrichissante à tous égards.

</p>
            </div>
        </div>
    </section>

<?php
    include("./footer.php")
    ?>

</body>
</html>