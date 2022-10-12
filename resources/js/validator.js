
function Validator(options){

    function validate(inputElement, rule){
        var errorElement=inputElement.parentElement.querySelector(options.errorSelector);
        var errorMessage=rule.test(inputElement.value);
                    
            if(errorMessage){
                errorElement.innerText=errorMessage;
                inputElement.parentElement.classList.add('invalid');
            }
            else
            {
                errorElement.innerText='';
                inputElement.parentElement.classList.remove('invalid');
            }
    }

    var formElement=document.querySelector(options.form);

    if(formElement){
        options.rule.array.forEach(function(rule){
            var inputElement = formElement.querySelector(rule.selector);
            if(inputElement){
                inputElement.onblur=function(){
                    validate(inputElement,rule);
                }

            }
        });
    }
}

Validator.isRequired= function (selector){
    return{
        selector:selector,
        test: function(value){
            return value.trim() ? undefined:'vui lòng nhập trường này'
        }
    }

}