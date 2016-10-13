<article itemprop="article" class="box horizontal boxWithMoreLink" itemscope="" itemtype="http://schema.org/WebPage">
            <table class="priecetable img-100">
                <tr>
                    <th></th>
                    <th><?= hotelicon_print('SZALLAS', 30, 'greyishbeige',lan("szobatipus")) ?></th>
                    <th><?= hotelicon_print('EGY-FO', 30, 'greyishbeige',lan("priece1person")) ?></th>
                    <th><?= hotelicon_print('KET-FO', 30, 'greyishbeige',lan("priece2person")) ?></th>
                </tr>
                <tr>
                    <td> <img itemprop="image" src="<?php echo $nimg = $RoomsClass->getimg($elem['id'], 100, 75); ?>" alt="<?php echo $elem["hu"]["title"]; ?>"></td>
                    <td><?= $elem['title'] ?></td>
                    <td><?= $adat["roomsize"]; ?><?= $elem['priece1'] ?> <?= $artipus[$elem['tip']]?></td>
                    <td><?= $adat["roomsize"]; ?><?= $elem['priece2'] ?> <?= $artipus[$elem['tip']]?></td>
                    <?php ?>
                </tr>
            </table>
</article>