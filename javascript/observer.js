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
