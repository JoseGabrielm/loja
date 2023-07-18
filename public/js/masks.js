



function divisionMoneyMask(input) {


    var template = '99.999,99';

    input = input.replace(/\D/g, '')

    //adicionar if para remover R$ da mascara

    switch (input.length) {

        case 3:
            template = 'R$ 9,99'
            break;

        case 4:
            template = 'R$ 99,99'
            break;

        case 5:
            template = 'R$ 999,99'
            break;

        case 6:
            template = 'R$ 9.999,99'
            break;

        case 7:
            template = 'R$ 99.999,99'
            break;

        default:
            return 'R$ ' + template;

    }

    return template;


}

function documentMask(input) {

    var template = '99.999,99';

    input = input.replace(/\D/g, '')


    return input.length === 11 ?
        '999.999.999-99' :
        '99.999.999/9999-99'


}


