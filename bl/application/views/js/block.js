    var btnOpen = document.getElementById('btnOpen');
    var nametitle = document.getElementById('nametitle');
    var quizcontent = document.getElementById('quizcontent');
    var SelectedCoin = document.getElementById('SelectedCoin');

    btnOpen.disabled=true;

var isActiveCreate = () => {
    var namevalue = nametitle.value;
    var content = quizcontent.value;
    var coin = SelectedCoin.innerHTML.trim();
      
if(namevalue.length!=0&&content.length!=0&&coin!='Coin Select'){
    btnOpen.disabled=false;
}else{
    btnOpen.disabled=true;
}
}

const cat = () => {
        nametitle.addEventListener('input', isActiveCreate);
        quizcontent.addEventListener('input', isActiveCreate);
        SelectedCoin.addEventListener('input', isActiveCreate);
        nametitle.addEventListener('keydown', isActiveCreate);
        quizcontent.addEventListener('keydown', isActiveCreate);
        SelectedCoin.addEventListener('keydown', isActiveCreate);
    }
cat();
