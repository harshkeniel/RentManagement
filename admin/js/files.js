
function downloadzip(val,id,btn){
    console.log(btn);
    btn.disabled = true;
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "backend/files.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                    fetch('./backend/'+data)
                    .then(resp => resp.blob())
                    .then(blob => {
                        const url = window.URL.createObjectURL(blob);
                        const a = document.createElement('a');
                        a.style.display = 'none';
                        a.href = url;
                        // the filename you want
                        a.download = data;
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                        alert('File downloaded!');
                        btn.disabled = false;
                        $.ajax({
                            url: "./backend/files.php",
                            type: "post",
                            data: {"val":"unlink","file":data}
                        });
                    })
                    .catch(() => alert('Something went wrong!'));

            }
        }
    }
    // Sending data from Ajax to php
    let formData = new FormData(); //creating new formData
    formData.append('val',val);
    formData.append('id',id);
    xhr.send(formData); // sending form data to php



}
