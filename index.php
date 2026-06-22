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

    /* FoSCU Updates – project theme */
    .updates h3 {
        color: #F79321;
    }
    .updates .card {
        border: 1px solid #eee;
        border-radius: 0.5rem;
    }
    .updates .card-title {
        color: #F79321;
        font-weight: 600;
    }
    /* FoSCU Updates – image display redesign */
    .updates .updates-gallery {
        margin-top: 1.25rem;
        gap: 1rem;
    }
    .updates .updates-img-wrap {
        overflow: hidden;
        border-radius: 0.5rem;
        border: 1px solid #eee;
        background: #fafafa;
    }
    .updates .updates-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .updates .updates-gallery.cols-3 .updates-img-wrap {
        height: 220px;
    }
    .updates .updates-gallery.cols-2 .updates-img-wrap {
        height: 280px;
    }
    .updates .updates-img-single {
        margin-top: 1.25rem;
        max-width: 100%;
        overflow: hidden;
        border-radius: 0.5rem;
        border: 1px solid #eee;
        background: #fafafa;
    }
    .updates .updates-img-single img {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        display: block;
    }
    @media (max-width: 767px) {
        .updates .updates-gallery.cols-3 .updates-img-wrap { height: 200px; }
        .updates .updates-gallery.cols-2 .updates-img-wrap { height: 240px; }
        .updates .updates-img-single img { max-height: 320px; }
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
        <div class="updates container mb-5">
            <h3 class="text-center mb-4">FoSCU Updates</h3>
            <p class="text-center text-muted mb-4">News and activities from the Food Safety Coalition of Uganda.</p>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">1. Launching Evidence to Strengthen Food Safety and Sustainable Crop Protection</h5>
                                <p class="card-text">Representatives of member organizations of the Food Safety Coalition of Uganda (FoSCU) participated in the launch of the “Food Safety–Crop Protection Nexus: Insights from Uganda’s Agriculture Sector” synthesis report. The report presents evidence-based analysis on the current state of agrochemical use in Uganda and its implications for food safety, environmental sustainability, and public health. It further outlines targeted, actionable recommendations for policymakers, regulators, agricultural actors, and development partners to advance sustainable crop protection practices and strengthen food safety systems across the country.</p>
                                <div class="updates-img-single">
                                    <img src="static/gallery/updates-2025/launching-evidence-crop-protection.png" alt="FoSCU synthesis report launch – stakeholders with food safety materials">
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">2. World Food Safety Day 2025: Advancing Public Awareness and Advocacy</h5>
                                <p class="card-text">In collaboration with key stakeholders, members of the Food Safety Coalition of Uganda (FoSCU) led the Food Safety Walk in Kampala City as part of the 2025 World Food Safety Day commemorations. The initiative served as a high-visibility advocacy platform to raise public awareness on food safety risks and to promote collective responsibility for safer food systems. Through this engagement, FoSCU amplified the message of “safer food for all, by all,” mobilizing consumers, regulators, producers, and vendors to take shared action toward protecting public health and strengthening food safety practices across the value chain.</p>
                                <div class="row updates-gallery cols-3">
                                    <div class="col-md-4">
                                        <div class="updates-img-wrap"><img src="static/gallery/updates-2025/wfsd-walk-1.png" alt="World Food Safety Day 2025 – Food Safety Walk in Kampala"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="updates-img-wrap"><img src="static/gallery/updates-2025/wfsd-walk-2.png" alt="World Food Safety Day 2025 – march and banner"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="updates-img-wrap"><img src="static/gallery/updates-2025/wfsd-signs.png" alt="World Food Safety Day 2025 – participants with food safety signs"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">3. Strengthening Community Capacity on Food Safety</h5>
                                <p class="card-text">Through strategic partnerships, the Food Safety Coalition of Uganda (FoSCU) works to raise awareness and strengthen community capacity on food safety hazards. This is achieved through structured community engagements that empower consumers with practical knowledge on food safety risks, prevention measures, and safe food handling practices. By translating technical food safety standards into accessible community-level learning, FoSCU and its partners enable households, food vendors, and local leaders to identify, prevent, and respond to food safety hazards—contributing to improved public health, safer food systems, and more informed consumer decision-making.</p>
                                <div class="row updates-gallery cols-2">
                                    <div class="col-md-6">
                                        <div class="updates-img-wrap"><img src="static/gallery/updates-2025/community-capacity-workshop.png" alt="FoSCU food safety workshop – presenter and audience"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="updates-img-wrap"><img src="static/gallery/updates-2025/community-capacity-group.png" alt="FoSCU community event – food safety and consumer rights"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">4. Engaging Religious Leaders as Food Safety Champions</h5>
                                <p class="card-text">In collaboration with its partners, the Food Safety Coalition of Uganda (FoSCU) empowers religious leaders with evidence-based knowledge on food safety. Leveraging the World Food Day platform, FoSCU equips faith leaders to integrate food safety messages into sermons and community outreach, enabling them to effectively communicate safe food practices to their congregations. This approach harnesses the wide reach and trust of religious institutions to promote safer food handling, protect public health, and foster community-wide behavioral change.</p>
                                <div class="updates-img-single">
                                    <img src="static/gallery/updates-2025/religious-leaders-food-safety.png" alt="World Food Day 2024 – religious leaders and FoSCU partners">
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">5. FoSCU Engagement at the CAADP Meeting: Advancing Food Safety and Quality</h5>
                                <p class="card-text">Members of the Food Safety Coalition of Uganda (FoSCU) Steering Committee, together with representatives from member organizations, actively participated in the Comprehensive Africa Agriculture Development Programme (CAADP) meeting and its associated side events. FoSCU was represented by key board members, including Mr. Kimera Henry (Chairperson, Steering Committee), Prof. Kaaya Archileo (Chairperson, Research and Innovations), and Mr. Bwambale Benard (National Coordinator).</p>
                                <p class="card-text mb-0">During the meeting, FoSCU made strategic presentations and substantive contributions to high-level discussions, with a strong emphasis on food safety and food quality. These engagements positioned food safety as a critical component of agricultural transformation, underscoring the need to integrate safety and quality considerations into regional and national agricultural policies, research agendas, and investment frameworks.</p>
                                <div class="row updates-gallery cols-3">
                                    <div class="col-md-4">
                                        <div class="updates-img-wrap"><img src="static/gallery/updates-2025/caadp-banner-trio.png" alt="CAADP Kampala Summit – FoSCU representatives at banner"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="updates-img-wrap"><img src="static/gallery/updates-2025/caadp-group.png" alt="CAADP Kampala Summit – delegates at convention centre"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="updates-img-wrap"><img src="static/gallery/updates-2025/caadp-speaker.png" alt="CAADP Kampala Summit – speaker at podium"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">6. FoSCU Launches Aflatoxins Report at National High-Level Meeting</h5>
                                <p class="card-text">The Food Safety Coalition of Uganda (FoSCU) launched its Aflatoxins Report during a National High-Level Breakfast Meeting held ahead of World Food Safety Day of 2025 at Hotel Africana. The report was officially launched by Hon. Lt. Col. (Rtd) Bright Kanyontore Rwamirama, Minister of State for Animal Industry, in the presence of officials from key MDAs, FoSCU members, civil society organizations, academia, professional bodies, the media, and the private sector. The report provides evidence on practices that predispose foods to aflatoxin contamination, examines associated health and economic impacts, and outlines actionable recommendations to promote aflatoxin-free food systems in Uganda.</p>
                                <div class="row updates-gallery cols-3">
                                    <div class="col-md-4">
                                        <div class="updates-img-wrap"><img src="static/gallery/updates-2025/aflatoxins-report-group.png" alt="FoSCU Aflatoxins Report – group with report sign"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="updates-img-wrap"><img src="static/gallery/updates-2025/aflatoxins-report-signing.png" alt="FoSCU Aflatoxins Report – signing ceremony"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="updates-img-wrap"><img src="static/gallery/updates-2025/aflatoxins-report-launch.png" alt="FoSCU Aflatoxins Report – launch event group"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
