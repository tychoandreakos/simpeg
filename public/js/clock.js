// START CLOCK SCRIPT

let h1 = document.querySelector('h1');
let day = document.querySelector('#day');
let utc = document.querySelector('#utc');

function showTime(){
    let date = new Date();
    let h = date.getHours();
    let m = date.getMinutes();
    let s = date.getSeconds();
    let month = date.getMonth();
    let datenum = date.getDate();
    let fullYear= date.getFullYear();
    let session; 
    let mon;
    if(h>11){
        session = "PM"
    }else {
        session = "AM";
    }
  if(h>12){
    h=h-12;
  }

    let daynum = date.getDay();
    let dayText= daynum;
    if(dayText==0){
        day.textContent="Minggu";
    }else if(dayText == 1){
        day.textContent="Senin";
    }else if(dayText==2){
        day.textContent="Selasa";
    }else if(dayText==3){
        day.textContent="Rabu"
    }else if(dayText==4){
        day.textContent="Kamis"
    }else if(dayText==5){
        day.textContent="Jumat"
    }else if(dayText==6){
        day.textContent="Sabtu"
    }


    if(s<10){
        s=`0${s}`;
    }
    if(m<10){
        m=`0${m}`
    }
    if(h<10){
        h=`0${h}`;
    }

    if(h==0){
        h=`12`;
    }
    switch(month){
        case 0:
        mon = "Januari";
        break;
        case 1:
        mon = "Februari";
        break;
        case 2:
        mon = "Maret";
        break;
        case 3:
        mon = "April";
        break;
        case 4:
        mon = "Mei";
        break;
        case 5:
        mon = "Juni";
        break;
        case 6:
        mon = "Juli";
        break;
        case 7:
        mon = "Agustus";
        break;
        case 8:
        mon = "September";
        break;
        case 9:
        mon = "Oktober";
        break;
        case 10:
        mon = "November";
        break;
        case 11:
        mon = "Desember";
        break;
    }

    utc.textContent = `${datenum} ${mon} ${fullYear}`;
    let time = `${h} : ${m} : ${s} ${session}`;
    h1.textContent = time;
    setTimeout(showTime,1000);

}


showTime(); 