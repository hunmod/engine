<section class="pagefull" >
        <?php $footerhir=egy_hir(153);
		echo $footerhir[0]["hir"];
		?>
        <a href="<?php echo $kezdooldal.$separator.shorturl_get("hirek/hir/".$footerhir[0]["id"]);?>" class="more">Tovább</a>
</section>
