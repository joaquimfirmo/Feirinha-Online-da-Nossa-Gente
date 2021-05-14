

function modal(id){

    var produto = document.getElementById(id);

    document.getElementById("name-product").innerHTML  = produto.dataset.name;
    document.getElementById("preco-product-modal").innerHTML  = produto.dataset.price;
    document.getElementById("msg").innerHTML  ='Deseja realmente excluir ?';
    document.getElementById("id-pd-form").value = produto.dataset.id;
    let path = "http://localhost/feirinhaOnline/public/storage/imageProducts/"+produto.dataset.image;
  
    document.getElementById("image-product").src = path;

    //ativar modal do materialize
    var elemsModal = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elemsModal, {
      inDuration: 230,
    });


}
