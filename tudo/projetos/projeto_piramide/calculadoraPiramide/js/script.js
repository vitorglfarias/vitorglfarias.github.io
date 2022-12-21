function calc(){
    let lado = document.getElementById("lado").value ;
    let altura = document.getElementById("altura").value;
    let resultVolume = document.getElementById("resultVolume");
    let resultArea = document.getElementById("resultArea");
    let volume = ((lado*lado*altura)/3);
    let area = 4*(Math.sqrt((lado/2)*(lado/2)+altura*altura)*lado/2)+lado*lado; /* O cálculo dos dois Teoremas de Pitágoras necessários para encontrar o valor da área da pirâmide já estão inseridos nesta linha */
    resultVolume.value = volume;
    resultArea.value = area;
}

document.getElementById("botao").addEventListener("click", calc);