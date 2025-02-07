document.addEventListener('DOMContentLoaded', fetchInstagramPosts);

function fetchInstagramPosts() {
  fetch('https://www.instagram.com/esportaccount/?__a=1&__d=dis') // Cambia esportaccount con l'handle corretto
    .then(response => response.json())
    .then(data => populateCarousel(data))
    .catch(err => console.error('Errore:', err));
}

function populateCarousel(data) {
  const carouselInner = document.getElementById('carousel-posts');
  carouselInner.innerHTML = ''; // Pulisco il contenuto

  const posts = data.graphql.user.edge_owner_to_timeline_media.edges;

  posts.forEach((post, index) => {
    const imageUrl = post.node.display_url;
    const caption = post.node.edge_media_to_caption.edges[0]?.node.text || 'Nessuna descrizione';

    const carouselItem = document.createElement('div');
    carouselItem.className = `carousel-item ${index === 0 ? 'active' : ''}`;
    carouselItem.innerHTML = `
      <div class="d-block w-100 p-4 text-center">
        <img src="${imageUrl}" alt="Post" class="img-fluid rounded">
        <p>${caption}</p>
      </div>
    `;

    carouselInner.appendChild(carouselItem);
  });
}
