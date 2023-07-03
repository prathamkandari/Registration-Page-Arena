/* Page1 */
let teamName=NULL;
function displayRadioValue() {
    return document.querySelector('input[name="inlineRadioOptions"]:checked').value;
}
document.getElementsByClassName("valo-next-button").addEventListener('click',function ver(){
  alert("hjhj")
})
function changeNumber(game){
    if(game==="BGMI"){
        document.getElementById("number-options").innerHTML='<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="inlineRadioOptions1" id="femaleGender1" value="2" checked /><label class="form-check-label" for="femaleGender1">2</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="inlineRadioOptions1" id="maleGender1"  value="3" /><label class="form-check-label" for="maleGender1">3</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="inlineRadioOptions1" id="otherGender1"value="4" /><label class="form-check-label" for="otherGender1">4</label></div>'
    }
    else
    {
        document.getElementById("number-options").innerHTML='<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="inlineRadioOptions1" id="femaleGender1" value="5" checked /><label class="form-check-label" for="femaleGender1">5</label></div>'
    }
}
function validateTeamName(teamName) {
    const trimmedTeamName = teamName.trim();
  
    if (trimmedTeamName.length === 0) {
      return false;
    }

    if (/\s/.test(trimmedTeamName)) {
      return false;
    }
  
    return true;
  }
function verify(event)
{
  event.preventDefault()
    const teamNameInput = document.getElementById('teamName');
const teamName = teamNameInput.value;

if (validateTeamName(teamName)) {
    document.getElementById('err-msg1').style.display="none";
    let allValue=[]
   allValue[0]=displayRadioValue()
   allValue[1]=teamName
   allValue[2]=document.querySelector('input[name="inlineRadioOptions1"]:checked').value
   localStorage.setItem("game",allValue[0] );
    localStorage.setItem("teamName", allValue[1]);  
    localStorage.setItem("numberMembers", allValue[2]);  
   console.log(allValue)
  
   window.location.href = "page2.html";
  
} else {
  document.getElementById('err-msg1').style.display="block"
  teamNameInput.value=""
}
}


/* Page2 */
function addData(){
  
let numberPlayers = localStorage.getItem('numberMembers');
  console.log(numberPlayers)
let game=localStorage.getItem('game')
document.getElementById("my-box-bg").innerHTML+=`<form action="">
<div class="row two-space mb-4 name-em">
  <div class="inputBox">
    <input required="" type="text" required="">
    <span class="text">Team Leader Name</span>
  </div>
  <div class="inputBox">
    <input required="" type="text" required="">
    <span class="text">Team Leader Email</span>
  </div>
</div>
<div class="row two-space mb-4 name-em">
  <div class="inputBox">
    <input required="" type="text" required="">
    <span class="text">Team Leader ${game} ID</span>
  </div>
  <div class="inputBox">
    <input required="" type="text" required="">
    <span class="text">Team Leader ${game} Rank</span>
  </div>
</div>
<div class="row two-space ">
  <div class="inputBox">
    <input required="" type="text" required="">
    <span class="text">Team Leader Contact</span>
  </div>
  <div class="inputBox">
    <input required="" type="text" required="">
    <span class="text">Team Leader Sap Id</span>
    <p class="msg" style="color: #f2aa00; font-size: small;">Enter 0 if you are not from UPES</p>
  </div>
</div>
<div class="mb-4 w-100">
  <div class="inputBox">
    <input required="" type="text" required="" class="w-100">
    <span class="text">Team Leader college Name</span>
  </div>
</div>
<div class="mb-5 w-100">
  <div class="inputBox">
    <input required="" type="text" required="" class="w-100">
    <span class="text">Team Leader Discord ID</span>
  </div>
</div>
</form>`
for(let i=0;i<numberPlayers-1;i++){
  console.log("dhdgd")

document.getElementById("my-box-bg").innerHTML+=`<form action="">
<div class="row two-space mb-4 name-em">
  <div class="inputBox">
    <input required="" type="text" required="">
    <span class="text">Member ${i+1} name</span>
  </div>
  <div class="inputBox">
    <input required="" type="text" required="">
    <span class="text">Member  ${i+1} email</span>
  </div>
</div>
<div class="row two-space mb-4 name-em">
  <div class="inputBox">
    <input required="" type="text" required="">
    <span class="text">Member ${i+1} ${game} ID</span>
  </div>
  <div class="inputBox">
    <input required="" type="text" required="">
    <span class="text">Member  ${i+1} ${game} Rank</span>
  </div>
</div>
<div class="row two-space ">
  <div class="inputBox">
    <input required="" type="text" required="">
    <span class="text">Member  ${i+1} Contact</span>
  </div>
  <div class="inputBox">
    <input required="" type="text" required="">
    <span class="text">Member ${i+1} Sap Id</span>
    <p class="msg" style="color: #f2aa00; font-size: small;">Enter 0 if you are not from UPES</p>
  </div>
</div>
<div class="mb-5 w-100">
  <div class="inputBox">
    <input required="" type="text" required="" class="w-100">
    <span class="text">Member ${i+1} college Name</span>
  </div>
</div>
</form>`
}
}





/* page3 */
function displayPayment() {
  return document.querySelector('input[name="paymentOptions"]:checked').value;
}



function billShow(){
let game=localStorage.getItem('game');
if(game==="BGMI")
{
  document.getElementById("bill").innerHTML="Total Amount: <del>₹200</del>   ₹120"
}
else
{
  document.getElementById("bill").innerHTML="Total Amount: <del>₹200</del>   ₹160"
}
}
