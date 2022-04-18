        <?php
        
        $card = service("smarty");
        $card->set_Mode("bs5x");
        $card->caching = 0;
        $card->assign("type", "normal");
        $card->assign("class", "mb-3");
        $card->assign("header",false);
        $card->assign("image",false);
        $card->assign("body",false);
        $card->assign("text", $c);
        $card->assign("footer", false);
        return ($card->view('components/cards/index.tpl'));
        ?>
