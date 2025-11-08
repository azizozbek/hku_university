var options = { align: 'start'  }
var rootNode = document.querySelector('.embla.activity')
var viewportNode = rootNode.querySelector('.embla__viewport')
var container = rootNode.querySelector('.embla__container')
const dotsNode = rootNode.querySelector('.embla__dots')

// Grab button nodes
var prevButtonNode = rootNode.querySelector('.embla__button--prev')
var nextButtonNode = rootNode.querySelector('.embla__button--next')
const emblaApi = EmblaCarousel(viewportNode, options);

const loadImagesInView = setupLazyLoadImage(emblaApi);
// prevButtonNode.addEventListener('click', emblaApi.scrollPrev, false)
// nextButtonNode.addEventListener('click', emblaApi.scrollNext, false)

const removeDotBtnsAndClickHandlers = addDotBtnsAndClickHandlers(
    emblaApi,
    dotsNode
)

emblaApi
    .on('init', loadImagesInView)
    .on('reInit', loadImagesInView)
    .on('slidesInView', loadImagesInView)
    .on('destroy', removeDotBtnsAndClickHandlers)

if (window.innerWidth > 768) {

    container.style.transform = "translate3d(120px, 0px, 0px)";
}

// const updateSnapDisplay = (emblaApi) => {
//     const selectedSnap = emblaApi.selectedScrollSnap()
//     const snapCount = emblaApi.scrollSnapList().length
//     console.log(snapCount)
//     snapDisplay.innerHTML = `${selectedSnap + 1} / ${snapCount}`
// }
//
// emblaApi.on('select', updateSnapDisplay).on('reInit', updateSnapDisplay)
// updateSnapDisplay(emblaApi)
