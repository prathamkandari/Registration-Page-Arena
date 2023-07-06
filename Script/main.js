/* Page1 */
let teamName = NULL;
function displayRadioValue() {
  return document.querySelector('input[name="inlineRadioOptions"]:checked').value;
}
document.getElementsByClassName("valo-next-button").addEventListener('click', function ver() {
  alert("hjhj")
})
function changeNumber(game) {
  if (game === "BGMI") {
    document.getElementById("number-options").innerHTML = '<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="inlineRadioOptions1" id="femaleGender1" value="2" checked /><label class="form-check-label" for="femaleGender1">2</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="inlineRadioOptions1" id="maleGender1"  value="3" /><label class="form-check-label" for="maleGender1">3</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="inlineRadioOptions1" id="otherGender1"value="4" /><label class="form-check-label" for="otherGender1">4</label></div>'
  }
  else {
    document.getElementById("number-options").innerHTML = '<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="inlineRadioOptions1" id="femaleGender1" value="5" checked /><label class="form-check-label" for="femaleGender1">5</label></div>'
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
function verify(event) {
  event.preventDefault()
  const teamNameInput = document.getElementById('teamName');
  const teamName = teamNameInput.value;

  if (validateTeamName(teamName)) {
    document.getElementById('err-msg1').style.display = "none";
    let allValue = []
    allValue[0] = displayRadioValue()
    allValue[1] = teamName
    allValue[2] = document.querySelector('input[name="inlineRadioOptions1"]:checked').value
    localStorage.setItem("game", allValue[0]);
    localStorage.setItem("teamName", allValue[1]);
    localStorage.setItem("numberMembers", allValue[2]);
    console.log(allValue)

    window.location.href = `team_details.html?num=${allValue[2]}`

  } else {
    document.getElementById('err-msg1').style.display = "block"
    teamNameInput.value = ""
  }
}


/* Page2 */
function addData() {

  const numberPlayers = new URLSearchParams(window.location.search).get('num');
  const game = new URLSearchParams(window.location.search).get('game');


  console.log(numberPlayers)
  document.getElementById("my-box-bg").innerHTML += `
<div class="row two-space mb-4 name-em">
  <div class="inputBox">
    <input required="" name="tl_name" type="text" required="" pattern="[A-Za-z0-9\s ]*" minlength="4">
    <span class="text">Team Leader Name</span>
  </div>
  <div class="inputBox">
    <input required="" name="tl_email" type="text" required="" minlength="6">
    <span class="text">Team Leader Email</span>
  </div>
</div>
<div class="row two-space mb-4 name-em">
  <div class="inputBox">
    <input required=""name="tl_id" type="text" required="">
    <span class="text">Team Leader ${game} ID</span>
  </div>
  <div class="inputBox">
    <input required="" name="tl_rank" type="text" required="">
    <span class="text">Team Leader ${game} Rank</span>
  </div>
</div>
<div class="row two-space ">
  <div class="inputBox">
    <input required="" name="tl_contact" type="text" required="" minlength="10" maxlength="10">
    <span class="text">Team Leader Contact</span>
  </div>
  <div class="inputBox">
    <input required="" type="text" name="tl_sap" required="" maxlength="10">
    <span class="text">Team Leader Sap Id</span>
    <p class="msg" style="color: #f2aa00; font-size: small;">*Enter 0 if you are not from UPES</p>
  </div>
</div>
<div class="mb-4 w-100">
  <div class="inputBox">
    <input required="" type="text" name="tl_college" required="" class="w-100" pattern="[A-Za-z\s]*" minlength="3">
    <span class="text">Team Leader college Name</span>
  </div>
</div>
<div class="mb-5 w-100">
  <div class="inputBox">
    <input required="" type="text" name="tl_discord" required="" class="w-100" minlength="3">
    <span class="text">Team Leader Discord ID</span>
  </div>
</div>`



  for (let i = 0; i < numberPlayers - 1; i++) {


    document.getElementById("my-box-bg").innerHTML += `

<div class="row two-space mb-4 name-em">

  <div class="inputBox">
    <input required="required" type="text" name="m${i + 1}_name" pattern="[A-Za-z0-9\s]*" minlength="4">
    <span class="text">Member ${i + 1} name</span>
  </div>
  <div class="inputBox">
    <input required="required" type="text" name="m${i + 1}_email" minlength="6">
    <span class="text">Member  ${i + 1} email</span>
  </div>
</div>
<div class="row two-space mb-4 name-em">
  <div class="inputBox">
    <input required=""  type="text" name="m${i + 1}_id">
    <span class="text">Member ${i + 1} ${game} ID</span>
  </div>
  <div class="inputBox">
    <input required=""  type="text" name="m${i + 1}_rank">
    <span class="text">Member  ${i + 1} ${game} Rank</span>
  </div>
</div>
<div class="row two-space ">
  <div class="inputBox">
    <input required=""  type="text" name="m${i + 1}_contact" required="" minlength="10" maxlength="10">
    <span class="text">Member ${i + 1} Contact</span>
  </div>
  <div class="inputBox">
    <input required=""  type="text" name="m${i + 1}_sap" maxlength="10">
    <span class="text">Member ${i + 1} Sap Id</span>
    <p class="msg" style="color: #f2aa00; font-size: small;">*Enter 0 if you are not from UPES</p>
  </div>
</div>
<div class="mb-5 w-100">
  <div class="inputBox">
    <input required="" type="text"  class="w-100" name="m${i + 1}_college" pattern="[A-Za-z\s]*" minlength="3">
    <span class="text">Member ${i + 1} college Name</span>
  </div>
</div>
</form>`
  }
}


/* page3 */
function displayPayment() {
  return document.querySelector('input[name="paymentOptions"]:checked').value;
}



function billShow() {
  const game = new URLSearchParams(window.location.search).get('game');

  if (game === "BGMI") {
    document.getElementById("bill").innerHTML = "Total Amount: ₹160"
    document.getElementById("billtwo").innerHTML = "<em>*Amount is not Refundable</em>";
  }
  else {
    document.getElementById("bill").innerHTML = "Total Amount: ₹200"
    document.getElementById("billtwo").innerHTML = "<em>*Amount is not Refundable</em>";
  }
  // else {
  //   document.getElementById("billtwo").innerHTML = "Please fill all the details";
  // }
}
