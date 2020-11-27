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

export function getVisioResponse(data) {

    if (data.visio) {

        var visioLink = data.visio,
            addConf = document.querySelector('#add-conf'),
            setConf = document.querySelector('#go-to-conf'),
            div = document.querySelector('#room-url');

        setConf.querySelector('input').value = visioLink;
        setConf.querySelector('a').href = visioLink;
        addConf.style.display = 'none';
        setConf.style.display = 'flex';
        div.style.display = 'flex';
    }
}