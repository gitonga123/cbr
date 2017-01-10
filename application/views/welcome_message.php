<?php
require_once 'home_header.php';
if ($_SESSION['is_logged_in']) {
    ?>

    <div id="Home" class="w3-container w3-white w3-padding-16" style="margin-top: 2%;">
        <button class="btn btn-info w3-right" onclick="plusDivs(-1)"><i class="fa fa-backward w3-left-align"></i></button>
        <h3>Welcome To The CBR System</h3>
        <button class="btn btn-info w3-right" onclick="plusDivs(+1)"><i class="fa fa-forward w3-right-align"></i></button>
    </h3>
    <div class="w3-row-padding mySlides1" style="margin:0 -16px;">
        <div class="row">
            <div class="col-lg-3">    
                <img src="/cbr/assets/images/hqdefault.jpg" height="300px" width="299">
            </div>
            <div class="col-lg-6">
                <p style="font-weight: bold;color: red">
                    Featured Disease:-Tuberculosis (TB) facts
                </p>

                <or>

                <li>TB is an infectious disease that's transmitted from person to person.</li>
                <li> There are many different types of TB.</li>
                <li>    A bacterium, Mycobacterium tuberculosis, causes the disease.</li>
                <li>   There are many risk factors for TB. Clinical symptoms and signs of pulmonary TB include fever, night sweats, cough, hemoptysis (coughing up blood-stained sputum), weight loss, fatigue, and chest pain.</li>
                <li>   TB is contagious; the incubation and contagious periods may vary.</li>
                <li>   Physicians definitively diagnose TB by culturing mycobacteria from sputum or biopsy specimens, but health-care professionals presumptively diagnose TB by history, physical exam, skin testing, and chest X-rays.</li>
                <li>  Treatment of TB infection is related to the type of TB infection and often requires extended treatments (months) with one or more anti-TB drugs.</li>
                </or>
            </div>
            <div class="col-lg-12">
                <or>
                <li> Complications of TB range from none to chronic problems and death and include lung, kidney, and liver problems that can be severe.</li>
                <li> The prognosis for appropriately treated TB infection is good. The prognosis declines in people who develop complications or who have had previous TB treatments.</li>
                <li> Prevention of TB involves both early treatment to reduce transmission and isolation of the infected person until they are no longer contagious. There is a vaccine against TB, but it is not used routinely in the U.S. because of efficacy issues and other problems. </li>
                </or>
            </div>

        </div>

    </div>
<!--    <div class="w3-row-padding mySlides2" style="margin:0 -16px;">
        <div class="row">
            <div class="col-lg-3">    
                <img src="/cbr/assets/images/hqdefault.jpg" height="300px" width="299">
            </div>
            <div class="col-lg-6">
                <p style="font-weight: bold;color: red">
                    Featured Disease:-Tuberculosis (TB) facts
                </p>

                <or>

                <li>TB is an infectious disease that's transmitted from person to person.</li>
                <li> There are many different types of TB.</li>
                <li>    A bacterium, Mycobacterium tuberculosis, causes the disease.</li>
                <li>   There are many risk factors for TB. Clinical symptoms and signs of pulmonary TB include fever, night sweats, cough, hemoptysis (coughing up blood-stained sputum), weight loss, fatigue, and chest pain.</li>
                <li>   TB is contagious; the incubation and contagious periods may vary.</li>
                <li>   Physicians definitively diagnose TB by culturing mycobacteria from sputum or biopsy specimens, but health-care professionals presumptively diagnose TB by history, physical exam, skin testing, and chest X-rays.</li>
                <li>  Treatment of TB infection is related to the type of TB infection and often requires extended treatments (months) with one or more anti-TB drugs.</li>
                </or>
            </div>
            <div class="col-lg-12">
                <or>
                <li> Complications of TB range from none to chronic problems and death and include lung, kidney, and liver problems that can be severe.</li>
                <li> The prognosis for appropriately treated TB infection is good. The prognosis declines in people who develop complications or who have had previous TB treatments.</li>
                <li> Prevention of TB involves both early treatment to reduce transmission and isolation of the infected person until they are no longer contagious. There is a vaccine against TB, but it is not used routinely in the U.S. because of efficacy issues and other problems. </li>
                </or>
            </div>

        </div>

    </div>-->
    </div>
    <div style="padding-top: 10%;"></div>
    <?php
    require_once 'home_footer.php';
    ?>

    <script>
        $(document).ready(function () {
            var x = document.getElementById('home');
            x.className = 'w3-red';
            var y = document.getElementById('active_bar');
            y.style.color = "white";

            var ay = document.getElementById('active_bar2');
            ay.style.color = "black";

            var by = document.getElementById('active_bar8');
            by.style.color = "#000000";

            var cy = document.getElementById('active_bar5');
            cy.style.color = "#000000";

            var dy = document.getElementById('active_bar4');
            dy.style.color = "#000000";


            var fy = document.getElementById('active_bar6');
            fy.style.color = "#000000";

    //            var gy = document.getElementById('active_bar7');
    //            gy.style.color = "#000000";

    //            var hy = document.getElementById('active_bar8');
    //            hy.style.color = "#000000";
        });
    </script>

    </body>
    <?php
} else {
    redirect('login');
}
?>
</html>