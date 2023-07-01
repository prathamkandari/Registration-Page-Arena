function displayPayment() {
    return document.querySelector('input[name="paymentOptions"]:checked').value;
}
function showQR(payment){
    if(payment==="Paytm")
    {
        document.getElementById('modal-img').innerHTML='<h1>PayTM</h1><img src="../images/Paytm1.jpg" />'
    }
    else
    if(payment==="Phonepe")
    {
        document.getElementById('modal-img').innerHTML='<h1>PhonePe</h1><img src="../images/PhonePe1.jpeg" />'
    }
    else
    {
        document.getElementById('modal-img').innerHTML='<h1>Google Pay</h1><img src="../images/gpay1.jpeg" />'
    }
}
