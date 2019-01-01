
//var buttonSend = document.getElementById("startGame");
var contentWrapper = document.getElementById("wrapperID");
var stateElement = document.getElementById("state");
var question = "After how many beers(500ml) you usualy get drunk?";

var drawnedCount = 0;
var drinked = 0;
var beerLimit;
/*function startGameListener(){
    buttonSend.addEventListener("click", startGame, false);
}*/
// var buttonDrink;

// function drinkBeerListener(){
//     buttonDrink.addEventListener("click", drinkBeer, false);
// }

// function drinkBeer(image){
//     image.setAttribute("src", "_img/emptyGlass.png");
// }

function showAlert(){
    window.alert("look out you are drunk");
}

function startGame(){
    clearPlain();
    stateElement.innerHTML = "Sober";
    drinked = 0;
    var beerCountString = window.prompt(question);
    beerLimit = parseInt(beerCountString);
    changeButtonSighn();
    drawnedCount = drawCount(beerLimit);
    for(var i=1; i <= drawnedCount; i++){
            addBeerImage(i);
    }

//    buttonDrink = document.getElementById("beerImg");
}

function drawCount(beers){
    var countBeersToDrink = Math.floor( 1 + Math.random() * ( 5 * beers ) );
    return countBeersToDrink;
}

function addBeerImage(i){

    /*
    var divBeerImg = document.createElement("div");
    divBeerImg.setAttribute("class", "beerImg");
    var imageBeerEmpty = document.createElement("img");
    imageBeerEmpty.setAttribute("src", "_img/emptyGlass.png");
    imageBeerEmpty.setAttribute("id", "empty");
    var imageBeerFull = document.createElement("img");
    imageBeerFull.setAttribute("src", "_img/piwo.png");
    imageBeerFull.setAttribute("id", "full");
    divBeerImg.appendChild(imageBeerEmpty);
    divBeerImg.appendChild(imageBeerFull);
    contentWrapper.appendChild(divBeerImg);*/


    var imageBeer = document.createElement("img");
    imageBeer.setAttribute("src", "../_img/piwo.png");
    imageBeer.classList.add("beerImage");
    imageBeer.setAttribute("id", "beerImg"+i);
    imageBeer.addEventListener("click",function(){
        imageBeer.setAttribute("src", "../_img/emptyGlass.png");
        drinked++;
        checkState();
    },false);
    contentWrapper.appendChild(imageBeer);


}

function clearPlain(){
    while(contentWrapper.hasChildNodes()){   
        contentWrapper.removeChild(contentWrapper.firstChild);
    }
}

function checkState(){
    if(drinked >= 4*beerLimit ){
        stateElement.innerHTML = "Zgon";
    }
    else if( drinked >= 2*beerLimit ){
        stateElement.innerHTML = "Wasted";
    }
    else if( drinked >= beerLimit ){
        stateElement.innerHTML = "Drunk";
    }
    //showPromptIfWantAnotherBeer();

}

function changeButtonSighn(){
    var startButton = document.getElementById("startGame")
    startButton.innerHTML = "Reset";
}

// function showPromptIfWantAnotherBeer() {
//     if (drinked==drawnedCount) {
//         var response=prompt('Another beer? y/n');
//         if (response.toLowerCase()==y) {
//             addBeerImage(++drawnedCount);
//         }
    
//     }
// }

window.addEventListener("load", drinkBeerListener, false);