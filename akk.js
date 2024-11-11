var avatars = ['images/0.webp','images/1.webp','images/2.webp','images/3.png','images/4.webp'];
var friendsData = JSON.parse(sessionStorage.getItem('friendsData'));
var per = document.getElementById("perevod");
var pomper = document.getElementById("pomper");
var proffileData = JSON.parse(sessionStorage.getItem('proffileData'));
var avatar_number = proffileData[1];
var j = 0;
document.getElementById("whoPer").value = proffileData[0];
document.getElementById("log").innerHTML = proffileData[0];
document.getElementById("level").innerHTML = proffileData[2]+' -|-';
document.getElementById("dollar").innerHTML = proffileData[3]+' $';
document.getElementById("avatar").src = avatars[proffileData[1]];
document.getElementById("hidAv").value = proffileData[0];
frendListing();
function frendListing(){
    for (let i = 0; i < friendsData.length; i++) {
        var form = document.createElement('form');
        form.method='post';
        form.id=i;
        document.getElementById('frendList').appendChild(form);
        var inpSub = document.createElement('input');
        inpSub.type = 'submit';
        inpSub.value = friendsData[i];
        inpSub.className = 'friend';
        inpSub.id = friendsData[i];
        document.getElementById(i).appendChild(inpSub);
        var inpHid = document.createElement('input');
        inpHid.type = 'hidden';
        inpHid.name = 'logFren';
        inpHid.value = friendsData[i];
        document.getElementById(i).appendChild(inpHid);
        var inpHidFren = document.createElement('input');
        inpHidFren.type = 'hidden';
        inpHidFren.name = 'frenNo';
        inpHidFren.value = '1';
        document.getElementById(i).appendChild(inpHidFren);
    }
}
function smenAv(){
    av = document.getElementById("avatar");
    if(avatar_number==4){
        avatar_number = 0;
    }
    else{
        avatar_number++;
    }
    av.src = avatars[avatar_number];
    if(avatar_number!=proffileData[1]){
        document.getElementById("subAv").style.display = 'block';
        document.getElementById("hiddAv").value = avatar_number;
    }
    else{
        document.getElementById("subAv").style.display = 'none';
    }
}
profFren(2,2);
function profFren(login,ava){
    document.getElementById(login).type = 'button';
    document.getElementById('avFren').src = avatars[ava];
}
function perIn(){
    per.style.display='block';
    pomper.style.display='block';
}
function perOut(){
    per.style.display='none';
    pomper.style.display='none';
}
function history(v){
    if(v==1){
        document.getElementById('history').style.display = 'none';
        document.getElementById('historyper').style.display = 'block';
    }
    else{
        document.getElementById('history').style.display = 'block';
        document.getElementById('historyper').style.display = 'none';
    }
}
