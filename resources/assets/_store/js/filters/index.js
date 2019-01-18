// set function parseTime,formatTime to filter

import moment from 'moment'
import numeral from 'numeral';
import 'moment/locale/pt-br';
import 'numeral/locales/pt-br';

moment.locale('pt-br');
numeral.locale('pt-br');

function pluralize(time, label) {
  if (time === 1) {
    return time + label
  }
  return time + label + 's'
}

export function timeAgo(time) {
  time = moment(time);
  if(time.isValid()){
    return time.fromNow()
  }
  return `time invalid!`
}

export function numberFormatter(num,isCurrency = false) {
    let number = 0;
    if(num !== null && num !== "" && !isNaN(num)){
        number = isCurrency ? numeral(num).format('$0,0.00') :  numeral(num).format('0,0.00');
    }
    return number;

    //let number = numeral(value).value();
    //return  number ? number : 0;

}
export function phoneFormat(num) {
    if (num === null ) return;
    var texto = num;
    // Tiro tudo que não é numero
    texto = texto.replace(/[^\d]/g, '');
    // Se tiver alguma coisa
    if (texto.length > 0)
    {
    // Ponho o primeiro parenteses do DDD    
    texto = "(" + texto;
        if (texto.length > 3)
        {
            // Fecha o parenteses do DDD
            texto = [texto.slice(0, 3), ") ", texto.slice(3)].join('');  
        }
        if (texto.length > 12)
        {      
            // Se for 13 digitos ( DDD + 9 digitos) ponhe o traço no quinto digito            
            if (texto.length > 13) 
                texto = [texto.slice(0, 10), "-", texto.slice(10)].join('');
            else
             // Se for 12 digitos ( DDD + 8 digitos) ponhe o traço no quarto digito
                texto = [texto.slice(0, 9), "-", texto.slice(9)].join('');
        }   
            // Não adianta digitar mais digitos!
            if (texto.length > 15)                
               texto = texto.substr(0,15);
    }
    // Retorna o texto
    return texto
}