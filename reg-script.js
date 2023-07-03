function displayQuery(toDisplay, valueForDisplay) {
    document.getElementById(toDisplay).style.display = valueForDisplay.value == 1 ? 'block' : 'none';
};

document.getElementById("num-teammates").addEventListener("input", function () {
    numTeammates = this.value;
    if (numTeammates > 4) {
        this.value = 4;
        numTeammates = 4;
        alert("Please enter a value from 2 to 4");
    }
    document.getElementById("teammate-fields").innerHTML = "";

    for (var i = 0; i < numTeammates; i++) {
        document.getElementById("teammate-fields").innerHTML += `
            <h2>Member ${i + 1} Details: </h2>

            <div class="inputBx">
                <input type="text" required="required" name="m${i + 1}_name">
                <span>Member ${i + 1} Name</span> 
            </div>
                            
            <div class="inputBx">
                <input type="text" required="required" name="m${i + 1}_email">
                <span>Member ${i + 1} Email</span> 
            </div>
                            
            <div class="inputBx">
                <input type="text" required="required" name="m${i + 1}_phno">
                <span>Member ${i + 1} Phone Number</span> 
            </div>
                            
            <div class="selectBx">
                    <label>Are you a student of UPES?</label>
                    <select id="member${i + 1}-college" required="required" onchange="displayQuery('sap${i + 1}', this)" name="m${i + 1}_stuupes">
                        <option selected disabled>Select</option>
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                    </select>
                </div>

                <div id="sap${i + 1}" class="inputBx" style="display: none;">
                    <input type="text" required="required" name="m${i + 1}_sap">
                    <span>Enter Member ${i + 1} SAP ID</span>
                </div>
                            
            <div class="row">
                <div class="selectBx">
                    <label>Select Your Gender</label>
                    <select id="member${i + 1}-gender" required="required" name="m${i + 1}_gender">
                        <option selected disabled>Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
            </div>
                                
            <div class="selectBx">
                <label>Are You CSI Prime Member?</label>
                <select id="member${i + 1}-status" required="required" onchange="displayQuery('csi${i + 1}', this)" name="m${i + 1}_status">
                    <option selected disabled>Select</option>
                    <option value=1>Yes</option>
                    <option value=0>No</option>
                </select>
            </div>

            <div id="csi${i + 1}" class="inputBx" style="display: none;">
                <input type="text" required="required" name="m${i + 1}_csiid">
                <span>Enter Member ${i + 1} CSI ID</span>
            </div>
            
        </div>
        `;
    };
});

function updateNumbers() {
    var select = document.getElementById("Teamtype");
    var Teamtype = select.options[select.selectedIndex].value;
    var total_amt = document.getElementById('total_amt');
    if (Teamtype == 0) {
        total_amt.innerHTML = "Amount - 500₹";
    } else if (Teamtype == 1) {
        total_amt.innerHTML = "Amount - 1000₹";
    } else if (Teamtype == 2) {
        total_amt.innerHTML = "Amount - 800₹";
    }
}