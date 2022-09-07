    const parent =  document.getElementById('parental');
    const pant =  document.getElementById('parent');
    const pern = document.getElementById('person');
    const person = document.getElementById('personal');
    const butt = document.getElementById('button');
    const bar = document.getElementById('bar');
    const bars = document.getElementById('bars');



    pant.addEventListener('click', () => {
        document.getElementById('all').style.display = 'none';
        document.getElementById('mall').style.display = 'flex';
        pant.style.fontWeight = 'bold';
        pant.style.borderBottom = '3px solid black';
        pern.style.fontWeight = '100';
        pern.style.borderBottom = 'none';
    });

    pern.addEventListener('click', () => {
        document.getElementById('mall').style.display = 'none';
        document.getElementById('all').style.display = 'flex';
        pern.style.fontWeight = 'bold';
        pern.style.borderBottom = '3px solid black';
        pant.style.fontWeight = '100';
        pant.style.borderBottom = 'none';
    });

    parent.addEventListener('click', () => {
        document.getElementById('grid').style.display = 'none';
        document.getElementById('avatar').style.display = 'block';
        parent.style.fontWeight = 'bold';
        parent.style.borderBottom = '3px solid black';
        person.style.fontWeight = '100';
        person.style.borderBottom = 'none';
    });

    person.addEventListener('click', () => {
        document.getElementById('grid').style.display = 'grid';
        document.getElementById('avatar').style.display = 'none';
        person.style.fontWeight = 'bold';
        person.style.borderBottom = '3px solid black';
        parent.style.fontWeight = '100';
        parent.style.borderBottom = 'none';
        document.getElementById('savepic').style.display = 'none'
    });

    bar.addEventListener('click', () => {
        document.getElementById('sidebar').style.marginLeft = '-200px';
        document.getElementById('main').style.width = '100%';
        bar.style.display = 'none';
        bars.style.display = 'inline';
    });

    bars.addEventListener('click', () => {
        document.getElementById('sidebar').style.marginLeft = '0px';
        document.getElementById('main').style.width = '80%';
        bars.style.display = 'none';
        bar.style.display = 'inline';
    });

    butt.addEventListener('click', () => {
        document.getElementById('profile').style.display = 'none';
        document.getElementById('update').style.display = 'block';
    })


    var loadFile = function (event) {
        var image = document.getElementById("output");
        image.setAttribute('src', URL.createObjectURL(event.target.files[0]));
        document.getElementById('savepic').style.display = 'inline-block';
        // console.log(URL.createObjectURL(event.target.files[0]));
        // if(typeof(Storage) !== undefined) {
            // localStorage.setItem('newpic', URL.createObjectURL(event.target.files[0]));
            // image.src = localStorage.getItem('newpic');
        // }
      };

    // const toggle = document.getElementById('toggle');


    // toggle.addEventListener('click', () => {
    //     document.body.style.background = 'black';
    //     document.body.style.color = 'ligtgrey';
    // })
      
    let password = document.getElementById('passone');
    let confirmPassword = document.getElementById('passtwo');

    password.addEventListener('input', () => {
        if(password.value.length > 7 && password.value.length < 17 ){
            confirmPassword.removeAttribute('disabled');
            password.style.border = '1px solid green';
        }
        else {
            confirmPassword.setAttribute('disabled', true);
        }    
    });
    
    password.addEventListener('input', () => {
        if( password.value.length >0 && (password.value.length < 8 || password.value.length > 16)) {
            password.style.border = '1px solid red';
        } else if (password.value !== "" && (password.value == confirmPassword.value)) {
            confirmPassword.style.border = '1px solid green';
            password.style.border = '1px solid green';
        } else if(password.value !== confirmPassword.value && confirmPassword.value !== ""){
            confirmPassword.style.border = '1px solid red';
            password.style.border = '1px solid red';
        }
    })
    
    confirmPassword.addEventListener('input', () => {
        if(password.value !== confirmPassword.value){
            confirmPassword.style.border = '1px solid red';
            password.style.border = '1px solid red';
        } else if(password.value == confirmPassword.value) {
            document.getElementById('oldpwd').setAttribute('disabled', true);
            confirmPassword.style.border = '1px solid green';
            password.style.border = '1px solid green';
        }
    });
