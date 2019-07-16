/**
 * As funções vem do Utils.js
 */

$(document).ready(function(){
    var randomPage = (Math.floor(Math.random() * 11)) + 1
    var filtro = `pesquisa={"fields":["Codigo","Cidade","Bairro","ValorVenda","Vagas","Churrasqueira","Lareira","FotoDestaque"], "paginacao":{"pagina":${randomPage},"quantidade":25}}`
    
    request(filtro)
        .then((data) => {
            data = arrayToObj(data)

            for(obj of data){
                obj.ValorVenda = numberToReal(obj.ValorVenda)
                obj.FotoDestaque = getRandomImagemHouse()
                var html = ''
                html += `
                <div class="row mt-3 mb-1">
                    <div class="col-sm">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <img src="${obj.FotoDestaque}" style="width: 420px; height: 200px;" class="img-fluid" alt="">
                                </div>
                                <div class="col">
                                    <div class="card-block px-2">
                                        <h4 class="card-title mt-2">Casa à venda - Nº: ${obj.Codigo}</h4>
                                        <p class="card-text">
                                            Descrição:
                                            Residência à venda, número ${obj.Codigo}, localizada em ${obj.Bairro + ' - ' + obj.Cidade}, 
                                            no valor de ${obj.ValorVenda}. <br/>
                                            Para mais informações entre em contato.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `
                $('#imoveis').append(html)

            }

        })
        .catch((err) => {
            console.log(err);
        })

})