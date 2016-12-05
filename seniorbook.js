
var hlp, fname, start, end, seniors, total;
function _(x){
  return document.getElementById(x);
}
function processPhase1(){
  hlp = _("House-help_ID").value;
  fname = _("firstname").value;
  if(hlp.length > 0 && fname.length > 2){
    _("phase1").style.display = "none";
    _("phase2").style.display = "block";
    _("progressBar").value = 33;
    _("status").innerHTML = "Phase 2 of 3";
  } else {
      alert("Please fill in the fields"); 
  }
}
function processPhase2(){

  start = _("start_date").value;
  end = _("end_date").value;
  if(start.length > 0 && duration.length > 0 && end.length > 0 ){
    _("phase2").style.display = "none";
    _("phase3").style.display = "block";
    _("progressBar").value = 66;
    _("status").innerHTML = "Phase 3 of 3";
  } else {
      alert("Please fill in the fields"); 
  }
}
function processPhase3(){

  seniors = _("seniors").value;
  total=( (4*200)+(seniors*500));
  if(seniors.length > 0){
    _("phase3").style.display = "none";
    _("show_all_data").style.display = "table";
    _("display_hlp").innerHTML = hlp;
    _("display_fname").innerHTML = fname;
    _("display_start").innerHTML = start;
    _("display_end").innerHTML = end;
    _("display_seniors").innerHTML = seniors;
    _("display_total").innerHTML = total;
    _("progressBar").value = 100;
    _("status").innerHTML = "Data Overview";
  } else {
      alert("Please fill in the fields");  
  }
}

function submitForm(){
  _("multiphase").method = "post";
  _("multiphase").action = "seniorbook.php";
  _("multiphase").submit();
}

