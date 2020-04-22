console.log('salve');
document.getElementById('post-form').addEventListener('submit',(e)=>{
    e.preventDefault();
    let form = document.forms["post-form"];
    console.log(form);

    
    let title = document.forms["post-form"]["titulo"].value;
    let city = document.forms["post-form"]["cidade"].value;
    let description = document.forms["post-form"]["descricao"].value;
    
    let animalRadio = document.forms["post-form"]["animal"];
    let animal;

    for(let i = 0; i < animalRadio.length; i++){
        if(animalRadio[i].checked){
            animal = animalRadio[i].value
        }
    }

                
    let tipoRadio = document.forms["post-form"]["tipo"];
    let tipo;
    
    for(let i = 0; i < tipoRadio.length; i++){
        if(tipoRadio[i].checked){
            tipo = tipoRadio[i].value
        }
    }

    let imagesObject = document.forms["post-form"]["foto[]"].files;
    console.log(imagesObject)
    let images = [];
    for(let i = 0; i < imagesObject.length; i++){
        
        let File = {
        'lastModified'     : document.forms["post-form"]["foto[]"].files[i].lastModified,
        'lastModifiedDate' : document.forms["post-form"]["foto[]"].files[i].lastModifiedDate,
        'name'             : document.forms["post-form"]["foto[]"].files[i].name,
        'size'             : document.forms["post-form"]["foto[]"].files[i].size,
        'type'             : document.forms["post-form"]["foto[]"].files[i].type 
        }

        images.push(File);
    } 
    
    let user_id = document.forms["post-form"]["user_id"].value
    let post = {
        titulo:title,
        animal:animal,
        cidade:city,
        tipo:tipo,
        foto:images,
        descricao:description,
        user_id:user_id
    }
    // let loader = '<div><img src="/loader.svg"></div>'
    // document.getElementById("post-wrapper").innerHTML = loader;
    let token = document.forms["post-form"]["_token"].value;
    console.log(JSON.stringify(post));
    console.log(post); 
    // console.log(token);
    // console.log(JSON.stringify(post));
    // fetch('http://localhost:8000/registrar-post', {
    //     headers: {
    //         "Content-Type": "application/json",
    //         "Accept": "application/json, text-plain, */*",
    //         "X-Requested-With": "XMLHttpRequest",
    //         "X-CSRF-TOKEN": token
    //        },
    //       method: 'post',
    //       credentials: "same-origin",
    //       body:JSON.stringify("S")
    //      })
    //     .then((response) => console.log(response.json()))
    //     .catch((err) => {
    //       console.log(err);
    //   });

      var xhr = new XMLHttpRequest();

xhr.open('POST', 'http://localhost:8000/registrar-post', true);
xhr.setRequestHeader("Content-Type", "application/json");
xhr.setRequestHeader("X-CSRF-TOKEN",token)
xhr.withCredentials = true;

xhr.onload = function () {
  // Requisição finalizada. Faça o processamento aqui.
  console.log(this.response)
};

xhr.send(JSON.stringify(post));

})