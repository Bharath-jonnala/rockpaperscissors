let score = JSON.parse(localStorage.getItem('score')) || {
    wins: 0,
    losses: 0,
    ties: 0
    };
updateScoreElement();
document.querySelector('.js-rock-button').addEventListener('click',()=>{
    playGame('Rock');
});
document.querySelector('.js-paper-button').addEventListener('click',()=>{
    playGame('paper');
});
document.querySelector('.js-siccors-button').addEventListener('click',()=>{
    playGame('siccors');
});
document.body.addEventListener('keydown',(event)=>{
    if(event.key==='r'){
        playGame('Rock');
    }
    else if(event.key==='p'){
        playGame('paper');
    }
    else if(event.key==='s'){
        playGame('siccors');
    }

})

function playGame(a){
    const computerPick=computerPick1();
    let result='';
    if(a==='Rock'){
        if(computerPick==='Rock'){
            result='Tie';
        }
        else if(computerPick==='paper'){
            result='you loose';
        }
        else{
            result='you won';
        }
    }
    else if(a==='paper'){
        if(computerPick==='paper'){
            result='Tie';
        }
        else if(computerPick==='siccors'){
            result='you loose';
        }
        else{
            result='you won';
        }
    }
    else if(a==='siccors'){
        if(computerPick==='siccors'){
            result='Tie';
        }
        else if(computerPick==='Rock'){
            result='you loose';
        }
        else{
            result='you won';
        }
    }
    if (result === 'you won') {
        score.wins += 1;
        } else if (result === 'you loose') {
        score.losses += 1;
        } else if (result === 'Tie') {
        score.ties += 1;
    }
    localStorage.setItem('score', JSON.stringify(score));
    updateScoreElement();
    document.querySelector('.js-result').innerHTML=result;
    document.querySelector('.js-moves').innerHTML=`You 
<img src="${a}-emoji.png" class="move-icon">
<img src="${computerPick}-emoji.png" class="move-icon">Computer`;
}
function updateScoreElement() {
    document.querySelector('.js-score')
.innerHTML = `Wins: ${score.wins}, Losses: ${score.losses}, Ties: ${score.ties}`;
}
function computerPick1(){
    const va=Math.random();
    let pick='';
    if(va>=0 && va<1/3){
        pick='rock';
    }
    else if(va>=1/3&&va<2/3){
        pick='paper';
    }
    else if(va>=2/3&&va<1){
        pick='siccors';
    }
    return pick;
    
}
let isAutoplaying=false;
let intervalId;
function autoplay()
{
    if(!isAutoplaying){
        intervalId=setInterval(function(){
            const playerMove=computerPick1();
            playGame(playerMove);
        },1000);
        isAutoplaying=true;
    }else{
        clearInterval(intervalId);
        isAutoplaying=false;
    }
   
}
