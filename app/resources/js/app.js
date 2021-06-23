require('./bootstrap');

const btnDeleteNews = document.querySelectorAll('#del-btn');

btnDeleteNews.forEach((elem) => {
    elem.addEventListener('click', () => {
        let id = elem.getAttribute('data-id');
        (
            async () => {
                const response = await fetch('news/' + id, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify({
                        id: id
                    })
                });
                const answer = await response.json();
                console.log(answer);
            }
        )();
    })
});
