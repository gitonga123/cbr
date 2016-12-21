<?php
require_once 'home_header.php';
if ($_SESSION['is_logged_in']) {
    ?>

    <div id="Home" class="w3-container w3-white w3-padding-16" style="margin-top: 2%;">
        <h3>Find Out what is Ailing you</h3>
        <div class="w3-row-padding" style="margin:0 -16px;">
            <div class="w3-half">
                <label>From</label>
                <input class="w3-input w3-border" type="text" placeholder="">
            </div>
            <div class="w3-half">
                <label>To</label>
                <input class="w3-input w3-border" type="text" placeholder="">
            </div>
        </div>
        <p><button class="w3-btn w3-dark-grey">Search and find dates</button></p>
    </div>
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

            var by = document.getElementById('active_bar2');
            by.style.color = "#000000";

            var cy = document.getElementById('active_bar3');
            cy.style.color = "#000000";

            var dy = document.getElementById('active_bar4');
            dy.style.color = "#000000";

            var ey = document.getElementById('active_bar5');
            ey.style.color = "#000000";

            var fy = document.getElementById('active_bar6');
            fy.style.color = "#000000";

//            var gy = document.getElementById('active_bar7');
//            gy.style.color = "#000000";

            var hy = document.getElementById('active_bar8');
            hy.style.color = "#000000";
        });
    </script>

    </body>
    <?php
} else {
    redirect('login');
}
?>
</html>