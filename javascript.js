var friends = [];
function register(){
    var reg = document.getElementById("register");
    var regi = document.getElementById("reg_but");
    if(reg.style.display=='none'){
        reg.style.display = 'block';
        regi.style.width = 'auto';
        regi.textContent = '-';
    }
    else{
        reg.style.display = 'none';
        regi.style.width = '100%';
        regi.textContent = 'зарегестрируйтесь';
    }
}
function login(log,av,lev,sot) {
    var  data = [log,av,lev,sot];
    sessionStorage.setItem('friendsData',JSON.stringify(friends));
    sessionStorage.setItem('proffileData',JSON.stringify(data));
    window.location.href = 'akk.php';
}
//100101010101010011001001  
//101001001100010100010101  
//010110100001011010010110  
//        01010101          
//        01001010          
//        00110100
//        01010111
//        01011001
//        10011010
//        00010101
