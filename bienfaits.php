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
        height: 100px;
        background-color: rgba(24, 82, 58);
       text-align: center;
       margin-top: -10px;
       padding-top: 15px;
       color: white;
    }
    h2{
        font-weight: bolder;
        text-decoration: underline;
        font-weight: 800;
    }

    .explications{
        width: 100%;
        height: max-content;
        font-family: 'Montserrat', sans-serif;
        font-weight: 500;
        font-size: 1.2rem;
    }

    .presentation{
        display: flex;
        width: 80%;
        margin: auto;
        padding: 15px;
        
    }

    .presentationImg{
        width: 50%;
        height: 800px;
        padding-right: 25px;
        margin-top: 50px;
    }

    .presentationImg img{
        
        height: 800px;
    }

    .presentationText{
        width: 40%;
        margin-left: 25px;
        text-align: justify;
    }

    .bienfaits{
        font-family: 'Montserrat', sans-serif;
        font-weight: 500;
        font-size: 1.2rem;
    }

    .mineraux{
        background-color: #e9e9e9;
        text-align: center;
        padding: 15px;
    
    }

    .mineraux p{
        width: 50%;
        margin: auto;
        padding: 15px;
    }

    .comparaison{
        margin-top: -20px;
        text-align: center;
        color: white;
    }
    #comparaisonImg{
        background-image: url(./images/comparaison.jpg);
        background-size: cover;
        height:500px;
    }

    .comparaisonImg h2{
        margin: 0;
        padding-top: 20px;
    }

    .energie{
        display: flex;

    }

    .energieImg{
        width: 54%;
    }

    .energieImg img{
        width: 100%;
        height: 100%;
        
    }

    .energieText{
        width: 40%;
        padding: 100px;
       
    }

    .sante{
        display: flex;
    }

    .santeImg{
        width: 54%;
    }

    .santeImg img{
        width: 100%;
        height: 100%;
        
    }

    .santeText{
        width: 40%;
        padding: 100px;
        background-color: #e9e9e9;
       
    }

    .corpsEsprit{
        display: flex;
    }

    .corpsEspritImg{
        width: 54%;
    }

    .corpsEspritImg img{
        width: 100%;
        height: 100%;
        
    }

    .corpsEspritText{
        width: 40%;
        padding: 100px;
        background-color: #e9e9e9;
       
    }
    
    
</style>
<body>
<?php
    include("./header.php")
    ?>
<div class="top">
    <h1>Les bienfaits</h1>
</div>
<div class="explications">
    <div class="presentation">
        <div class="presentationImg">
            <img src="./images/presntation.jpg" alt="">
        </div>
        <div class="presentationText">
            <h2>Qu'est-ce que le matcha</h2>
            <p>Le matcha est une forme spéciale de thé vert japonais qui remonte à des siècles d'histoire et de tradition. Ce thé vert est cultivé de manière unique et traité de manière spéciale. Les feuilles de thé sont ombragées avant la récolte, ce qui permet de stimuler la production de chlorophylle et d'autres composés bénéfiques. Après la récolte, les feuilles sont séchées et broyées pour obtenir une fine poudre verte, le matcha.</p>
            <p>Contrairement à d'autres thés verts, où les feuilles sont infusées puis retirées de l'eau, le matcha est entièrement consommé. Cela signifie que lorsque vous buvez du matcha, vous consommez réellement les feuilles de thé broyées. Cela confère au matcha une concentration élevée de nutriments, notamment des antioxydants, des vitamines et des minéraux.</p>
            <p>Le matcha est souvent utilisé dans la cérémonie du thé japonaise, où sa préparation est considérée comme un art en soi. Cependant, il est également devenu populaire dans le monde entier en raison de ses nombreux bienfaits pour la santé et de son goût délicieux. Avec sa saveur riche et légèrement herbacée, ainsi que sa capacité à offrir une énergie durable grâce à sa teneur en L-théanine, le matcha est devenu une boisson appréciée par de nombreuses personnes à la recherche d'une alternative saine au café ou aux boissons énergisantes.</p>
            <p>En résumé, le matcha est bien plus qu'une simple boisson : c'est une expérience culturelle et gustative, ainsi qu'une source de bien-être et de vitalité pour ceux qui le dégustent.</p>
        </div>
    </div>
</div>
<div class="bienfaits">
    <div class="mineraux">
        <h2>Vitamines et Minéraux</h2>
        <p>Le matcha est une véritable mine de vitamines et de minéraux essentiels, tels que la vitamine C, la vitamine A, les vitamines B, le potassium, le magnésium et le calcium, qui soutiennent une santé globale et un bien-être optimal.</p>
    </div>
    
    

    <div class="energie">
        <div class="energieImg">
            <img src="./images/energy.jpg" alt="">
        </div>
        <div class="energieText">
            <h2>Boost d'energie considérable</h2>
            <p>Avec une teneur en caféine élevée, comparable à celle du café, le Matcha offre une libération d'énergie soutenue et durable, grâce à une combinaison unique de caféine et de l'acide aminé L-Théanine.</p>
            <p>Contrairement au café, le Matcha ne provoque pas de tremblements ni de maux de tête, car sa caféine est douce et équilibrée par la L-Théanine, qui favorise une sensation de vigilance calme et de sérénité. Cette association harmonieuse procure une énergie stable et prolongée, sans les effets secondaires indésirables du café, tels que le stress, l'anxiété et la dépendance.
            </p>
            <p>De plus, le Matcha est riche en magnésium et en tanins (polyphénols), ce qui ralentit l'absorption de la caféine dans le corps, assurant ainsi une diffusion progressive de l'énergie. Cette libération d'énergie durable peut durer jusqu'à 6 heures, soit deux à trois fois plus longtemps que celle du café, vous permettant de rester alerte et concentré tout au long de la journée.</p>
        </div>
    </div>

   
       
        <div class="sante">
            <div class="santeText">
                <h2>Sante</h2>
                <p>Le Matcha est une véritable bombe de nutriments, regorgeant de vitamines et de minéraux essentiels tels que la vitamine A, la vitamine C, la vitamine E, le potassium, le manganèse, le fluorure, le fer, le zinc, le calcium et le magnésium. Cette combinaison unique en fait un bouclier puissant pour renforcer votre système immunitaire et protéger votre corps contre les maladies. </p>
                <p>Grâce à ses propriétés anti-inflammatoires et à son pouvoir antioxydant élevé, le Matcha aide à lutter contre le vieillissement cellulaire et à prévenir les maladies chroniques telles que le diabète, l'asthme et certains cancers. Les polyphénols présents dans le Matcha, notamment l'épigallocatéchine-O-gallate (EGCG), sont des antioxydants puissants qui contribuent à réduire le cholestérol et à protéger contre les maladies cardiovasculaires.</p>
                <p>De plus, le Matcha contient des catéchines qui renforcent l'émail des dents et protègent contre les caries dentaires, tout en favorisant une bonne santé bucco-dentaire. Sa capacité à stimuler le métabolisme et à réduire le taux de cholestérol en fait également un allié précieux pour maintenir un cœur en bonne santé.</p>
                <p>En résumé, intégrer le Matcha dans votre routine quotidienne peut vous aider à renforcer votre système immunitaire, à protéger votre corps contre les maladies et à favoriser une santé optimale à long terme. Prenez soin de votre bien-être avec cette délicieuse boisson aux multiples bienfaits pour la santé.</p>
            </div> 
            <div class="santeImg">
                <img src="./images/sante2.jpg" alt="">
            </div>
         </div>

    
       
        <div class="corpsEsprit"> 
            <div class="corpsEspritImg">
                <img src="./images/beauty.jpg" alt="">
            </div>
            <div class="corpsEspritText">
                <h2>Bien-être du corps et de l'esprit</h2>
                <p>Le Matcha est bien plus qu'une simple boisson énergétique. Grâce à ses propriétés anti-inflammatoires et à sa richesse en vitamine E, il protège votre apparence des dommages liés à l'âge en préservant la santé de votre peau, de vos cheveux et de vos ongles. Les polyphénols présents dans le Matcha agissent comme un bouclier contre les rayons UV, protégeant ainsi votre peau des dommages causés par le soleil et préservant son élasticité naturelle.</p>
                <p>De plus, le Matcha est une source riche en magnésium, un minéral essentiel connu pour ses propriétés relaxantes, sa capacité à renforcer les os et son soutien au système immunitaire. Les acides aminés, notamment la L-Théanine, abondamment présents dans le Matcha, favorisent un équilibre harmonieux entre relaxation et énergie, aidant à réduire le stress et à favoriser la concentration.
                </p>
                <p>En favorisant la détente et en protégeant la peau contre les signes du vieillissement, le Matcha contribue également à une belle mine et à une apparence radieuse. Son processus d'ombrage avant la récolte stimule la production d'acides aminés et confère à cette fine poudre son goût sucré caractéristique, tout en offrant des bienfaits anti-stress uniques.</p>
            </div> 
           
        </div>

    
</div>
<?php
    include("./footer.php")
    ?>

</body>
</html>