var URL = 'http://sandbox-rest.vistahost.com.br/imoveis/listar?key=c9fdd79584fb8d369a6a579af1a8f681'


var arrayToObj = (obj) => {
    return Object.keys(obj).map((item) => {
        return obj[item]
    })
}

var getRandomImagemHouse = () => {
    return 'images/imoveis/' + (Math.floor(Math.random() * 11)) + '.jpg'
}

var numberToReal = (valor) => {
    return parseFloat(valor).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }).toString()
}

var filterImoveisComImagem = (obj) => {
    return obj.filter((item) => {
        return item.FotoDestaque && item.FotoDestaque.length > 0
    })
}

var request = (filter) => {
    return $.ajax({
        url: URL + '&' + filter,
        type: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    })
}
