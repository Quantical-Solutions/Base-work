export function getTestsResponse(data) {

    console.log(data);
}

export function getDeleteResponse(infos) {

    var title = infos.title,
        modal = document.createElement('div');
    modal.setAttribute('class', 'modal');
    modal.setAttribute('id', 'delete-modal');
    modal.innerHTML = '<p><b>' + title + '</b> a bien été effacé.</p>';
    document.body.appendChild(modal);
    setTimeout(function(){
        document.querySelector('.modal').classList.add('showModal');
    }, 100);
    setTimeout(function(){
        document.querySelector('.modal').classList.remove('showModal');
    }, 3000);
    setTimeout(function(){
        document.body.removeChild(document.querySelector('.modal'));
    }, 3250);

}