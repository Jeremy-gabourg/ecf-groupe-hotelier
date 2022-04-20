// let establishment = document.getElementById('add_gallery_establishment');
//
// establishment.addEventListener('change', (event)=> {
//     let establishmentId = event.target.value;
//     if (establishmentId !== null) {
//         let div = document.createElement('div');
//         let label = document.createElement('label');
//         let select = document.createElement('select');
//
//         label.setAttribute('for', 'add_gallery_suite');
//         label.innerHTML = 'Suite associée';
//         select.setAttribute('id', 'add_gallery_suite')
//         select.setAttribute('name', 'add_gallery[suite]')
//
//         fetch('../src/Repository/GalleryRepository.php')
//             .then((response) => {
//                 if (response.ok) {
//                     return response.json();
//                 } else {
//                     console.error('Erreur de la réponse : ' + response.status)
//                 }
//             })
//             .then((response) => {
//                 console.log(response)
//                 let input = '';
//                 for (let i in response) {
//                     input += `<option value={reponse[i].id}>${response[i].title}</option>`;
//                 }
//                 establishment.append(div);
//                 div.append(label, select);
//                 select.append(input);
//
//             })
//     }
// })