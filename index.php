<?php
$title = "FOSCU";
include "header.php";
require "dashboard/dbconn.php";

$admit = [];
$parent = [];

if ($conn) {
    // for upcoming events table
    $sql = "SELECT * FROM events ORDER BY eventdate DESC";
    $querry = $conn->prepare($sql);
    $querry->execute();
    $admit = $querry->fetchAll(PDO::FETCH_OBJ);

    // for recent events table
    $sql = "SELECT * FROM recent ORDER BY eventdate DESC LIMIT 4";
    $querry = $conn->prepare($sql);
    $querry->execute();
    $parent = $querry->fetchAll(PDO::FETCH_OBJ);
}
?>

<style>
    .feed .links {
        overflow: auto;
        float: left;
        position: relative;
        margin-left: .2px;
        padding: 1rem;
    }

    .accordion-body {
        padding: 0;
    }

    .table {
        margin-bottom: 0;
    }

    .table p.muted {
        margin-bottom: 0.2rem;
    }

    .main {
        background-size: cover;
        object-fit: cover;
    }

    .main2 {
        width: 100%;
        margin-top: 6rem;
    }

    .main video {
        width: 100%;
    }

    .navmargin {
        margin-top: 1rem;
    }

    .tweets * {
        margin: auto;
    }

    .tweets h3,
    .navmargin h3 {
        color: #F79321;
    }

    .tweets .row .col {
        margin: 1rem;
    }

    .row .col-md-4 {
        padding: .5rem;
        margin: 0.5rem;
    }

    @media (max-width: 401px) {
        .margin2 {
            margin-top: 6rem;
        }
    }

    @media (max-width: 1020px) {
        .main2 {
            margin-top: 5rem;
        }
    }
</style>
<div class="navmargin">
    <div class="main2">
        <video src="static/video/foodharzards.mp4" autoplay muted style="width: 100%"></video>
    </div>

    <div class="tweets">
        <h3 class="text-center mt-2">Food Safety News</h3>
        <div class="container text-center">
            <div class="row p-4">

                <div class="col mb-2 mt-2 shadow-sm">
                    <blockquote class="twitter-tweet" data-media-max-width="560">
                        <p lang="en" dir="ltr">FOOD SAFETY ALERT!!<br><br>Watch and learn how SEX-PHEROMONE TRAPS are used to manage
                            FRUIT FLIES!!!<br>NON-CHEMICAL PEST MANAGEMENT promotes food safety.<br><br>Full video 👉 <a
                                href="https://t.co/GIpjuvfZXv">https://t.co/GIpjuvfZXv</a><a
                                href="https://twitter.com/hashtag/FoodSafey?src=hash&amp;ref_src=twsrc%5Etfw">#FoodSafey</a> | <a
                                href="https://twitter.com/foscu23?ref_src=twsrc%5Etfw">@foscu23</a> | <a
                                href="https://t.co/TSeOuEwiKQ">https://t.co/TSeOuEwiKQ</a> <a
                                href="https://t.co/l99rhat6c8">pic.twitter.com/l99rhat6c8</a></p>&mdash; ESAU (@Esau_Matsiko) <a
                            href="https://twitter.com/Esau_Matsiko/status/1769301327522206199?ref_src=twsrc%5Etfw">March 17, 2024</a>
                    </blockquote>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>

                <div class="col mb-2 mt-2 shadow-sm">
                    <blockquote class="twitter-tweet" data-media-max-width="560">
                        <p lang="en" dir="ltr">FOOD SAFETY ALERT!!<br><br>Watch and learn how SEX-PHEROMONE TRAPS are used to manage
                            FRUIT FLIES!!!<br>NON-CHEMICAL PEST MANAGEMENT promotes food safety.<br><br>Full video 👉 <a
                                href="https://t.co/GIpjuvfZXv">https://t.co/GIpjuvfZXv</a><a
                                href="https://twitter.com/hashtag/FoodSafey?src=hash&amp;ref_src=twsrc%5Etfw">#FoodSafey</a> | <a
                                href="https://twitter.com/foscu23?ref_src=twsrc%5Etfw">@foscu23</a> | <a
                                href="https://t.co/TSeOuEwiKQ">https://t.co/TSeOuEwiKQ</a> <a
                                href="https://t.co/l99rhat6c8">pic.twitter.com/l99rhat6c8</a></p>&mdash; ESAU (@Esau_Matsiko) <a
                            href="https://twitter.com/Esau_Matsiko/status/1769301327522206199?ref_src=twsrc%5Etfw">March 17, 2024</a>
                    </blockquote>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>

                <div class="col mb-2 mt-2 shadow-sm">
                    <blockquote class="twitter-tweet" data-media-max-width="560">
                        <p lang="en" dir="ltr">FOOD SAFETY ALERT!!<br><br>PESTICIDES ARE DESIGNED TO HARM!!<br>Watch and learn how
                            their lifecycle can be properly managed to protect human health and the environment!!<br><br>Full video 👉
                            <a href="https://t.co/JSRxhEZAqQ">https://t.co/JSRxhEZAqQ</a><a
                                href="https://twitter.com/hashtag/FoodSafey?src=hash&amp;ref_src=twsrc%5Etfw">#FoodSafey</a> | <a
                                href="https://twitter.com/foscu23?ref_src=twsrc%5Etfw">@foscu23</a> | <a
                                href="https://t.co/TSeOuEwiKQ">https://t.co/TSeOuEwiKQ</a> <a
                                href="https://t.co/0DhugUGeBJ">pic.twitter.com/0DhugUGeBJ</a>
                        </p>&mdash; ESAU (@Esau_Matsiko) <a
                            href="https://twitter.com/Esau_Matsiko/status/1769984057482363209?ref_src=twsrc%5Etfw">March 19, 2024</a>
                    </blockquote>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>

            </div>
        </div>
    </div>
    <div class="navmargin">
        <h3 class="text-center mt-2">Our Youtube Videos</h3>
        <section class="expt" id="projects">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card">
                        <iframe width="auto" height="auto" class="card-img-top"
                            src="https://www.youtube.com/embed/SXZvO4zAi7g?si=wajF71ktM-SbMA8L" title="YouTube video player"
                            frameborder="0"
                            allow="geolocation; accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <iframe width="auto" height="auto" class="card-img-top"
                            src="https://youtube.com/embed/ckqaq-Bd1Yo?si=dnQVptnFaTg4QyEN" title="YouTube video player"
                            frameborder="0"
                            allow="geolocation; accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <section class="body wrbod">
        <!-- <div class="container">
            <div class="act">
                <h3>FoSCU Activities</h3>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Upcoming Activities
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <table class="table table-striped borderless">
                                    <?php foreach ($admit as $samp): ?>
                                        <tr>
                                            <td>
                                                <h6>
                                                    <?php echo $samp->eventname; ?>
                                                </h6>
                                                <?php
                                                $date = new DateTime($samp->eventdate);
                                                $datedisp = $date->format('d F, Y');
                                                $date1 = new DateTime($samp->enddate);
                                                $datedisp1 = $date1->format('d F, Y');
                                                ?>
                                                <p class="muted"><Span>
                                                        <?php echo $datedisp; ?> to
                                                        <?php echo $datedisp1; ?>
                                                    </Span></p>
                                            </td>
                                        </tr>

                                    <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                aria-expanded="true" aria-controls="collapseTwo">
                                Recent Activities
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <table class="table table-striped borderless">
                                    <?php foreach ($parent as $samp): ?>
                                        <tr>
                                            <td>
                                                <h6>
                                                    <?php echo $samp->eventname; ?>
                                                </h6>
                                                <?php
                                                $date = new DateTime($samp->eventdate);
                                                $datedisp = $date->format('d F, Y');
                                                ?>
                                                <p class="muted"><Span>
                                                        <?php echo $datedisp; ?>
                                                    </Span></p>
                                            </td>
                                        </tr>

                                    <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="members container">
            <h3>FoSCU Members</h3>
            <div class="memimgs slider">
                <div class="slide">
                    <a href="" target=""><img src="static/images/log.png" alt=""></a>
                </div>
                <div class="slide">
                    <a href="https://fra.ug/" target="_blank"><img src="static/images/log1.png" alt=""></a>
                </div>
                <div class="slide"><a href="https://unadaug.org/" target="_blank"><img src="static/images/log3.png" alt=""></a>
                </div>
                <div class="slide">
                    <a href="https://www.afirduganda.org/" target="_blank"><img src="static/images/log4.png" alt=""></a>
                </div>
                <div class="slide">
                    <a href="https://www.consentug.org" target="_blank"><img src="static/images/log6.png" alt=""></a>
                </div>
                <div class="slide">
                    <a href="https://www.rikolto.org/" target="_blank"><img src="static/images/log7.png" alt=""></a>
                </div>
                <div class="slide">
                    <a href="https://krcuganda.org/" target="_blank"><img src="static/images/log8.png" alt=""></a>
                </div>
                <div class="slide">
                    <a href="https://www.rucid.org/" target="_blank"><img src="static/images/log9.png" alt=""></a>
                </div>
                <div class="slide">
                    <a href="#" target=""><img src="static/images/log5.png" alt=""></a>
                </div>
                <a href="https://unacoh.org/" class="slide" target="_blank"><img src="static/images/log10.png" alt=""></a>
                <a href="#" class="slide" target="_blank"><img src="static/logos/dimensional.png" alt=""></a>
                <a href="https://www.kulika.org/" class="slide" target="_blank"><img src="static/images/kulika.png" alt=""></a>
                <a href="https://www.croplifeug.org/" class="slide" target="_blank"><img src="static/images/log12.png"
                        alt=""></a>
                <a href="https://ugandaagribusinessalliance.com/" class="slide" target="_blank"><img src="static/logos/uaa.png"
                        alt=""></a>
                <a href="http://unffe.org.ug/" class="slide" target="_blank"><img src="static/logos/unff.png" alt=""></a>
                <a href="#" class="slide" target=""><img src="static/logos/sukuma.png" alt=""></a>
                <a href="#" class="slide" target=""><img src="static/logos/caes.png" alt=""></a>
                <a href="#" class="slide" target=""><img src="static/logos/bask.png" alt=""></a>
                <a href="#" class="slide" target=""><img src="static/logos/hortexa.png" alt=""></a>
                <a href="https://rtcuganda.org/" class="slide" target="_blank"><img src="static/logos/paramount.png" alt=""></a>
                <a href="https://caritasuganda.org/" class="slide" target="_blank"><img src="static/logos/caritus.png"
                        alt=""></a>
                <a href="https://gedauganda.org/" class="slide" target="_blank"><img src="static/logos/geda.png" alt=""></a>
                <a href="https://www.swisstph.ch/en/research" class="slide" target="_blank"><img src="static/logos/swistph.png"
                        alt=""></a>

            </div>
        </div> -->
        <div class="photos container">
            <h3 class="text-center">Our Events Photos</h3>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <a href="conv.php"> <img src="static/images/docu2.jpg" class="img-fluid" alt="Image 1">
                        </a>
                        <h5 class="mt-2">Development of food safety video coverage</h5>
                    </div>
                    <div class="col-md-4">
                        <a href="AGM.php"> <img src="static/gallery/AGM/group.jpg" class="img-fluid" alt="Image 1">
                        </a>
                        <h5 class="mt-2">FoSCU Annual General Meeting</h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="partner">
            <h3>FoSCU Partners</h3>
            <a href="https://www.biovision.ch/en/" target="_blank"><img src="static/images/biov.png" alt=""></a>
            <div class="contact card">
                <h3>Contact Us</h3>
                <h5>SECRETARIAT</h5>
                <h6>Email: info@foscu.org</h6>
                <h6>P.O.Box 154968</h6>
            </div>
        </div> -->
    </section>
</div>
<?php
include "footer.php";
