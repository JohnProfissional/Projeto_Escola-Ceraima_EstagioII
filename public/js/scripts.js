console.log("Está funcionando");

class Validator{
    constructor(){
        this.validations = [
            'data-min-length',
        ]
    }

    validate(form){
        let inputs = form.getElementsByTagName('input');

        let inputsArray = [...inputs];

        inputsArray.forEach(function(input){
            
            for(let i=0; this.validations.length > i; i++){
                if(input.getAttribute(this.validations[i]) != null){
                    
                    let method = this.validations[i].replace('data-', '').replace('-', '');

                    let value = input.getAttribute(this.validations[i]);

                    this[method](input, value);
                }
            }

        }, this);
    }

    minlength(input, minValue){
        let inputLength = inpu.value.length;

        let errorMessage = 'O campo precisa ter pelo menos ' + $(minValue) + ' caracteres';

        if(inputLength < minValue){
            this.printMessage(input, errorMessage);
        }
    }

    printMessage(input, msg){

        let template = document.querySelector('.error-validation').cloneNode(true);

        template.textContent = msg;

        let inputParent = input.parentNode;

        template.classList.remove('template');

        inputParent.appendChild(template);


    }
}


let form = document.getElementById("form-cadastro");
let submit = document.getElementById("botaoCadastrar");
let validator = new Validator();

//validações cadastrar
submit.addEventListener('click', function(e){

    e.preventDefault();

    console.log("Tá indo");

})