var hlp, name, start, end, people, rooms, total;
function _(x){
  return document.getElementById(x);
}
function processPhase1(id, fname){
      hlp = id;
      name= fname;
    if(hlp.length > 0) {

    _("phase1").style.display = "none";
    _("phase2").style.display = "block";
    _("progressBar").value = 33;
    _("status").innerHTML = "Phase 2 of 3";
     }    
   
  }

function processPhase2(){

  start = _("start_date").value;
  end = _("end_date").value;
  if(start.length > 0 && end.length > 0 ){
    _("phase2").style.display = "none";
    _("phase3").style.display = "block";
    _("progressBar").value = 66;
    _("status").innerHTML = "Phase 3 of 3";
  } else {
      alert("Please fill in the fields"); 
  }
}
function processPhase3(){

  people = _("people").value;
  rooms = _("rooms").value; 
  total=( (4*200)+(people*50)+(rooms*100));
  if(people.length > 0 && rooms.length > 0){
    _("phase3").style.display = "none";
    _("show_all_data").style.display = "block";
    _("display_hlp").innerHTML = hlp;
    _("display_name").innerHTML = name;
    _("display_start").innerHTML = start;
    _("display_end").innerHTML = end;
    _("display_people").innerHTML = people;
    _("display_rooms").innerHTML = rooms;
    _("display_total").innerHTML = total;
    _("progressBar").value = 100;
    _("status").innerHTML = "Data Overview";
  } else {
      alert("Please fill in the fields");  
  }
}

function submitForm(){
  _("multiphase").method = "post";
  _("multiphase").action = "cleanerbook.php";
  _("multiphase").submit();
}

