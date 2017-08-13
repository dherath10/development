<!--

http://slidesjs.com/

-->
<script src="jquery-1.7.1.min.js"></script>
<script src="slides.min.jquery.js"></script>
<style type="text/css">

    #example {
	width:300px;
	height:350px;
	position:relative;
	margin: 0 auto;
    }

    #ribbon {
        position:absolute;
        top:-3px;
        left:-15px;
        z-index:500;
    }

    #frame {
        position:absolute;
        z-index:0;
        width:739px;
        height:341px;
        top:-3px;
        left:-80px;
    }

    /*
	Slideshow
    */

    #slides {
        position:absolute;
        top:15px;
        left:4px;
        z-index:100;
    }

    /*
	Slides container
	Important:
	Set the width of your slides container
	Set to display none, prevents content flash
    */

    .slides_container {
        width:570px;
        overflow:hidden;
        position:relative;
        display:none;
    }

    /*
	Each slide
	Important:
	Set the width of your slides
	If height not specified height will be set by the slide content
	Set to display block
    */

    .slides_container div.slide {
        width:570px;
        height:270px;
        display:block;
    }


    /*
	Next/prev buttons
    */

    #slides .next,#slides .prev {
        position:absolute;
        top:107px;
        left:-39px;
        width:24px;
        height:43px;
        display:block;
        z-index:101;
    }

    #slides .next {
        left:585px;
    }

    /*
	Pagination
    */

    .pagination {
        margin:26px auto 0;
        width:100px;
    }

    .pagination li {
        float:left;
        margin:0 1px;
        list-style:none;
    }

    .pagination li a {
        display:block;
        width:12px;
        height:0;
        padding-top:12px;
        background-image:url(img/pagination.png);
        background-position:0 0;
        float:left;
        overflow:hidden;
    }

    .pagination li.current a {
        background-position:0 -12px;
    }

    /*
	Caption
    */

    .caption {
        z-index:500;
        position:absolute;
        bottom:-35px;
        left:0;
        height:30px;
        padding:5px 20px 0 20px;
        background:#000;
        background:rgba(0,0,0,.5);
        width:540px;
        font-size:1.3em;
        line-height:1.33;
        color:#fff;
        border-top:1px solid #000;
        text-shadow:none;
    }

    .caption p {
        margin: 0;
    }

</style>
<script>
    $(function(){
        $('#slides').slides({
            preload: true,
            preloadImage: 'img/loading.gif',
            play: 5000,
            pause: 2500,
            hoverPause: true,
            animationStart: function(current){
                $('.caption').animate({
                    bottom:-35
                },100);
                if (window.console && console.log) {
                    // example return of current slide number
                    console.log('animationStart on slide: ', current);
                };
            },
            animationComplete: function(current){
                $('.caption').animate({
                    bottom:0
                },200);
                if (window.console && console.log) {
                    // example return of current slide number
                    console.log('animationComplete on slide: ', current);
                };
            },
            slidesLoaded: function() {
                $('.caption').animate({
                    bottom:0
                },200);
            }
        });
    });
</script>

<div id="example">
    <img src="img/new-ribbon.png" width="112" height="112" alt="New Ribbon" id="ribbon">
<div id="slides">
        <div class="slides_container">
            <!-- IMG -->
            
            <div class='slide'>
                <a title='Click to View' href=''>
                <img width='570' height='270' src='2.jpg'  /></a>
                <div class='caption' style='bottom:0'>
                    <p>FF</p>
                </div>
            </div><!-- IMG-->
            <div class='slide'>
                <a title='Click to View' href=''>
                <img width='570' height='270' src='3.jpg'  /></a>
                <div class='caption' style='bottom:0'>
                    <p>FF</p>
                </div>
            </div>
            <div class='slide'>
                <a title='Click to View' href=''>
                <img width='570' height='270' src='4.jpg'  /></a>
                <div class='caption' style='bottom:0'>
                    <p>FF</p>
                </div>
            </div>
        </div>
        <a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
        <a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
    </div>
    <img src="img/example-frame.png" width="739" height="341" alt="Example Frame" id="frame">
</div>