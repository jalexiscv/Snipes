        //-------------------------------------------
        $containerparent="div{$pid}";
        $html .= "\n var v{$containerparent}= document.getElementById('{$containerparent}');";
        $html .= "\n var config{$containerparent}={'attributes':true,'childList':true,'subtree':true};";
        $html .= "\n var callback{$containerparent}= (mutationList, observer) => {";
        $html .= "\n for (const mutation of mutationList) {";
        $html .= "\n   if (mutation.type === 'childList') {";
        $html .= "\n     console.log('A child node has been added or removed.');";
        $html .= "\n   } else if (mutation.type === 'attributes') {";
        $html .= "\n     console.log('The '+mutation.attributeName+'attribute was modified.');";
        $html .= "\n   }";
        $html .= "\n }";
        $html .= "\n};";
        $html .= "\n  var observer{$containerparent} = new MutationObserver(callback{$containerparent});";
        $html .= "\n  observer{$containerparent}.observe(v{$containerparent},config{$containerparent});";
        //-------------------------------------------



    /**
     * Permite enmascarar campos de texto con el uso de la clase js-anssible-input-mask
     * asumiendo la existencia de dos posibles atributos input-mask o input-mask-regular
     *
     */
    document.querySelectorAll('[class-dependent]').forEach((function (t) {
        var targetNode = t;
        var config = {attributes: true, childList: false, subtree: false};
        var callback = (mutationList, observer) => {
            for (var mutation of mutationList) {
                if (mutation.type === 'childList') {
                    //console.log('A child node has been added or removed.');
                } else if (mutation.type === 'attributes') {
                    //console.log("The -"+targetNode.id+" -- "+mutation.attributeName+"- attribute was modified.");
                    var parentid = t.getAttribute('class-dependent');//console.log(parent);
                    var parent = document.getElementById(parentid);
                    var hasClass = parent.classList.contains("question-actived");
                    if(hasClass){
                        t.classList.remove('question-actived');
                    }
                }
            }
        };
        var observer = new MutationObserver(callback);
        observer.observe(targetNode, config);
    }));
