/**
 * As funções vem do Utils.js
 */

$(document).ready(function(){
    var filtro = 'pesquisa={"fields":["Codigo","Cidade","Bairro","ValorVenda","Vagas","Churrasqueira","Lareira","FotoDestaque"]}'
    
    request(filtro)
        .then((data) => {
            var top3 = []
            
            data = arrayToObj(data)
            
            top3.push(data[0])
            top3.push(data[1])
            top3.push(data[3])

            for(obj of top3){
                obj.ValorVenda = numberToReal(obj.ValorVenda)
                obj.FotoDestaque = getRandomImagemHouse()
                var html = ''
                html += `
                    <div class="col-sm">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" style="height: 200px;" src="${obj.FotoDestaque}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">À Venda</h5>
                                <p class="card-text">Para mais informações entre em contato.</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Número:</b> ${obj.Codigo}</li>
                                <li class="list-group-item"><b>Local: </b>${obj.Bairro + ' - ' + obj.Cidade}</li>
                                <li class="list-group-item"><b>Churrasqueira:</b> ${obj.Churrasqueira}</li>
                                <li class="list-group-item"><b>Valor Venda:</b> ${obj.ValorVenda}</li>
                            </ul>
                        </div>
                    </div>
                `
                $('#destaques').append(html)

            }

        })
        .catch((err) => {
            console.log(err);
        })

})