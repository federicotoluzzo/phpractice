function updateTotal(){
    let total = 0;
    for (let input of document.getElementsByClassName("number")) {
        total += input.value * input.dataset.price;
    }
    document.getElementById("total").innerText = `Text: ${total}€`;
}