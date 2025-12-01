var news_options = { align: 'start'  }
var rootNode = document.querySelector('.embla.news')
var viewportNode = rootNode.querySelector('.news .embla__viewport')
var container = rootNode.querySelector('.news .embla__container')
const newsDotsNode = rootNode.querySelector('.news .embla__dots')

// Grab button nodes
const newsEmblaApi = EmblaCarousel(viewportNode, news_options);

const newLoadImagesInView = setupLazyLoadImage(newsEmblaApi);

const newsRemoveDotBtnsAndClickHandlers = addDotBtnsAndClickHandlers(
    newsEmblaApi,
    newsDotsNode
)

newsEmblaApi
    .on('init', newLoadImagesInView)
    .on('reInit', newLoadImagesInView)
    .on('slidesInView', newLoadImagesInView)
    .on('destroy', newsRemoveDotBtnsAndClickHandlers)

if (window.innerWidth > 768) {

    container.style.transform = "translate3d(120px, 0px, 0px)";
}

// const updateSnapDisplay = (newsEmblaApi) => {
//     const selectedSnap = newsEmblaApi.selectedScrollSnap()
//     const snapCount = newsEmblaApi.scrollSnapList().length
//     console.log(snapCount)
//     snapDisplay.innerHTML = `${selectedSnap + 1} / ${snapCount}`
// }
//
// newsEmblaApi.on('select', updateSnapDisplay).on('reInit', updateSnapDisplay)
// updateSnapDisplay(newsEmblaApi)
