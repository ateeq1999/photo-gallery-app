<script type="text/javascript">
    $(document).ready(function () {
        $("#nav_toggle").click(function () {
            $("nav").slideToggle(300);
        });
    });
</script>
<script>
    $(document).ready(function (e) {
        $(".create_your_own_toggle").hide();

        $(".white-circle-arrow").click(function () {
            $(".red-panel_inner").animate({ width: "300px" });
            $(".create-your-own").animate({ opacity: '0' });
            $(".white-circle-arrow").hide();
            $(".white-circle-arrow_bb").show();
            $(".create_your_own_toggle").delay(300).fadeIn();
        });

        $(".white-circle-arrow_bb").click(function () {
            $(".create_your_own_toggle").hide();
            $(".red-panel_inner").animate({ width: "151px" });
            $(".create-your-own").animate({ opacity: '1' });
            $(".white-circle-arrow_bb").hide();
            $(".white-circle-arrow").show();
        });
    });
</script>
<script>
    $(document).ready(function (e) {
        $(".mob_create_your_own_toggle").hide();
        $(".mob_white-circle-arrow").show();

        $(".mob_white-circle-arrow").click(function () {
            $(".mob_toggle_section").animate({ height: "400px" });
            $(".mob_create-your-own").animate({ opacity: '0' });
            $(".mob_white-circle-arrow").hide();
            $(".mob_create-your-own").hide();
            $(".mob_white-circle-arrow_bb").show();
            $(".mob_create_your_own_toggle").delay(300).fadeIn();
        });

        $(".mob_white-circle-arrow_bb").click(function () {
            $(".mob_create_your_own_toggle").hide();
            $(".mob_toggle_section").animate({ height: "120px" });
            $(".mob_create-your-own").animate({ opacity: '0.3' });
            $(".mob_create-your-own").animate({ opacity: '1' });
            $(".mob_create-your-own").show();
            $(".mob_white-circle-arrow_bb").hide();
            $(".mob_white-circle-arrow").show();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#slider1").tinycarousel({ interval: true });
        var slider1 = $("#slider1").data("plugin_tinycarousel");
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.bxslider').bxSlider({ auto: true, autoControls: true });
        $('nav li ul').hide().removeClass('fallback');
        $('nav li').hover(function () {
            $('ul', this).stop().slideDown(100);
        },
        function () {
            $('ul', this).stop().slideUp(100);
        });
    });
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-97619668-1', 'auto');
    ga('send', 'pageview');

</script>

<script>
    $(document).ready(function () {
        $(".fancybox").fancybox({
            openEffect: 'none',
            closeEffect: 'none'
        });
    });
</script>