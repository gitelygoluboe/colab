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
