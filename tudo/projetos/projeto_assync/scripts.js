let item = 0; //contador de imagens baixadas
const max = 11; // número da última imagem
const updateRate = 2000;

function proxImagem (img){
    fetch("img/"+img+".png")
        .then(resp => resp.blob())
        .then(blob => {
            const imageObjectURL = URL.createObjectURL(blob); // cria endereço da imagem
            console.log(imageObjectURL);
            const proxImg = document.createElement("img");
            proxImg.src = imageObjectURL;
            document.getElementById("placeholder").appendChild(proxImg);
        })
}

window.onload = setInterval(function(){
    proxImagem(item++ % (max+1));
    let scrollPoint = window.scrollY + window.innerHeight;
    window.scrollTo({top: scrollPoint, behavior: "smooth"});
}, updateRate);

window.onload = function(){
    for(let img=0; img <5; img++) proxImagem(img);
}
