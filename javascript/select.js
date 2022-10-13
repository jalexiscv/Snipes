    var parent= document.getElementById('<?php echo($f->get_fid());?>_parent');
    parent.addEventListener('change', function () {
        var element = document.getElementById('<?php echo($f->get_fid());?>_parent');
        var question = element.value;
        change_parent(question);
        //console.log("Cambio de parent..."+ question);
    });

    function change_parent(question) {
        var characterization = '<?php echo($oid); ?>';
        var token='<?php echo(csrf_token());?>';
        var hash= '<?php echo(csrf_hash());?>';
        var url = "/characterize/api/options/json/listbyquestion/"+ question+"?t=" + Date.now();
        var formData = new FormData();
        formData.append('characterization', characterization);
        formData.append(token, hash);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', url);
        xhr.responseType = 'json';
        xhr.onload = function (e) {
            if (this.status == 200) {
                var response = this.response;
                var data = response.data;
                var select = document.getElementById("<?php echo($f->get_fid());?>_answer");
                removeAll(select);
                for (var i = 0; i < data.length; i++) {
                    var option = document.createElement("option");
                    option.text = data[i].label;
                    option.value = data[i].value;
                    select.add(option);
                }
                //console.log(data);
            }
        };
        xhr.setRequestHeader("Cache-Control", "no-cache");
        xhr.send(formData);
    }

    function removeAll(selectBox) {
        while (selectBox.options.length > 0) {
            selectBox.remove(0);
        }
    }

