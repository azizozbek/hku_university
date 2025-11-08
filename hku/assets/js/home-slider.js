var options = { loop: true }
var rootNode = document.querySelector('.embla')
var viewportNode = rootNode.querySelector('.embla__viewport')

// Grab button nodes
var prevButtonNode = rootNode.querySelector('.embla__button--prev')
var nextButtonNode = rootNode.querySelector('.embla__button--next')

var api = EmblaCarousel(viewportNode, options)
var loadImages = setupLazyLoadImage(api);
api
    .on('init', loadImages)
    .on('reInit', loadImages)
    .on('slidesInView', loadImages)

prevButtonNode.addEventListener('click', api.scrollPrev, false)
nextButtonNode.addEventListener('click', api.scrollNext, false)

// const updateSnapDisplay = (emblaApi) => {
//     const selectedSnap = emblaApi.selectedScrollSnap()
//     const snapCount = emblaApi.scrollSnapList().length
//     console.log(snapCount)
//     snapDisplay.innerHTML = `${selectedSnap + 1} / ${snapCount}`
// }
//
// emblaApi.on('select', updateSnapDisplay).on('reInit', updateSnapDisplay)
// updateSnapDisplay(emblaApi)
