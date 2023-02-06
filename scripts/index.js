document.querySelector('.visible-btn').addEventListener('click', e => {
    e.preventDefault();
    const pass_input = document.getElementById('user_pass');

    if(pass_input['type'] == 'password'){
        pass_input['type'] = 'text';
    }else{
        pass_input['type'] = 'password';
    }
})