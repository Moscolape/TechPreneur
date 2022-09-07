let next = document.getElementById('log');
let previous = document.getElementById('logs');

next.addEventListener('click', () => {
    document.getElementById('form').style.display = 'none';
    document.getElementById('formed').style.display = 'flex';
})

previous.addEventListener('click', () => {
    document.getElementById('formed').style.display = 'none';
    document.getElementById('form').style.display = 'flex';
})

let check = document.getElementById('hide');
let checked = document.getElementById('see');
let password = document.getElementById('passInput');


check.addEventListener('click', () => {

    if (password.value !== "") {
        document.getElementById('see').style.display = 'block';
        document.getElementById('hide').style.display = 'none';
    
        password.type = 'text';
    }
})

checked.addEventListener('click', () => {
        document.getElementById('hide').style.display = 'block';
        document.getElementById('see').style.display = 'none';

        password.type = 'password';
})


let check2 = document.getElementById('hide2');
let checked2 = document.getElementById('see2');
let confirmPassword = document.getElementById('passInput2');


check2.addEventListener('click', () => {

    if (confirmPassword.value !== "") {
        document.getElementById('see2').style.display = 'block';
        document.getElementById('hide2').style.display = 'none';
    
        confirmPassword.type = 'text';
    }
})

checked2.addEventListener('click', () => {
        document.getElementById('hide2').style.display = 'block';
        document.getElementById('see2').style.display = 'none';

        confirmPassword.type = 'password';
})


let register = document.getElementById('logged');
let small = document.getElementById('small');
let secondSmall = document.getElementById('smallSecond');
let thirdSmall = document.getElementById('smallThird');
let fourthSmall = document.getElementById('smallFourth');


password.addEventListener('input', () => {
    if(password.value.length > 7 && password.value.length < 17 ){
        confirmPassword.removeAttribute('disabled');
        small.style.display = 'none';
        fourthSmall.style.display = 'none';

        password.style.border = 'thin solid rgb(232, 178, 28)';
        document.getElementById('span').style.color = 'rgb(232, 178, 28)';
        document.getElementById('span').style.borderLeft = '1px solid rgb(232, 178, 28)';
        document.getElementById('span').style.borderRight = '1px solid rgb(232, 178, 28)';
    }
    else {
        confirmPassword.setAttribute('disabled', true);
    }    
});

password.addEventListener('input', () => {
    if(password.value.length < 8 || password.value.length > 16) {
        small.style.display = 'block';
    } else if (password.value == confirmPassword.value) {
        register.removeAttribute('disabled');
        confirmPassword.style.border = 'thin solid rgb(232, 178, 28)';
        password.style.border = 'thin solid rgb(232, 178, 28)';
        secondSmall.style.display = 'none';
        thirdSmall.style.display = 'block';
        

        document.getElementById('span').style.color = 'rgb(232, 178, 28)';
        document.getElementById('span2').style.color = 'rgb(232, 178, 28)';
        document.getElementById('span').style.borderLeft = '1px solid rgb(232, 178, 28)';
        document.getElementById('span').style.borderRight = '1px solid rgb(232, 178, 28)';
        document.getElementById('span2').style.borderLeft = '1px solid rgb(232, 178, 28)';
        document.getElementById('span2').style.borderRight = '1px solid rgb(232, 178, 28)';
    } else if(password.value !== confirmPassword.value && confirmPassword.value !== ""){
        register.setAttribute('disabled', true);
        confirmPassword.style.border = 'thin solid red';
        password.style.border = 'thin solid red';
        secondSmall.style.display = 'block';
        thirdSmall.style.display = 'none';

        document.getElementById('span').style.color = 'red';
        document.getElementById('span2').style.color = 'red';
        document.getElementById('span').style.borderLeft = '1px solid red';
        document.getElementById('span').style.borderRight = '1px solid red';
        document.getElementById('span2').style.borderLeft = '1px solid red';
        document.getElementById('span2').style.borderRight = '1px solid red';
    }
})



confirmPassword.addEventListener('input', () => {
    if(password.value !== confirmPassword.value){
        register.setAttribute('disabled', true);
        confirmPassword.style.border = 'thin solid red';
        password.style.border = 'thin solid red';
        secondSmall.style.display = 'block';
        thirdSmall.style.display = 'none';

        document.getElementById('span').style.color = 'red';
        document.getElementById('span2').style.color = 'red';
        document.getElementById('span').style.borderLeft = '1px solid red';
        document.getElementById('span').style.borderRight = '1px solid red';
        document.getElementById('span2').style.borderLeft = '1px solid red';
        document.getElementById('span2').style.borderRight = '1px solid red';

    } else {
        register.removeAttribute('disabled');
        confirmPassword.style.border = 'thin solid rgb(232, 178, 28)';
        password.style.border = 'thin solid rgb(232, 178, 28)';
        secondSmall.style.display = 'none';
        thirdSmall.style.display = 'block';
        

        document.getElementById('span').style.color = 'rgb(232, 178, 28)';
        document.getElementById('span2').style.color = 'rgb(232, 178, 28)';
        document.getElementById('span').style.borderLeft = '1px solid rgb(232, 178, 28)';
        document.getElementById('span').style.borderRight = '1px solid rgb(232, 178, 28)';
        document.getElementById('span2').style.borderLeft = '1px solid rgb(232, 178, 28)';
        document.getElementById('span2').style.borderRight = '1px solid rgb(232, 178, 28)';
    }
});


    // Access DOM elements
    const fifthsmall  = document.getElementById('smallie');
    const emailAddress = document.getElementById('email');


    // Prepare email verification api request
    let apiRequest = new XMLHttpRequest();

    
    /* Prevent default behaviour, prepare and send API request */

    emailAddress.addEventListener('input', ($event) => {

    if (emailAddress !== "") {

        // $event.preventDefault();
        const emailverification = emailAddress.value;
        apiRequest.open('GET', 'https://emailverification.whoisxmlapi.com/api/v2?apiKey=at_zFIyyRz8Fw4VnSExsg5qJLswmwnvM&emailAddress=' + emailverification);
        apiRequest.send();
    
        apiRequest.onreadystatechange = () => {
            if (apiRequest.readyState === 4) {
        
                const response = JSON.parse(apiRequest.response);
    
                if(response.formatCheck == 'false' || response.smtpCheck == 'false' || response.dnsCheck == 'false' || response.freeCheck == 'false'){
                    fifthsmall.style.display = 'block';
                    register.setAttribute('disabled', true);
                } else {
        
                    fifthsmall.textContent = response.emailAddress + ' is valid';
                    fifthsmall.style.color = 'green';
                    register.removeAttribute('disabled');
        
                }
        
            }};
        }
    });


    //set the value to every input
    // document.getElementById("csname").value = getSavedValue("csname");
    // document.getElementById("cfname").value = getSavedValue("cfname");
    // document.getElementById("cmname").value = getSavedValue("cmname");
    // document.getElementById("date").value = getSavedValue("date");
    // document.getElementById("ffname").value = getSavedValue("ffname");
    // document.getElementById("fnumber").value = getSavedValue("fnumber");
    // document.getElementById("femail").value = getSavedValue("femail");
    // document.getElementById("mfname").value = getSavedValue("mfname");
    // document.getElementById("mnumber").value = getSavedValue("mnumber");
    // document.getElementById("memail").value = getSavedValue("memail");
    // document.getElementById("schoolname").value = getSavedValue("schoolname");
    // document.getElementById("schooladdress").value = getSavedValue("schooladdress");


    //Save the value function - save it to localStorage as (ID, VALUE)
    // function saveValue(e){

    //     // get the sender's id to save it
    //     var id = e.id;   

    //     // get the value. 
    //     var val = e.value; 

    //     // Every time user writing something, the localStorage's value will override
    //     localStorage.setItem(id, val);

    // }


    //get the saved value function - return the value of "v" from localStorage. 
    // function getSavedValue  (v){
    //     if (!localStorage.getItem(v)) {
    //         return "";
    //     }
    //     return localStorage.getItem(v);
    // }

    // register.addEventListener('click',() => {
    //     alert('help')
    // })
