    <link href="https://fonts.googleapis.com/css?family=Coustard" rel="stylesheet">

    
<style>
    @import url('https://fonts.googleapis.com/css?family=Fugaz+One|Nothing+You+Could+Do');
    .animst1{
      position: relative;
        width: 100%;
        /*height: 100%;*/
        display: block;
        overflow: hidden;
        -webkit-perspective: 500px; /* Chrome, Safari, Opera  */
        perspective: 500px;
        font-family: 'Coustard','Nothing You Could Do', cursive;
    }

    .animst1 .contentlayer,
    .animst1 .bgcenterlayer,
    .animst1 .bgcenterlayer1,
    .animst1 .bg{
        left: 0;
        top: 0;
        margin: 0;
        padding: 0;
        width: 100%;
        height: auto;
        position: absolute;
        background-size: cover;
    }
    .animst1 .bg{
        position: relative;
        overflow: hidden;
    }
    .animst1 .bgcenterlayer{
        width: 102%;
        background-image: url("http://www.aquasoft.de/blog/hilfe/files/2013/01/Schmutz.png");
        height:100%;

    }
    .animst1 .bgcenterlayer1{
        width: 110%;
        height:100%;
        background-image: url("http://photoshop-kepszerkeszte.lapunk.hu/tarhely/photoshop-kepszerkeszte/kepek/ecsetek/reszecskek_es_csillagok__3_.png");

    }

    .animst1 .contentlayer{
        position: absolute;
        left: 1%;
        width: 50%;
        top: 5%;
        height: 90%;
        background: rgba(255,255,255,0.6);
        color: white;
        padding: 20px;
        overflow: hidden;
        text-align: center;
        font-size: 16px;
        opacity: 0.4;
    }

    .animst1:nth-child(2n+2) .contentlayer{
        left: auto;
        right: 1%;
        width: 50%;
    }


    .animst1 .contentlayer h2{
        font-family: 'Fugaz One', cursive;
        font-size: 25px;
    }

    .animst1 .bg img{
        position:relative;
        animation-name: bounce1;
        animation-duration: 3s;
        animation-iteration-count: infinite;
    }
    .animst1:nth-child(2n) .bg img{
        position:relative;
        animation-name: bounce2;
        animation-duration: 3s;
        animation-iteration-count: infinite;
    }

   .animst1 .bg img{
       position: relative;
       width: 100%;
       display: block;
    }
    .animst1 .bgcenterlayer{
        animation-name: leftrigth1;
        animation-duration: 10s;
        animation-iteration-count: infinite;
    }
    .animst1 .bgcenterlayer1{
        animation-name: leftrigth2;
        animation-duration: 6s;
        animation-iteration-count: infinite;
    }

    .animst1:hover .contentlayer{
        opacity: 1;

    }
    .clear{
        clear-after: both;
    }
    @keyframes bounce1 {
        0% {
            transform: rotate(3deg);

            -webkit-transform: rotateY(3deg) scale(1.2); /* Chrome, Safari, Opera  */
        }
        50% {
            transform: rotate(-3deg);

            -webkit-transform: rotateY(-3deg) scale(1.1); /* Chrome, Safari, Opera  */
        }
        100% {
            transform: rotate(3deg);

            -webkit-transform: rotateY(3deg) scale(1.2); /* Chrome, Safari, Opera  */
        }

    }
    @keyframes bounce2 {
        0% {
            transform: rotate(-3deg);

            -webkit-transform: rotateY(-3deg) scale(1.1); /* Chrome, Safari, Opera  */
        }
        50% {
            transform: rotate(3deg);

            -webkit-transform: rotateY(3deg) scale(1.2); /* Chrome, Safari, Opera  */
        }
        100% {
            transform: rotate(-3deg);

            -webkit-transform: rotateY(-3deg) scale(1.1); /* Chrome, Safari, Opera  */
        }

    }
    @keyframes leftrigth1 {
        0% {
           left:0;
        }
        50% {
           left:-2%;
        }
        100% {
           left:0;
        }

    }
    @keyframes leftrigth2 {
        0% {
           left:-5%;
        }
        50% {
           left:5%;
        }
        100% {
           left:-5%;
        }

    }
</style>

    <?php
    if ($auser["jog"] > 2) {
        ?>
        <a href="<?php echo $homeurl . $separator . $getparams[0]; ?>/edittext">Új site</a>
    <?php } ?>
    <div class="">
        <news itemscope="" itemtype="http://schema.org/WebPage">
            <?php
            if (count($hirekelemek) > 0) {
                $che = $stn = 1;
                $counter = 0;
                $numh = count($hirekelemek);
                foreach ($hirekelemek as $elem) {
                    //lang text
                    //$filtersh["id"] = $elem['id'];
                    //$elemhuid = $SiteClass->get_text($_SESSION['lang'], $filtersh);
                    //$elem['hu'] = $elemhuid['datas'][0];
                    $elem['url'] = $SiteClass->createurl($elem);;
                    // arraylist($elemhuid);
                    //article
                    include('display3.php');
                }
            }
            ?>
            <?php if ($oldalakszama > 1) { //oldalazó	?>
                <nav class="text-center">
                    <ul class="pagination">
                        <li>
                            <a href="<?php echo $separator . $_GET["q"] . $separator2 . "page=0"; ?>"
                               aria-label="First">
                                <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $separator . $_GET["q"] . $separator2 . "page=" . ($oldal - 1); ?>"
                               aria-label="Previous">
                                <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                            </a>
                        </li>
                        <?php
                        for ($c = 0; $c <= $oldalakszama - 1; $c++) {
                            ?>
                            <li><a
                                    href="<?php echo $separator . $_GET["q"] . $separator2 . "page=" . $c; ?>"><?php echo $c + 1; ?></a>
                            </li>
                        <?php }
                        ?>
                        <!--li class="active"><a href="#">2</a></li-->
                        <li>
                            <a href="<?php echo $separator . $_GET["q"] . $separator2 . "page=" . ($oldal + 1); ?>"
                               aria-label="Next">
                                <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $separator . $_GET["q"] . "&page=" . ($oldalakszama - 1); ?>"
                               aria-label="Last">
                                <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <?php
//oldalazó
            } ?>
        </news>
    </div>

    </div>
    <script type="text/javascript">
        function gomemove(){
            scrollanimate('animst1','fadeIn');
        }
        jQuery(document).ready(function() {
            $(window).on('scroll resize', gomemove);
            $(window).trigger('scroll');
        });
    </script>