const clicable = document.querySelectorAll(".question-box");

function toggleImg(imgTag) {
    const imgSrc = imgTag.src;
    const test = imgSrc.includes('/src/assets/icons/plus.svg');
    let newSrc = {
        'true': '/src/assets/icons/remove.svg',
        'false': '/src/assets/icons/plus.svg'}[test];

    return newSrc;
  }

clicable.forEach((div) => {
    div.addEventListener('click', () => {
        // console.log(div.childNodes[3].firstChild.src);
        const imageTag = div.childNodes[3].firstChild;
        imageTag.src = toggleImg(imageTag);
        div.nextElementSibling.classList.toggle("question-container--open");
    })
})