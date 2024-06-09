const allStar = document.querySelectorAll('.rating .star');
const ratingValue = document.querySelector('.rating input');

let click = 0; // Pindahkan inisialisasi di luar fungsi klik

allStar.forEach((item, idx)=> {
    item.addEventListener('click', function() {
        ratingValue.value = idx + 1;

        allStar.forEach(i=> {
            i.classList.replace('bxs-star', 'bx-star');
            i.classList.remove('active');
        });

        for(let i=0; i<allStar.length; i++) {
            if(i <= idx) {
                allStar[i].classList.replace('bx-star', 'bxs-star');
                allStar[i].classList.add('active');
            } else {
                allStar[i].style.setProperty('--i', click);
                click++;
            }
        }
    });
});
