<script>
    var sigep = document.getElementById('<?php echo($f->get_fid()); ?>_sigep');
    sigep.addEventListener('input', function () {
        //console.log("SIGEP: "+sigep.value);
        var url = "/disa/api/sigep/json/"+Date.now();
        var formData = new FormData();
        formData.append('sigep', sigep.value);
        formData.append('<?php echo(csrf_token());?>', '<?php echo(csrf_hash());?>');
        var xhr = new XMLHttpRequest();
        xhr.open('POST', url);
        xhr.responseType = 'json';
        xhr.onload = function (e) {
            if (this.status == 200) {
                var response = this.response;
                var message = response.message;
                var sigep=message.data;
                var name = document.getElementById('<?php echo($f->get_fid()); ?>_name');
                name.value=sigep.entidad;
            }
        };
        xhr.setRequestHeader("Cache-Control", "no-cache");
        xhr.send(formData);
    });
</script>

    function uploadFile(id) {
        var file = filelist[id];
        var xhr = new XMLHttpRequest();
        var fileSizeLimit = 1024;
        var url = "/storage/api/single/" + Date.now();
        var uploader = document.getElementById('file-uploader-' + id);
        uploader.classList.add("d-none");
        if (xhr.upload) {
            xhr.addEventListener('loadstart', function (e) {

            }, false);
            xhr.addEventListener('progress', function (e) {
                //console.log("--Progress");
                if (e.lengthComputable) {
                    console.log(e.total);
                } else {
                    var progress = Math.round((e.loaded / file.size) * 100);
                    console.log(progress);
                }
            }, false);
            xhr.addEventListener('loadstart', function (e) {

            }, false);
            //Traferencia completada
            xhr.addEventListener('load', function (e) {
                var task = document.getElementById('file-task' + id);
                task.classList.add("fade");
                task.remove();
                updateList();
            }, false);
            if (file.size <= fileSizeLimit * 1024 * 1024) {
                xhr.onreadystatechange = function (e) {
                    if (xhr.readyState == 4) {
                    }
                };
                var formData = new FormData();
                formData.append('attachment', file);
                formData.append('name', file.name);
                formData.append('size', file.size);
                formData.append('module', 'social');
                formData.append('object', '<?php echo($oid);?>');
                formData.append('reference', 'IMAGE');
                formData.append('<?php echo(csrf_token());?>', '<?php echo(csrf_hash());?>');
                xhr.open('POST', url, true);
                xhr.setRequestHeader("Cache-Control", "no-cache");
                xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                xhr.setRequestHeader('X-File-Name', file.name);
                xhr.setRequestHeader('X-File-Size', file.size);
                xhr.setRequestHeader('<?php echo(csrf_token());?>', '<?php echo(csrf_hash());?>');
                xhr.send(formData);
                console.log("Enviado");
                console.log(file);
            } else {
                console.log('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
            }
        }
    }

    function updateList() {
        var divFiles = document.getElementById('files');
        divFiles.innerHTML = "";
        var url = "/storage/api/list/<?php echo($oid);?>";
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url);
        xhr.responseType = 'json';
        xhr.onload = function (e) {
            if (this.status == 200) {
                //console.log("Actualizando listado de archivos!");
                //console.log('response', this.response); // JSON response
                var response = this.response;
                var files = response.messages.files;
                //console.log(files);
                Object.entries(files).forEach(([key, value]) => {
                    //console.log(value.attachment);
                    var divCol = document.createElement("div");
                    divCol.classList.add("col-4");
                    divFiles.appendChild(divCol);
                    divCol.innerHTML = cardStorageImagePreview(value.file, value.attachment, value.size, value.type, value.date, value.time);
                });
            }
        };
        xhr.setRequestHeader("Cache-Control", "no-cache");
        xhr.send();
        //Graficando
    }
