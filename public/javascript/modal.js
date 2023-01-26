modal = document.getElementById('modal');

document.getElementById('ucitaj-pretragu').addEventListener('click', (event) => {
    modal.classList.toggle('hidden');
});

modal.addEventListener('click', (event) => {
    if (event.target.id == 'modal')
        modal.classList.toggle('hidden');
})